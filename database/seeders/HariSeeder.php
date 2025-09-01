<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HariSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('haris')->insert([
            ['hari' => 'Senin', 'created_at' => now(), 'updated_at' => now()],
            ['hari' => 'Selasa', 'created_at' => now(), 'updated_at' => now()],
            ['hari' => 'Rabu', 'created_at' => now(), 'updated_at' => now()],
            ['hari' => 'Kamis', 'created_at' => now(), 'updated_at' => now()],
            ['hari' => 'Jumat', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
