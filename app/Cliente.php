<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
	protected $table = 'clientes';
	public $timestamps = false;
	
    protected $fillable = [
        'razon', 'domicilio', 'telefonos', 'codigoPostal', 'cuit', 'IIBB', 'sitioWeb', 'fax', 'localidadid', 'nombreFantasia', 'condicionVenta', 'rubroid', 'zonaid', 'observaciones', 'horarioRecepcion', 'codigo', 'activo'
    ];

}
