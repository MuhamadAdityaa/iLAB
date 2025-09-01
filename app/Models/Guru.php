<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $fillable = [
        'nama_guru',
        'foto'
    ];

    public function jadwals() {
        return $this->hasMany(Jadwal::class);
    }

}
