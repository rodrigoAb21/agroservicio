<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Composicion extends Model
{
    protected $table = 'composicion';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'ingrediente_activo',
        'concentracion',
        'insumo_id',
    ];
}
