<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleAbono extends Model
{
    protected $table = 'detalle_abono';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'insumo_id',
        'cultivo',
        'dosis',
    ];
}
