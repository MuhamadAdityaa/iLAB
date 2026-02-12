<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $fillable = [
        'nama_guru',
        'foto',
    ];

    public function mapels() {
        return $this->hasMany(GuruMapel::class, 'guru_id');
    }

    public function ruangan() {
        return $this->hasOne(Ruangan::class, 'penanggung_jawab');
    }
}
