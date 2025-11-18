<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            // $kelasId = 1; // kelas tunggal


            // 🔹 ambil semua id mapel, guru, dan ruangan
            $mapelIds   = DB::table('mapels')->pluck('id')->toArray();
            $guruIds    = DB::table('gurus')->pluck('id')->toArray();
            $ruanganIds = DB::table('ruangans')->pluck('id')->toArray();


            // foreach (range(1, 5) as $hariId) {
            //     if ($hariId == 5) {
            //         // Jumat: 1–6, 8–9
            //         $waktuIds = [1, 2, 3, 4, 5, 6, 8, 9];
            //     } else {
            //         // Senin–Kamis: 1–10
            //         $waktuIds = range(1, 10);
            //     }

            //     foreach ($waktuIds as $waktuId) {
            //         DB::table('jadwals')->insert([
            //             'guru_id'    => $guruIds[array_rand($guruIds)],
            //             'mapel_id'   => $mapelIds[array_rand($mapelIds)],
            //             'ruangan_id' => $ruanganIds[array_rand($ruanganIds)],
            //             'hari_id'    => $hariId,
            //             'waktu_id'   => $waktuId,
            //             'kelas_id'   => $kelasId,
            //             'created_at' => now(),
            //             'updated_at' => now(),
            //         ]);
            //     }
            // }

            $mapelArr = [
                1, 2, 3, 4, 5, 6, 7, 8, 9, 10
            ];

            foreach (range(1, 6) as $ruangan) {
                
                for ($i = 1; $i <= 10; $i++) {
                    $tempMapel = $mapelArr[array_rand($mapelArr)];
                    DB::table('jadwals')->insert([
                        // Senin
                        [
                            'guru_id'    => $tempMapel,
                            'mapel_id'   => $tempMapel,
                            'ruangan_id' => $ruangan,
                            'hari_id'    => 2,
                            'waktu_id'   => $i,
                            'kelas_id'   => $ruangan,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ],
                        // [
                        //     'guru_id'    => $tempMapel,
                        //     'mapel_id'   => $tempMapel,
                        //     'ruangan_id' => $ruangan,
                        //     'hari_id'    => 3,
                        //     'waktu_id'   => 2,
                        //     'kelas_id'   => $ruangan,
                        //     'created_at' => now(),
                        //     'updated_at' => now(),
                        // ],
                        // [
                        //     'guru_id'    => $tempMapel,
                        //     'mapel_id'   => $tempMapel,
                        //     'ruangan_id' => $ruangan,
                        //     'hari_id'    => 3,
                        //     'waktu_id'   => 3,
                        //     'kelas_id'   => $ruangan,
                        //     'created_at' => now(),
                        //     'updated_at' => now(),
                        // ],
                        // [
                        //     'guru_id'    => $tempMapel,
                        //     'mapel_id'   => $tempMapel,
                        //     'ruangan_id' => $ruangan,
                        //     'hari_id'    => 3,
                        //     'waktu_id'   => 4,
                        //     'kelas_id'   => $ruangan,
                        //     'created_at' => now(),
                        //     'updated_at' => now(),
                        // ],
                        // [
                        //     'guru_id'    => $tempMapel,
                        //     'mapel_id'   => $tempMapel,
                        //     'ruangan_id' => $ruangan,
                        //     'hari_id'    => 3,
                        //     'waktu_id'   => 5,
                        //     'kelas_id'   => $ruangan,
                        //     'created_at' => now(),
                        //     'updated_at' => now(),
                        // ],
                        // [
                        //     'guru_id'    => $tempMapel,
                        //     'mapel_id'   => $tempMapel,
                        //     'ruangan_id' => $ruangan,
                        //     'hari_id'    => 3,
                        //     'waktu_id'   => 6,
                        //     'kelas_id'   => $ruangan,
                        //     'created_at' => now(),
                        //     'updated_at' => now(),
                        // ],
                        // [
                        //     'guru_id'    => $tempMapel,
                        //     'mapel_id'   => $tempMapel,
                        //     'ruangan_id' => $ruangan,
                        //     'hari_id'    => 3,
                        //     'waktu_id'   => 7,
                        //     'kelas_id'   => $ruangan,
                        //     'created_at' => now(),
                        //     'updated_at' => now(),
                        // ],
                        // [
                        //     'guru_id'    => $tempMapel,
                        //     'mapel_id'   => $tempMapel,
                        //     'ruangan_id' => $ruangan,
                        //     'hari_id'    => 3,
                        //     'waktu_id'   => 8,
                        //     'kelas_id'   => $ruangan,
                        //     'created_at' => now(),
                        //     'updated_at' => now(),
                        // ],
                        // [
                        //     'guru_id'    => $tempMapel,
                        //     'mapel_id'   => $tempMapel,
                        //     'ruangan_id' => $ruangan,
                        //     'hari_id'    => 3,
                        //     'waktu_id'   => 9,
                        //     'kelas_id'   => $ruangan,
                        //     'created_at' => now(),
                        //     'updated_at' => now(),
                        // ],
                        // [
                        //     'guru_id'    => $tempMapel,
                        //     'mapel_id'   => $tempMapel,
                        //     'ruangan_id' => $ruangan,
                        //     'hari_id'    => 3,
                        //     'waktu_id'   => 10,
                        //     'kelas_id'   => $ruangan,
                        //     'created_at' => now(),
                        //     'updated_at' => now(),
                        // ],
                    ]);
                }
            }
    }
}
