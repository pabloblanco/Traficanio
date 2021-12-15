<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CabezaTurco extends Model
{
	protected $table = 'cabezaturco';
	public $timestamps = false;

    protected $fillable = [
        'numero', 'diametroEntrada', 'medidaRodillo'
    ];
}
