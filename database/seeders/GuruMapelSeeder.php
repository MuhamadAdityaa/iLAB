<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GuruMapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('guru_mapels')->insert([
            ['guru_id' => 1, 'mapel_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['guru_id' => 2, 'mapel_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['guru_id' => 3, 'mapel_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['guru_id' => 4, 'mapel_id' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['guru_id' => 5, 'mapel_id' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['guru_id' => 5, 'mapel_id' => 3, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
