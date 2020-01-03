<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sub3Uraian extends Model
{
    public function sub4Uraian()
    {
        return $this->hasMany('App\Sub4Uraian');
    }

    public function sub2Uraian()
    {
        return $this->belongsTo('App\Sub2Uraian');
    }
}
