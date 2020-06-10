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
        'ingrediente_reactivo',
        'info',
        'existencias',
        'tipo_id',
        'unidad_medida_id',
    ];

    public function tipo()
    {
        return $this->belongsTo('App\TipoInsumo', 'tipo_id', 'id');
    }

    public function unidad()
    {
        return $this->belongsTo('App\UnidadMedida', 'unidad_medida_id', 'id');
    }

}
