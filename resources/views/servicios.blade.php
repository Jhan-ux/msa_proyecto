@extends('layouts.app')
@section('title', 'Posventa - MSA Automotriz')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/pages.css') }}">
<link rel="stylesheet" href="{{ asset('css/servicios.css') }}">
@endsection

@section('content')

<div class="page-hero" style="background-image: url('{{ asset('img/localprueba.jpg') }}');">
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

<section style="max-width:1200px;margin:48px auto;padding:0 24px;">
    <h2 style="text-align:center;margin-bottom:32px;">Nuestros Servicios</h2>
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(250px,1fr));gap:24px;">
        @forelse($servicios as $servicio)
        <a href="{{ route('servicios.show', $servicio->slug) }}" style="background:#fff;border-radius:10px;padding:24px;box-shadow:0 2px 12px rgba(0,0,0,.08);text-align:center;text-decoration:none;color:inherit;display:block;transition:transform .2s,box-shadow .2s;" onmouseover="this.style.transform='translateY(-4px)';this.style.boxShadow='0 8px 24px rgba(0,0,0,.13)'" onmouseout="this.style.transform='';this.style.boxShadow='0 2px 12px rgba(0,0,0,.08)'">
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
                <img src="{{ $svcImg }}" alt="{{ $servicio->nombre }}" style="width:100%;max-height:160px;object-fit:cover;border-radius:6px;margin-bottom:12px;">
            @endif
            <h3 style="margin-bottom:8px;">{{ $servicio->nombre }}</h3>
            <p style="color:#666;">{{ $servicio->descripcion }}</p>
            <span style="display:inline-block;margin-top:12px;background:#cc1111;color:#fff;font-size:.8rem;font-weight:700;padding:7px 16px;border-radius:6px;">Ver más &rsaquo;</span>
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
        <div style="background:#fff;border-radius:10px;padding:24px;box-shadow:0 2px 12px rgba(0,0,0,.08);text-align:center;">
            <h3 style="margin-bottom:8px;">{{ $nombre }}</h3>
            <p style="color:#666;">{{ $desc }}</p>
        </div>
        @endforeach
        @endforelse
    </div>
</section>

@endsection
