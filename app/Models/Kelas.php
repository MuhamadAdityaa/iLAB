<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $fillable = [
        'jurusan',
        'kelas'
    ];

    public function jadwals() {
        return $this->hasMany(Jadwal::class);
    }
}
