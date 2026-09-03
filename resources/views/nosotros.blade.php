@extends('layouts.app')
@section('title', 'Quiénes Somos - MSA Automotriz')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/pages.css') }}?v=12">
<link rel="stylesheet" href="{{ asset('css/nosotros.css') }}?v=12">
@endsection

@section('content')

{{-- HERO SPLIT DE QUIÉNES SOMOS (IMAGEN COMPLETA DEL EQUIPO + INFORMACIÓN) --}}
<div class="nosotros-hero">
    <div class="nosotros-hero__inner">
        <div class="nosotros-hero__content">
            <span class="nosotros-hero__badge">Trayectoria &amp; Excelencia</span>
            <h1 class="nosotros-hero__title">QUIÉNES SOMOS</h1>
            <p class="nosotros-hero__desc">Más de 19 años siendo el concesionario multimarca líder de confianza en Cajamarca y el norte del Perú.</p>
            
            <div class="nosotros-hero__features">
                <div class="nosotros-hero__feat">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                    <span>10 Marcas Oficiales</span>
                </div>
                <div class="nosotros-hero__feat">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                    <span>Talleres Homologados</span>
                </div>
                <div class="nosotros-hero__feat">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                    <span>Entrega Inmediata</span>
                </div>
            </div>
        </div>

        <div class="nosotros-hero__media">
            <div class="nosotros-hero__img-container">
                <img src="{{ asset('img/foto_equipo.jfif') }}" alt="Equipo Humano MSA Automotriz" class="nosotros-hero__img">
                <div class="nosotros-hero__caption">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                    <span>Equipo MSA Automotriz</span>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- BREADCRUMB --}}
<nav class="page-breadcrumb">
    <div class="page-breadcrumb__inner">
        <a href="{{ route('home') }}">Inicio</a>
        <span class="page-breadcrumb__separator">/</span>
        <span class="page-breadcrumb__current">Quiénes Somos</span>
    </div>
</nav>

{{-- SECCIÓN HISTORIA --}}
<section class="nosotros-historia">
    <div class="nosotros-historia__texto">
        <span class="nosotros-historia__label">Nuestra Trayectoria</span>
        <h2 class="nosotros-historia__title">Más de <span>19 años</span> moviendo el progreso de la región</h2>
        <p class="nosotros-historia__text">MSA Automotriz nació en Cajamarca con una visión sólida: ofrecer a familias, emprendedores y grandes corporaciones el acceso a vehículos de la más alta calidad, respaldados por una atención honesta, transparente y cercana.</p>
        <p class="nosotros-historia__text">Hoy representamos con orgullo a 10 marcas automotrices de renombre internacional — autos, SUV, camionetas, motos y transporte pesado — con sedes estratégicas preparadas con talleres de tecnología de punta y stock para entrega inmediata.</p>
    </div>
    <div class="nosotros-historia__img-wrap">
        <img src="{{ asset('img/localprueba.jpg') }}" alt="Sede Principal MSA Automotriz" class="nosotros-historia__img">
        <div class="nosotros-historia__badge">Sede Principal Cajamarca</div>
    </div>
</section>

{{-- ESTADÍSTICAS --}}
<div class="nosotros-stats">
    <div class="nosotros-stats__inner">
        <div class="stat-item">
            <div class="stat-item__number">+19</div>
            <div class="stat-item__label">Años de experiencia</div>
        </div>
        <div class="stat-item">
            <div class="stat-item__number">10</div>
            <div class="stat-item__label">Marcas oficiales</div>
        </div>
        <div class="stat-item">
            <div class="stat-item__number">+10,000</div>
            <div class="stat-item__label">Clientes satisfechos</div>
        </div>
        <div class="stat-item">
            <div class="stat-item__number">4</div>
            <div class="stat-item__label">Sedes comerciales</div>
        </div>
    </div>
</div>

{{-- MISIÓN Y VISIÓN --}}
<div class="nosotros-mv">
    <div class="nosotros-mv__item">
        <div class="nosotros-mv__icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"/><path d="M2 12h20"/></svg>
        </div>
        <h3 class="nosotros-mv__title">Nuestra Misión</h3>
        <p class="nosotros-mv__text">Brindar a nuestros clientes soluciones integrales de movilidad a través de vehículos de primer nivel y servicios posventa certificados, superando expectativas con honestidad, innovación y calidad humana.</p>
    </div>
    <div class="nosotros-mv__item">
        <div class="nosotros-mv__icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
        </div>
        <h3 class="nosotros-mv__title">Nuestra Visión</h3>
        <p class="nosotros-mv__text">Consolidarnos como el grupo automotriz de mayor confianza y vanguardia del norte del país, reconocidos por nuestro portafolio multimarcas, digitalización y excelencia en servicio posventa.</p>
    </div>
</div>

{{-- VALORES --}}
<section class="nosotros-valores">
    <div class="nosotros-valores__inner">
        <div class="nosotros-valores__header">
            <span class="section-tag" style="color: var(--color-primary, #d90429); font-weight: 800; text-transform: uppercase; font-size: 0.76rem; letter-spacing: 0.08em; display: block; margin-bottom: 6px;">Pilares Fundamentales</span>
            <h2 class="nosotros-valores__title">Nuestros Valores</h2>
            <p class="nosotros-valores__sub">Los principios éticos que guían cada asesoría y servicio que entregamos.</p>
        </div>
        <div class="valores-grid">
            <div class="valor-card">
                <div class="valor-card__icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                </div>
                <h3 class="valor-card__title">Honestidad</h3>
                <p class="valor-card__desc">Transparencia absoluta en precios, especificaciones y diagnósticos mecánicos.</p>
            </div>
            <div class="valor-card">
                <div class="valor-card__icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                </div>
                <h3 class="valor-card__title">Excelencia</h3>
                <p class="valor-card__desc">Estándares rigurosos de calidad en cada vehículo entregado y mantenimiento realizado.</p>
            </div>
            <div class="valor-card">
                <div class="valor-card__icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                </div>
                <h3 class="valor-card__title">Compromiso</h3>
                <p class="valor-card__desc">Acompañamos a nuestros clientes durante todo el ciclo de vida de su vehículo.</p>
            </div>
            <div class="valor-card">
                <div class="valor-card__icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
                </div>
                <h3 class="valor-card__title">Cercanía</h3>
                <p class="valor-card__desc">Atención personalizada y empática adaptada a los requerimientos de cada usuario.</p>
            </div>
        </div>
    </div>
</section>

{{-- BANNER CTA --}}
<div class="nosotros-cta">
    <h2 class="nosotros-cta__title">¿Listo para vivir la experiencia MSA?</h2>
    <p class="nosotros-cta__sub">Te invitamos a conocer nuestras sedes, realizar un test drive o recibir una cotización a tu medida.</p>
    <div class="nosotros-cta__btns">
        <a href="{{ route('marcas.index') }}" class="nosotros-cta__btn nosotros-cta__btn--white">Ver Catálogo de Marcas</a>
        <a href="{{ route('locales') }}" class="nosotros-cta__btn nosotros-cta__btn--outline">Visitar Sedes</a>
    </div>
</div>

@endsection