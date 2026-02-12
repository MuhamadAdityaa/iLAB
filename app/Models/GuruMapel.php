<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GuruMapel extends Model
{
    protected $fillable = [
        'guru_id',
        'mapel_id',
    ];

    public function guru() {
        return $this->belongsTo(Guru::class, 'guru_id');
    }

    public function mapel() {
        return $this->belongsTo(Mapel::class, 'mapel_id');
    }

    public function jadwals() {
        return $this->hasMany(Jadwal::class, 'guru_mapel_id');
    }
}
