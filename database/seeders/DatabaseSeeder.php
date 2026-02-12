<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call([
            WaktuSeeder::class,
            HariSeeder::class,
            MapelSeeder::class,
            GuruSeeder::class,
            GuruMapelSeeder::class,
            KelasSeeder::class,
            RuanganSeeder::class,
            JadwalSeeder::class,
            UserSeeder::class,
        ]);
    }
}
