<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subtipo extends Model
{
    protected $table = 'subtipo';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'nombre',
        'tipo',
    ];
}
