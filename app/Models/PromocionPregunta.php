<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PromocionPregunta extends Model
{
    protected $table = 'promocion_preguntas';

    protected $fillable = [
        'evento_id',
        'pregunta',
        'tipo',
        'puntaje',
        'orden',
        'activa',
    ];

    protected $casts = [
        'activa' => 'boolean',
    ];

    public function evento(): BelongsTo
    {
        return $this->belongsTo(PromocionEvento::class, 'evento_id');
    }

    public function opciones(): HasMany
    {
        return $this->hasMany(PromocionOpcion::class, 'pregunta_id')->orderBy('orden');
    }
}
