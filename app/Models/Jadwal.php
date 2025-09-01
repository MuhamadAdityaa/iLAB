<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $fillable = [
        'guru_id',
        'mapel_id',
        'ruangan_id',
        'hari_id',
        'waktu_id'
    ];

    public function mapel() {
        return $this->belongsTo(Mapel::class);
    }

    public function guru() {
        return $this->belongsTo(Guru::class);
    }

    public function ruangan() {
        return $this->belongsTo(Ruangan::class);
    }

    public function hari() {
        return $this->belongsTo(Hari::class);
    }

    public function waktu() {
        return $this->belongsTo(Waktu::class);
    }

    public function kelas() {
        return $this->belongsTo(Kelas::class);
    }
}
