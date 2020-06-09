<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleInsumo extends Model
{
    protected $table = 'detalle_insumo';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'insumo_id',
        'cultivo',
        'plaga',
        'dosis',
    ];
}
