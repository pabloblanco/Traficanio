<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    protected $table = 'biblioteca';
    public $timestamps = false;

    protected $fillable = [
        'titulo', 'codigo', 'estadoid', 'tipoid', 'version', 'comentario', 'file',  
    ];
}
