@extends('layouts.app')
@section('title', 'Nuestros Locales - MSA Automotriz')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/pages.css') }}">
<link rel="stylesheet" href="{{ asset('css/locales.css') }}">
@endsection

@section('content')

<div class="page-hero" style="background-image: url('{{ asset('img/localprueba.jpg') }}');">
    <div class="page-hero__overlay"></div>
    <div class="page-hero__content">
        <span class="page-hero__badge">MSA Automotriz</span>
        <h1 class="page-hero__title">NUESTROS LOCALES</h1>
        <p class="page-hero__sub">V&iacute;sitanos en nuestras sedes en Cajamarca, Lima y Piura.</p>
    </div>
</div>

<nav class="page-breadcrumb">
    <a href="{{ route('home') }}">Inicio</a>
    <span>/</span>
    Locales
</nav>

<section class="locales-section">
    <h2 class="section-title">Nuestras sedes</h2>
    <p class="section-subtitle">Encuentra la sede más cercana y contáctanos rápidamente</p>

    <div class="locales-grid">
        @forelse($locales as $local)
        <article class="local-card">
            <div class="local-card__media">
                @if($local->imagen_url)
                    <img src="{{ $local->imagen_url }}" alt="{{ $local->nombre }}">
                @elseif($local->mapa_src)
                    <div class="local-card__map">
                        <iframe src="{{ $local->mapa_src }}" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                @else
                    <div class="local-card__placeholder">Sin imagen</div>
                @endif
            </div>

            <div class="local-card__body">
                <h3 class="local-card__nombre">{{ $local->nombre }}</h3>

                <ul class="local-card__info">
                    <li><strong>Dirección:</strong> {{ $local->direccion }}</li>
                    @if($local->telefono)
                    <li><strong>Teléfono:</strong> {{ $local->telefono }}</li>
                    @endif
                    @if($local->whatsapp)
                    <li><strong>WhatsApp:</strong> {{ $local->whatsapp }}</li>
                    @endif
                    @if($local->email)
                    <li><strong>Email:</strong> {{ $local->email }}</li>
                    @endif
                    @if($local->horario)
                    <li><strong>Horario:</strong> {{ $local->horario }}</li>
                    @endif
                </ul>

                <div class="local-card__btns">
                    @if($local->whatsapp)
                    <a href="https://wa.me/{{ preg_replace('/\D/', '', $local->whatsapp) }}" target="_blank" rel="noopener" class="local-card__btn local-card__btn--wa">
                        WhatsApp
                    </a>
                    @endif

                    <a href="{{ route('locales.show', $local->id) }}" class="local-card__btn local-card__btn--maps">
                        Ver sede
                    </a>

                    <a href="{{ $local->mapa_public_url }}" target="_blank" rel="noopener" class="local-card__btn local-card__btn--maps">
                        Ver mapa
                    </a>
                </div>
            </div>
        </article>
        @empty
        <p style="grid-column:1/-1;text-align:center;color:#888;padding:30px 0;">No hay sedes registradas por ahora.</p>
        @endforelse
    </div>
</section>

@endsection
