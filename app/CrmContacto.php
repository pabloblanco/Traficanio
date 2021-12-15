<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CrmContacto extends Model
{
    protected $table = 'crmcontacto';
    public $timestamps = false;

    protected $fillable = [
        'tipoContactoid', 'descripcion', 'fecha', 'clienteid', 'userid', 'titulo'
    ];
}
