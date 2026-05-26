<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ConsultaServicio extends Model
{
    protected $table = 'consultas_servicio';

    protected $fillable = [
        'servicio_id',
        'servicio_nombre',
        'nombre',
        'email',
        'telefono',
        'vehiculo',
        'mensaje',
        'estado',
    ];

    public function servicio(): BelongsTo
    {
        return $this->belongsTo(Servicio::class);
    }
}
