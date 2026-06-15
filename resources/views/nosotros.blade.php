@extends('layouts.app')
@section('title', 'Quiénes Somos - MSA Automotriz')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/pages.css') }}">
<link rel="stylesheet" href="{{ asset('css/nosotros.css') }}">
@endsection

@section('content')

<div class="page-hero" style="background-image: url('{{ asset('img/foto_equipo.jfif') }}');">
    <div class="page-hero__overlay"></div>
    <div class="page-hero__content">
        <span class="page-hero__badge">MSA Automotriz</span>
        <h1 class="page-hero__title">QUI&Eacute;NES SOMOS</h1>
        <p class="page-hero__sub">M&aacute;s de 19 a&ntilde;os siendo el concesionario de confianza en Cajamarca.</p>
    </div>
</div>

<nav class="page-breadcrumb">
    <a href="{{ route('home') }}">Inicio</a>
    <span>/</span>
    Qui&eacute;nes Somos
</nav>

<section class="nosotros-historia">
    <div class="nosotros-historia__texto">
        <span class="nosotros-historia__label">Nuestra Historia</span>
        <h2 class="nosotros-historia__title">M&aacute;s de <span>19 a&ntilde;os</span><br>moviendo a Cajamarca</h2>
        <p class="nosotros-historia__text">MSA Automotriz naci&oacute; en Cajamarca con un prop&oacute;sito claro: brindar acceso a veh&iacute;culos de calidad con una atenci&oacute;n cercana y honesta. Desde nuestros inicios como un peque&ntilde;o distribuidor local, hemos crecido hasta convertirnos en el concesionario multimarca de referencia de la regi&oacute;n.</p>
        <p class="nosotros-historia__text">Hoy representamos 10 marcas de primer nivel &mdash; desde autos, camionetas y motos hasta camiones de carga pesada &mdash; con presencia en dos sedes estrat&eacute;gicas en Cajamarca y Ba&ntilde;os del Inca.</p>
    </div>
    <img src="{{ asset('img/localprueba.jpg') }}" alt="Local MSA Automotriz Cajamarca" class="nosotros-historia__img">
</section>

<div class="nosotros-stats">
    <div class="nosotros-stats__inner">
        <div class="stat-item"><div class="stat-item__number">19+</div><div class="stat-item__label">A&ntilde;os de experiencia</div></div>
        <div class="stat-item"><div class="stat-item__number">10</div><div class="stat-item__label">Marcas representadas</div></div>
        <div class="stat-item"><div class="stat-item__number">5,000+</div><div class="stat-item__label">Clientes satisfechos</div></div>
        <div class="stat-item"><div class="stat-item__number">3</div><div class="stat-item__label">Sedes a Nivel Nacional</div></div>
    </div>
</div>

@endsection
