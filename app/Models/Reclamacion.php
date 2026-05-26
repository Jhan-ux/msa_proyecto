<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reclamacion extends Model
{
    protected $table = 'reclamaciones';

    protected $fillable = [
        'tipo_persona', 'tipo_documento', 'nro_documento', 'nombre',
        'ap_paterno', 'ap_materno', 'placa', 'tipo_respuesta',
        'direccion', 'departamento', 'provincia', 'distrito',
        'telefono', 'email', 'tienda', 'area',
        'tipo_bien', 'monto', 'descripcion',
        'tipo_reclamo', 'detalle_reclamo', 'pedido',
        'menor_de_edad',
        'apoderado_tipo_documento', 'apoderado_nro_documento',
        'apoderado_nombre', 'apoderado_ap_paterno', 'apoderado_ap_materno',
        'apoderado_telefono', 'apoderado_email',
        'nro_reclamo', 'estado',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($reclamacion) {
            $count = static::whereDate('created_at', today())->count() + 1;
            $reclamacion->nro_reclamo = 'MSA-' . date('Ymd') . '-' . str_pad($count, 4, '0', STR_PAD_LEFT);
        });
    }
}
