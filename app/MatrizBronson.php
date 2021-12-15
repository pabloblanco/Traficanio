<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MatrizBronson extends Model
{
    protected $table = 'matrizbronson';
    public $timestamps = false;

    protected $fillable = [
        'medidasPulgada', 'medidaMilimetro', 'diametroBoca', 'tipoMaterialid'
    ];
}
