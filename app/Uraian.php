<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uraian extends Model
{
    public function subUraian()
    {
        return $this->hasMany('App\SubUraian');
    }
}
