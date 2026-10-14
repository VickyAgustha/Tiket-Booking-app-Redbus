<?php

namespace App\Http\Controllers;

use App\Tiket; // Pastikan kamu menggunakan model yang sesuai
use Illuminate\Http\Request;

class UbahJadwalController extends Controller
{
    // Menampilkan form untuk mengubah jadwal
    public function edit($id)
    {
        // Ambil tiket berdasarkan ID
        $ticket = Tiket::findOrFail($id);

        // Kirim data tiket ke view
        return view('ubahjadwal', compact('ticket'));
    }

    // Proses perubahan jadwal
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'jadwal_berangkat' => 'required|date',
        ]);

        // Ambil tiket berdasarkan ID
        $ticket = Tiket::findOrFail($id);

        // Update jadwal berangkat
        $ticket->jadwal_berangkat = $request->jadwal_berangkat;
        $ticket->save();

        // Redirect ke halaman perjalanan setelah berhasil
        return redirect()->route('perjalanan')->with('success', 'Jadwal berhasil diubah!');
    }
}

