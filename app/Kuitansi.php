<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kuitansi extends Model
{
    protected $fillable = ['tanggal', 'terima_dari', 'sebab', 'dibukukan_tanggal', 'detail_kegiatan_id'];

    public function detailKegiatan()
    {
        return $this->belongsTo('App\DetailKegiatan');
    }

    public function detailItem()
    {
        return $this->belongsToMany('App\DetailItem', 'detail_kuitansis');
    }

    public function detailKuitansi()
    {
        return $this->hasMany('App\DetailKuitansi');
    }
}
