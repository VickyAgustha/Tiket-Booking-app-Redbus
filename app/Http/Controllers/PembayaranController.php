<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PembayaranController extends Controller
{
    public function konfirmasi($id_order)
    {
        // Ambil data pembayaran berdasarkan id_order
        $pembayaran = DB::table('pembayaran')->where('id_order', $id_order)->first();

        if (!$pembayaran) {
            return redirect()->back()->with('error', 'Data pembayaran tidak ditemukan.');
        }

        // Cek apakah status pembayaran sudah "berhasil"
        if ($pembayaran->status_bayar == 'berhasil') {
            return redirect()->back()->with('error', 'Pembayaran ini sudah dikonfirmasi sebelumnya.');
        }

        // Ambil data pemesanan berdasarkan id_order
        $pemesanan = DB::table('pemesanan')->where('id_order', $id_order)->first();

        if (!$pemesanan) {
            return redirect()->back()->with('error', 'Data pemesanan tidak ditemukan.');
        }

        // Ambil data bus berdasarkan id_bus
        $bus = DB::table('bus')->where('id_bus', $pembayaran->id_bus)->first();

        if (!$bus) {
            return redirect()->back()->with('error', 'Data bus tidak ditemukan.');
        }

        // Ambil tanggal dan jam keberangkatan dari tabel bus
        $tanggal_berangkat = $bus->jadwal_berangkat;  // date, contoh '2025-05-24'
        $jam_berangkat     = $bus->jam_berangkat;     // time, contoh '15:00:00'

        if (!$tanggal_berangkat || !$jam_berangkat) {
            return redirect()->back()->with('error', 'Jadwal keberangkatan tidak lengkap.');
        }

        // Gabungkan jadi datetime: 'YYYY-MM-DD HH:MM:SS'
        $jadwal_berangkat = $tanggal_berangkat . ' ' . $jam_berangkat;

        try {
            // Masukkan data tiket
            DB::table('tiket')->insert([
                'id_user'         => $pemesanan->id_user,
                'id_bus'          => $pembayaran->id_bus,
                'total_bayar'     => $pembayaran->total_bayar,
                'nomor_kursi'     => $pembayaran->nomor_kursi,
                'status'          => 'berhasil',
                'id_bayar'        => $pembayaran->id_bayar,
                'jadwal_berangkat' => $jadwal_berangkat,
            ]);

            // Update status pembayaran jadi berhasil
            DB::table('pembayaran')
                ->where('id_order', $id_order)
                ->update(['status_bayar' => 'berhasil']);

            return redirect()->back()->with('success', 'Pembayaran berhasil dikonfirmasi dan tiket telah dibuat.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
        }
    }

    public function tolak($id_order)
    {
        $pembayaran = DB::table('pembayaran')->where('id_order', $id_order)->first();

        if (!$pembayaran) {
            return redirect()->back()->with('error', 'Data pembayaran tidak ditemukan.');
        }

        try {
            DB::table('pembayaran')->where('id_order', $id_order)->delete();

            return redirect()->back()->with('success', 'Pembayaran berhasil ditolak dan data telah dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}
