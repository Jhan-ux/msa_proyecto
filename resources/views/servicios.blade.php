@extends('layouts.app')
@section('title', 'Posventa - MSA Automotriz')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/pages.css') }}">
<link rel="stylesheet" href="{{ asset('css/servicios.css') }}">
@endsection

@section('content')

<div class="page-hero" style="background-image: url('{{ asset('img/posventa/baner.jfif') }}');">
    <div class="page-hero__overlay"></div>
    <div class="page-hero__content">
        <span class="page-hero__badge">MSA Automotriz</span>
        <h1 class="page-hero__title">POSVENTA</h1>
        <p class="page-hero__sub">Cuidamos tu veh&iacute;culo en cada etapa con servicios de calidad.</p>
    </div>
</div>

<nav class="page-breadcrumb">
    <a href="{{ route('home') }}">Inicio</a>
    <span>/</span>
    Posventa
</nav>

<section class="servicios-section">
    <h2 class="section-title">Nuestros Servicios</h2>
    <p class="section-subtitle">Descubre todo lo que podemos hacer por tu vehículo</p>
    <div class="servicios-grid">
        @forelse($servicios as $servicio)
        <a href="{{ route('servicios.show', $servicio->slug) }}" class="servicio-card">
            @if($servicio->imagen)
                @php
                    $svcImg = $servicio->imagen;
                    if (str_starts_with($svcImg, 'http')) {
                        $svcImg = $svcImg;
                    } elseif (str_starts_with($svcImg, 'img/') || str_starts_with($svcImg, 'storage/')) {
                        $svcImg = asset($svcImg);
                    } else {
                        $svcImg = asset('storage/' . ltrim($svcImg, '/'));
                    }
                @endphp
                <div class="servicio-card__img" style="background-image:url('{{ $svcImg }}')"></div>
            @else
                <div class="servicio-card__img">
                    <div class="servicio-card__img-placeholder">
                        <svg viewBox="0 0 24 24" fill="none" stroke="#777" stroke-width="1.4" stroke-linecap="round">
                            <circle cx="12" cy="12" r="3"></circle>
                            <path d="M12 2v3M12 19v3M4.22 4.22l2.12 2.12M17.66 17.66l2.12 2.12M2 12h3M19 12h3M4.22 19.78l2.12-2.12M17.66 6.34l2.12-2.12"></path>
                        </svg>
                    </div>
                </div>
            @endif
            <div class="servicio-card__body">
                <h3 class="servicio-card__title">{{ $servicio->nombre }}</h3>
                <p class="servicio-card__desc">{{ $servicio->descripcion }}</p>
                <span class="servicio-card__btn">Ver más</span>
            </div>
        </a>
        @empty
        {{-- Fallback mientras no haya datos en la BD --}}
        @foreach([
            ['Promociones',          'Ofertas especiales en vehículos y accesorios'],
            ['Accesorios',           'Equipamiento original para tu vehículo'],
            ['Mantenimiento',        'Servicio técnico certificado por marca'],
            ['Repuestos',            'Repuestos originales disponibles'],
            ['Carrocería y Pintura', 'Reparación profesional de carrocería'],
            ['Seguros',              'Planes de seguro para tu tranquilidad'],
            ['Agenda tu Cita',       'Reserva tu cita de mantenimiento online'],
        ] as [$nombre, $desc])
        <div class="servicio-card">
            <div class="servicio-card__img">
                <div class="servicio-card__img-placeholder">
                    <svg viewBox="0 0 24 24" fill="none" stroke="#777" stroke-width="1.4" stroke-linecap="round">
                        <circle cx="12" cy="12" r="3"></circle>
                        <path d="M12 2v3M12 19v3M4.22 4.22l2.12 2.12M17.66 17.66l2.12 2.12M2 12h3M19 12h3M4.22 19.78l2.12-2.12M17.66 6.34l2.12-2.12"></path>
                    </svg>
                </div>
            </div>
            <div class="servicio-card__body">
                <h3 class="servicio-card__title">{{ $nombre }}</h3>
                <p class="servicio-card__desc">{{ $desc }}</p>
                <span class="servicio-card__btn">Ver más</span>
            </div>
        </div>
        @endforeach
        @endforelse
    </div>
</section>

@endsection
