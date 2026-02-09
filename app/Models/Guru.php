<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $fillable = [
        'nama_guru',
        'mapel_id',
        'foto',
    ];

    public function jadwals() {
        return $this->hasMany(Jadwal::class);
    }

    public function mapel() {
        return $this->belongsTo(Mapel::class, 'mapel_id');
    }
}
