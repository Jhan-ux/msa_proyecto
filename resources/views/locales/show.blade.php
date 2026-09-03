@extends('layouts.app')
@section('title', $local->nombre . ' - MSA Automotriz')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/pages.css') }}">
<link rel="stylesheet" href="{{ asset('css/local_detalle.css') }}?v=3">
@endsection

@section('content')

{{-- HERO --}}
<div class="local-hero">
    @if($local->imagen_url)
    <div class="local-hero__img" style="background-image:url('{{ $local->imagen_url }}')"></div>
    @endif
    <div class="local-hero__overlay"></div>
    <div class="local-hero__content">
        <span class="local-hero__badge">Nuestros Locales</span>
        <h1 class="local-hero__title">{{ $local->nombre }}</h1>
        <p class="local-hero__sub">{{ $local->ciudad }}</p>
    </div>
</div>

{{-- BREADCRUMB --}}
<nav class="page-breadcrumb">
    <div class="page-breadcrumb__inner">
        <a href="{{ route('home') }}">Inicio</a>
        <span class="page-breadcrumb__separator">/</span>
        <a href="{{ route('locales') }}">Locales</a>
        <span class="page-breadcrumb__separator">/</span>
        <span class="page-breadcrumb__current">{{ $local->nombre }}</span>
    </div>
</nav>

{{-- CUERPO --}}
<div class="local-body">

    {{-- Info + Mapa --}}
    <div class="local-info">
        <div class="local-info__header">
            <span class="local-info__tag">Presencia Oficial</span>
            <h2>Información de la sede</h2>
        </div>

        <ul class="info-list">
            @if($local->direccion)
            <li class="info-list__item">
                <div class="info-list__icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                </div>
                <div class="info-list__content">
                    <span class="info-list__label">Dirección</span>
                    <span class="info-list__value">{{ $local->direccion }}</span>
                </div>
            </li>
            @endif

            @if($local->telefono)
            <li class="info-list__item">
                <div class="info-list__icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.61 3.41 2 2 0 0 1 3.6 1.21h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.82a16 16 0 0 0 6.29 6.29l.98-.98a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                </div>
                <div class="info-list__content">
                    <span class="info-list__label">Teléfono</span>
                    <a href="tel:{{ preg_replace('/\D/', '', $local->telefono) }}" class="info-list__link">{{ $local->telefono }}</a>
                </div>
            </li>
            @endif

            @if($local->whatsapp)
            <li class="info-list__item">
                <div class="info-list__icon info-list__icon--wa">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>
                </div>
                <div class="info-list__content">
                    <span class="info-list__label">WhatsApp</span>
                    <a href="https://wa.me/{{ preg_replace('/\D/', '', $local->whatsapp) }}" target="_blank" rel="noopener" class="info-list__link info-list__link--wa">{{ $local->whatsapp }}</a>
                </div>
            </li>
            @endif

            @if($local->email)
            <li class="info-list__item">
                <div class="info-list__icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                </div>
                <div class="info-list__content">
                    <span class="info-list__label">Correo Electrónico</span>
                    <a href="mailto:{{ $local->email }}" class="info-list__link">{{ $local->email }}</a>
                </div>
            </li>
            @endif

            @if($local->horario)
            <li class="info-list__item">
                <div class="info-list__icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                </div>
                <div class="info-list__content">
                    <span class="info-list__label">Horario de atención</span>
                    <span class="info-list__value">{{ $local->horario }}</span>
                </div>
            </li>
            @endif
        </ul>

        @if($local->mapa_src)
        <div class="local-mapa">
            <iframe src="{{ $local->mapa_src }}" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            @if($local->mapa_public_url)
            <div class="local-mapa__bar">
                <a href="{{ $local->mapa_public_url }}" target="_blank" rel="noopener" class="local-mapa__btn">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><polygon points="3 11 22 2 13 21 11 13 3 11"/></svg>
                    <span>Abrir y calcular ruta en Google Maps</span>
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
                </a>
            </div>
            @endif
        </div>
        @endif
    </div>

    {{-- CTA --}}
    <div class="local-cta">
        <div class="local-cta__header">
            <span class="local-cta__tag">Atención Rápida</span>
            <h3>¿Cómo contactarnos?</h3>
            <p>Elige tu canal preferido para recibir asesoría personalizada sobre ventas y posventa.</p>
        </div>

        <div class="local-cta__buttons">
            @if($local->whatsapp)
            <a href="https://wa.me/{{ preg_replace('/\D/', '', $local->whatsapp) }}?text={{ urlencode('Hola, me comunico desde la ' . $local->nombre) }}"
               target="_blank" rel="noopener"
               class="local-cta__btn local-cta__btn--wa">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>
                <span>WhatsApp</span>
            </a>
            @endif

            @if($local->telefono)
            <a href="tel:{{ preg_replace('/\D/', '', $local->telefono) }}"
               class="local-cta__btn local-cta__btn--tel">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.61 3.41 2 2 0 0 1 3.6 1.21h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.82a16 16 0 0 0 6.29 6.29l.98-.98a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                <span>Llamar</span>
            </a>
            @endif

            @if($local->email)
            <a href="mailto:{{ $local->email }}"
               class="local-cta__btn local-cta__btn--mail">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                <span>Enviar email</span>
            </a>
            @endif

            <a href="{{ route('contacto') }}?sede={{ urlencode($local->nombre) }}"
               class="local-cta__btn local-cta__btn--form">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
                <span>Formulario de contacto</span>
            </a>
        </div>
    </div>

</div>

{{-- OTRAS SEDES --}}
@if($otrosLocales->isNotEmpty())
<section class="otros-locales-section">
    <div class="otros-locales-container">
        <div class="section-header">
            <span class="section-tag">Presencia Regional</span>
            <h2 class="section-title">Otras Sedes</h2>
            <p class="section-subtitle">Encuentra el concesionario oficial más cercano en el norte del país.</p>
        </div>
        <div class="otros-locales-grid">
            @foreach($otrosLocales as $otro)
            @php
                $oImg = $otro->imagen_url;
            @endphp
            <a href="{{ route('locales.show', $otro->id) }}" class="otro-local-card">
                <div class="otro-local-card__img" @if($oImg) style="background-image:url('{{ $oImg }}')" @endif>
                    <span class="otro-local-card__badge">Atención Hoy</span>
                </div>
                <div class="otro-local-card__body">
                    <span class="otro-local-card__ciudad">{{ $otro->ciudad }}</span>
                    <h3 class="otro-local-card__nombre">{{ $otro->nombre }}</h3>
                    @if($otro->direccion)
                    <div class="otro-local-card__dir">{{ $otro->direccion }}</div>
                    @endif
                    @if($otro->telefono)
                    <div class="otro-local-card__tel">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.61 3.41 2 2 0 0 1 3.6 1.21h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.82a16 16 0 0 0 6.29 6.29l.98-.98a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                        <span>{{ $otro->telefono }}</span>
                    </div>
                    @endif
                    <span class="otro-local-card__link">
                        <span>Ver información de sede</span>
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </span>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif

@endsection
