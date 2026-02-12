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
    GuruMapel,
};
use Carbon\Carbon;

class JadwalController extends Controller
{
    public function tampil($id) {
        $ruangan = Ruangan::all();
        $selectedKelasId = $id;
        $kelas = Kelas::FindorFail($id);
        $hariSekarang = Carbon::now()->locale('id')->dayName;
        // dd($hariSekarang);
        $date = Carbon::now()->translatedFormat('d F Y');
        $hari = Hari::where('hari', $hariSekarang)->first();
        // dd($hari);
        $jadwal = Jadwal::with(['guruMapels','ruangan','waktu'])
            ->where('hari_id', $hari->id)->where('kelas_id', $selectedKelasId)
            ->get();

        // dd($jadwal);


        return view('welcome', compact('jadwal', 'kelas', 'hariSekarang', 'date', 'selectedKelasId', 'ruangan'));
    }

    public function index($id) {
        $selectedKelasId = $id;

        $hariSekarang = Carbon::now()->locale('id')->dayName;

        $date = Carbon::now()->translatedFormat('d F Y');

        $hari = Hari::where('hari', $hariSekarang)->first();
        $jadwal = Jadwal::with(['guruMapels.guru','guruMapels.mapel','waktu', 'kelas'])
            ->where('hari_id', $hari->id)->where('kelas_id', $selectedKelasId)
            ->get();
        $ruangan = Ruangan::with('guru')->get();

        return response()->json([
            'jadwal' => $jadwal,
            'hari' => $hariSekarang,
            'tanggal' => $date,
            'ruangan' => $ruangan,
        ]);

    }

    public function indexAdmin(Request $request) {
        // dd($request);
        $ruanganSelected = $request->all();

        $jadwal = Jadwal::with(['guruMapels', 'ruangan', 'waktu', 'kelas', 'hari'])->get();
        $ruangan = Ruangan::all();
        $kelas = Kelas::all();
        $hari = Hari::all();
        // dd($jadwal);
        return view('jadwal.index', compact('jadwal', 'ruangan', 'kelas', 'hari'));
    }

    public function filtering(Request $request) {
        // dd($request->all());
        $ruanganId = $request->input('filterRuangan');
        $hariId = $request->input('filterHari');
        $kelasId = $request->input('filterKelas');

        $jadwal = Jadwal::with(['guruMapels', 'ruangan', 'waktu', 'kelas', 'hari'])
            ->when($ruanganId, function ($query, $ruanganId) {
                return $query->where('ruangan_id', $ruanganId);
            })
            ->when($hariId, function ($query, $hariId) {
                return $query->where('hari_id', $hariId);
            })
            ->when($kelasId, function ($query, $kelasId) {
                return $query->where('kelas_id', $kelasId);
            })
            ->get();

        $ruangan = Ruangan::all();
        $hari = Hari::all();
        $kelas = Kelas::all();
        return view('jadwal.index', compact('jadwal', 'ruangan', 'hari', 'kelas'));
    }

    public function create() {
        $guruMapels = GuruMapel::all();
        $mapels = Mapel::all();
        $ruangans = Ruangan::all();
        $haris = Hari::all();
        $waktus = Waktu::all();
        $kelas = Kelas::all();

        // dd($guruMapels);

        return view('jadwal.create', compact('guruMapels', 'mapels', 'ruangans', 'haris', 'waktus', 'kelas'));
    }

    public function store(Request $request) {
        $request->validate([
            'guru_mapel_id' => 'required|exists:guru_mapels,id',
            // 'mapel_id'   => 'required|exists:mapels,id',
            'ruangan_id' => 'required|exists:ruangans,id',
            'hari_id'    => 'required|exists:haris,id',
            'waktu_id'   => 'required|exists:waktus,id',
            'kelas_id'   => 'required|exists:kelas,id',
        ]);

        $matchData = Jadwal::where('ruangan_id', $request->ruangan_id)
            ->where('hari_id', $request->hari_id)
            ->where('waktu_id', $request->waktu_id)
            ->first();
        if ($matchData) {
            return redirect()->back()->withErrors(['error' => 'Jadwal bentrok di ruangan yang sama pada hari dan waktu tersebut.'])->withInput();
        } else {
            Jadwal::create([
                'guru_mapel_id'    => $request->guru_mapel_id,
                // 'mapel_id'   => $request->mapel_id,
                'ruangan_id' => $request->ruangan_id,
                'hari_id'    => $request->hari_id,
                'waktu_id'   => $request->waktu_id,
                'kelas_id'   => $request->kelas_id,
            ]);

            return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil ditambahkan.');
        }
    }

    public function edit($id) {
        $jadwal = Jadwal::findOrFail($id);
        $guruMapels = GuruMapel::all();
        $mapels = Mapel::all();
        $ruangans = Ruangan::all();
        $haris = Hari::all();
        $waktus = Waktu::all();
        $kelas = Kelas::all();

        // dd($mapels);
        // dd($gurus,$mapels,$ruangans,$haris, $waktus, $kelas);
        return view('jadwal.edit', compact('jadwal', 'guruMapels', 'mapels', 'ruangans', 'haris', 'waktus', 'kelas'));
    }

    public function update(Request $request, $id) {

        // dd($request->all());
        $request->validate([
            'guru_mapel_id'    => 'required|exists:guru_mapels,id',
            'ruangan_id' => 'required|exists:ruangans,id',
            'hari_id'    => 'required|exists:haris,id',
            'waktu_id'   => 'required|exists:waktus,id',
            'kelas_id'   => 'required|exists:kelas,id',
        ]);
        // dd($request->all());
        $jadwal = Jadwal::findOrFail($id);
        // $jadwal->update([
        //     'guru_mapel_id'    => $request->guru_mapel_id,
        //     'ruangan_id' => $request->ruangan_id,
        //     'hari_id'    => $request->hari_id,
        //     'waktu_id'   => $request->waktu_id,
        //     'kelas_id'   => $request->kelas_id,
        // ]);

        // return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil diupdate.');
        $matchData = Jadwal::where('ruangan_id', $request->ruangan_id)
            ->where('hari_id', $request->hari_id)
            ->where('waktu_id', $request->waktu_id)
            ->first();
        if ($matchData && $matchData->id != $id) {
            return redirect()->back()->withErrors(['error' => 'Jadwal bentrok di ruangan yang sama pada hari dan waktu tersebut.'])->withInput();
        } else {
            $jadwal->update([
                'guru_mapel_id'    => $request->guru_mapel_id,
                'ruangan_id' => $request->ruangan_id,
                'hari_id'    => $request->hari_id,
                'waktu_id'   => $request->waktu_id,
                'kelas_id'   => $request->kelas_id,
            ]);

            return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil diupdate.');
        }
    }

    public function destroy($id) {
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->delete();

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil dihapus.');
    }
}
