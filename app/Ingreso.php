<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    protected $table = 'ingreso';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'nro_nota',
        'fecha',
        'total',
        'proveedor_id',
        'tipo',
    ];

    public function detalles(){
        return $this->hasMany(DetalleIngreso::class);
    }

    public function proveedor()
    {
        return $this->belongsTo('App\Proveedor', 'proveedor_id', 'id');
    }

}
