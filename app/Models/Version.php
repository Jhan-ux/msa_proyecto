<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Version extends Model
{
    protected $table = 'versiones';

    protected $fillable = [
        'modelo_id', 'nombre', 'descripcion', 'imagen', 'precio', 'precio_dolares', 'activo', 'orden',
    ];

    protected $casts = [
        'precio'         => 'decimal:2',
        'precio_dolares' => 'decimal:2',
        'activo'         => 'boolean',
    ];

    public function modelo()
    {
        return $this->belongsTo(Modelo::class);
    }
}
