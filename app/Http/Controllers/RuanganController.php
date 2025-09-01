<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruangan;

class RuanganController extends Controller
{
    

    public function index(){
        $ruangan = Ruangan::all();

        return view('ruangan.index', compact('ruangan'));
    }

    public function create() {
        return view('ruangan.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nama_ruangan' => 'required|string|max:255',
        ]);

        Ruangan::create([
            'nama_ruangan' => $request->nama_ruangan,
        ]);

        return redirect()->route('ruangan.index')->with('success', 'Data ruangan berhasil ditambahkan.');
    }

    public function edit($id) {
        $ruangan = Ruangan::findOrFail($id);
        return view('ruangan.edit', compact('ruangan'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'nama_ruangan' => 'required|string|max:255',
        ]);

        $ruangan = Ruangan::findOrFail($id);
        $ruangan->update([
            'nama_ruangan' => $request->nama_ruangan,
        ]);

        return redirect()->route('ruangan.index')->with('success', 'Data ruangan berhasil diperbarui.');
    }

    public function destroy($id) {
        $ruangan = Ruangan::findOrFail($id);
        $ruangan->delete();

        return redirect()->route('ruangan.index')->with('success', 'Data ruangan berhasil dihapus.');
    }
}
