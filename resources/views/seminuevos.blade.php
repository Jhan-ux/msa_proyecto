@extends('layouts.app')
@section('title', 'Seminuevos Certificados - MSA Automotriz')

@section('styles') 
<link rel="stylesheet" href="{{ asset('css/pages.css') }}">
<link rel="stylesheet" href="{{ asset('css/seminuevos.css') }}?v=13">
@endsection

@section('content')

{{-- HERO --}}
<div class="page-hero" style="background-image: url('{{ asset('img/seminuevos/baner_semi.jpg') }}');">
    <div class="page-hero__overlay"></div>
    <div class="page-hero__content">
        <span class="page-hero__badge">Seminuevos Certificados</span>
        <h1 class="page-hero__title">Vehículos Garantizados</h1>
        <p class="page-hero__sub">Unidades rigurosamente inspeccionadas, con papeles en regla y listas para entrega inmediata.</p>
    </div>
</div>

{{-- BREADCRUMB --}}
<nav class="page-breadcrumb">
    <a href="{{ route('home') }}">Inicio</a>
    <span>/</span>
    <span>Seminuevos</span>
</nav>

{{-- BARRA DE CONFIANZA Y GARANTÍAS --}}
<div class="seminuevos-trust-bar">
    <div class="seminuevos-trust-inner">
        <div class="sn-trust-col">
            <div class="sn-trust-icon">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
            </div>
            <div>
                <div class="sn-trust-title">Garantía Mecánica</div>
                <div class="sn-trust-desc">Respaldo oficial de MSA Automotriz</div>
            </div>
        </div>
        <div class="sn-trust-col">
            <div class="sn-trust-icon">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
            </div>
            <div>
                <div class="sn-trust-title">Inspección 100 Puntos</div>
                <div class="sn-trust-desc">Revisión estética y computarizada</div>
            </div>
        </div>
        <div class="sn-trust-col">
            <div class="sn-trust-icon">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
            </div>
            <div>
                <div class="sn-trust-title">Papeles en Regla</div>
                <div class="sn-trust-desc">Sin gravámenes ni multas pendientes</div>
            </div>
        </div>
        <div class="sn-trust-col">
            <div class="sn-trust-icon">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 16V4m0 0L3 8m4-4l4 4m6 4v12m0 0l4-4m-4 4l-4-4"/></svg>
            </div>
            <div>
                <div class="sn-trust-title">Recibimos tu Auto</div>
                <div class="sn-trust-desc">Como parte de pago de inmediato</div>
            </div>
        </div>
    </div>
</div>

{{-- CATÁLOGO DE SEMINUEVOS --}}
<div class="seminuevos-grid">
    @forelse($seminuevos as $seminuevo)
    <div class="seminuevo-item">
        <a href="{{ route('seminuevos.show', $seminuevo->slug) }}">
            @php $imgUrl = $seminuevo->imagen_url; @endphp
            <div class="seminuevo-item__img-wrap">
                <span class="seminuevo-item__badge">Certificado MSA</span>
                @if($imgUrl)
                <img src="{{ $imgUrl }}" alt="{{ $seminuevo->nombre }}" class="seminuevo-item__img" loading="lazy">
                @else
                <div style="height:100%; display:flex; align-items:center; justify-content:center; background:#1e293b;">
                    <svg width="56" height="56" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.2)" stroke-width="1.2"><path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.4 2.9C2.1 11 2 11.5 2 12v4c0 .6.4 1 1 1h2"/><circle cx="7" cy="17" r="2"/><circle cx="17" cy="17" r="2"/></svg>
                </div>
                @endif
            </div>
            <div class="seminuevo-item__info">
                <h3 class="seminuevo-item__title">{{ $seminuevo->nombre }}</h3>
                <div class="seminuevo-item__prices">
                    @if($seminuevo->precio)
                    <span class="seminuevo-item__price">S/ {{ number_format($seminuevo->precio, 2) }}</span>
                    @endif
                    @if($seminuevo->precio_dolares)
                    <span class="seminuevo-item__price-usd">$ {{ number_format($seminuevo->precio_dolares, 2) }} USD</span>
                    @endif
                </div>
                <span class="seminuevo-item__btn">
                    <span>Ver ficha técnica</span>
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </span>
            </div>
        </a>
    </div>
    @empty
    <div class="seminuevos-empty">
        <p>De momento no hay vehículos seminuevos registrados en stock. Consulta con nuestros asesores comerciales por próximas unidades.</p>
    </div>
    @endforelse
</div>

@endsection