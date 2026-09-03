<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $fillable = [
        'nombre', 'categoria_vehiculo', 'slug', 'descripcion', 'imagen', 'imagen_hero', 'activo', 'orden',
    ];

    protected $casts = ['activo' => 'boolean'];

    public function modelos()
    {
        return $this->hasMany(Modelo::class);
    }

    public function modelosDestacados()
    {
        return $this->hasMany(Modelo::class)->where('destacado', true)->where('activo', true);
    }
}
