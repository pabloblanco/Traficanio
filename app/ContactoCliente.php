<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactoCliente extends Model
{
    protected $table = 'contactoclientes';
    public $timestamps = false;

    protected $fillable = [
        'clienteid', 'contacto', 'email', 'celular'
    ];
}
