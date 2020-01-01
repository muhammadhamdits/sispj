<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    public function urusans()
    {
        return $this->hasMany('App\Urusan');
    }

    public function organisasis()
    {
        return $this->hasMany('App\Organisasi');
    }
}
