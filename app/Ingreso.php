<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    protected $table = 'ingreso';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'fecha',
        'total',
        'proveedor_id',
    ];

    public function proveedor()
    {
        return $this->belongsTo('App\Proveedor', 'proveedor_id', 'id');
    }

    public function detalles(){
        return $this->hasMany(DetalleIngreso::class);
    }
}
