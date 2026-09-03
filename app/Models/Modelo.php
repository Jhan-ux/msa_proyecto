<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    protected $fillable = [
        'marca_id', 'nombre', 'slug', 'descripcion', 'imagen', 'precio', 'precio_dolares', 'tipo', 'categoria_vehiculo', 'destacado', 'activo', 'orden',
    ];

    protected $casts = [
        'precio'         => 'decimal:2',
        'precio_dolares' => 'decimal:2',
        'destacado'      => 'boolean',
        'activo'         => 'boolean',
    ];

    public function marca()
    {
        return $this->belongsTo(Marca::class);
    }

    public function versiones()
    {
        return $this->hasMany(Version::class)->orderBy('orden');
    }
}
