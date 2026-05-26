<?php

namespace App\Http\Controllers;

use App\Models\Reclamacion;
use Illuminate\Http\Request;

class LibroReclamacionesController extends Controller
{
    public function index()
    {
        return view('libro-reclamaciones');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            // Datos del cliente
            'tipo_persona'              => 'required|in:natural,juridica',
            'tipo_documento'            => 'required|string|max:20',
            'nro_documento'             => 'required|string|max:20',
            'nombre'                    => 'required|string|max:100',
            'ap_paterno'                => 'required|string|max:80',
            'ap_materno'                => 'nullable|string|max:80',
            'placa'                     => 'nullable|string|max:20',
            // Tipo de respuesta
            'tipo_respuesta'            => 'nullable|string|max:20',
            'direccion'                 => 'nullable|string|max:200',
            'departamento'              => 'nullable|string|max:80',
            'provincia'                 => 'nullable|string|max:80',
            'distrito'                  => 'nullable|string|max:80',
            'telefono'                  => 'nullable|string|max:20',
            'email'                     => 'required|email|max:120',
            // Información general
            'tienda'                    => 'nullable|string|max:80',
            'area'                      => 'nullable|string|max:80',
            'tipo_bien'                 => 'nullable|string|max:20',
            'monto'                     => 'nullable|numeric|min:0',
            'descripcion'               => 'nullable|string|max:3000',
            // Detalles del reclamo
            'tipo_reclamo'              => 'required|in:reclamo,queja',
            'detalle_reclamo'           => 'required|string|max:3000',
            'pedido'                    => 'nullable|string|max:3000',
            // Datos del apoderado
            'menor_de_edad'             => 'nullable|boolean',
            'apoderado_tipo_documento'  => 'nullable|string|max:20',
            'apoderado_nro_documento'   => 'nullable|string|max:20',
            'apoderado_nombre'          => 'nullable|string|max:100',
            'apoderado_ap_paterno'      => 'nullable|string|max:80',
            'apoderado_ap_materno'      => 'nullable|string|max:80',
            'apoderado_telefono'        => 'nullable|string|max:20',
            'apoderado_email'           => 'nullable|email|max:120',
        ]);

        $validated['menor_de_edad'] = $request->boolean('menor_de_edad');

        $reclamacion = Reclamacion::create($validated);

        return redirect()->route('libro-reclamaciones')
            ->with('success', 'Su reclamo ha sido registrado con el número: ' . $reclamacion->nro_reclamo . '. Recibirá una confirmación en su correo electrónico.');
    }
}
