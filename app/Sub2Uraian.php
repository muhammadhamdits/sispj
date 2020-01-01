<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sub2Uraian extends Model
{
    public function sub3Uraian()
    {
        return $this->hasMany('App\Sub3Uraian');
    }

    public function subUraian()
    {
        return $this->belongsTo('App\SubUraian');
    }
}
