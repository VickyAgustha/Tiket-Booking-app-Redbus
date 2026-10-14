<?php

namespace App\Http\Controllers;

use App\Tiket;  // Pastikan mengimpor model Ticket
use App\User;    // Mengimpor model User
use App\Bus;     // Mengimpor model Bus

class PerjalananController extends Controller
{
    public function index()
    {
        // Mengambil data tiket milik pengguna yang sedang login
        $tiket = Tiket::where('id_user', auth()->user()->id_user)->get();

        // Mengirim data tiket ke view perjalanan.blade.php
        return view('perjalanan', compact('tiket'));
    }
}
