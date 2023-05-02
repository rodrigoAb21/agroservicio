<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleIngreso extends Model
{
    protected $table = 'detalle_ingreso';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'cantidad',
        'precio_unitario',
        'insumo_id',
        'ingreso_id',
    ];

    public function insumo(){
        return $this->belongsTo('App\Models\Insumo', 'insumo_id', 'id');
    }
    public function ingreso(){
        return $this->belongsTo('App\Models\Ingreso', 'ingreso_id', 'id');
    }
}
