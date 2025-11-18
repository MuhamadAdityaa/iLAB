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
        'waktu_id',
        'kelas_id',
    ];

    public function mapel() {
        return $this->belongsTo(Mapel::class, 'mapel_id');
    }

    public function guru() {
        return $this->belongsTo(Guru::class, 'guru_id');
    }

    public function ruangan() {
        return $this->belongsTo(Ruangan::class, 'ruangan_id');
    }

    public function hari() {
        return $this->belongsTo(Hari::class, 'hari_id');
    }

    public function waktu() {
        return $this->belongsTo(Waktu::class, 'waktu_id');
    }

    public function kelas() {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }
}
