<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadoFabricacion extends Model
{
    protected $table = 'estadofabricacion';
    public $timestamps = false;

    protected $fillable = [
        'descripcion', 'detalle', 'id'
    ];
}
