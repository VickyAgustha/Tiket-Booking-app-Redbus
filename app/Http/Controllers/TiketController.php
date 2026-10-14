<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bus;
use App\Kursi;
use App\Tiket;
use App\Pembayaran;
use PDF;
use Carbon\Carbon;
class TiketController extends Controller
{
    public function index(Request $request)
    {
        // Validasi input
        $request->validate([
            'asal' => 'nullable|string|max:100',
            'tujuan' => 'nullable|string|max:100',
            'kapasitas' => 'nullable|string|in:small,medium,large',
        ]);

        // Mulai query
        $query = Bus::query();

        // Filter berdasarkan asal
        if ($request->filled('asal')) {
            $query->where('asal', 'LIKE', '%' . $request->asal . '%');
        }

        // Filter berdasarkan tujuan
        if ($request->filled('tujuan')) {
            $query->where('tujuan', 'LIKE', '%' . $request->tujuan . '%');
        }

        // Filter berdasarkan kapasitas
        if ($request->filled('kapasitas')) {
            switch ($request->kapasitas) {
                case 'small':
                    $query->where('kapasitas', '<=', 40);
                    break;
                case 'medium':
                    $query->whereBetween('kapasitas', [41, 45]);
                    break;
                case 'large':
                    $query->where('kapasitas', '>', 45);
                    break;
            }
        }

        $buses = $query->get();

        return view('tiket', compact('buses'));
    }

   public function getKursi($id_bus)
{
    try {
        // Ambil semua kursi dari bus yang bersangkutan
        $kursi = Kursi::where('id_bus', $id_bus)->get();

        // Ambil semua nomor_kursi dari tabel pembayaran (yang tidak dibatalkan)
        $kursiDipesan = Pembayaran::pluck('nomor_kursi')->toArray(); // array of '2,3', '4' dll

        // Ubah menjadi array flat: ['2', '3', '4']
        $kursiTerisi = [];
        foreach ($kursiDipesan as $item) {
            $nomorArray = explode(',', $item);
            foreach ($nomorArray as $nomor) {
                $kursiTerisi[] = trim($nomor);
            }
        }

        // Tandai kursi yang dipesan
        $kursi->transform(function ($item) use ($kursiTerisi) {
            if (in_array($item->nomor, $kursiTerisi)) {
                $item->status = 'terisi';
            } else {
                $item->status = 'kosong';
            }
            return $item;
        });

        return response()->json($kursi);
    } catch (\Exception $e) {
        \Log::error("Error getKursi: " . $e->getMessage());
        return response()->json(['error' => 'Terjadi kesalahan saat mengambil kursi'], 500);
    }
}

    
public function batalTiket(Request $request)
{
    $request->validate([
        'id_tiket' => 'required|exists:tiket,id_tiket',
    ]);

    $tiket = Tiket::find($request->id_tiket);

    if (!$tiket) {
        return response()->json([
            'success' => false,
            'message' => 'Tiket tidak ditemukan.'
        ]);
    }

    // Hitung selisih waktu
    $jadwalBerangkat = Carbon::parse($tiket->jadwal_berangkat);
    $now = Carbon::now();
    $selisihJam = $now->diffInHours($jadwalBerangkat, false);

    if ($selisihJam < 1) {
        return response()->json([
            'success' => false,
            'message' => 'Pembatalan tidak bisa dilakukan kurang dari 1 jam sebelum keberangkatan.'
        ]);
    }

    $refund = 0;
    $potongan = 0;

    if ($selisihJam >= 6) {
        $potongan = 0;
    } elseif ($selisihJam >= 4) {
        $potongan = 0.25;
    } elseif ($selisihJam >= 2) {
        $potongan = 0.5;
    } elseif ($selisihJam >= 1) {
        $potongan = 1.0;
    }

    $refund = $tiket->total_bayar * (1 - $potongan);
    $tiket->total_bayar = $refund;
    $tiket->status = 'dibatalkan';
    $tiket->save();

    return response()->json([
        'success' => true,
        'message' => 'Tiket berhasil dibatalkan.',
        'refund' => $refund,
        'potongan' => $potongan * 100 . '%'
    ]);
}


public function ubahJam(Request $request)
{
    $request->validate([
        'id_tiket' => 'required|exists:tiket,id_tiket',
        'tanggal' => 'required|date',
        'jam_berangkat' => 'required|date_format:H:i',
    ]);

    // Ambil data tiket dari database
    $tiket = Tiket::find($request->id_tiket);

    if (!$tiket) {
        return response()->json([
            'success' => false,
            'message' => 'Data tiket tidak ditemukan.'
        ]);
    }

    // Ambil jadwal keberangkatan asli dari database
    $jadwalAsli = \Carbon\Carbon::parse($tiket->jadwal_berangkat);
    $now = \Carbon\Carbon::now();

    // Cek apakah masih bisa diubah (maksimal 6 jam sebelum jadwal keberangkatan lama)
    if ($now->greaterThanOrEqualTo($jadwalAsli->subHours(6))) {
    return response()->json([
        'success' => false,
        'message' => 'Perubahan hanya diizinkan maksimal 6 jam sebelum keberangkatan.'
    ]);
}

    // Gabungkan tanggal & jam baru jadi datetime baru
    $jadwalBaru = \Carbon\Carbon::createFromFormat('Y-m-d H:i', "{$request->tanggal} {$request->jam_berangkat}");

    // Update tiket
    $tiket->jadwal_berangkat = $jadwalBaru;
    $tiket->status = 'jadwal tiket diubah';
    $tiket->save();

    return response()->json([
        'success' => true,
        'message' => 'Jadwal keberangkatan berhasil diubah.',
        'jadwal_baru' => $tiket->jadwal_berangkat
    ]);
}

public function downloadPDF(Request $request)
{
    $tiket = Tiket::with('bus')->findOrFail($request->id_tiket);
    
    $pdf = PDF::loadView('tiket.pdf', compact('tiket'));
    
    return $pdf->download('tiket-bustech-'.$tiket->id_tiket.'.pdf');
}


}
