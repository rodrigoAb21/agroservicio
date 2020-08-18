<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maquinaria extends Model
{
    protected $table = 'maquinaria';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'nombre',
        'foto',
        'descripcion',
        'propiedad',
        'marca',
        'modelo',
        'color',
        'tipom_id',
    ];

    public function tipo()
    {
        return $this->belongsTo('App\TipoMaquinaria', 'tipom_id', 'id');
    }
}
