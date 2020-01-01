<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organisasi extends Model
{
     protected $fillable = [
        'id', 'kode', 'nama',
    ];
}
