<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MatrizDoble extends Model
{
    protected $table = 'matrizdoble';
    public $timestamps = false;

    protected $fillable = [
        'caja', 'nucleo1', 'nucleo2'
    ];
}
