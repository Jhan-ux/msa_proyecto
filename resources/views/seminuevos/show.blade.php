@extends('layouts.app')
@section('title', $seminuevo->nombre . ' - Seminuevo Garantizado MSA Automotriz')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/pages.css') }}">
<link rel="stylesheet" href="{{ asset('css/seminuevo_detalle.css') }}?v=30">
@endsection

@section('content')

{{-- BREADCRUMB --}}
<nav class="page-breadcrumb">
    <div class="page-breadcrumb__inner">
        <a href="{{ route('home') }}">Inicio</a>
        <span class="page-breadcrumb__separator">/</span>
        <a href="{{ route('seminuevos') }}">Seminuevos</a>
        <span class="page-breadcrumb__separator">/</span>
        <span class="page-breadcrumb__current">{{ $seminuevo->nombre }}</span>
    </div>
</nav>

{{-- CUERPO PRINCIPAL DEL SHOWROOM DE SEMINUEVOS --}}
<div class="sn-wrapper">
    <div class="sn-layout">
        
        {{-- COLUMNA PRINCIPAL (IZQUIERDA) --}}
        <div class="sn-main">
            
            {{-- Encabezado del Vehículo --}}
            <div class="sn-header">
                <div class="sn-header__tags">
                    <span class="sn-badge">
                        <span class="tag-dot"></span> Seminuevo Certificado MSA
                    </span>
                    <span class="sn-tag-avail">✓ Entrega Inmediata</span>
                </div>
                <h1 class="sn-title">{{ $seminuevo->nombre }}</h1>
                <p class="sn-desc">
                    {{ $seminuevo->descripcion ?? 'Esta unidad ha superado con éxito la inspección multipunto de MSA Automotriz. Se encuentra en óptimas condiciones mecánicas y estéticas, lista para su transferencia y entrega inmediata.' }}
                </p>
            </div>

            {{-- Escenario del Auto (100% Fondo Blanco) --}}
            @php $heroImg = $seminuevo->imagen_url ?? asset('img/localprueba.jpg'); @endphp
            <div class="sn-stage">
                <div class="sn-stage__img-wrap">
                    <img src="{{ $heroImg }}" alt="{{ $seminuevo->nombre }}" class="sn-stage__img">
                </div>
            </div>

            {{-- 4 Pilares de Certificación y Confianza MSA --}}
            <div class="sn-section-block">
                <h3 class="sn-block-title">Certificación &amp; Garantía MSA</h3>
                <p class="sn-block-desc">Cada seminuevo cuenta con respaldo técnico integral antes de ingresar a nuestro catálogo.</p>
                
                <div class="sn-certification-grid">
                    <div class="sn-cert-card">
                        <div class="sn-cert-icon">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                        </div>
                        <div>
                            <div class="sn-cert-title">Garantía Mecánica</div>
                            <div class="sn-cert-desc">Cobertura y respaldo oficial posventa de MSA Automotriz.</div>
                        </div>
                    </div>

                    <div class="sn-cert-card">
                        <div class="sn-cert-icon">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                        </div>
                        <div>
                            <div class="sn-cert-title">Inspección 100 Puntos</div>
                            <div class="sn-cert-desc">Motor, frenos, suspensión, electrónica e interiores auditados.</div>
                        </div>
                    </div>

                    <div class="sn-cert-card">
                        <div class="sn-cert-icon">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                        </div>
                        <div>
                            <div class="sn-cert-title">Documentación al Día</div>
                            <div class="sn-cert-desc">Transferencia notarial inmediata sin multas ni gravámenes.</div>
                        </div>
                    </div>

                    <div class="sn-cert-card">
                        <div class="sn-cert-icon">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 16V4m0 0L3 8m4-4l4 4m6 4v12m0 0l4-4m-4 4l-4-4"/></svg>
                        </div>
                        <div>
                            <div class="sn-cert-title">Auto en Parte de Pago</div>
                            <div class="sn-cert-desc">Tasamos tu vehículo actual al mejor precio del mercado.</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        {{-- COLUMNA LATERAL STICKY DE COTIZACIÓN (DERECHA) --}}
        <aside class="sn-sidebar">
            <div class="sn-quote-card">
                
                <div class="sn-quote-card__header">
                    <span class="sn-quote-card__badge">Seminuevo Certificado</span>
                    
                    @if($seminuevo->precio || $seminuevo->precio_dolares)
                    <div class="sn-quote-card__price-wrap">
                        <span class="sn-quote-card__price-label">Precio contado o financiado</span>
                        @if($seminuevo->precio)
                        <div class="sn-quote-card__price-soles"><span>S/ </span>{{ number_format($seminuevo->precio, 0, '.', ',') }}</div>
                        @endif
                        @if($seminuevo->precio_dolares)
                        <div class="sn-quote-card__price-usd">o $ {{ number_format($seminuevo->precio_dolares, 0, '.', ',') }} USD</div>
                        @endif
                    </div>
                    @else
                    <div class="sn-quote-card__price-empty">
                        Consulta el precio especial y facilidades de pago con nuestros asesores.
                    </div>
                    @endif
                </div>

                <div class="sn-quote-card__actions">
                    <a href="{{ route('contacto') }}?asunto={{ urlencode('Cotización Seminuevo: ' . $seminuevo->nombre) }}" class="quote-btn quote-btn--primary">
                        <span>Solicitar Cotización</span>
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </a>

                    <a href="https://wa.me/51966154210?text={{ urlencode('¡Hola! Me interesa obtener más información sobre el seminuevo certificado: ' . $seminuevo->nombre) }}"
                       target="_blank" rel="noopener"
                       class="quote-btn quote-btn--wa">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413z"/></svg>
                        <span>Consultar por WhatsApp</span>
                    </a>
                </div>

                <div class="sn-quote-card__footer">
                    <div class="quote-check">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                        <span>Financiamiento bancario y crédito directo</span>
                    </div>
                    <div class="quote-check">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                        <span>Aceptamos tu vehículo en parte de pago</span>
                    </div>
                </div>

            </div>
        </aside>

    </div>
</div>

{{-- SECCIÓN OTROS SEMINUEVOS DISPONIBLES --}}
@if($otros->isNotEmpty())
<section class="sn-otros-section">
    <div class="sn-otros-container">
        
        <div class="section-header">
            <span class="section-tag">Stock Disponible</span>
            <h2 class="section-title">Otros Seminuevos Garantizados</h2>
            <p class="section-subtitle">Explora más unidades certificadas listas para entrega inmediata en Cajamarca.</p>
        </div>

        <div class="sn-otros-grid">
            @foreach($otros as $otro)
            @php $otroImg = $otro->imagen_url ?? asset('img/localprueba.jpg'); @endphp
            <a href="{{ route('seminuevos.show', $otro->slug) }}" class="sn-otro-card">
                
                <div class="sn-otro-card__media">
                    <img src="{{ $otroImg }}" alt="{{ $otro->nombre }}" class="sn-otro-card__img" loading="lazy">
                    <span class="sn-otro-card__badge">Certificado MSA</span>
                </div>

                <div class="sn-otro-card__body">
                    <h4 class="sn-otro-card__name">{{ $otro->nombre }}</h4>
                    <div class="sn-otro-card__price">
                        @if($otro->precio)
                        <span>Precio: <strong>S/ {{ number_format($otro->precio, 0, '.', ',') }}</strong></span>
                        @else
                        <span class="sn-otro-card__price--consultar">Consultar precio</span>
                        @endif
                    </div>
                    <span class="sn-otro-card__link">
                        <span>Ver vehículo</span>
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
