<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class mahasiswa extends Model
{
    protected $table='mahasiswa';

    public function rancangan()
    {
        return $this->hasMany(Rancangan::class, 'id_mahasiswa', 'id');
    }
    //
}
