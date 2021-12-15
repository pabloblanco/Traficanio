<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seguimiento extends Model
{
    protected $table = 'crm_cliente';
	public $timestamps = false;

    protected $fillable = [
        'usuario_id', 'cliente_id', 'prioridad_id', 'fecha_prometida', 'titulo', 'estado', 'comentarios', 'fecha_real'
    ];
}
