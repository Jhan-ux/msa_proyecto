@extends('layouts.app')
@section('title', $seminuevo->nombre . ' - MSA Automotriz')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/pages.css') }}">
<style>
.sn-hero {
    position: relative;
    height: 420px;
    background: linear-gradient(135deg, #111 0%, #2d2d2d 100%);
    display: flex;
    align-items: flex-end;
    overflow: hidden;
}
.sn-hero__img {
    position: absolute;
    inset: 0;
    background-size: cover;
    background-position: center;
    opacity: 0.45;
}
.sn-hero__overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(to top, rgba(0,0,0,0.88) 0%, rgba(0,0,0,0.15) 60%, transparent 100%);
}
.sn-hero__content {
    position: relative;
    z-index: 2;
    padding: 0 48px 44px;
    color: #fff;
}
.sn-hero__badge {
    display: inline-block;
    background: #cc1111;
    color: #fff;
    font-size: 0.72rem;
    font-weight: 700;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    padding: 4px 12px;
    border-radius: 4px;
    margin-bottom: 10px;
}
.sn-hero__title {
    font-size: 2.6rem;
    font-weight: 900;
    margin: 0;
    text-shadow: 0 2px 12px rgba(0,0,0,0.4);
}

.sn-body {
    max-width: 1060px;
    margin: 52px auto 72px;
    padding: 0 32px;
    display: grid;
    grid-template-columns: 1fr 320px;
    gap: 48px;
    align-items: start;
}
.sn-info h2 {
    font-size: 1.4rem;
    font-weight: 800;
    color: #111;
    margin: 0 0 14px;
}
.sn-info h2::after {
    content: '';
    display: block;
    width: 40px;
    height: 3px;
    background: #cc1111;
    margin-top: 8px;
    border-radius: 2px;
}
.sn-info p {
    font-size: 1.02rem;
    color: #444;
    line-height: 1.8;
    margin-bottom: 0;
}
.sn-price {
    font-size: 1.5rem;
    font-weight: 800;
    color: #cc1111;
    margin-top: 18px;
}

.sn-cta {
    background: #fff;
    border: 1.5px solid #e8e8e8;
    border-radius: 14px;
    padding: 28px 24px;
    box-shadow: 0 4px 24px rgba(0,0,0,0.07);
    position: sticky;
    top: 100px;
    text-align: center;
}
.sn-cta h3 {
    font-size: 1.1rem;
    font-weight: 700;
    color: #111;
    margin: 0 0 20px;
}
.sn-cta__btn {
    display: block;
    width: 100%;
    box-sizing: border-box;
    background: #cc1111;
    color: #fff;
    font-weight: 700;
    font-size: 0.93rem;
    padding: 13px 16px;
    border-radius: 8px;
    text-decoration: none;
    margin-bottom: 10px;
    transition: background .2s;
}
.sn-cta__btn:hover { background: #a00d0d; }
.sn-cta__btn--wa {
    background: #25d366;
}
.sn-cta__btn--wa:hover { background: #1ebe5d; }

.sn-otros {
    max-width: 1060px;
    margin: 0 auto 64px;
    padding: 0 32px;
}
.sn-otros h3 {
    font-size: 1.2rem;
    font-weight: 800;
    color: #111;
    margin-bottom: 20px;
}
.sn-otros__grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
    gap: 18px;
}
.sn-otros__card {
    background: #fff;
    border: 1px solid #e8e8e8;
    border-left: 4px solid #cc1111;
    border-radius: 10px;
    padding: 20px 22px;
    text-decoration: none;
    color: inherit;
    transition: box-shadow .2s, transform .2s;
    display: block;
}
.sn-otros__card:hover {
    box-shadow: 0 6px 20px rgba(0,0,0,0.1);
    transform: translateY(-3px);
}
.sn-otros__card span {
    font-size: .8rem;
    font-weight: 700;
    color: #cc1111;
    text-transform: uppercase;
    letter-spacing: .06em;
}
.sn-otros__card h4 {
    font-size: 1rem;
    font-weight: 800;
    color: #111;
    margin: 6px 0 0;
}

@media (max-width: 800px) {
    .sn-body { grid-template-columns: 1fr; }
    .sn-cta { position: static; }
    .sn-hero__title { font-size: 2rem; }
    .sn-hero__content { padding: 0 24px 32px; }
}
@media (max-width: 500px) {
    .sn-hero { height: 320px; }
    .sn-hero__title { font-size: 1.6rem; }
}
</style>
@endsection

@section('content')

{{-- HERO --}}
<div class="sn-hero">
    @php $heroImg = $seminuevo->imagen_url; @endphp
    @if($heroImg)
    <div class="sn-hero__img" style="background-image:url('{{ $heroImg }}')"></div>
    @endif
    <div class="sn-hero__overlay"></div>
    <div class="sn-hero__content">
        <span class="sn-hero__badge">Seminuevos</span>
        <h1 class="sn-hero__title">{{ $seminuevo->nombre }}</h1>
    </div>
</div>

{{-- BREADCRUMB --}}
<nav class="page-breadcrumb">
    <a href="{{ route('home') }}">Inicio</a>
    <span>/</span>
    <a href="{{ route('seminuevos') }}">Seminuevos</a>
    <span>/</span>
    {{ $seminuevo->nombre }}
</nav>

{{-- CUERPO --}}
<div class="sn-body">
    <div class="sn-info">
        <h2>Detalles del vehículo</h2>
        <p>{{ $seminuevo->descripcion ?? 'Consulta con nuestros asesores para más información sobre este vehículo.' }}</p>
        @if($seminuevo->precio)
        <p class="sn-price">Precio: S/. {{ number_format($seminuevo->precio, 2) }}</p>
        @endif
        @if($seminuevo->precio_dolares)
        <p class="sn-price">Precio: $ {{ number_format($seminuevo->precio_dolares, 2) }}</p>
        @endif
    </div>

    <div class="sn-cta">
        <h3>¿Te interesa?</h3>
        <a href="{{ route('contacto') }}?asunto={{ urlencode($seminuevo->nombre) }}" class="sn-cta__btn">
            Solicitar información
        </a>
        <a href="https://wa.me/51966154210?text={{ urlencode('Hola, quiero información sobre: ' . $seminuevo->nombre) }}"
           target="_blank" rel="noopener"
           class="sn-cta__btn sn-cta__btn--wa">
            Consultar por WhatsApp
        </a>
    </div>
</div>

{{-- OTROS SEMINUEVOS --}}
@if($otros->isNotEmpty())
<div class="sn-otros">
    <h3>Otros seminuevos</h3>
    <div class="sn-otros__grid">
        @foreach($otros as $otro)
        <a href="{{ route('seminuevos.show', $otro->slug) }}" class="sn-otros__card">
            <span>Seminuevo</span>
            <h4>{{ $otro->nombre }}</h4>
            @if($otro->precio)
            <p style="margin:4px 0 0;font-weight:700;color:#cc1111;">S/. {{ number_format($otro->precio, 2) }}</p>
            @endif
        </a>
        @endforeach
    </div>
</div>
@endif

@endsection
