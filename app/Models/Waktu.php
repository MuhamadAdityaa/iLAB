<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Waktu extends Model
{
    protected $fillable = [
        'hari',
        'jam_mulai',
        'jam_selesai',
    ];

    public function jadwals() {
        return $this->hasMany(Jadwal::class);
    }

}
