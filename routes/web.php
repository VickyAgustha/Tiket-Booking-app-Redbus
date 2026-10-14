<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TiketController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\BusController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KursiController;
use App\Http\Controllers\KelolaPembayaranController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PerjalananController;
use App\Http\Controllers\SelesaiController;
// ======================================
// Halaman Awal / Guest
// ======================================

Route::get('/', function () {
    return redirect()->route('login');
});

// ======================================
// Auth Routes
// ======================================
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');


//=================================================pdf
Route::post('/download-tiket', [TiketController::class, 'downloadPDF'])->name('download.tiket');
// ======================================
// User & Admin Dashboard
// ======================================
Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/admin/home', function () {
    return view('homeadmin');
})->middleware('auth')->name('admin.home');

// ======================================
// Armada Management (Admin)
// ======================================
Route::prefix('admin')->middleware('auth')->group(function () {
    // Halaman daftar armada
    Route::get('/armada', [BusController::class, 'index'])->name('admin.armada');

    // Resource untuk CRUD bus (otomatis buat index, create, store, show, edit, update, destroy)
    Route::resource('bus', BusController::class)->middleware('auth');

});

// ======================================
// Tiket & Pemesanan
// ======================================
Route::get('/tiket', [TiketController::class, 'index'])->name('tiket.cari')->middleware('auth');
Route::get('/kursi/{id_bus}', [TiketController::class, 'getKursi']);

Route::get('/isidatapesan', [PemesananController::class, 'index'])->name('isidatapesan');

// Route::get('/pemesanan', function () {
//     return view('pemesanan');
// })->name('pemesanan');

// ======================================
// Debug Route (hapus di produksi)
// ======================================
Route::get('/cekdb', function () {
    return env('DB_DATABASE');
});

//==========================================================================================edit bus
Route::post('/bus/update', [BusController::class, 'update'])->name('bus.update');
Route::resource('armada', ArmadaController::class);
Route::delete('/bus/{id}', [BusController::class, 'destroy'])->name('bus.destroy');
Route::post('/store-armada', [BusController::class, 'store'])->name('admin.storeArmada');
//===========================================================================================tambah kursi admin
Route::get('/kursi', [KursiController::class, 'index'])->name('kursi.index');
Route::post('/kursi/store', [KursiController::class, 'store'])->name('kursi.store');
Route::get('/kursi/success', function () {
    return view('kursi.success');
})->name('kursi.success');
//=========================================================================================pembayaran upload

Route::get('/pemesanan', function () {
    return view('pemesanan');
})->name('pemesanan')->middleware('auth');
Route::post('/pemesanan/upload', [PemesananController::class, 'upload'])->name('pemesanan.upload');

//========================================================================================pembayaran berhasil
// Halaman success
Route::get('/pembayaran-success', function () {
    return view('success');
})->name('pembayaran.success');
//========================================================================================kelola pembayaran admin
Route::get('/admin/pembayaran', [KelolaPembayaranController::class, 'index'])->name('kelola.pembayaran');
Route::get('/kelola-pembayaran', [KelolaPembayaranController::class, 'index']);
//===============================================================================================setujui dan tolak bayar
Route::post('/pembayaran/konfirmasi/{id_order}', 'PembayaranController@konfirmasi')->name('pembayaran.konfirmasi');
Route::get('/pembayaran/tolak/{id_order}', [PembayaranController::class, 'tolak'])->name('pembayaran.tolak');
//=================================================================================================================perjalanan user
Route::get('/perjalanan', function () {
    return view('perjalanan');
})->name('perjalanan');
Route::get('/perjalanan', [PerjalananController::class, 'index'])->name('perjalanan')->middleware('auth');

//------------------------------------------------------------------------------------------------------------------------

Route::post('/ubah-jam', [TiketController::class, 'ubahJam'])->name('ubah.jam');

Route::post('/proses-selesai', [SelesaiController::class, 'prosesSelesai'])->name('proses.selesai');

//PEMBATALAN TIKET

// Route untuk membatalkan tiket
Route::post('/batal-tiket', [TiketController::class, 'batalTiket']);







