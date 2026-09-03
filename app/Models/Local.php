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

    public function getMapaSrcAttribute(): ?string
    {
        if (! $this->mapa_embed) {
            return null;
        }

        $mapValue = trim($this->mapa_embed);

        if (preg_match('/^https?:\/\//i', $mapValue)) {
            return $mapValue;
        }

        if (preg_match('/src=["\']([^"\']+)["\']/i', $mapValue, $matches)) {
            return $matches[1];
        }

        return null;
    }

    public function getMapaPublicUrlAttribute(): ?string
    {
        $destination = trim(implode(', ', array_filter([
            $this->nombre,
            $this->direccion,
            $this->ciudad ? $this->ciudad . ', Perú' : 'Perú',
        ])));

        if ($destination) {
            return 'https://www.google.com/maps/dir/?api=1&destination=' . urlencode($destination);
        }

        return null;
    }
}
