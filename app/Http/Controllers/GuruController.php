<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;

class GuruController extends Controller
{
    public function index() {
        $guru = Guru::all(); 

        return view('guru.index', compact('guru'));
    }

    public function create() {
        return view('guru.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nama_guru' => 'required|string|max:255',
        ]);

        $foto = $request->file('foto');
        $filename = time() . '.' . $foto->getClientOriginalExtension();
        $foto->move(public_path('storage/foto'), $filename);
        $path = 'foto/' . $filename;

        Guru::create([
            'nama_guru' => $request->nama_guru,
            'foto' => $path,
        ]);

        return redirect()->route('guru.index')->with('success', 'Data guru berhasil ditambahkan.');
    }

    public function edit($id) {
        $guru = Guru::findOrFail($id);
        return view('guru.edit', compact('guru'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'nama_guru' => 'required|string|max:255',
        ]);

        $guru = Guru::findOrFail($id);
        $guru->update([
            'nama_guru' => $request->nama_guru,
        ]);

        return redirect()->route('guru.index')->with('success', 'Data guru berhasil diperbarui.');
    }

    public function destroy($id) {
        $guru = Guru::findOrFail($id);
        $guru->delete();

        return redirect()->route('guru.index')->with('success', 'Data guru berhasil dihapus.');
    }

    public function detail($id) {
        $guru = Guru::findOrFail($id);
        return view('guru.detail', compact('guru'));
    }
}
