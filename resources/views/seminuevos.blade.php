@extends('layouts.app')

@section('title', 'Seminuevos - MSA Automotriz')
@section('styles') 
<link rel="stylesheet" href="{{ asset('css/pages.css') }}">
<link rel="stylesheet" href="{{ asset('css/seminuevos.css') }}">
@endsection

@section('content')
<div class="page-hero" style="background-image: url('{{ asset('img/seminuevos/baner_semi.jpg') }}');">
    <div class="page-hero__overlay"></div>
    <div class="page-hero__content">
        <span class="page-hero__badge">MSA Automotriz</span>
        <h1 class="page-hero__title">SEMINUEVOS</h1>
        <p class="page-hero__sub">Vehículos de calidad, inspeccionados y listos para rodar.</p>
    </div>
</div>

<div class="page-breadcrumb">
    <a href="{{ route('home') }}">Inicio</a>
    <span>/</span>
    Seminuevos
</div>

<div class="seminuevos-grid">
    @foreach($seminuevos as $seminuevo)
    <div class="seminuevo-item">
        <a href="{{ route('seminuevos.show', $seminuevo->slug) }}">
            @php $imgUrl = $seminuevo->imagen_url; @endphp
            @if($imgUrl)
            <img src="{{ $imgUrl }}" alt="{{ $seminuevo->nombre }}" class="seminuevo-item__img" loading="lazy">
            @endif
            <div class="seminuevo-item__info">
                <h2 class="seminuevo-item__title">{{ $seminuevo->nombre }}</h2>
                @if($seminuevo->precio)
                <p class="seminuevo-item__price">S/. {{ number_format($seminuevo->precio, 2) }}</p>
                @endif
                @if($seminuevo->precio_dolares)
                <p class="seminuevo-item__price-usd">$ {{ number_format($seminuevo->precio_dolares, 2) }}</p>
                @endif
            </div>
        </a>
    </div>
    @endforeach
</div>
@endsection


