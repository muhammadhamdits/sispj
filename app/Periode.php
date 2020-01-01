<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    public function urusan()
    {
        return $this->hasMany('App\Urusan');
    }

    public function organisasi()
    {
        return $this->hasMany('App\Organisasi');
    }
}
