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
    ];

    public function detalles(){
        return $this->hasMany(DetalleIngreso::class);
    }
}
