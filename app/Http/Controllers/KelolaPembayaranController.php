<?php

namespace App\Http\Controllers;
use App\Tiket;
use App\Pembayaran;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class KelolaPembayaranController extends Controller
{
    public function index()
    {
        $data = DB::table('pembayaran')
            ->leftJoin('pemesanan', 'pembayaran.id_order', '=', 'pemesanan.id_order')
            ->leftJoin('pengguna', 'pemesanan.id_user', '=', 'pengguna.id_user')
            ->select(
                'pembayaran.*',
                'pemesanan.id_user',
                'pembayaran.nomor_kursi',
                'pembayaran.id_bus',
                'pengguna.nama as nama_user'
            )
            ->get();

        $users = DB::table('pengguna')->get();

        return view('kelolapembayaran', compact('data', 'users'));
    }

public function tolakPembayaran($id_pembayaran)
{
    $pembayaran = Pembayaran::find($id_pembayaran);

    if (!$pembayaran) {
        return back()->with('error', 'Data pembayaran tidak ditemukan.');
    }

    // Update status pembayaran menjadi "ditolak"
    $pembayaran->status_bayar = 'ditolak';
    $pembayaran->save();

    // Ambil data pemesanan terkait
    $pemesanan = Pemesanan::find($pembayaran->id_order);

    if ($pemesanan && $pemesanan->diskon > 0) {
        // User menggunakan diskon, maka kembalikan hak diskonnya
        $user = Pengguna::find($pemesanan->id_user);
        if ($user) {
            $user->diskon_pertama = true; // atau 1 jika boolean
            $user->save();
        }
    }

    return back()->with('success', 'Pembayaran berhasil ditolak dan diskon dikembalikan ke pengguna.');
}}