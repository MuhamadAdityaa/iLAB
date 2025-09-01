<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hari extends Model
{
    protected $fillable = [
        'hari'
    ];

    public function jadwals() {
        return $this->hasMany(Jadwal::class);
    }
}
