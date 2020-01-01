<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organisasi extends Model
{
    public function periode()
    {
        return $this->belongsTo('App\Periode');
    }

    public function program()
    {
        return $this->hasMany('App\Program');
    }
  
    protected $fillable = [
        'id', 'kode', 'nama', 'periode_id',
    ];
}
