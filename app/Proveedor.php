<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proveedor extends Model
{
    protected $table = 'proveedor';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'tecnico',
        'celular',
        'empresa',
        'tel_empresa',
    ];
}
