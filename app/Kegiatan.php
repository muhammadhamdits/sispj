<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    public function program()
    {
        return $this->belongsTo('App\Program');
    }

    public function kegiatan()
    {
        return $this->hasMany('App\Kegiatan');
    }

    public function item()
    {
        return $this->belongsToMany('App\Item', 'detail_kegiatans');
    }

    public function sub4Uraian()
    {
        return $this->belongsToMany('App\Sub4Uraian', 'detail_kegiatans');
    }
}