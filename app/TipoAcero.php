<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoAcero extends Model
{
    protected $table = 'tipoacero';
    public $timestamps = false;

    protected $fillable = [
        'descripcion'
    ];
}
