@extends('layouts.app')
@section('title', 'Nuestras Sedes y Concesionarios - MSA Automotriz')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/pages.css') }}">
<link rel="stylesheet" href="{{ asset('css/locales.css') }}?v=7">
@endsection

@section('content')

{{-- HERO --}}
<div class="page-hero" style="background-image: url('{{ asset('img/localprueba.jpg') }}');">
    <div class="page-hero__overlay"></div>
    <div class="page-hero__content">
        <span class="page-hero__badge">Red de Concesionarios</span>
        <h1 class="page-hero__title">Nuestras Sedes</h1>
        <p class="page-hero__sub">Visítanos en nuestras sedes en Cajamarca, Baños del Inca y Lima. Showroom y taller oficial a tu servicio.</p>
    </div>
</div>

{{-- BREADCRUMB --}}
<nav class="page-breadcrumb">
    <a href="{{ route('home') }}">Inicio</a>
    <span>/</span>
    <span>Sedes</span>
</nav>

{{-- LISTADO DE LOCALES --}}
<section class="locales-section">
    <div class="locales-grid">
        @forelse($locales as $local)
        <article class="local-card">
            <div class="local-card__media">
                <span class="local-card__badge-live">● Abierto Hoy</span>
                @if($local->imagen_url)
                    <img src="{{ $local->imagen_url }}" alt="{{ $local->nombre }}" loading="lazy">
                @elseif($local->mapa_src)
                    <div class="local-card__map">
                        <iframe src="{{ $local->mapa_src }}" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                @else
                    <div class="local-card__placeholder">Sede Oficial MSA</div>
                @endif
            </div>

            <div class="local-card__body">
                <h3 class="local-card__nombre">{{ $local->nombre }}</h3>

                <ul class="local-card__info">
                    <li>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                        <span><strong>Dirección:</strong> {{ $local->direccion }}</span>
                    </li>
                    @if($local->telefono)
                    <li>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.61 3.41 2 2 0 0 1 3.6 1.21h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.82a16 16 0 0 0 6.29 6.29l.98-.98a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                        <span><strong>Central:</strong> {{ $local->telefono }}</span>
                    </li>
                    @endif
                    @if($local->whatsapp)
                    <li>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#25d366" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>
                        <span><strong>WhatsApp:</strong> {{ $local->whatsapp }}</span>
                    </li>
                    @endif
                    @if($local->email)
                    <li>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                        <span><strong>Correo:</strong> {{ $local->email }}</span>
                    </li>
                    @endif
                    @if($local->horario)
                    <li>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                        <span><strong>Horario:</strong> {{ $local->horario }}</span>
                    </li>
                    @endif
                </ul>

                <div class="local-card__btns">
                    @if($local->whatsapp)
                    <a href="https://wa.me/{{ preg_replace('/\D/', '', $local->whatsapp) }}?text={{ urlencode('¡Hola! Me comunico para consultar sobre la ' . $local->nombre) }}" target="_blank" rel="noopener" class="local-card__btn local-card__btn--wa">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413z"/></svg>
                        <span>WhatsApp</span>
                    </a>
                    @endif

                    <a href="{{ route('locales.show', $local->id) }}" class="local-card__btn local-card__btn--maps">
                        <span>Ver Sede</span>
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </a>
                </div>
            </div>
        </article>
        @empty
        <p style="grid-column:1/-1;text-align:center;color:#888;padding:40px 0;">No hay sedes registradas por ahora.</p>
        @endforelse
    </div>
</section>

@endsection
