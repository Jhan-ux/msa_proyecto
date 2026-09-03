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

    public function getImagenUrlAttribute(): ?string
    {
        if (! $this->imagen) {
            return null;
        }

        $image = trim($this->imagen);

        if (preg_match('/^https?:\/\//i', $image)) {
            return $image;
        }

        if (str_starts_with($image, 'img/') || str_starts_with($image, 'storage/')) {
            return asset($image);
        }

        return asset('storage/' . ltrim($image, '/'));
    }
}
