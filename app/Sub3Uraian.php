<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sub3Uraian extends Model
{
    protected $fillable = ['rekening', 'nama', 'sub2_uraian_id'];

    public function sub4Uraian()
    {
        return $this->hasMany('App\Sub4Uraian');
    }

    public function sub2Uraian()
    {
        return $this->belongsTo('App\Sub2Uraian');
    }
}
