<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubUraian extends Model
{
    public function sub2Uraian()
    {
        return $this->hasMany('App\Sub2Uraian');
    }

    public function uraian()
    {
        return $this->belongsTo('App\Uraian');
    }
}
