<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransporteRenting extends Model
{
    protected $table = 'transporte_renting';

    protected $fillable = [
        'nombre', 'slug', 'descripcion', 'imagen', 'activo', 'orden',
    ];

    protected $casts = [
        'activo' => 'boolean',
    ];
}
