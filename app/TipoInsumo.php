<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoInsumo extends Model
{
    protected $table = 'tipo';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'nombre'
    ];
}
