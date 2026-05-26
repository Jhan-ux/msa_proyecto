<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    protected $table = 'locales';

    protected $fillable = [
        'nombre', 'ciudad', 'direccion', 'telefono', 'whatsapp',
        'email', 'horario', 'mapa_embed', 'imagen', 'activo', 'orden',
    ];

    protected $casts = [
        'activo' => 'boolean',
    ];
}
