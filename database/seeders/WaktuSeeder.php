<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WaktuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('waktus')->insert([
            ['jam_ke' => 1, 'jam_mulai' => '07:15:00', 'jam_selesai' => '07:55:00'],
            ['jam_ke' => 2, 'jam_mulai' => '07:55:00', 'jam_selesai' => '08:35:00'],
            ['jam_ke' => 3, 'jam_mulai' => '08:35:00', 'jam_selesai' => '09:15:00'],
            ['jam_ke' => 4, 'jam_mulai' => '09:30:00', 'jam_selesai' => '10:10:00'],
            ['jam_ke' => 5, 'jam_mulai' => '10:10:00', 'jam_selesai' => '10:50:00'],
            ['jam_ke' => 6, 'jam_mulai' => '10:50:00', 'jam_selesai' => '11:30:00'],
            ['jam_ke' => 7, 'jam_mulai' => '11:30:00', 'jam_selesai' => '12:10:00'],
            ['jam_ke' => 8, 'jam_mulai' => '13:00:00', 'jam_selesai' => '13:40:00'],
            ['jam_ke' => 9, 'jam_mulai' => '13:40:00', 'jam_selesai' => '14:20:00'],
            ['jam_ke' => 10, 'jam_mulai' => '14:20:00', 'jam_selesai' => '15:00:00'],
        ]);
    }
}
