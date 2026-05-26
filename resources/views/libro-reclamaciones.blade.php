@extends('layouts.app')
@section('title', 'Libro de Reclamaciones - MSA Automotriz')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/libro_reclamaciones.css') }}">
@endsection

@section('content')

<main style="min-height:60vh;display:flex;align-items:center;justify-content:center;flex-direction:column;padding:40px 16px;">
    <div style="width:100%;max-width:780px;">

        @if(session('success'))
            <div style="background:#d4edda;color:#155724;padding:14px 18px;border-radius:6px;margin-bottom:20px;">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div style="background:#f8d7da;color:#721c24;padding:14px 18px;border-radius:6px;margin-bottom:20px;">
                <ul style="margin:0;padding-left:18px;">
                    @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                </ul>
            </div>
        @endif

        <div class="libro-reclamaciones-container">

            {{-- CABECERA --}}
            <div class="lr-company-header">
                <div class="lr-company-logo">
                    <img src="{{ asset('img/logo.png') }}" alt="MSA Automotriz" style="max-height:56px;">
                </div>
                <div class="lr-company-info">
                    <strong>MSA Automotriz S.A.A.</strong><br>
                    RUC: 20600975947<br>
                    Jr. Del Comercio N° 111, Cajamarca
                </div>
                <div class="lr-titulo-header">
                    Libro de reclamaciones
                </div>
            </div>

            <div class="lr-legal-intro">
                Conforme a lo establecido en el Código de Protección y Defensa del Consumidor,
                la empresa cuenta con un Libro de Reclamaciones puesto a disposición de los consumidores.
            </div>

            <div class="lr-fecha">
                {{ now()->isoFormat('dddd, D [de] MMMM [de] YYYY') }}
            </div>

            <form class="libro-reclamaciones-form" action="{{ route('libro-reclamaciones.store') }}" method="POST">
                @csrf

                {{-- =====================================================
                     SECCIÓN 1: DATOS DE LA PERSONA
                     ===================================================== --}}
                <div class="lr-section-title">Datos de la Persona que presenta el Reclamo:</div>
                <div class="lr-subsection-title">Datos del cliente</div>

                <div class="lr-row">
                    <div class="lr-col">
                        <select class="lr-select" name="tipo_persona">
                            <option value="natural"  {{ old('tipo_persona','natural') == 'natural'  ? 'selected' : '' }}>Persona natural</option>
                            <option value="juridica" {{ old('tipo_persona')            == 'juridica' ? 'selected' : '' }}>Persona jurídica</option>
                        </select>
                    </div>
                </div>

                <div class="lr-row">
                    <div class="lr-col lr-col-auto" style="max-width:200px;">
                        <select class="lr-select" name="tipo_documento">
                            <option value="DNI"       {{ old('tipo_documento','DNI') == 'DNI'       ? 'selected' : '' }}>DNI</option>
                            <option value="CE"        {{ old('tipo_documento')        == 'CE'        ? 'selected' : '' }}>CE</option>
                            <option value="Pasaporte" {{ old('tipo_documento')        == 'Pasaporte' ? 'selected' : '' }}>Pasaporte</option>
                            <option value="RUC"       {{ old('tipo_documento')        == 'RUC'       ? 'selected' : '' }}>RUC</option>
                        </select>
                    </div>
                    <div class="lr-col">
                        <input class="lr-input" type="text" name="nro_documento"
                               placeholder="Nro de Documento"
                               value="{{ old('nro_documento') }}" required>
                    </div>
                </div>

                <div class="lr-row">
                    <div class="lr-col">
                        <input class="lr-input" type="text" name="nombre"
                               placeholder="Nombre" value="{{ old('nombre') }}" required>
                    </div>
                </div>

                <div class="lr-row">
                    <div class="lr-col">
                        <input class="lr-input" type="text" name="ap_paterno"
                               placeholder="Apellido Paterno" value="{{ old('ap_paterno') }}" required>
                    </div>
                </div>

                <div class="lr-row">
                    <div class="lr-col">
                        <input class="lr-input" type="text" name="ap_materno"
                               placeholder="Apellido Materno" value="{{ old('ap_materno') }}">
                    </div>
                </div>

                <div class="lr-row">
                    <div class="lr-col">
                        <input class="lr-input" type="text" name="placa"
                               placeholder="Placa" value="{{ old('placa') }}">
                    </div>
                </div>

                {{-- =====================================================
                     SECCIÓN 2: TIPO DE RESPUESTA
                     ===================================================== --}}
                <div class="lr-section-title" style="margin-top:28px;">Tipo de Respuesta</div>

                <div class="lr-row">
                    <div class="lr-col lr-col-auto" style="max-width:240px;">
                        <select class="lr-select" name="tipo_respuesta">
                            <option value="domicilio" {{ old('tipo_respuesta','domicilio') == 'domicilio' ? 'selected' : '' }}>Dirección Domiciliaria</option>
                            <option value="email"     {{ old('tipo_respuesta')              == 'email'     ? 'selected' : '' }}>Correo Electrónico</option>
                        </select>
                    </div>
                    <div class="lr-col">
                        <input class="lr-input" type="text" name="direccion"
                               placeholder="Dirección" value="{{ old('direccion') }}">
                    </div>
                </div>

                <div class="lr-row">
                    <div class="lr-col">
                        <select class="lr-select" name="departamento">
                            <option value="">Departamento</option>
                            @foreach(['Amazonas','Áncash','Apurímac','Arequipa','Ayacucho','Cajamarca','Callao','Cusco','Huancavelica','Huánuco','Ica','Junín','La Libertad','Lambayeque','Lima','Loreto','Madre de Dios','Moquegua','Pasco','Piura','Puno','San Martín','Tacna','Tumbes','Ucayali'] as $dep)
                                <option value="{{ $dep }}" {{ old('departamento') == $dep ? 'selected' : '' }}>{{ $dep }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="lr-col">
                        <input class="lr-input" type="text" name="provincia"
                               placeholder="Provincia" value="{{ old('provincia') }}">
                    </div>
                    <div class="lr-col">
                        <input class="lr-input" type="text" name="distrito"
                               placeholder="Distrito" value="{{ old('distrito') }}">
                    </div>
                </div>

                <div class="lr-row">
                    <div class="lr-col">
                        <input class="lr-input" type="tel" name="telefono"
                               placeholder="Teléfono" value="{{ old('telefono') }}">
                    </div>
                    <div class="lr-col">
                        <input class="lr-input" type="email" name="email"
                               placeholder="E-mail" value="{{ old('email') }}" required>
                    </div>
                </div>
                <p class="lr-hint">Este dato es necesario para que usted pueda recibir el cargo del registro de su reclamo o queja.</p>

                <hr class="lr-divider">

                {{-- =====================================================
                     SECCIÓN 3: INFORMACIÓN GENERAL
                     ===================================================== --}}
                <div class="lr-section-title">Información General</div>

                <div class="lr-form-group">
                    <label class="lr-label-text">Tienda de Compra</label>
                    <select class="lr-select" name="tienda">
                        <option value="">Seleccione una tienda</option>
                        <option value="cajamarca"  {{ old('tienda') == 'cajamarca'  ? 'selected' : '' }}>Cajamarca</option>
                        <option value="banos_inca" {{ old('tienda') == 'banos_inca' ? 'selected' : '' }}>Baños del Inca</option>
                        <option value="lima"       {{ old('tienda') == 'lima'       ? 'selected' : '' }}>Lima</option>
                        <option value="piura"      {{ old('tienda') == 'piura'      ? 'selected' : '' }}>Piura</option>
                    </select>
                </div>

                <div class="lr-form-group">
                    <label class="lr-label-text">Área</label>
                    <select class="lr-select" name="area">
                        <option value="">Seleccione un área</option>
                        <option value="ventas"         {{ old('area') == 'ventas'         ? 'selected' : '' }}>Ventas</option>
                        <option value="servicio"       {{ old('area') == 'servicio'       ? 'selected' : '' }}>Servicio / Taller</option>
                        <option value="repuestos"      {{ old('area') == 'repuestos'      ? 'selected' : '' }}>Repuestos</option>
                        <option value="administracion" {{ old('area') == 'administracion' ? 'selected' : '' }}>Administración</option>
                        <option value="creditos"       {{ old('area') == 'creditos'       ? 'selected' : '' }}>Créditos</option>
                    </select>
                </div>

                <div class="lr-form-group">
                    <label class="lr-label-text">Identificación del bien contratado</label>
                    <div class="lr-row" style="align-items:center;gap:24px;">
                        <div class="lr-radios-group">
                            <label class="lr-radio-label">
                                <input type="radio" name="tipo_bien" value="Producto"
                                       {{ old('tipo_bien','Producto') == 'Producto' ? 'checked' : '' }}>
                                Producto
                            </label>
                            <label class="lr-radio-label">
                                <input type="radio" name="tipo_bien" value="Servicio"
                                       {{ old('tipo_bien') == 'Servicio' ? 'checked' : '' }}>
                                Servicio
                            </label>
                        </div>
                        <div style="flex:1;">
                            <input class="lr-input" type="number" name="monto"
                                   placeholder="Monto reclamo en S/"
                                   value="{{ old('monto') }}" min="0" step="0.01">
                        </div>
                    </div>
                </div>

                <div class="lr-form-group">
                    <textarea class="lr-input" name="descripcion" rows="3"
                              style="resize:vertical;"
                              placeholder="Descripción...">{{ old('descripcion') }}</textarea>
                </div>

                <hr class="lr-divider">

                {{-- =====================================================
                     SECCIÓN 4: DETALLES DEL RECLAMO
                     ===================================================== --}}
                <div class="lr-section-title">Detalles de su reclamo</div>

                <div class="lr-form-group">
                    <label class="lr-label-text">Tipo</label>
                    <div class="lr-radios-group">
                        <label class="lr-radio-label">
                            <input type="radio" name="tipo_reclamo" value="reclamo"
                                   {{ old('tipo_reclamo','reclamo') == 'reclamo' ? 'checked' : '' }}>
                            Reclamo
                        </label>
                        <label class="lr-radio-label">
                            <input type="radio" name="tipo_reclamo" value="queja"
                                   {{ old('tipo_reclamo') == 'queja' ? 'checked' : '' }}>
                            Queja
                        </label>
                    </div>
                </div>

                <div class="lr-form-group">
                    <label class="lr-label-text">Detalle del reclamo</label>
                    <textarea class="lr-input" name="detalle_reclamo" rows="4"
                              style="resize:vertical;" required
                              placeholder="Describa detalladamente su reclamo o queja...">{{ old('detalle_reclamo') }}</textarea>
                </div>

                <div class="lr-form-group">
                    <label class="lr-label-text">Pedido</label>
                    <textarea class="lr-input" name="pedido" rows="3"
                              style="resize:vertical;"
                              placeholder="Indique lo que solicita como solución...">{{ old('pedido') }}</textarea>
                </div>

                <hr class="lr-divider">

                {{-- =====================================================
                     SECCIÓN 5: DATOS DEL APODERADO
                     ===================================================== --}}
                <div class="lr-section-title">Datos del Apoderado</div>

                <div class="lr-form-group">
                    <label class="lr-checkbox-label">
                        <input type="checkbox" name="menor_de_edad" value="1"
                               id="menorDeEdad"
                               {{ old('menor_de_edad') ? 'checked' : '' }}>
                        Menor de Edad
                    </label>
                </div>

                <div id="apoderadoFields">
                    <div class="lr-form-group">
                        <label class="lr-label-text">Tipo de Documento</label>
                        <div class="lr-row">
                            <div class="lr-col lr-col-auto" style="max-width:200px;">
                                <select class="lr-select" name="apoderado_tipo_documento">
                                    <option value="DNI"       {{ old('apoderado_tipo_documento','DNI') == 'DNI'       ? 'selected' : '' }}>DNI</option>
                                    <option value="CE"        {{ old('apoderado_tipo_documento')        == 'CE'        ? 'selected' : '' }}>CE</option>
                                    <option value="Pasaporte" {{ old('apoderado_tipo_documento')        == 'Pasaporte' ? 'selected' : '' }}>Pasaporte</option>
                                </select>
                            </div>
                            <div class="lr-col">
                                <input class="lr-input" type="text" name="apoderado_nro_documento"
                                       placeholder="Nro de Documento"
                                       value="{{ old('apoderado_nro_documento') }}">
                            </div>
                        </div>
                    </div>

                    <div class="lr-row">
                        <div class="lr-col">
                            <input class="lr-input" type="text" name="apoderado_nombre"
                                   placeholder="Nombre" value="{{ old('apoderado_nombre') }}">
                        </div>
                    </div>

                    <div class="lr-row">
                        <div class="lr-col">
                            <input class="lr-input" type="text" name="apoderado_ap_paterno"
                                   placeholder="Apellido Paterno" value="{{ old('apoderado_ap_paterno') }}">
                        </div>
                    </div>

                    <div class="lr-row">
                        <div class="lr-col">
                            <input class="lr-input" type="text" name="apoderado_ap_materno"
                                   placeholder="Apellido Materno" value="{{ old('apoderado_ap_materno') }}">
                        </div>
                    </div>

                    <div class="lr-row">
                        <div class="lr-col">
                            <input class="lr-input" type="tel" name="apoderado_telefono"
                                   placeholder="Teléfono" value="{{ old('apoderado_telefono') }}">
                        </div>
                        <div class="lr-col">
                            <input class="lr-input" type="email" name="apoderado_email"
                                   placeholder="E-mail" value="{{ old('apoderado_email') }}">
                        </div>
                    </div>
                </div>

                <hr class="lr-divider">

                {{-- =====================================================
                     TEXTOS LEGALES
                     ===================================================== --}}
                <div class="lr-legal-block">
                    <p>
                        <strong>RECLAMO:</strong> Disconformidad relacionada a los productos o servicios. 
                        El proveedor deberá dar respuesta al reclamo en un plazo no mayor a quince (15) días hábiles, 
                        pudiendo ampliar el plazo hasta por quince (15) días hábiles adicionales, previa comunicación 
                        al consumidor.
                    </p>
                    <p>
                        <strong>QUEJA:</strong> Disconformidad no relacionada a los productos o servicios; o, malestar 
                        o descontento respecto a la atención al público.
                    </p>
                    <p>
                        La formulación del reclamo no impide acudir a otras vías de solución de controversias 
                        ni es requisito previo para interponer una denuncia ante el INDECOPI. El proveedor debe 
                        dar respuesta al consumidor en un plazo no mayor de treinta (30) días calendario.
                    </p>
                </div>

                {{-- reCAPTCHA --}}
                <div class="lr-recaptcha-wrap">
                    <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key', '') }}"></div>
                </div>

                <div class="lr-row" style="margin-top:24px;">
                    <button type="submit" class="lr-btn-enviar">Enviar &rsaquo;</button>
                </div>

            </form>
        </div>
    </div>
</main>

<script>
    // Mostrar/ocultar campos del apoderado según el checkbox
    const chkMenor = document.getElementById('menorDeEdad');
    const apoderadoFields = document.getElementById('apoderadoFields');

    function toggleApoderado() {
        apoderadoFields.style.display = chkMenor.checked ? 'block' : 'none';
    }

    chkMenor.addEventListener('change', toggleApoderado);
    toggleApoderado(); // estado inicial
</script>

@endsection
