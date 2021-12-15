<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MatrizMitchell extends Model
{
    protected $table = 'matrizmitchell';
    public $timestamps = false;

    protected $fillable = [
        'codigo', 'diametroNominal', 'tipoMaterialid'
    ];
}
