<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transporte extends Model
{
	protected $table = 'transportes';
	public $timestamps = false;

    protected $fillable = [
        'razon', 'domicilio', 'codigoPostal', 'telefono1', 'telefono2', 'telefono3', 'fax', 'celular', 'contacto', 'horarioRecepcion', 'email', 'observaciones', 'localidadid'
    ];
}
