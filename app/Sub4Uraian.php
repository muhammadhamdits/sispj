<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sub4Uraian extends Model
{
    public function sub3Uraian()
    {
        return $this->belongsTo('App\Sub3Uraian');
    }

    public function item()
    {
        return $this->belongsToMany('App\Item', 'detail_kegiatans');
    }

    public function kegiatan()
    {
        return $this->belongsToMany('App\Kegiatan', 'detail_kegiatans');
    }
}
