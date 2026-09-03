@extends('layouts.app')
@section('title', $servicio->nombre . ' - Posventa Oficial MSA Automotriz')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/pages.css') }}">
<link rel="stylesheet" href="{{ asset('css/servicio_detalle.css') }}?v=10">
@endsection

@section('content')

{{-- HERO --}}
<div class="servicio-hero">
    @if($servicio->imagen_url)
    <div class="servicio-hero__img" style="background-image:url('{{ $servicio->imagen_url }}')"></div>
    @endif
    <div class="servicio-hero__overlay"></div>
    <div class="servicio-hero__content">
        <span class="servicio-hero__badge">Servicio Posventa Oficial</span>
        <h1 class="servicio-hero__title">{{ $servicio->nombre }}</h1>
        <p class="servicio-hero__sub">Garantía, repuestos genuinos y atención especializada de fábrica.</p>
    </div>
</div>

{{-- BREADCRUMB --}}
<nav class="page-breadcrumb">
    <div class="page-breadcrumb__inner">
        <a href="{{ route('home') }}">Inicio</a>
        <span class="page-breadcrumb__separator">/</span>
        <a href="{{ route('servicios') }}">Posventa</a>
        <span class="page-breadcrumb__separator">/</span>
        <span class="page-breadcrumb__current">{{ $servicio->nombre }}</span>
    </div>
</nav>

{{-- CUERPO --}}
<div class="servicio-body">

    {{-- Columna Izquierda: Información + Beneficios --}}
    <div class="servicio-info">
        <div class="servicio-info__header">
            <span class="servicio-info__tag">Taller Oficial &amp; Garantía</span>
            <h2>{{ $servicio->nombre }}</h2>
        </div>

        <p class="servicio-info__desc">
            {{ $servicio->descripcion ?? 'Nuestro equipo de técnicos certificados cuenta con herramientas especializadas, scanners computarizados y protocolos de fábrica para garantizar el máximo rendimiento, seguridad y vida útil de tu vehículo.' }}
        </p>

        {{-- Grid de Beneficios Oficiales --}}
        <div class="servicio-benefits-grid">
            <div class="servicio-benefit-card">
                <div class="servicio-benefit-icon">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                </div>
                <div class="servicio-benefit-text">
                    <div class="servicio-benefit-title">Garantía de Servicio</div>
                    <div class="servicio-benefit-desc">Trabajos garantizados y certificados bajo estándares de marca.</div>
                </div>
            </div>

            <div class="servicio-benefit-card">
                <div class="servicio-benefit-icon">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
                </div>
                <div class="servicio-benefit-text">
                    <div class="servicio-benefit-title">Repuestos 100% Genuinos</div>
                    <div class="servicio-benefit-desc">Componentes legítimos de fábrica para prolongar la vida útil de tu auto.</div>
                </div>
            </div>

            <div class="servicio-benefit-card">
                <div class="servicio-benefit-icon">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                </div>
                <div class="servicio-benefit-text">
                    <div class="servicio-benefit-title">Puntualidad en Entrega</div>
                    <div class="servicio-benefit-desc">Cumplimiento riguroso de tiempos de atención y entrega programada.</div>
                </div>
            </div>

            <div class="servicio-benefit-card">
                <div class="servicio-benefit-icon">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
                </div>
                <div class="servicio-benefit-text">
                    <div class="servicio-benefit-title">Diagnóstico Computarizado</div>
                    <div class="servicio-benefit-desc">Scanners y equipos tecnológicos homologados de última generación.</div>
                </div>
            </div>
        </div>

        {{-- Banner de Compromiso --}}
        <div class="servicio-commitment">
            <div class="servicio-commitment__icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
            </div>
            <div class="servicio-commitment__text">
                <strong>Respaldo y Calidad MSA Automotriz:</strong> Todos nuestros procedimientos cumplen estrictamente con los manuales técnicos oficiales para mantener vigente la garantía de tu vehículo.
            </div>
        </div>
    </div>

    {{-- Columna Derecha: Formulario CTA --}}
    <div class="servicio-cta-card">
        <div class="servicio-cta-header">
            <span class="servicio-cta-tag">Atención Inmediata</span>
            <h3>Solicitar Información o Cita</h3>
            <p>Completa tus datos y un especialista posventa se comunicará contigo a la brevedad.</p>
        </div>

        @if(session('consulta_enviada'))
        <div class="consulta-form__alert">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
            <span>¡Consulta enviada con éxito! Un asesor técnico se comunicará contigo pronto.</span>
        </div>
        @endif

        <form method="POST" action="{{ route('servicios.consultar', $servicio->slug) }}" class="consulta-form" novalidate>
            @csrf

            <div class="form-group">
                <label for="cs_nombre">Nombre completo *</label>
                <div class="input-wrap">
                    <svg class="input-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                    <input type="text" id="cs_nombre" name="nombre" value="{{ old('nombre') }}" required placeholder="Tu nombre y apellido">
                </div>
                @error('nombre')<span class="consulta-form__error">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <label for="cs_email">Correo electrónico *</label>
                <div class="input-wrap">
                    <svg class="input-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                    <input type="email" id="cs_email" name="email" value="{{ old('email') }}" required placeholder="ejemplo@correo.com">
                </div>
                @error('email')<span class="consulta-form__error">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <label for="cs_telefono">Teléfono / WhatsApp</label>
                <div class="input-wrap">
                    <svg class="input-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.61 3.41 2 2 0 0 1 3.6 1.21h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.82a16 16 0 0 0 6.29 6.29l.98-.98a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                    <input type="tel" id="cs_telefono" name="telefono" value="{{ old('telefono') }}" placeholder="999 999 999">
                </div>
            </div>

            <div class="form-group">
                <label for="cs_vehiculo">Vehículo / Placa</label>
                <div class="input-wrap">
                    <svg class="input-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="4" width="40" height="28" rx="4" transform="scale(0.35)"/><path d="M14 4h4l3 5v4h-7V4z" transform="scale(0.8)"/></svg>
                    <input type="text" id="cs_vehiculo" name="vehiculo" value="{{ old('vehiculo') }}" placeholder="Ej: Chevrolet Tracker 2023">
                </div>
            </div>

            <div class="form-group">
                <label for="cs_mensaje">Consulta o detalle</label>
                <textarea id="cs_mensaje" name="mensaje" rows="3" placeholder="Describe el servicio que necesitas o fecha tentativa...">{{ old('mensaje') }}</textarea>
            </div>

            <button type="submit" class="consulta-form__submit">
                <span>Enviar Solicitud</span>
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </button>
        </form>

        <a href="https://wa.me/51966154210?text={{ urlencode('¡Hola! Deseo consultar sobre el servicio de posventa: ' . $servicio->nombre) }}"
           target="_blank" rel="noopener"
           class="btn-wa">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413z"/></svg>
            <span>Consultar por WhatsApp</span>
        </a>
    </div>

</div>

{{-- SECCIÓN OTROS SERVICIOS DE POSVENTA --}}
@if($otrosServicios->isNotEmpty())
<section class="otros-servicios-section">
    <div class="otros-servicios-container">
        <div class="section-header">
            <span class="section-tag">Red de Posventa Oficial</span>
            <h2 class="section-title">Otros Servicios de Posventa</h2>
            <p class="section-subtitle">Conoce todas las soluciones integrales que tenemos disponibles para tu vehículo.</p>
        </div>

        <div class="otros-servicios-grid">
            @foreach($otrosServicios as $otro)
            @php
                $oImg = $otro->imagen_url;
            @endphp
            <a href="{{ route('servicios.show', $otro->slug) }}" class="otro-servicio-card">
                <div class="otro-servicio-card__media" @if($oImg) style="background-image:url('{{ $oImg }}')" @endif>
                    @unless($oImg)
                    <div class="otro-servicio-card__placeholder">
                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#6c757d" stroke-width="1.6"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg>
                    </div>
                    @endunless
                    <span class="otro-servicio-card__badge">Taller Oficial</span>
                </div>
                <div class="otro-servicio-card__body">
                    <h3 class="otro-servicio-card__title">{{ $otro->nombre }}</h3>
                    <p class="otro-servicio-card__desc">{{ Str::limit($otro->descripcion ?? 'Servicio especializado con repuestos genuinos y garantía de fábrica.', 80) }}</p>
                    <span class="otro-servicio-card__link">
                        <span>Ver información del servicio</span>
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </span>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif

@endsection
