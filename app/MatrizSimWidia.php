<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MatrizSimWidia extends Model
{
    protected $table = 'matrizsimwidia';
    public $timestamps = false;

    protected $fillable = [
        'diametro', 'ang', 'de', 'dn', 'hn', 'dc', 'hc', 'observaciones'
    ];
}
