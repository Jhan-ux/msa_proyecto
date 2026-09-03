@extends('layouts.app')
@section('title', 'Servicios de Posventa y Taller Oficial - MSA Automotriz')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/pages.css') }}">
<link rel="stylesheet" href="{{ asset('css/servicios.css') }}?v=25">
@endsection

@section('content')

{{-- HERO PRINCIPAL DE POSVENTA --}}
<div class="posventa-hero">
    <div class="posventa-hero__bg" style="background-image: url('{{ asset('img/posventa/baner.jfif') }}');"></div>
    <div class="posventa-hero__overlay"></div>
    <div class="posventa-hero__content">
        <span class="posventa-hero__badge">Red Oficial de Talleres &amp; Garantía</span>
        <h1 class="posventa-hero__title">SERVICIOS &amp; POSVENTA</h1>
        <p class="posventa-hero__sub">
            Cuidamos tu vehículo en cada etapa con tecnología de diagnóstico computarizado, repuestos 100% legítimos y técnicos certificados de fábrica.
        </p>

        <div class="posventa-hero__pills">
            <div class="posventa-hero__pill">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                <span>10 Marcas Oficiales</span>
            </div>
            <div class="posventa-hero__pill">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                <span>Repuestos Genuinos</span>
            </div>
            <div class="posventa-hero__pill">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                <span>Técnicos Certificados</span>
            </div>
            <div class="posventa-hero__pill">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                <span>Garantía de Fábrica</span>
            </div>
        </div>
    </div>
</div>

{{-- BREADCRUMB --}}
<nav class="page-breadcrumb">
    <div class="page-breadcrumb__inner">
        <a href="{{ route('home') }}">Inicio</a>
        <span class="page-breadcrumb__separator">/</span>
        <span class="page-breadcrumb__current">Posventa</span>
    </div>
</nav>

{{-- SECCIÓN DE PILARES DE CALIDAD / BENEFICIOS --}}
<section class="posventa-pillars-section">
    <div class="posventa-container">
        <div class="posventa-pillars-grid">
            <div class="posventa-pillar-card">
                <div class="posventa-pillar-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                </div>
                <div class="posventa-pillar-content">
                    <h3 class="posventa-pillar-title">Garantía de Marca</h3>
                    <p class="posventa-pillar-desc">Procedimientos homologados que mantienen la garantía vigente de fábrica.</p>
                </div>
            </div>

            <div class="posventa-pillar-card">
                <div class="posventa-pillar-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
                </div>
                <div class="posventa-pillar-content">
                    <h3 class="posventa-pillar-title">Repuestos 100% Genuinos</h3>
                    <p class="posventa-pillar-desc">Componentes originales para asegurar máxima durabilidad y rendimiento.</p>
                </div>
            </div>

            <div class="posventa-pillar-card">
                <div class="posventa-pillar-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
                </div>
                <div class="posventa-pillar-content">
                    <h3 class="posventa-pillar-title">Tecnología de Diagnóstico</h3>
                    <p class="posventa-pillar-desc">Scanners computarizados específicos para cada marca y modelo.</p>
                </div>
            </div>

            <div class="posventa-pillar-card">
                <div class="posventa-pillar-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                </div>
                <div class="posventa-pillar-content">
                    <h3 class="posventa-pillar-title">Puntualidad en Entrega</h3>
                    <p class="posventa-pillar-desc">Compromiso estricto con los plazos acordados para tu total comodidad.</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- CATÁLOGO DE SERVICIOS POSVENTA --}}
<section class="posventa-servicios-section">
    <div class="posventa-container">
        
        <div class="section-header">
            <span class="section-tag">Servicios Especializados</span>
            <h2 class="section-title">Nuestros Servicios de Posventa</h2>
            <p class="section-subtitle">Selecciona el servicio que necesitas para tu vehículo y solicita información o agenda tu atención técnica.</p>
        </div>

        <div class="posventa-grid">
            @forelse($servicios as $servicio)
            <a href="{{ route('servicios.show', $servicio->slug) }}" class="posventa-card">
                
                {{-- Media del Servicio con Badge --}}
                <div class="posventa-card__media">
                    @if($servicio->imagen_url)
                        <img src="{{ $servicio->imagen_url }}" alt="{{ $servicio->nombre }} - MSA Automotriz" class="posventa-card__img" loading="lazy">
                    @else
                        <div class="posventa-card__placeholder">
                            <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="12" r="3"/><path d="M12 2v3M12 19v3M4.22 4.22l2.12 2.12M17.66 17.66l2.12 2.12M2 12h3M19 12h3M4.22 19.78l2.12-2.12M17.66 6.34l2.12-2.12"/></svg>
                        </div>
                    @endif
                    
                    <span class="posventa-card__badge">Taller Oficial</span>
                </div>

                {{-- Cuerpo de la Tarjeta --}}
                <div class="posventa-card__body">
                    <h3 class="posventa-card__title">{{ $servicio->nombre }}</h3>
                    <p class="posventa-card__desc">
                        {{ $servicio->descripcion ?? 'Servicio especializado con repuestos legítimos y soporte técnico certificado de marca.' }}
                    </p>

                    <div class="posventa-card__footer">
                        <span class="posventa-card__btn">
                            <span>Ver detalles y solicitar</span>
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                        </span>
                    </div>
                </div>

            </a>
            @empty
            <p class="posventa-empty">No hay servicios disponibles en este momento.</p>
            @endforelse
        </div>

    </div>
</section>

{{-- BANNER CTA DE CITA & ATENCIÓN INMEDIATA --}}
<section class="posventa-cta-banner">
    <div class="posventa-container">
        <div class="posventa-cta-box">
            <div class="posventa-cta-content">
                <span class="posventa-cta-tag">Atención Rápida &amp; Personalizada</span>
                <h2 class="posventa-cta-title">¿Necesitas agendar tu mantenimiento o cotizar un repuesto?</h2>
                <p class="posventa-cta-desc">
                    Nuestros asesores técnicos están listos para brindarte un diagnóstico preciso, presupuestos transparentes y la mejor atención para tu auto.
                </p>
            </div>
            <div class="posventa-cta-actions">
                <a href="{{ route('contacto') }}?asunto=Cita+de+Taller" class="posventa-cta-btn posventa-cta-btn--primary">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                    <span>Agendar Cita Online</span>
                </a>
                <a href="https://wa.me/51966154210?text={{ urlencode('¡Hola! Deseo información y agendar una cita en el taller de MSA Automotriz.') }}"
                   target="_blank" rel="noopener"
                   class="posventa-cta-btn posventa-cta-btn--wa">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413z"/></svg>
                    <span>Contactar por WhatsApp</span>
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
