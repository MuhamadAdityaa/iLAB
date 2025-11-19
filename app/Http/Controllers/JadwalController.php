<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\{
    Hari,
    Guru,
    Kelas,
    Mapel,
    Ruangan,
    Waktu,
};
use Carbon\Carbon;

class JadwalController extends Controller
{
    public function tampil($id) {
        $selectedKelasId = $id;
        $kelas = Kelas::FindorFail($id);
        $hariSekarang = Carbon::now()->locale('id')->dayName;
        $date = Carbon::now()->translatedFormat('d F Y');
        $hari = Hari::where('hari', $hariSekarang)->first();
        $jadwal = Jadwal::with(['mapel','guru','ruangan','waktu'])
            ->where('hari_id', $hari->id)->where('kelas_id', $selectedKelasId)
            ->get();

            // dd($jadwal);
        return view('welcome', compact('jadwal', 'kelas', 'hariSekarang', 'date', 'selectedKelasId'));
    }

    public function index($id) {
        $selectedKelasId = $id;
        $hariSekarang = Carbon::now()->locale('id')->dayName;
        $date = Carbon::now()->translatedFormat('d F Y');
        $hari = Hari::where('hari', $hariSekarang)->first();
        $jadwal = Jadwal::with(['guru', 'mapel', 'ruangan', 'waktu', 'kelas'])
            ->where('hari_id', $hari->id)->where('kelas_id', $selectedKelasId)
            ->get();

        // dd($jadwal);

        return response()->json([
            'jadwal' => $jadwal,
            'hari' => $hariSekarang,
            'tanggal' => $date,
        ]);

    }

    public function indexAdmin() {
        $jadwal = Jadwal::with(['guru', 'mapel', 'ruangan', 'waktu', 'kelas', 'hari'])->get();
        // dd($jadwal);
        return view('jadwal.index', compact('jadwal'));
    }

    public function create() {
        $gurus = Guru::all();
        $mapels = Mapel::all();
        $ruangans = Ruangan::all();
        $haris = Hari::all();
        $waktus = Waktu::all();
        $kelas = Kelas::all();

        return view('jadwal.create', compact('gurus', 'mapels', 'ruangans', 'haris', 'waktus', 'kelas'));
    }

    public function store(Request $request) {
        // $request->validate([
        //     'guru_id'    => 'required|exists:gurus,id',
        //     'mapel_id'   => 'required|exists:mapels,id',
        //     'ruangan_id' => 'required|exists:ruangans,id',
        //     'hari_id'    => 'required|exists:haris,id',
        //     'waktu_id'   => 'required|exists:waktus,id',
        //     'kelas_id'   => 'required|exists:kelas,id',
        // ]);

        Jadwal::create([
            'guru_id'    => $request->guru_id,
            'mapel_id'   => $request->mapel_id,
            'ruangan_id' => $request->ruangan_id,
            'hari_id'    => $request->hari_id,
            'waktu_id'   => $request->waktu_id,
            'kelas_id'   => $request->kelas_id,
        ]);

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil ditambahkan.');
    }

    public function edit($id) {
        $jadwal = Jadwal::findOrFail($id);
        $gurus = Guru::all();
        $mapels = Mapel::all();
        $ruangans = Ruangan::all();
        $haris = Hari::all();
        $waktus = Waktu::all();
        $kelas = Kelas::all();

        // dd($mapels);
        // dd($gurus,$mapels,$ruangans,$haris, $waktus, $kelas);
        return view('jadwal.edit', compact('jadwal', 'gurus', 'mapels', 'ruangans', 'haris', 'waktus', 'kelas'));
    }

    public function update(Request $request, $id) {

        // dd($request->all());
        $request->validate([
            'guru_id'    => 'required|exists:gurus,id',
            'mapel_id'   => 'required|exists:mapels,id',
            'ruangan_id' => 'required|exists:ruangans,id',
            'hari_id'    => 'required|exists:haris,id',
            'waktu_id'   => 'required|exists:waktus,id',
            'kelas_id'   => 'required|exists:kelas,id',
        ]);
        // dd($request->all());

        $jadwal = Jadwal::findOrFail($id);
        $jadwal->update([
            'guru_id'    => $request->guru_id,
            'mapel_id'   => $request->mapel_id,
            'ruangan_id' => $request->ruangan_id,
            'hari_id'    => $request->hari_id,
            'waktu_id'   => $request->waktu_id,
            'kelas_id'   => $request->kelas_id,
        ]);

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil diupdate.');
    }

    public function destroy($id) {
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->delete();

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil dihapus.');
    }
}
