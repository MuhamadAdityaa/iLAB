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

            // // 🔹 ambil semua id mapel, guru, dan ruangan
            // $mapelIds   = DB::table('mapels')->pluck('id')->toArray();
            // $guruIds    = DB::table('gurus')->pluck('id')->toArray();
            // $ruanganIds = DB::table('ruangans')->pluck('id')->toArray();

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

            DB::table('jadwals')->insert([
                // Senin
                [
                    'guru_id'    => 1,
                    'mapel_id'   => 1,
                    'ruangan_id' => 1,
                    'hari_id'    => 3,
                    'waktu_id'   => 1,
                    'kelas_id'   => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'guru_id'    => 2,
                    'mapel_id'   => 2,
                    'ruangan_id' => 1,
                    'hari_id'    => 3,
                    'waktu_id'   => 2,
                    'kelas_id'   => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'guru_id'    => 3,
                    'mapel_id'   => 3,
                    'ruangan_id' => 1,
                    'hari_id'    => 3,
                    'waktu_id'   => 3,
                    'kelas_id'   => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                // Selasa
                [
                    'guru_id'    => 4,
                    'mapel_id'   => 4,
                    'ruangan_id' => 1,
                    'hari_id'    => 3,
                    'waktu_id'   => 4,
                    'kelas_id'   => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'guru_id'    => 5,
                    'mapel_id'   => 5,
                    'ruangan_id' => 1,
                    'hari_id'    => 3,
                    'waktu_id'   => 5,
                    'kelas_id'   => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'guru_id'    => 1,
                    'mapel_id'   => 1,
                    'ruangan_id' => 1,
                    'hari_id'    => 3,
                    'waktu_id'   => 6,
                    'kelas_id'   => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'guru_id'    => 2,
                    'mapel_id'   => 2,
                    'ruangan_id' => 1,
                    'hari_id'    => 3,
                    'waktu_id'   => 7,
                    'kelas_id'   => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'guru_id'    => 3,
                    'mapel_id'   => 3,
                    'ruangan_id' => 1,
                    'hari_id'    => 3,
                    'waktu_id'   => 8,
                    'kelas_id'   => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'guru_id'    => 4,
                    'mapel_id'   => 4,
                    'ruangan_id' => 1,
                    'hari_id'    => 3,
                    'waktu_id'   => 9,
                    'kelas_id'   => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'guru_id'    => 5,
                    'mapel_id'   => 5,
                    'ruangan_id' => 1,
                    'hari_id'    => 3,
                    'waktu_id'   => 10,
                    'kelas_id'   => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }
    }
