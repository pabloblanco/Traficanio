<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
	protected $table = 'tareas';
	public $timestamps = false;

    protected $fillable = [
        'tipoTareaid', 'frecuenciaid', 'userid', 'prioridadid', 'tareaObjetivo', 'fechaPrometida', 'detalle', 'estadoid', 'creoUserid'
    ];
}
