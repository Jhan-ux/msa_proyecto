@extends('layouts.app')
@section('title', $modelo->nombre . ' ' . $marca->nombre . ' - MSA Automotriz')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/pages.css') }}">
<link rel="stylesheet" href="{{ asset('css/modelo_detalle.css') }}?v=40">
@endsection

@section('content')

{{-- BREADCRUMB --}}
<nav class="page-breadcrumb">
    <div class="page-breadcrumb__inner">
        <a href="{{ route('home') }}">Inicio</a>
        <span class="page-breadcrumb__separator">/</span>
        <a href="{{ route('marcas.index') }}">Marcas</a>
        <span class="page-breadcrumb__separator">/</span>
        <a href="{{ route('marcas.show', $marca->slug) }}">{{ $marca->nombre }}</a>
        <span class="page-breadcrumb__separator">/</span>
        <span class="page-breadcrumb__current">{{ $modelo->nombre }}</span>
    </div>
</nav>

{{-- CUERPO PRINCIPAL DEL SHOWROOM --}}
<div class="modelo-wrapper">
    <div class="modelo-layout">
        
        {{-- COLUMNA IZQUIERDA: SHOWCASE DEL VEHÍCULO, SPECS Y VERSIONES --}}
        <div class="modelo-main">
            
            {{-- Encabezado del Modelo --}}
            <div class="modelo-header">
                <div class="modelo-header__tags">
                    <span class="modelo-badge">{{ $marca->nombre }} Oficial</span>
                    @if($modelo->tipo)
                    <span class="modelo-type-badge">{{ $modelo->tipo }}</span>
                    @endif
                </div>
                <h1 class="modelo-title">{{ $modelo->nombre }}</h1>
                <p class="modelo-desc">
                    {{ $modelo->descripcion ?? 'Experimenta el máximo confort, tecnología y seguridad de fábrica con el respaldo y garantía oficial de MSA Automotriz.' }}
                </p>
            </div>

            {{-- Escenario del Vehículo (Foto Completa en Alta Resolución) --}}
            @php
                if ($modelo->imagen) {
                    $carImg = str_starts_with($modelo->imagen, 'http') ? $modelo->imagen : asset($modelo->imagen);
                } elseif ($marca->imagen_hero) {
                    $carImg = str_starts_with($marca->imagen_hero, 'http') ? $marca->imagen_hero : asset($marca->imagen_hero);
                } else {
                    $carImg = asset('img/localprueba.jpg');
                }
            @endphp
            <div class="modelo-stage">
                <div class="modelo-stage__img-wrap">
                    <img src="{{ $carImg }}" alt="{{ $modelo->nombre }} - {{ $marca->nombre }}" class="modelo-stage__img">
                </div>
                <div class="modelo-stage__floor-shadow"></div>
            </div>

            {{-- Ficha Rápida / Especificaciones Clave --}}
            <div class="modelo-section-block">
                <h3 class="modelo-block-title">Especificaciones Clave</h3>
                <div class="modelo-specs-grid">
                    <div class="spec-card">
                        <span class="spec-card__label">Marca Oficial</span>
                        <strong class="spec-card__val">{{ $marca->nombre }}</strong>
                    </div>
                    <div class="spec-card">
                        <span class="spec-card__label">Modelo</span>
                        <strong class="spec-card__val">{{ $modelo->nombre }}</strong>
                    </div>
                    @if($modelo->tipo)
                    <div class="spec-card">
                        <span class="spec-card__label">Carrocería</span>
                        <strong class="spec-card__val">{{ $modelo->tipo }}</strong>
                    </div>
                    @endif
                    @if($modelo->precio || $modelo->precio_dolares)
                    <div class="spec-card spec-card--highlight">
                        <span class="spec-card__label">Precio Referencial</span>
                        @if($modelo->precio)
                        <strong class="spec-card__val spec-card__val--red">S/ {{ number_format($modelo->precio, 0, '.', ',') }}</strong>
                        @endif
                        @if($modelo->precio_dolares)
                        <span class="spec-card__sub">$ {{ number_format($modelo->precio_dolares, 0, '.', ',') }} USD</span>
                        @endif
                    </div>
                    @endif
                </div>
            </div>

            {{-- Pilares de Calidad y Confianza MSA --}}
            <div class="modelo-trust-strip">
                <div class="trust-item">
                    <div class="trust-item__icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                    </div>
                    <div class="trust-item__text">
                        <strong>Garantía de Fábrica</strong>
                        <span>Respaldo oficial de marca</span>
                    </div>
                </div>

                <div class="trust-item">
                    <div class="trust-item__icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                    </div>
                    <div class="trust-item__text">
                        <strong>Entrega Inmediata</strong>
                        <span>Unidades en stock</span>
                    </div>
                </div>

                <div class="trust-item">
                    <div class="trust-item__icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg>
                    </div>
                    <div class="trust-item__text">
                        <strong>Crédito Flexible</strong>
                        <span>Cuotas a tu medida</span>
                    </div>
                </div>
            </div>

            {{-- VERSIONES DISPONIBLES --}}
            @if($modelo->versiones->isNotEmpty())
            <div class="modelo-section-block">
                <h3 class="modelo-block-title">Versiones Disponibles</h3>
                <p class="modelo-block-desc">Selecciona la versión para conocer su equipamiento destacado y precio.</p>
                
                {{-- Tabs de Versiones --}}
                <div class="versiones-tabs">
                    @foreach($modelo->versiones as $i => $version)
                    <button type="button" class="version-tab {{ $i === 0 ? 'active' : '' }}" data-tab="version-{{ $version->id }}">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                        <span>{{ $version->nombre }}</span>
                    </button>
                    @endforeach
                </div>

                {{-- Paneles de Versiones --}}
                <div class="versiones-panels-wrap">
                    @foreach($modelo->versiones as $i => $version)
                    @php
                        $vImg = $version->imagen
                            ? (str_starts_with($version->imagen, 'http') ? $version->imagen : asset($version->imagen))
                            : $carImg;
                    @endphp
                    <div class="version-panel {{ $i === 0 ? 'active' : '' }}" id="version-{{ $version->id }}">
                        
                        <div class="version-panel__media">
                            <img src="{{ $vImg }}" alt="{{ $modelo->nombre }} {{ $version->nombre }}" class="version-panel__img">
                        </div>

                        <div class="version-panel__info">
                            <span class="version-panel__tag">{{ $marca->nombre }} Oficial</span>
                            <h4 class="version-panel__name">{{ $modelo->nombre }} — {{ $version->nombre }}</h4>
                            
                            @if($version->descripcion)
                            @php $items = array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', $version->descripcion))); @endphp
                            <ul class="version-panel__features">
                                @foreach($items as $item)
                                <li>
                                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                                    <span>{{ $item }}</span>
                                </li>
                                @endforeach
                            </ul>
                            @endif

                            @if($version->precio || $version->precio_dolares)
                            <div class="version-panel__prices">
                                <span class="version-panel__price-label">Precio desde:</span>
                                <div class="version-panel__price-row">
                                    @if($version->precio)
                                    <strong class="version-panel__price-soles">S/ {{ number_format($version->precio, 0, '.', ',') }}</strong>
                                    @endif
                                    @if($version->precio_dolares)
                                    <span class="version-panel__price-usd">($ {{ number_format($version->precio_dolares, 0, '.', ',') }} USD)</span>
                                    @endif
                                </div>
                            </div>
                            @endif

                            <a href="{{ route('contacto') }}?marca={{ $marca->slug }}&modelo={{ urlencode($modelo->nombre . ' ' . $version->nombre) }}" class="version-panel__btn">
                                <span>Cotizar esta versión</span>
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                            </a>
                        </div>

                    </div>
                    @endforeach
                </div>
            </div>
            @endif

        </div>

        {{-- COLUMNA DERECHA: TARJETA LATERAL STICKY DE COTIZACIÓN --}}
        <aside class="modelo-sidebar">
            <div class="modelo-quote-card">
                
                <div class="modelo-quote-card__header">
                    <span class="modelo-quote-card__badge">Cotización Oficial</span>
                    
                    @if($modelo->precio || $modelo->precio_dolares)
                    <div class="modelo-quote-card__price-wrap">
                        <span class="modelo-quote-card__price-label">Precio referencial desde</span>
                        @if($modelo->precio)
                        <div class="modelo-quote-card__price-soles"><span>S/ </span>{{ number_format($modelo->precio, 0, '.', ',') }}</div>
                        @endif
                        @if($modelo->precio_dolares)
                        <div class="modelo-quote-card__price-usd">o $ {{ number_format($modelo->precio_dolares, 0, '.', ',') }} USD</div>
                        @endif
                    </div>
                    @else
                    <div class="modelo-quote-card__price-empty">
                        Consulta precio especial y promociones vigentes con nuestros asesores de marca.
                    </div>
                    @endif
                </div>

                <div class="modelo-quote-card__actions">
                    <a href="{{ route('contacto') }}?marca={{ $marca->slug }}&modelo={{ urlencode($modelo->nombre) }}" class="quote-btn quote-btn--primary">
                        <span>Solicitar Cotización</span>
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </a>

                    <a href="https://wa.me/51966154210?text={{ urlencode('¡Hola! Deseo cotizar el modelo ' . $marca->nombre . ' ' . $modelo->nombre . ' en MSA Automotriz.') }}"
                       target="_blank" rel="noopener"
                       class="quote-btn quote-btn--wa">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413z"/></svg>
                        <span>Consultar por WhatsApp</span>
                    </a>
                </div>

                <div class="modelo-quote-card__footer">
                    <div class="quote-check">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                        <span>Atención inmediata por asesor oficial</span>
                    </div>
                    <div class="quote-check">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                        <span>Cotización sin compromiso</span>
                    </div>
                </div>

            </div>
        </aside>

    </div>
</div>

{{-- SECCIÓN OTROS MODELOS DE LA MARCA --}}
@if($otrosModelos->isNotEmpty())
@php
    $otrosPorTipo = $otrosModelos->groupBy(function($m) {
        return trim($m->tipo) !== '' ? trim($m->tipo) : 'General';
    });
@endphp
<section class="otros-modelos-section">
    <div class="otros-modelos-container">
        
        <div class="section-header">
            <span class="section-tag">Línea {{ $marca->nombre }}</span>
            <h2 class="section-title">Otros Modelos {{ $marca->nombre }}</h2>
            <p class="section-subtitle">Explora los vehículos organizados por categoría disponibles en nuestros concesionarios oficiales.</p>
        </div>

        {{-- Filtros por Categoría --}}
        @if($otrosPorTipo->count() > 1)
        <div class="otros-tabs">
            @foreach($otrosPorTipo as $tipoNombre => $modelosTipo)
            <button type="button" class="otros-tab {{ $loop->first ? 'active' : '' }}" data-filter="{{ Str::slug($tipoNombre) }}">
                <span>{{ $tipoNombre }}</span>
                <span class="otros-tab__count">{{ $modelosTipo->count() }}</span>
            </button>
            @endforeach
        </div>
        @endif

        @php
            $firstCatSlug = Str::slug($otrosPorTipo->keys()->first());
            $hasMultipleCats = $otrosPorTipo->count() > 1;
        @endphp

        <div class="otros-grid">
            @foreach($otrosModelos as $otro)
            @php 
                $otroImg = $otro->imagen ? (str_starts_with($otro->imagen, 'http') ? $otro->imagen : asset($otro->imagen)) : null;
                $catSlug = Str::slug(trim($otro->tipo) !== '' ? trim($otro->tipo) : 'general');
            @endphp
            <a href="{{ route('modelos.show', [$marca->slug, $otro->slug]) }}" 
               class="otro-card"
               data-category="{{ $catSlug }}"
               @if($hasMultipleCats && $catSlug !== $firstCatSlug) style="display: none;" @endif>
                
                <div class="otro-card__media">
                    @if($otroImg)
                    <img src="{{ $otroImg }}" alt="{{ $otro->nombre }}" class="otro-card__img" loading="lazy">
                    @else
                    <div class="otro-card__placeholder">
                        <svg width="48" height="32" viewBox="0 0 64 40" fill="none" stroke="currentColor" stroke-width="2"><path d="M8 30l6-14h36l6 14"/><rect x="4" y="30" width="56" height="9" rx="3"/><circle cx="16" cy="39" r="4"/><circle cx="48" cy="39" r="4"/></svg>
                    </div>
                    @endif
                    @if($otro->tipo)
                    <span class="otro-card__badge">{{ $otro->tipo }}</span>
                    @endif
                </div>

                <div class="otro-card__body">
                    <h4 class="otro-card__name">{{ $otro->nombre }}</h4>
                    <div class="otro-card__price">
                        @if($otro->precio)
                        <span>Desde: <strong>S/ {{ number_format($otro->precio, 0, '.', ',') }}</strong></span>
                        @else
                        <span class="otro-card__price--consultar">Consultar precio</span>
                        @endif
                    </div>
                    <span class="otro-card__link">
                        <span>Ver modelo</span>
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

@section('scripts')
<script src="{{ asset('js/modelo_detalle.js') }}?v=30"></script>
@endsection
