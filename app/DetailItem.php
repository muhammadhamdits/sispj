<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailItem extends Model
{
    protected $fillable = ['detail_kegiatan_id', 'item_id', 'harga_satuan', 'volume'];

    public function detailKegiatan()
    {
        return $this->belongsTo('App\DetailKegiatan');
    }

    public function item()
    {
        return $this->belongsTo('App\Item');
    }

    public function kuitansi()
    {
        return $this->belongsToMany('App\Kuitansi', 'detail_kuitansis');
    }
}
