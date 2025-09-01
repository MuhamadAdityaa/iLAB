<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ruangans')->insert([
            [
                'nama_ruangan' => 'Lab 1',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_ruangan' => 'Lab 2',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_ruangan' => 'Lab 3',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_ruangan' => 'Lab 4',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_ruangan' => 'Lab 5',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_ruangan' => 'Lab 6',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_ruangan' => 'Lab 7',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_ruangan' => 'Lab 8',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_ruangan' => 'Lab 9',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_ruangan' => 'Lab 10',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);

    }
}
