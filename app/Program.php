<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = ['kode', 'nama', 'urusan_id', 'organisasi_id'];
    
    public function urusan()
    {
        return $this->belongsTo('App\Urusan');
    }

    public function organisasi()
    {
        return $this->belongsTo('App\Organisasi');
    }

    public function kegiatan()
    {
        return $this->hasMany('App\Kegiatan');
    }
}
