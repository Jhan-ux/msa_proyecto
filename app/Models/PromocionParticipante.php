<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PromocionParticipante extends Model
{
    protected $table = 'promocion_participantes';

    protected $fillable = [
        'evento_id',
        'nombre',
        'apellidos',
        'telefono',
        'email',
        'acepta_terminos',
        'ip',
        'user_agent',
    ];

    protected $casts = [
        'acepta_terminos' => 'boolean',
    ];

    public function evento(): BelongsTo
    {
        return $this->belongsTo(PromocionEvento::class, 'evento_id');
    }

    public function intentos(): HasMany
    {
        return $this->hasMany(PromocionIntento::class, 'participante_id');
    }
}
