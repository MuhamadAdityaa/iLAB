<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    Mapel,
    Guru,
    GuruMapel
};

class GuruMapelController extends Controller
{
    public function create($id)
    {
        $mapel = Mapel::all();
        $guru = Guru::findOrFail($id);
        $guruMapel = GuruMapel::where('guru_id', $id)->pluck('mapel_id')->toArray();

        return view('guru.guruMapel.create', compact('id', 'mapel', 'guru', 'guruMapel'));
    }

    public function store(Request $request, $id)
    {
        // dd($id);
        $guru = Guru::findOrFail($id);

        $request->validate([
            'mapel_id' => 'required|array',
            'mapel_id.*' => 'exists:mapels,id',
        ]);
        foreach ($request->mapel_id as $mapelId) {
            GuruMapel::create([
                'guru_id' => $guru->id,
                'mapel_id' => $mapelId,
            ]);
        }

        return redirect()->route('guru.index')->with('success', 'Mata pelajaran berhasil ditambahkan ke guru.');
    }
}
