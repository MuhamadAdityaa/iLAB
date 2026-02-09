<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mapels')->insert([
            [
                'nama_mapel' => 'Pemrograman Web',
                'kode_mapel' => 'PWB',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_mapel' => 'Pemrograman Berbasis Teks',
                'kode_mapel' => 'PBT',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_mapel' => 'Projek Kreatif dan Kewirausahaan',
                'kode_mapel' => 'PKK',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_mapel' => 'Pemrograman Perangkat Bergerak',
                'kode_mapel' => 'PPB',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_mapel' => 'Basis Data',
                'kode_mapel' => 'BSD',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
