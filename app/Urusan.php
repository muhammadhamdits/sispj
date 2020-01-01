<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Urusan extends Model
{
    public function periode()
    {
        return $this->belongsTo('App\Periode');
    }

    public function program()
    {
        return $this->hasMany('App\Program');
    }
}
