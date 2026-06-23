<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seminuevo extends Model
{
    protected $fillable = [
        'nombre', 'slug', 'descripcion', 'imagen', 'precio', 'precio_dolares', 'activo', 'orden',
    ];

    protected $casts = [
        'precio'         => 'decimal:2',
        'precio_dolares' => 'decimal:2',
        'activo'         => 'boolean',
    ];

    public function getImagenUrlAttribute(): ?string
    {
        if (! $this->imagen) {
            return null;
        }

        $image = trim($this->imagen);

        if (preg_match('/^https?:\/\//i', $image)) {
            return $image;
        }

        return asset($image);
    }
}
