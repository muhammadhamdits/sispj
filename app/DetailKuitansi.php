<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailKuitansi extends Model
{
    protected $fillable = ['harga_satuan', 'kuitansi_id', 'volume', 'detail_item_id'];

    public function kuitansi()
    {
        return $this->belongsTo('App\Kuitansi');
    }

    public function detailItem()
    {
        return $this->belongsTo('App\DetailItem');
    }
}
