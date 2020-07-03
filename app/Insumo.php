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
        'ingrediente_activo',
        'info',
        'existencias',
        'tipo',
        'tipoFitosanitario_id',
        'unidad_medida_id',
    ];

    public function tipoFitosanitario()
    {
        return $this->belongsTo('App\TipoFitosanitario', 'tipoFitosanitario_id', 'id');
    }

    public function unidad()
    {
        return $this->belongsTo('App\UnidadMedida', 'unidad_medida_id', 'id');
    }

}
