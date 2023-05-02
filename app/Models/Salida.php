<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salida extends Model
{
    protected $table = 'salida';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'nro_nota',
        'fecha',
        'total',
        'destinatario_id',
        'tipo',
    ];

    public function detalles(){
        return $this->hasMany(DetalleSalida::class);
    }

    public function destinatario()
    {
        return $this->belongsTo('App\Models\Destinatario', 'destinatario_id', 'id');
    }
}
