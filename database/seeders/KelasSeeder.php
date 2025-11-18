<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kelas = ['XII', 'XI', 'X'];
        $jurusan = ['RPL'];
        $rombel = ['1', '2'];

        foreach ($kelas as $kls) {
            foreach ($rombel as $rbl) {
                DB::table('kelas')->insert([
                    [
                    'jurusan' => 'RPL', 
                    'kelas' => $kls.' '.$rbl, 
                    'created_at' => now(), 
                    'updated_at' => now()
                    ], 
                ]);
            }
        }
    }
}
