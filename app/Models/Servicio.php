<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table = 'servicios';

    protected $fillable = [
        'nombre', 'slug', 'descripcion', 'icono', 'imagen', 'activo', 'orden',
    ];

    protected $casts = [
        'activo' => 'boolean',
    ];
}
