<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MatrizSimAcero extends Model
{
    protected $table = 'matrizsimacero';
    public $timestamps = false;

    protected $fillable = [
        'numero', 'diametroNominal', 'ang', 'entrada', 'altZonaUtil', 'diametroMatriz', 'altoMatriz', 'observaciones'
    ];
}
