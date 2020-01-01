<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function sub4Uraian()
    {
        return $this->belongsToMany('App\Sub4Uraian', 'detail_kegiatans');
    }

    public function kegiatan()
    {
        return $this->belongsToMany('App\Kegiatan', 'detail_kegiatans');
    }
}
