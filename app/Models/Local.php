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
        if ($this->mapa_src) {
            return $this->mapa_src;
        }

        if ($this->direccion || $this->nombre) {
            return 'https://www.google.com/maps/search/?api=1&query=' . urlencode($this->direccion ?: $this->nombre);
        }

        return null;
    }
}
