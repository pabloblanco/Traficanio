<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadoTarea extends Model
{
    protected $table = 'estadotarea';

    protected $fillable = [
        'description'
    ];
}
