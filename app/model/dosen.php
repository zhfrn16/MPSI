<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class dosen extends Model
{
    //
    protected $table='dosen';

    public function konsentrasi()
    {
        return $this->belongsTo(Konsentrasi::class, 'id_kons', 'id');
    }
    public function detail()
    {
        return $this->hasMany(Detail_dosbing::class, 'id_dosen', 'id');
    }
}
