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
            'penanggung_jawab' => 'required|string|max:255',
            'foto_penanggung_jawab' => 'required|image|max:2048',
        ]);

        $foto = $request->file('foto');
        $filename = time() . '.' . $foto->getClientOriginalExtension();
        $foto->move(public_path('storage/foto'), $filename);
        $path = 'foto/' . $filename;

        Ruangan::create([
            'nama_ruangan' => $request->nama_ruangan,
            'penanggung_jawab' => $request->penanggung_jawab,
            'foto_penanggung_jawab' => $path,
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
