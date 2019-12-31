<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Urusan extends Model
{
    protected $fillable = [
        'kode', 'nama', 'organisasi_id', 
    ];
}
