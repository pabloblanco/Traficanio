<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CondicionVenta extends Model
{
    protected $table = 'condicionventa';
    public $timestamps = false;

    protected $fillable = [
        'descripcion'
    ];
}
