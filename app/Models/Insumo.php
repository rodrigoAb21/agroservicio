<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Insumo extends Model
{
    protected $table = 'insumo';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'nombre',
        'tipo',
        'existencias',
        'composicion',
        'envase',
        'info',
        'subtipo_id',
        'unidad_medida_id',
    ];

    public function subtipo()
    {
        return $this->belongsTo('App\Models\Subtipo', 'subtipo_id', 'id');
    }

    public function unidad()
    {
        return $this->belongsTo('App\Models\UnidadMedida', 'unidad_medida_id', 'id');
    }

}
