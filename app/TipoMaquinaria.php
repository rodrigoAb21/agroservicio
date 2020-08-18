<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoMaquinaria extends Model
{
    protected $table = 'tipom';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'nombre',
    ];
}
