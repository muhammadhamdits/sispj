<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['nama', 'satuan'];

    public function detailItem()
    {
        return $this->hasMany('App\DetailItem');
    }

    public function detailKegiatan()
    {
        return $this->belongsToMany('App\DetailKegiatan', 'detail_items');
    }
}
