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
                'nama_mapel' => 'Matematika',
                'kode_mapel' => 'MATH01',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_mapel' => 'Bahasa Indonesia',
                'kode_mapel' => 'INDO01',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_mapel' => 'Bahasa Inggris',
                'kode_mapel' => 'ENG01',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_mapel' => 'Ilmu Pengetahuan Alam',
                'kode_mapel' => 'IPA01',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_mapel' => 'Ilmu Pengetahuan Sosial',
                'kode_mapel' => 'IPS01',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_mapel' => 'Pendidikan Kewarganegaraan',
                'kode_mapel' => 'PKN01',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_mapel' => 'Seni Budaya',
                'kode_mapel' => 'SENI01',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_mapel' => 'Pendidikan Jasmani',
                'kode_mapel' => 'PJOK01',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_mapel' => 'Kimia',
                'kode_mapel' => 'KIM01',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_mapel' => 'Fisika',
                'kode_mapel' => 'FIS01',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
