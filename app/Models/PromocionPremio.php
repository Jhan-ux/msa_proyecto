<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PromocionPremio extends Model
{
    protected $table = 'promocion_premios';

    protected $fillable = [
        'evento_id',
        'nombre',
        'descripcion',
        'tipo_premio',
        'stock_total',
        'stock_disponible',
        'probabilidad_peso',
        'puntaje_minimo',
        'puntaje_maximo',
        'activo',
        'orden',
    ];

    protected $casts = [
        'activo' => 'boolean',
    ];

    public function evento(): BelongsTo
    {
        return $this->belongsTo(PromocionEvento::class, 'evento_id');
    }

    public function intentos(): HasMany
    {
        return $this->hasMany(PromocionIntento::class, 'premio_id');
    }
}
