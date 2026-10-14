<?php
// app/Http/Controllers/SelesaiController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Selesai;
use App\Tiket;
use App\Pembayaran;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SelesaiController extends Controller
{
   public function prosesSelesai(Request $request)
{
    DB::beginTransaction();

    try {
        $tiket = Tiket::with('pembayaran')->findOrFail($request->id_tiket);

        // Simpan ke tabel selesai
        Selesai::create([
            'id_user'    => auth()->id(),
            'jam_sampai' => now(),
        ]);

        // Hapus pembayaran jika ada
        if ($tiket->pembayaran) {
            $tiket->pembayaran->delete();
        }

        // Hapus tiket
        $tiket->delete();

        DB::commit();

        return response()->json([
            'success' => true,
            'message' => 'Tiket berhasil diselesaikan.'
        ]);
    } catch (\Exception $e) {
        DB::rollBack();
        return response()->json([
            'success' => false,
            'message' => 'Gagal memproses: ' . $e->getMessage()
        ], 500);
    }
}}