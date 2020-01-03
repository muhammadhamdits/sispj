<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sub2Uraian extends Model
{
    protected $fillable = ['rekening', 'nama', 'sub_uraian_id'];
    
    public function sub3Uraian()
    {
        return $this->hasMany('App\Sub3Uraian');
    }

    public function subUraian()
    {
        return $this->belongsTo('App\SubUraian');
    }
}
