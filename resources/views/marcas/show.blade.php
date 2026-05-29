@extends('layouts.app')
@section('title', $marca->nombre . ' - MSA Automotriz')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/marca_page.css') }}">
<link rel="stylesheet" href="{{ asset('css/pages.css') }}">
<link rel="stylesheet" href="{{ asset('css/body_modelos.css') }}">
<style>
.models-section {
    padding: 60px 32px 80px;
    max-width: 1400px;
    margin: 0 auto;
    text-align: center;
}
.models-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 24px;
    margin-top: 40px;
}
.model-card {
    background: #fff;
    border: 1px solid #e8e8e8;
    border-radius: 12px;
    overflow: hidden;
    text-align: left;
    transition: transform 0.22s ease, box-shadow 0.22s ease, border-color 0.22s ease;
    box-shadow: 0 2px 8px rgba(0,0,0,0.06);
}
.model-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 32px rgba(0,0,0,0.12);
    border-color: #cc1111;
}
.model-card__img {
    position: relative;
    height: 180px;
    background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    background-size: cover;
    background-position: center;
}
.model-card__img-placeholder {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 8px;
    opacity: 0.55;
}
.model-card__img-placeholder svg { width: 52px; height: 52px; }
.model-card__img-placeholder span {
    color: #fff;
    font-size: 0.7rem;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    font-weight: 600;
}
.model-card__badge {
    position: absolute;
    bottom: 0;
    left: 0;
    background: #cc1111;
    color: #fff;
    font-size: 0.68rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.06em;
    padding: 4px 12px;
    border-radius: 0;
}
.model-card__tipo {
    position: absolute;
    bottom: 0;
    right: 0;
    background: #111;
    color: #fff;
    font-size: 0.65rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.06em;
    padding: 4px 10px;
    border-radius: 0;
}
.model-card__body {
    padding: 18px 20px 20px;
}
.model-card__name {
    font-size: 1.05rem;
    font-weight: 700;
    color: #111;
    margin-bottom: 6px;
    letter-spacing: 0.01em;
}
.model-card__desc {
    font-size: 0.84rem;
    color: #666;
    line-height: 1.5;
    margin-bottom: 14px;
}
.model-card__price {
    font-size: 0.95rem;
    font-weight: 700;
    color: #cc1111;
    margin-bottom: 14px;
}
.model-card__btn {
    display: inline-block;
    background: #111;
    color: #fff;
    font-size: 0.8rem;
    font-weight: 600;
    padding: 9px 18px;
    border-radius: 6px;
    text-decoration: none;
    letter-spacing: 0.03em;
    transition: background 0.2s;
}
.model-card__btn:hover { background: #cc1111; }
.section-title {
    font-size: 1.9rem;
    font-weight: 800;
    color: #111;
    margin-bottom: 8px;
}
.section-title::after {
    content: '';
    display: block;
    width: 48px;
    height: 3px;
    background: #cc1111;
    margin: 10px auto 0;
    border-radius: 2px;
}
.section-subtitle { color: #666; font-size: 0.95rem; margin-top: 12px; }
@media (max-width: 1100px) { .models-grid { grid-template-columns: repeat(3, 1fr); } }
@media (max-width: 750px)  { .models-grid { grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 480px)  { .models-grid { grid-template-columns: 1fr; } }
</style>
@endsection

@section('content')

@php $heroUrl = $marca->imagen_hero ? (str_starts_with($marca->imagen_hero, 'http') ? $marca->imagen_hero : asset($marca->imagen_hero)) : asset('img/localprueba.jpg'); @endphp
<div class="page-hero" style="background-image: url('{{ $heroUrl }}');">
    <div class="page-hero__overlay"></div>
    <div class="page-hero__content">
        <span class="page-hero__badge">MSA Automotriz</span>
        <h1 class="page-hero__title">{{ strtoupper($marca->nombre) }}</h1>
        <p class="page-hero__sub">{{ $marca->descripcion }}</p>
    </div>
</div>

<nav class="page-breadcrumb">
    <a href="{{ route('home') }}">Inicio</a>
    <span>/</span>
    <a href="{{ route('marcas.index') }}">Marcas</a>
    <span>/</span>
    {{ $marca->nombre }}
</nav>

<section class="models-section">
    <h2 class="section-title">Modelos {{ $marca->nombre }}</h2>
    <p class="section-subtitle">Descubre toda la línea de vehículos disponibles</p>
    <div class="models-grid">
        @forelse ($modelos as $modelo)
        <a href="{{ route('modelos.show', [$marca->slug, $modelo->slug]) }}" class="model-card" style="text-decoration:none;color:inherit;display:block;">
            @php $mdlImg = $modelo->imagen ? (str_starts_with($modelo->imagen, 'http') ? $modelo->imagen : asset($modelo->imagen)) : null; @endphp
            <div class="model-card__img" @if($mdlImg) style="background-image:url('{{ $mdlImg }}')" @endif>
                <span class="model-card__badge">{{ $marca->nombre }}</span>
                @if($modelo->tipo)
                <span class="model-card__tipo">{{ $modelo->tipo }}</span>
                @endif
                @unless($modelo->imagen)
                <div class="model-card__img-placeholder">
                    <svg viewBox="0 0 64 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8 30l6-14h36l6 14" stroke="#fff" stroke-width="2.5" stroke-linejoin="round"/>
                        <rect x="4" y="30" width="56" height="9" rx="3" stroke="#fff" stroke-width="2.5"/>
                        <circle cx="16" cy="39" r="4" stroke="#fff" stroke-width="2.5"/>
                        <circle cx="48" cy="39" r="4" stroke="#fff" stroke-width="2.5"/>
                        <path d="M24 16h16M22 21h20" stroke="#fff" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                    <span>{{ $modelo->nombre }}</span>
                </div>
                @endunless
            </div>
            <div class="model-card__body">
                <h3 class="model-card__name">{{ $modelo->nombre }}</h3>
                <p class="model-card__desc">{{ $modelo->descripcion }}</p>
                @if($modelo->precio)
                <p class="model-card__price">Desde S/ {{ number_format($modelo->precio, 0, '.', ',') }}</p>
                @endif
                <span class="model-card__btn">Ver detalles</span>
            </div>
        </a>
        @empty
        <p style="grid-column:1/-1;text-align:center;color:#888;padding:40px 0;">Próximamente más modelos disponibles.</p>
        @endforelse
    </div>
</section>

@endsection
