<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insumo extends Model
{
    protected $table = 'insumo';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'nombre',
        'tipo',
        'distribuidor',
        'existencias',
        'info',
        'contenido',
        'subtipo_id',
        'unidad_medida_id',
    ];

    public function subtipo()
    {
        return $this->belongsTo('App\Subtipo', 'subtipo_id', 'id');
    }

    public function unidad()
    {
        return $this->belongsTo('App\UnidadMedida', 'unidad_medida_id', 'id');
    }

}
