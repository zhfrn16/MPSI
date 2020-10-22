<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Rancangan extends Model
{
    //
    protected $table='rancangan';

    public function mahasiswa()
    {
        return $this->belongsTo(mahasiswa::class, 'id_mahasiswa', 'id');
    }
    public function detail()
    {
        return $this->hasMany(Detail_dosbing::class, 'id_rancangan', 'id');
    }
}
