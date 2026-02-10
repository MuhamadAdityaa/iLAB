<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $fillable = [
        'jurusan',
        'kelas',
        'tingkat'
    ];

    public function jadwals() {
        return $this->hasMany(Jadwal::class);
    }
}
