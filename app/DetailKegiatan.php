<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailKegiatan extends Model
{
    protected $fillable = ['kegiatan_id', 'sub4_uraian_id'];

    public function detailItem()
    {
        return $this->hasMany('App\DetailItem');
    }

    public function kegiatan()
    {
        return $this->belongsTo('App\Kegiatan');
    }

    public function sub4Uraian()
    {
        return $this->belongsTo('App\Sub4Uraian');
    }

    public function item()
    {
        return $this->belongsToMany('App\Item', 'detail_items');
    }
}
