<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('gurus')->insert([
            ['nama_guru' => 'Muhamad Aditya','foto'=>'foto/adit.JPG', 'created_at' => now(), 'updated_at' => now()],
            ['nama_guru' => 'Budi Santoso','foto'=>'foto/adit.JPG', 'created_at' => now(), 'updated_at' => now()],
            ['nama_guru' => 'Siti Aminah','foto'=>'foto/adit.JPG', 'created_at' => now(), 'updated_at' => now()],
            ['nama_guru' => 'Agus Pratama','foto'=>'foto/adit.JPG', 'created_at' => now(), 'updated_at' => now()],
            ['nama_guru' => 'Rina Kartika','foto'=>'foto/adit.JPG', 'created_at' => now(), 'updated_at' => now()],
            ['nama_guru' => 'Dewi Lestari','foto'=>'foto/adit.JPG', 'created_at' => now(), 'updated_at' => now()],
            ['nama_guru' => 'Andi Wijaya','foto'=>'foto/adit.JPG', 'created_at' => now(), 'updated_at' => now()],
            ['nama_guru' => 'Nurhayati','foto'=>'foto/adit.JPG', 'created_at' => now(), 'updated_at' => now()],
            ['nama_guru' => 'Hendra Gunawan','foto'=>'foto/adit.JPG', 'created_at' => now(), 'updated_at' => now()],
            ['nama_guru' => 'Fitriani','foto'=>'foto/adit.JPG', 'created_at' => now(), 'updated_at' => now()],
            ['nama_guru' => 'Joko Susilo','foto'=>'foto/adit.JPG', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
