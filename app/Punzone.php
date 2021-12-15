<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Punzone extends Model
{
    protected $table = 'punzones';
    public $timestamps = false;

    protected $fillable = [
        'diametro', 'rosca', 'espesor', 'observaciones', 'tipoMaterialid', 'tipoPunzonid'
    ];
}
