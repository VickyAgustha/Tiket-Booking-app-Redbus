<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Pemesanan;
use App\Pembayaran;
use App\User;

class PemesananController extends Controller
{

    public function index(Request $request)
    {
        $user = Auth::user();

        // Ambil data dari query string
        $asal = $request->query('asal');
        $discount = $request->query('discount');
        $nama = $request->query('nama');
        $nomor = $request->query('nomor');
        $total_payment = (int) str_replace(['IDR', '.', ','], '', $request->query('total_payment'));
        $tujuan = $request->query('tujuan');
        $busId = $request->query('id_bus');
        $seatString = $request->query('seat');

        // Simpan id_bus ke session agar tidak hilang
        if ($busId) {
            session(['id_bus' => $busId]);
        }

        // Cek apakah user punya diskon pertama
        $punyaDiskon = $user && $user->diskon_pertama;

        return view('isidatapesan', compact('punyaDiskon', 'asal', 'discount', 'nama', 'nomor', 'total_payment', 'tujuan', 'busId', 'seatString'));
    }

    public function upload(Request $request)
    {
        // Validasi input form
        $request->validate([
            'bukti_bayar' => 'required|image|mimes:jpeg,png,jpg,pdf|max:2048',
            'id_user' => 'required|integer',
            'id_bus' => 'required|integer',
            'total_bayar' => 'required|numeric',
            'diskon' => 'nullable',
        ]);

        $id_user    = $request->input('id_user');
$id_bus     = $request->input('id_bus');
$seatString = $request->input('seat');
$seats      = explode(',', $seatString);

// Cek apakah ada kursi yang sudah dipesan untuk bus ini
$kursiTerisi = DB::table('pembayaran')
    ->where('id_bus', $id_bus)
    ->pluck('nomor_kursi')
    ->flatMap(function ($value) {
        return explode(',', $value);
    })
    ->map('trim')
    ->toArray();

$kursiTertabrak = array_intersect($kursiTerisi, $seats);

if (!empty($kursiTertabrak)) {
    return back()->withErrors([
        'seat' => 'Nomor kursi berikut sudah dipesan: ' . implode(', ', $kursiTertabrak)
    ])->withInput();
}

// Tentukan metode pembayaran secara berulang
$jumlahPembayaran = Pembayaran::whereHas('pemesanan', function ($query) use ($id_user) {
    $query->where('id_user', $id_user);
})->count();

$metodes = ['virtual account', 'e-wallet', 'manual transfer'];
$metodeIndex = $jumlahPembayaran % count($metodes);
$metodeBayar = $metodes[$metodeIndex];

// Simpan file bukti bayar
if ($request->hasFile('bukti_bayar') && $request->file('bukti_bayar')->isValid()) {
    $buktiBayarPath = $request->file('bukti_bayar')->store('bukti_pembayaran', 'public');
} else {
    return back()->withErrors(['bukti_bayar' => 'File tidak valid atau gagal diunggah.']);
}

$total_bayar = $request->input('total_bayar');
$diskon = $request->input('diskon');
$diskon = $diskon === 'none' || $diskon === null ? 0 : (float) $diskon;
$seatList = implode(',', $seats);

// Simpan ke tabel 'pemesanan'
$pemesanan = Pemesanan::create([
    'id_user'     => $id_user,
    'id_bus'      => $id_bus,
    'tgl_order'   => now(),
    'diskon'      => $diskon,
    'total_bayar' => $total_bayar,
    'bukti_bayar' => $buktiBayarPath,
]);
// Jika user menggunakan diskon, maka set diskon_pertama jadi null
if ($diskon > 0) {
    $user = User::find($id_user);
    if ($user) {
        $user->diskon_pertama = ''; // <- Ganti null menjadi string kosong
        $user->save();
    }
}

// Simpan ke tabel 'pembayaran'
Pembayaran::create([
    'id_bus'        => $id_bus,
    'id_order'      => $pemesanan->id_order,
    'metode_bayar'  => $metodeBayar,
    'tgl_bayar'     => now()->toDateString(),
    'total_bayar'   => $total_bayar,
    'diskon'        => $diskon,
    'bukti_bayar'   => $buktiBayarPath,
    'status_bayar'  => 'pending',
    'nomor_kursi'   => $seatList
]);

return redirect()->route('pembayaran.success')->with('success', 'Pembayaran berhasil diunggah.');

    }
}



