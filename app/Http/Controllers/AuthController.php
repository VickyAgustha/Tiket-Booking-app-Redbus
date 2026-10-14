<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'no_telpon' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user(); // ambil data user yang login

            // cek role
            if ($user->role == 'admin') {
                return redirect('/admin/home'); // ke halaman admin
            } else {
                return redirect('/home'); // ke halaman user biasa
            }
        }

        // kalau gagal login
        return back()->with('error', 'Nomor handphone atau password salah');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}