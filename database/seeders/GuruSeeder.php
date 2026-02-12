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
            ['nama_guru' => 'Ahmad Jumadi, S.Kom ., Gr','foto'=>'foto/jumadi.png', 'created_at' => now(), 'updated_at' => now()],
            ['nama_guru' => 'Dhian Nur Rahayu, S.T ., M.Kom','foto'=>'foto/dhian.png', 'created_at' => now(), 'updated_at' => now()],
            ['nama_guru' => 'Gunawan Busyaeri, S.Pd','foto'=>'foto/gunawan.png', 'created_at' => now(), 'updated_at' => now()],
            ['nama_guru' => 'Yusuf Effendy, S.T ., M.Kom','foto'=>'foto/yusuf.png', 'created_at' => now(), 'updated_at' => now()],
            ['nama_guru' => 'Indria Listiani Ningrum, S.Kom','foto'=>'foto/indria.png', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
