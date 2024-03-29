<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleSalida extends Model
{
    protected $table = 'detalle_salida';
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
    public function salida(){
        return $this->belongsTo('App\Models\Salida', 'salida_id', 'id');
    }
}
