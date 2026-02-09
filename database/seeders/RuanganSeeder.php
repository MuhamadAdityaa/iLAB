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
                'penanggung_jawab' => 'Yusuf Effendy, S.T.',
                'foto_penanggung_jawab' => 'foto/yusuf.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_ruangan' => 'Lab 2',
                'penanggung_jawab' => 'Gunawan Busyaeri, S.Pd',
                'foto_penanggung_jawab' => 'foto/gunawan.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_ruangan' => 'Lab 3',
                'penanggung_jawab' => 'Dhian Nur Rahayu, S.T ., M.Kom',
                'foto_penanggung_jawab' => 'foto/dhian.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_ruangan' => 'Lab 4',
                'penanggung_jawab' => 'Indria Listiani Ningrum, S.Kom',
                'foto_penanggung_jawab' => 'foto/indria.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_ruangan' => 'Lab 5',
                'penanggung_jawab' => 'Ahmad Jumadi, S.Kom ., Gr',
                'foto_penanggung_jawab' => 'foto/jumadi.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);

    }
}
