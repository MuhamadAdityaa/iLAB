<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\Hari;
use Carbon\Carbon;

class JadwalController extends Controller
{
    public function tampil(){
        $hariSekarang = Carbon::now()->locale('id')->dayName;
        $date = Carbon::now()->translatedFormat('d F Y');
        $hari = Hari::where('hari', $hariSekarang)->first();
        $jadwal = Jadwal::with(['mapel','guru','ruangan','waktu'])
            ->where('hari_id', $hari->id)
            ->get();

        return view('welcome', compact('jadwal', 'hariSekarang', 'date'));
    }

    public function index() {
        $hariSekarang = Carbon::now()->locale('id')->dayName;
        $date = Carbon::now()->translatedFormat('d F Y');
        $hari = Hari::where('hari', $hariSekarang)->first();
        $jadwal = Jadwal::with(['guru', 'mapel', 'ruangan', 'waktu', 'kelas'])
            ->where('hari_id', $hari->id)
            ->get();

        return response()->json([
            'jadwal' => $jadwal,
            'hari' => $hariSekarang,
            'tanggal' => $date,
        ]);
    }
}
