<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Konsentrasi extends Model
{
    //
    protected $table='konsentrasi';
    public function dosen()
    {
        return $this->hasMany(dosen::class, 'id_kons', 'id');
    }
}
