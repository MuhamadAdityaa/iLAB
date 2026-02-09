<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\Mapel;

class GuruController extends Controller
{
    public function index() {
        $guru = Guru::with('mapel')->get();

        return view('guru.index', compact('guru'));
    }

    public function create() {
        $mapels = Mapel::all();
        return view('guru.create', compact('mapels'));
    }

    public function store(Request $request) {
        $request->validate([
            'nama_guru' => 'required|string|max:255',
            'mapel_id' => 'required|exists:mapels,id',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $foto = $request->file('foto');
        $filename = time() . '.' . $foto->getClientOriginalExtension();
        $foto->move(public_path('storage/foto'), $filename);
        $path = 'foto/' . $filename;

        Guru::create([
            'nama_guru' => $request->nama_guru,
            'mapel_id' => $request->mapel_id,
            'foto' => $path,
        ]);

        return redirect()->route('guru.index')->with('success', 'Data guru berhasil ditambahkan.');
    }

    public function edit($id) {
        $guru = Guru::findOrFail($id);
        $mapels = Mapel::all();
        return view('guru.edit', compact('guru', 'mapels'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'nama_guru' => 'required|string|max:255',
            'mapel_id' => 'required|exists:mapels,id',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $filename = time() . '.' . $foto->getClientOriginalExtension();
            $foto->move(public_path('storage/foto'), $filename);
            $path = 'foto/' . $filename;

            $guru = Guru::findOrFail($id);
            $guru->update([
                'nama_guru' => $request->nama_guru,
                'mapel_id' => $request->mapel_id,
                'foto' => $path,
            ]);
        }

        $guru = Guru::findOrFail($id);
        $guru->update([
            'nama_guru' => $request->nama_guru,
            'mapel_id' => $request->mapel_id,
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
