<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    protected $table = 'crmnotas';
    public $timestamps = false;

    protected $fillable = [
        'paraUserid', 'deUserid', 'clienteid', 'estadoid', 'asunto', 'fecha', 'descripcion' 
    ];
}
