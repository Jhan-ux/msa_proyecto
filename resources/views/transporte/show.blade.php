@extends('layouts.app')
@section('title', $servicio->nombre . ' - Soluciones Corporativas B2B MSA Automotriz')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/pages.css') }}">
<link rel="stylesheet" href="{{ asset('css/servicio_detalle.css') }}?v=12">
<link rel="stylesheet" href="{{ asset('css/transporte_detalle.css') }}?v=20">
@endsection

@section('content')

{{-- HERO --}}
<div class="servicio-hero">
    @if($servicio->imagen_url)
    <div class="servicio-hero__img" style="background-image:url('{{ $servicio->imagen_url }}')"></div>
    @endif
    <div class="servicio-hero__overlay"></div>
    <div class="servicio-hero__content">
        <span class="servicio-hero__badge">Solución B2B Corporativa</span>
        <h1 class="servicio-hero__title">{{ $servicio->nombre }}</h1>
        <p class="servicio-hero__sub">
            @if($servicio->slug === 'transporte')
            Logística y traslado seguro de vehículos con cigueñas y grúas homologadas.
            @else
            Flotas de vehículos 0 Km a medida para empresas con mantenimiento oficial incluido.
            @endif
        </p>
    </div>
</div>

{{-- BREADCRUMB --}}
<nav class="page-breadcrumb">
    <div class="page-breadcrumb__inner">
        <a href="{{ route('home') }}">Inicio</a>
        <span class="page-breadcrumb__separator">/</span>
        <span>Transporte y Renting</span>
        <span class="page-breadcrumb__separator">/</span>
        <span class="page-breadcrumb__current">{{ $servicio->nombre }}</span>
    </div>
</nav>

{{-- CUERPO PRINCIPAL (ESTRUCTURA POSVENTA) --}}
<div class="servicio-body">

    {{-- Columna Izquierda: Información + Selector + Beneficios --}}
    <div class="servicio-info">
        
        {{-- Selector Rápido de Soluciones B2B --}}
        <div class="tr-switcher">
            <a href="{{ route('transporte-renting.show', 'transporte') }}" class="tr-switcher__tab {{ $servicio->slug === 'transporte' ? 'active' : '' }}">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="3" width="15" height="13"/><polygon points="16 8 20 8 23 11 23 16 16 16 8"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>
                <span>Transporte de Vehículos</span>
            </a>
            <a href="{{ route('transporte-renting.show', 'renting') }}" class="tr-switcher__tab {{ $servicio->slug === 'renting' ? 'active' : '' }}">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1 .4-1 1v7c0 .6.4 1 1 1h2"/><circle cx="7" cy="17" r="2"/><path d="M9 17h6"/><circle cx="17" cy="17" r="2"/></svg>
                <span>Renting Corporativo</span>
            </a>
        </div>

        <div class="servicio-info__header">
            <span class="servicio-info__tag">Logística &amp; Flotas Empresariales</span>
            <h2>{{ $servicio->nombre }}</h2>
        </div>

        <p class="servicio-info__desc">
            {{ $servicio->descripcion ?? 'Brindamos soluciones integrales de logística, flota y transporte corporativo adaptadas a las exigencias operativas, técnicas y de seguridad de tu empresa.' }}
        </p>

        {{-- Grid de Beneficios Corporativos 2x2 --}}
        <div class="servicio-benefits-grid">
            @if($servicio->slug === 'transporte')
                <div class="servicio-benefit-card">
                    <div class="servicio-benefit-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="3" width="15" height="13"/><polygon points="16 8 20 8 23 11 23 16 16 16 8"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>
                    </div>
                    <div class="servicio-benefit-text">
                        <div class="servicio-benefit-title">Cobertura Nacional</div>
                        <div class="servicio-benefit-desc">Traslados punto a punto con cigueñas y grúas oficiales homologadas.</div>
                    </div>
                </div>

                <div class="servicio-benefit-card">
                    <div class="servicio-benefit-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"/></svg>
                    </div>
                    <div class="servicio-benefit-text">
                        <div class="servicio-benefit-title">Monitoreo GPS 24/7</div>
                        <div class="servicio-benefit-desc">Trazabilidad y seguimiento satelital continuo durante todo el trayecto.</div>
                    </div>
                </div>

                <div class="servicio-benefit-card">
                    <div class="servicio-benefit-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                    </div>
                    <div class="servicio-benefit-text">
                        <div class="servicio-benefit-title">Seguro Integral de Carga</div>
                        <div class="servicio-benefit-desc">Pólizas de cobertura total contra todo riesgo para cada unidad trasladada.</div>
                    </div>
                </div>

                <div class="servicio-benefit-card">
                    <div class="servicio-benefit-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="8.5" cy="7" r="4"/><polyline points="17 11 19 13 23 9"/></svg>
                    </div>
                    <div class="servicio-benefit-text">
                        <div class="servicio-benefit-title">Conductores Certificados</div>
                        <div class="servicio-benefit-desc">Personal altamente capacitado y homologado para operaciones mineras e industriales.</div>
                    </div>
                </div>
            @else
                <div class="servicio-benefit-card">
                    <div class="servicio-benefit-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1 .4-1 1v7c0 .6.4 1 1 1h2"/><circle cx="7" cy="17" r="2"/><path d="M9 17h6"/><circle cx="17" cy="17" r="2"/></svg>
                    </div>
                    <div class="servicio-benefit-text">
                        <div class="servicio-benefit-title">Flotas 0 Km a Medida</div>
                        <div class="servicio-benefit-desc">Unidades nuevas configuradas con equipamiento técnico según tus proyectos.</div>
                    </div>
                </div>

                <div class="servicio-benefit-card">
                    <div class="servicio-benefit-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
                    </div>
                    <div class="servicio-benefit-text">
                        <div class="servicio-benefit-title">Mantenimiento Oficial Incluido</div>
                        <div class="servicio-benefit-desc">Atención técnica preventiva y repuestos legítimos en talleres oficiales MSA.</div>
                    </div>
                </div>

                <div class="servicio-benefit-card">
                    <div class="servicio-benefit-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
                    </div>
                    <div class="servicio-benefit-text">
                        <div class="servicio-benefit-title">100% Deducible Tributario</div>
                        <div class="servicio-benefit-desc">Optimiza el flujo de caja registrando el canon de alquiler como gasto operativo (OPEX).</div>
                    </div>
                </div>

                <div class="servicio-benefit-card">
                    <div class="servicio-benefit-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M23 4v6h-6"/><path d="M1 20v-6h6"/><path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"/></svg>
                    </div>
                    <div class="servicio-benefit-text">
                        <div class="servicio-benefit-title">Continuidad &amp; Reemplazo</div>
                        <div class="servicio-benefit-desc">Disponibilidad de unidades de soporte para garantizar que tus operaciones nunca paren.</div>
                    </div>
                </div>
            @endif
        </div>

        {{-- Banner de Compromiso B2B --}}
        <div class="servicio-commitment">
            <div class="servicio-commitment__icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
            </div>
            <div class="servicio-commitment__text">
                <strong>Respaldo Corporativo MSA Automotriz:</strong> Diseñamos contratos flexibles a mediano y largo plazo con atención personalizada para empresas y proyectos de la región.
            </div>
        </div>
    </div>

    {{-- Columna Derecha: Formulario CTA B2B --}}
    <div class="servicio-cta-card">
        <div class="servicio-cta-header">
            <span class="servicio-cta-tag">Atención Corporativa B2B</span>
            <h3>Solicitar Cotización</h3>
            <p>Ingresa tus datos o los de tu empresa y un ejecutivo especializado te presentará una propuesta a medida.</p>
        </div>

        @if(session('consulta_enviada'))
        <div class="consulta-form__alert">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
            <span>¡Cotización solicitada con éxito! Un ejecutivo B2B se comunicará contigo a la brevedad.</span>
        </div>
        @endif

        <form method="POST" action="{{ route('transporte-renting.consultar', $servicio->slug) }}" class="consulta-form" novalidate>
            @csrf

            <div class="form-group">
                <label for="tr_nombre">Nombre y Apellido *</label>
                <div class="input-wrap">
                    <svg class="input-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                    <input type="text" id="tr_nombre" name="nombre" value="{{ old('nombre') }}" required placeholder="Persona de contacto">
                </div>
                @error('nombre')<span class="consulta-form__error">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <label for="tr_email">Correo Corporativo *</label>
                <div class="input-wrap">
                    <svg class="input-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                    <input type="email" id="tr_email" name="email" value="{{ old('email') }}" required placeholder="ejemplo@empresa.com">
                </div>
                @error('email')<span class="consulta-form__error">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <label for="tr_telefono">Teléfono / WhatsApp</label>
                <div class="input-wrap">
                    <svg class="input-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.61 3.41 2 2 0 0 1 3.6 1.21h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.82a16 16 0 0 0 6.29 6.29l.98-.98a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                    <input type="tel" id="tr_telefono" name="telefono" value="{{ old('telefono') }}" placeholder="+51 987 654 321">
                </div>
                @error('telefono')<span class="consulta-form__error">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <label for="tr_empresa">Empresa / Razón Social</label>
                <div class="input-wrap">
                    <svg class="input-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
                    <input type="text" id="tr_empresa" name="empresa" value="{{ old('empresa') }}" placeholder="Nombre de tu empresa o RUC">
                </div>
                @error('empresa')<span class="consulta-form__error">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <label for="tr_mensaje">Requerimiento o Cantidad de Unidades</label>
                <textarea id="tr_mensaje" name="mensaje" rows="3" placeholder="Detalla tipo de vehículos, rutas, tiempo estimado del contrato...">{{ old('mensaje') }}</textarea>
                @error('mensaje')<span class="consulta-form__error">{{ $message }}</span>@enderror
            </div>

            <button type="submit" class="consulta-form__submit">
                <span>Enviar Cotización B2B</span>
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </button>
        </form>

        <a href="https://wa.me/51966154210?text={{ urlencode('¡Hola! Deseo cotizar soluciones B2B de ' . $servicio->nombre . ' para mi empresa.') }}"
           target="_blank" rel="noopener"
           class="btn-wa">
            <svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413z"/></svg>
            <span>Consultar por WhatsApp</span>
        </a>
    </div>

</div>

@endsection
