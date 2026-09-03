<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    protected $fillable = [
        'nombre',
        'telefono',
        'email',
        'marca',
        'categoria_vehiculo',
        'vendedor_id',
        'asunto',
        'mensaje',
        'notas_vendedor',
        'estado',
        'ip',
    ];

    /**
     * Vendedor asignado a la cotización
     */
    public function vendedor()
    {
        return $this->belongsTo(User::class, 'vendedor_id');
    }
}
