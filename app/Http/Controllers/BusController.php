<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bus;

class BusController extends Controller
{
    // Menampilkan semua data armada
    public function index()
    {
        $busList = Bus::all();
        return view('armada', compact('busList'));
    }

    public function edit($id)
    {
        $armada = Bus::findOrFail($id);
        return view('admin.editarmada', compact('armada'));
    }

    public function destroy($id)
    {
        $bus = Bus::findOrFail($id);
        $bus->delete();
        return redirect()->route('admin.armada')->with('success', 'Armada berhasil dihapus.');
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama_bus' => 'required|string|max:100',
            'kapasitas' => 'required|integer|min:1',
            'harga_tiket' => 'required|numeric|min:0',
            'jadwal_berangkat' => 'required|date',
            'jam_berangkat' => 'required|date_format:H:i',
            'asal' => 'required|string|max:100',
            'tujuan' => 'required|string|max:100',
        ]);

        $bus = Bus::findOrFail($request->id_bus);
        $bus->update([
            'nama_bus' => $request->nama_bus,
            'kapasitas' => $request->kapasitas,
            'harga_tiket' => $request->harga_tiket,
            'jadwal_berangkat' => $request->jadwal_berangkat,
            'jam_berangkat' => $request->jam_berangkat,
            'asal' => $request->asal,
            'tujuan' => $request->tujuan,
        ]);

        return redirect()->back()->with('success', 'Data bus berhasil diperbarui');
    }

    public function store(Request $request)
    {
        $request->validate([
            'asal' => 'required|string|max:100',
            'tujuan' => 'required|string|max:100',
            'jadwal' => 'required|date',
            'jam_berangkat' => 'required|date_format:H:i',
            'nama_bus' => 'required|string|max:100',
            'kapasitas' => 'required|integer|min:1',
            'harga' => 'required|numeric|min:0',
        ]);

        Bus::create([
            'asal' => $request->asal,
            'tujuan' => $request->tujuan,
            'jadwal_berangkat' => $request->jadwal,
            'jam_berangkat' => $request->jam_berangkat,
            'nama_bus' => $request->nama_bus,
            'kapasitas' => $request->kapasitas,
            'harga_tiket' => $request->harga,
        ]);

        return redirect()->route('admin.armada')->with('success', 'Armada baru berhasil ditambahkan.');
    }
}