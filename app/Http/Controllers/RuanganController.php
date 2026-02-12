<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    Ruangan,
    Guru,
};

class RuanganController extends Controller
{


    public function index(){
        $ruangan = Ruangan::with('guru')->get();
        // dd($ruangan);

        return view('ruangan.index', compact('ruangan'));
    }

    public function create() {
        $guru = Guru::all();

        return view('ruangan.create', compact('guru'));
    }

    public function store(Request $request) {
        $request->validate([
            'nama_ruangan' => 'required|string|max:255',
            'penanggung_jawab' => 'required|integer|max:255',
        ]);

        // dd($request->penanggung_jawab);

        Ruangan::create([
            'nama_ruangan' => $request->nama_ruangan,
            'penanggung_jawab' => $request->penanggung_jawab,
        ]);

        return redirect()->route('ruangan.index')->with('success', 'Data ruangan berhasil ditambahkan.');
    }

    public function edit($id) {
        $ruangan = Ruangan::findOrFail($id);
        $guru = Guru::all();

        return view('ruangan.edit', compact('ruangan', 'guru'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'nama_ruangan' => 'required|string|max:255',
            'penanggung_jawab' => 'required|integer|max:255',
        ]);

        $ruangan = Ruangan::findOrFail($id);
        $ruangan->update([
            'nama_ruangan' => $request->nama_ruangan,
            'penanggung_jawab' => $request->penanggung_jawab,
        ]);

        return redirect()->route('ruangan.index')->with('success', 'Data ruangan berhasil diperbarui.');
    }

    public function detail($id) {
        $ruangan = Ruangan::findOrFail($id);

        return view('ruangan.detail', compact('ruangan'));
    }

    public function destroy($id) {
        $ruangan = Ruangan::findOrFail($id);
        $ruangan->delete();

        return redirect()->route('ruangan.index')->with('success', 'Data ruangan berhasil dihapus.');
    }
}
