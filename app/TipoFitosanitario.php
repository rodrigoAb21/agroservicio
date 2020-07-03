<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoFitosanitario extends Model
{
    protected $table = 'tipoFitosanitario';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'nombre'
    ];
}
