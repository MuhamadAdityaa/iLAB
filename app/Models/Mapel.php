<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    protected $fillable = [
        'nama_mapel',
        'kode_mapel'
    ];

    public function jadwals() {
        return $this->hasMany(Jadwal::class);
    }

}
