<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('register'); // Menampilkan form registrasi
    }

    public function register(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:100',
            'no_telpon' => 'required|string|max:20|unique:pengguna',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Simpan ke database dengan diskon otomatis 10%
        User::create([
            'nama' => $request->nama,
            'no_telpon' => $request->no_telpon,
            'password' => Hash::make($request->password),
            'diskon_pertama' => 10, // ✅ Otomatis diberikan diskon 10%
        ]);

        return redirect('/home')->with('success', 'Registrasi berhasil! Anda mendapatkan diskon 10%.');
    }
}
