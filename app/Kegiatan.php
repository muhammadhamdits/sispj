<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    protected $fillable = ['kode', 'nama', 'program_id'];

    public function detailKegiatan()
    {
        return $this->hasMany('App\DetailKegiatan');
    }

    public function program()
    {
        return $this->belongsTo('App\Program');
    }

    public function sub4Uraian()
    {
        return $this->belongsToMany('App\Sub4Uraian', 'detail_kegiatans');
    }
}