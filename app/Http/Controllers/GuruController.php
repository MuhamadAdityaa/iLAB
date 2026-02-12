<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\GuruMapel;
use App\Models\Mapel;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {
        $guru = Guru::all();
        $guruMapel = GuruMapel::all();

        return view('guru.index', compact('guru', 'guruMapel'));
    }

    public function create()
    {
        return view('guru.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_guru' => 'required|string|max:255',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $foto = $request->file('foto');
        $filename = time().'.'.$foto->getClientOriginalExtension();
        $foto->move(public_path('storage/foto'), $filename);
        $path = 'foto/'.$filename;

        Guru::create([
            'nama_guru' => $request->nama_guru,
            'foto' => $path,
        ]);

        return redirect()->route('guru.index')->with('success', 'Data guru berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $guru = Guru::findOrFail($id);
        $mapel = Mapel::all();
        $guruMapel = GuruMapel::where('guru_id', $id)->pluck('mapel_id')->toArray();

        // dd($guruMapel);
        return view('guru.edit', compact('guru', 'mapel', 'guruMapel'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_guru' => 'required|string|max:255',
            'mapel_id' => 'nullable|array',
            'mapel_id.*' => 'exists:mapels,id',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $filename = time().'.'.$foto->getClientOriginalExtension();
            $foto->move(public_path('storage/foto'), $filename);
            $path = 'foto/'.$filename;

            $guru = Guru::findOrFail($id);
            $guru->update([
                'nama_guru' => $request->nama_guru,
                'foto' => $path,
            ]);

            if ($request->mapel_id === null) {
                GuruMapel::where('guru_id', $id)->delete();

                return redirect()->route('guru.index')->with('success', 'Data guru berhasil diperbarui.');
            }

            GuruMapel::where('guru_id', $id)->delete();

            foreach ($request->mapel_id as $mapelId) {
                GuruMapel::create([
                    'guru_id' => $guru->id,
                    'mapel_id' => $mapelId,
                ]);
            }

            return redirect()->route('guru.index')->with('success', 'Data guru berhasil diperbarui.');
        }

        $guru = Guru::findOrFail($id);
        $guru->update([
            'nama_guru' => $request->nama_guru,
        ]);

        if ($request->mapel_id === null) {
            GuruMapel::where('guru_id', $id)->delete();

            return redirect()->route('guru.index')->with('success', 'Data guru berhasil diperbarui.');
        }

        GuruMapel::where('guru_id', $id)->delete();

        foreach ($request->mapel_id as $mapelId) {
            GuruMapel::create([
                'guru_id' => $guru->id,
                'mapel_id' => $mapelId,
            ]);
        }

        return redirect()->route('guru.index')->with('success', 'Data guru berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);
        $guru->delete();

        return redirect()->route('guru.index')->with('success', 'Data guru berhasil dihapus.');
    }

    public function detail($id)
    {
        $guru = Guru::findOrFail($id);
        $guruMapel = GuruMapel::where('guru_id', $id)->with('mapel')->get();

        return view('guru.detail', compact('guru', 'guruMapel'));
    }
}
