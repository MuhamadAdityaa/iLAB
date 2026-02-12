<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    protected $fillable = [
        'nama_ruangan',
        'penanggung_jawab',
    ];

    public function guru() {
        return $this->belongsTo(Guru::class, 'penanggung_jawab');
    }

    public function jadwals() {
        return $this->hasMany(Jadwal::class);
    }

}
