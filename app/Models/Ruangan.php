<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    protected $fillable = [
        'nama_ruangan',
        'penaggung_jawab',
        'foto_penanggung_jawab',
    ];

    public function jadwals() {
        return $this->hasMany(Jadwal::class);
    }

}
