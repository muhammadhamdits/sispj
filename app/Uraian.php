<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uraian extends Model
{
	 protected $fillable = [
        'rekening','nama',
    ];
    public function subUraian()
    {
        return $this->hasMany('App\SubUraian');
    }
}
