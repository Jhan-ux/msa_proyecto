<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PromocionIntento extends Model
{
    protected $table = 'promocion_intentos';

    protected $fillable = [
        'evento_id',
        'participante_id',
        'premio_id',
        'puntaje_total',
        'habilitado_ruleta',
        'codigo_premio',
        'estado',
        'fecha_juego',
    ];

    protected $casts = [
        'habilitado_ruleta' => 'boolean',
        'fecha_juego' => 'datetime',
    ];

    public function evento(): BelongsTo
    {
        return $this->belongsTo(PromocionEvento::class, 'evento_id');
    }

    public function participante(): BelongsTo
    {
        return $this->belongsTo(PromocionParticipante::class, 'participante_id');
    }

    public function premio(): BelongsTo
    {
        return $this->belongsTo(PromocionPremio::class, 'premio_id');
    }

    public function respuestas(): HasMany
    {
        return $this->hasMany(PromocionRespuesta::class, 'intento_id');
    }
}
