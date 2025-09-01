<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mapel;

class MapelController extends Controller
{
    

    public function index(){
        $mapel = Mapel::all();

        return view('mapel.index', compact('mapel'));
    }

    public function create() {
        return view('mapel.create');
    }

    public function store(Request $request) {
        $request->validate([
            'mapel' => 'required|string|max:255',
            'kode' => 'required|string|max:10|unique:mapels,kode_mapel',
        ]);

        Mapel::create([
            'nama_mapel' => $request->mapel,
            'kode_mapel' => $request->kode,
        ]);

        return redirect()->route('mapel.index')->with('success', 'Data mapel berhasil ditambahkan.');
    }

    public function edit($id) {
        $mapel = Mapel::findOrFail($id);
        return view('mapel.edit', compact('mapel'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'mapel' => 'required|string|max:255',
            'kode' => 'required|string|max:10|unique:mapels,kode_mapel',
        ]);

        $mapel = Mapel::findOrFail($id);
        $mapel->update([
            'nama_mapel' => $request->mapel,
            'kode_mapel' => $request->kode,
        ]);

        return redirect()->route('mapel.index')->with('success', 'Data mapel berhasil diperbarui.');
    }

    public function destroy($id) {
        $mapel = Mapel::findOrFail($id);
        $mapel->delete();

        return redirect()->route('mapel.index')->with('success', 'Data mapel berhasil dihapus.');
    }
}
