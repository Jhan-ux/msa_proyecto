@extends('layouts.app')
@section('title', 'Nuestras Marcas Oficiales - MSA Automotriz')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/pages.css') }}">
<link rel="stylesheet" href="{{ asset('css/body_marcas.css') }}?v=30">
@endsection

@section('content')

{{-- BREADCRUMB --}}
<nav class="page-breadcrumb">
    <div class="page-breadcrumb__inner">
        <a href="{{ route('home') }}">Inicio</a>
        <span class="page-breadcrumb__separator">/</span>
        <span class="page-breadcrumb__current">Marcas Oficiales</span>
    </div>
</nav>

{{-- SECCIÓN PRINCIPAL DE MARCAS --}}
<section class="brands-section">
    <div class="brands-container">
        
        {{-- Encabezado Principal con Diseño Dinámico --}}
        <div class="brands-header">
            <span class="brands-header__tag">
                <span class="tag-dot"></span> Red Oficial de Concesionarios
            </span>
            <h1 class="brands-header__title">NUESTRAS MARCAS</h1>
            <p class="brands-header__desc">
                Representamos con orgullo a las marcas automotrices líderes del mercado. Encuentra vehículos 0 Km con garantía de fábrica, servicio técnico especializado y financiamiento a tu medida.
            </p>

            {{-- Badges de Confianza Rápidos --}}
            <div class="brands-header__pills">
                <span class="header-pill">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                    Respaldo de Fábrica
                </span>
                <span class="header-pill">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                    Entrega Inmediata
                </span>
                <span class="header-pill">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg>
                    Crédito Vehicular
                </span>
            </div>
        </div>

        {{-- Grilla de Marcas --}}
        <div class="brands-grid">
            @foreach ($marcas as $marca)
            <a href="{{ route('marcas.show', $marca->slug) }}" class="brand-card">
                
                <div class="brand-card__media">
                    @if($marca->imagen)
                    @php $logoUrl = str_starts_with($marca->imagen, 'http') ? $marca->imagen : asset($marca->imagen); @endphp
                    <img src="{{ $logoUrl }}" alt="Logo {{ $marca->nombre }}" class="brand-card__logo" loading="lazy">
                    @endif
                </div>

                <div class="brand-card__body">
                    <h2 class="brand-card__name">{{ $marca->nombre }}</h2>
                    <p class="brand-card__desc">{{ $marca->descripcion ?? 'Gama completa de vehículos nuevos con garantía directa de fábrica.' }}</p>
                    
                    <span class="brand-card__btn">
                        <span>Ver modelos</span>
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </span>
                </div>

            </a>
            @endforeach
        </div>

        {{-- Strip de Garantía y Beneficios --}}
        <div class="brands-trust-strip">
            <div class="trust-pill">
                <div class="trust-pill__icon">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                </div>
                <div>
                    <strong>Garantía de Fábrica</strong>
                    <span>Respaldo y soporte de cada fabricante</span>
                </div>
            </div>

            <div class="trust-pill">
                <div class="trust-pill__icon">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                </div>
                <div>
                    <strong>Servicio Técnico Autorizado</strong>
                    <span>Mantenimiento con repuestos genuinos</span>
                </div>
            </div>

            <div class="trust-pill">
                <div class="trust-pill__icon">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg>
                </div>
                <div>
                    <strong>Financiamiento Directo</strong>
                    <span>Planes y créditos vehiculares a tu medida</span>
                </div>
            </div>
        </div>

    </div>
</section>

@endsection
