<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleFitosanitario extends Model
{
    protected $table = 'detalle_fitosanitario';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'insumo_id',
        'cultivo',
        'plaga',
        'dosis',
    ];
}
