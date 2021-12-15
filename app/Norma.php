<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Norma extends Model
{
    protected $table = 'normas';
    public $timestamps = false;

    protected $fillable = [
        'descripcion'
    ];
}
