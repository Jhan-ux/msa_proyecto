<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PromocionOpcion extends Model
{
    protected $table = 'promocion_opciones';

    protected $fillable = [
        'pregunta_id',
        'texto',
        'es_correcta',
        'orden',
    ];

    protected $casts = [
        'es_correcta' => 'boolean',
    ];

    public function pregunta(): BelongsTo
    {
        return $this->belongsTo(PromocionPregunta::class, 'pregunta_id');
    }
}
