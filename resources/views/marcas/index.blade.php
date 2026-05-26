@extends('layouts.app')
@section('title', 'Marcas - MSA Automotriz')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/body_marcas.css') }}">
<link rel="stylesheet" href="{{ asset('css/pages.css') }}">
@endsection

@section('content')

<div class="page-hero" style="background-image: url('{{ asset('img/localprueba.jpg') }}');">
    <div class="page-hero__overlay"></div>
    <div class="page-hero__content">
        <span class="page-hero__badge">MSA Automotriz</span>
        <h1 class="page-hero__title">NUESTRAS MARCAS</h1>
        <p class="page-hero__sub">10 marcas de primer nivel para que encuentres el vehículo que buscas.</p>
    </div>
</div>

<nav class="page-breadcrumb">
    <a href="{{ route('home') }}">Inicio</a>
    <span>/</span>
    Marcas
</nav>

<section class="brands-section">
    <h2 class="brands-title">Nuestras Marcas</h2>
    <p class="brands-subtitle">Encuentra el vehículo ideal entre nuestras marcas aliadas</p>
    <div class="brands-grid">
        @foreach ($marcas as $marca)
        <a href="{{ route('marcas.show', $marca->slug) }}" class="brand-card">
            <div class="brand-card__icon"></div>
            <h3 class="brand-card__name">{{ $marca->nombre }}</h3>
            <p class="brand-card__desc">{{ $marca->descripcion }}</p>
            <span class="brand-card__link">Ver modelos &rarr;</span>
        </a>
        @endforeach
    </div>
</section>

@endsection
