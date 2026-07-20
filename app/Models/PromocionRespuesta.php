<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PromocionRespuesta extends Model
{
    protected $table = 'promocion_respuestas';

    protected $fillable = [
        'intento_id',
        'pregunta_id',
        'opcion_id',
        'respuesta_texto',
        'es_correcta',
        'puntaje_obtenido',
    ];

    protected $casts = [
        'es_correcta' => 'boolean',
    ];

    public function intento(): BelongsTo
    {
        return $this->belongsTo(PromocionIntento::class, 'intento_id');
    }

    public function pregunta(): BelongsTo
    {
        return $this->belongsTo(PromocionPregunta::class, 'pregunta_id');
    }

    public function opcion(): BelongsTo
    {
        return $this->belongsTo(PromocionOpcion::class, 'opcion_id');
    }
}
