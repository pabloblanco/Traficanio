<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MatrizTL extends Model
{
    protected $table = 'matriztl';
    public $timestamps = false;

    protected $fillable = [
        'diametroExterior', 'tipoMatriz', 'punzonid'
    ];
}
