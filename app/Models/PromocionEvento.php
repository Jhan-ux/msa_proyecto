<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PromocionEvento extends Model
{
    protected $table = 'promocion_eventos';

    protected $fillable = [
        'servicio_id',
        'nombre',
        'slug',
        'descripcion_corta',
        'descripcion_larga',
        'fecha_inicio',
        'fecha_fin',
        'estado',
        'max_intentos_por_participante',
        'puntaje_minimo_para_ruleta',
        'email_opcional',
        'activo',
        'orden',
    ];

    protected $casts = [
        'fecha_inicio' => 'datetime',
        'fecha_fin' => 'datetime',
        'email_opcional' => 'boolean',
        'activo' => 'boolean',
    ];

    public function servicio(): BelongsTo
    {
        return $this->belongsTo(Servicio::class, 'servicio_id');
    }

    public function preguntas(): HasMany
    {
        return $this->hasMany(PromocionPregunta::class, 'evento_id')->orderBy('orden');
    }

    public function premios(): HasMany
    {
        return $this->hasMany(PromocionPremio::class, 'evento_id')->orderBy('orden');
    }

    public function participantes(): HasMany
    {
        return $this->hasMany(PromocionParticipante::class, 'evento_id');
    }

    public function intentos(): HasMany
    {
        return $this->hasMany(PromocionIntento::class, 'evento_id');
    }
}
