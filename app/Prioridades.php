<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prioridades extends Model
{
    protected $table = 'prioridades';

    protected $fillable = [
        'description'
    ];
}
