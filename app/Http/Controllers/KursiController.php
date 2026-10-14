<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kursi;

class KursiController extends Controller
{
    public function index()
    {
        $kursis = Kursi::all();
        return view('index', compact('kursis'));
    }

    public function store(Request $request)
{
    $request->validate([
        'id_bus' => 'required|integer',
        'nomor' => 'required|array|min:1',
        'nomor.*' => 'required|string'
    ]);

    foreach ($request->nomor as $nomorKursi) {
        Kursi::create([
            'id_bus' => $request->id_bus,
            'nomor' => $nomorKursi
        ]);
    }

        return redirect()->route('kursi.index')->with('success', 'Kursi berhasil ditambahkan!');
    }
}