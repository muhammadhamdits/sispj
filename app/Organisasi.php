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

    public function user()
    {
        return $this->hasMany('App\User');
    }
  
    protected $fillable = [
        'id', 'kode', 'nama', 'periode_id',
    ];
}
