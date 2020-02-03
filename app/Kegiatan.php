<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    protected $fillable = ['kode', 'nama', 'program_id', 'lokasi', 'capaian_tok', 'capaian_tk', 'keluaran_tok', 'keluaran_tk', 'hasil_tok', 'hasil_tk'];

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

    // public function sub4_uraian($state)
    // {
    //     return $this->detailKegiatan()->where('status', '=', $state);
    // }
}