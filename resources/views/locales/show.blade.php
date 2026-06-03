@extends('layouts.app')
@section('title', $local->nombre . ' - MSA Automotriz')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/pages.css') }}">
<style>
.local-hero {
    position: relative;
    height: 380px;
    background: linear-gradient(135deg, #0f2027 0%, #203a43 50%, #2c5364 100%);
    display: flex;
    align-items: flex-end;
    overflow: hidden;
}
.local-hero__img {
    position: absolute;
    inset: 0;
    background-size: cover;
    background-position: center;
    opacity: 0.45;
}
.local-hero__overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(to top, rgba(0,0,0,0.85) 0%, rgba(0,0,0,0.15) 60%, transparent 100%);
}
.local-hero__content {
    position: relative;
    z-index: 2;
    padding: 0 48px 40px;
    color: #fff;
}
.local-hero__badge {
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
.local-hero__title { font-size: 2.6rem; font-weight: 900; margin: 0; text-shadow: 0 2px 12px rgba(0,0,0,0.4); }
.local-hero__sub { font-size: 1rem; color: #cdd; margin-top: 6px; }

/* Cuerpo */
.local-body {
    max-width: 1060px;
    margin: 52px auto 24px;
    padding: 0 32px;
    display: grid;
    grid-template-columns: 1fr 340px;
    gap: 48px;
    align-items: start;
}

/* Info */
.local-info h2 { font-size: 1.4rem; font-weight: 800; color: #111; margin: 0 0 20px; }
.local-info h2::after {
    content: '';
    display: block;
    width: 40px;
    height: 3px;
    background: #cc1111;
    margin-top: 8px;
    border-radius: 2px;
}
.info-list { list-style: none; padding: 0; margin: 0 0 28px; }
.info-list li {
    display: flex;
    gap: 14px;
    align-items: flex-start;
    padding: 12px 0;
    border-bottom: 1px solid #f0f0f0;
    font-size: 0.98rem;
    color: #333;
}
.info-list li:last-child { border-bottom: none; }
.info-list__icon { font-size: 1.2rem; flex-shrink: 0; margin-top: 1px; }
.info-list__label { font-weight: 700; color: #111; display: block; margin-bottom: 2px; }

/* Mapa */
.local-mapa {
    border-radius: 12px;
    overflow: hidden;
    margin-top: 8px;
}
.local-mapa iframe { display: block; width: 100%; height: 280px; border: 0; }

/* CTA lateral */
.local-cta {
    background: #fff;
    border: 1.5px solid #e8e8e8;
    border-radius: 14px;
    padding: 28px 24px;
    box-shadow: 0 4px 24px rgba(0,0,0,0.07);
    position: sticky;
    top: 100px;
}
.local-cta h3 { font-size: 1.1rem; font-weight: 700; color: #111; margin: 0 0 18px; text-align: center; }
.local-cta__btn {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    width: 100%;
    text-align: center;
    font-size: 0.95rem;
    font-weight: 700;
    padding: 13px;
    border-radius: 8px;
    text-decoration: none;
    margin-bottom: 10px;
    transition: background 0.2s, transform 0.1s;
}
.local-cta__btn:hover { transform: translateY(-1px); }
.local-cta__btn--wa { background: #25d366; color: #fff; }
.local-cta__btn--wa:hover { background: #1aad52; }
.local-cta__btn--tel { background: #111; color: #fff; }
.local-cta__btn--tel:hover { background: #333; }
.local-cta__btn--mail { background: transparent; border: 2px solid #111; color: #111; }
.local-cta__btn--mail:hover { background: #111; color: #fff; }

/* Otros locales */
.otros-locales {
    max-width: 1060px;
    margin: 40px auto 64px;
    padding: 0 32px;
}
.otros-locales h3 { font-size: 1.3rem; font-weight: 800; color: #111; margin-bottom: 20px; }
.otros-locales-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
    gap: 16px;
}
.otro-local-card {
    display: block;
    background: #fff;
    border: 1px solid #e8e8e8;
    border-radius: 10px;
    overflow: hidden;
    text-decoration: none;
    transition: transform 0.2s, box-shadow 0.2s, border-color 0.2s;
}
.otro-local-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 6px 20px rgba(0,0,0,0.09);
    border-color: #cc1111;
}
.otro-local-card__img {
    height: 110px;
    background: linear-gradient(135deg, #0f2027, #2c5364);
    background-size: cover;
    background-position: center;
}
.otro-local-card__body { padding: 14px 16px; }
.otro-local-card__nombre { font-size: 0.93rem; font-weight: 700; color: #111; margin-bottom: 4px; }
.otro-local-card__ciudad { font-size: 0.82rem; color: #888; }

@media (max-width: 800px) {
    .local-body { grid-template-columns: 1fr; }
    .local-cta { position: static; }
    .local-hero__title { font-size: 1.9rem; }
    .local-hero__content { padding: 0 24px 28px; }
}
</style>
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
    <a href="{{ route('home') }}">Inicio</a>
    <span>/</span>
    <a href="{{ route('locales') }}">Locales</a>
    <span>/</span>
    {{ $local->nombre }}
</nav>

{{-- CUERPO --}}
<div class="local-body">

    {{-- Info + Mapa --}}
    <div class="local-info">
        <h2>Información de la sede</h2>
        <ul class="info-list">
            <li>
                <span class="info-list__icon">📍</span>
                <div>
                    <span class="info-list__label">Dirección</span>
                    {{ $local->direccion }}
                </div>
            </li>
            @if($local->telefono)
            <li>
                <span class="info-list__icon">📞</span>
                <div>
                    <span class="info-list__label">Teléfono</span>
                    <a href="tel:{{ preg_replace('/\D/', '', $local->telefono) }}" style="color:#cc1111;text-decoration:none;">{{ $local->telefono }}</a>
                </div>
            </li>
            @endif
            @if($local->whatsapp)
            <li>
                <span class="info-list__icon">💬</span>
                <div>
                    <span class="info-list__label">WhatsApp</span>
                    <a href="https://wa.me/{{ preg_replace('/\D/', '', $local->whatsapp) }}" target="_blank" rel="noopener" style="color:#25d366;text-decoration:none;">{{ $local->whatsapp }}</a>
                </div>
            </li>
            @endif
            @if($local->email)
            <li>
                <span class="info-list__icon">✉️</span>
                <div>
                    <span class="info-list__label">Email</span>
                    <a href="mailto:{{ $local->email }}" style="color:#cc1111;text-decoration:none;">{{ $local->email }}</a>
                </div>
            </li>
            @endif
            @if($local->horario)
            <li>
                <span class="info-list__icon">🕐</span>
                <div>
                    <span class="info-list__label">Horario de atención</span>
                    {{ $local->horario }}
                </div>
            </li>
            @endif
        </ul>

        @if($local->mapa_src)
        <div class="local-mapa">
            <iframe src="{{ $local->mapa_src }}" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        @endif
    </div>

    {{-- CTA --}}
    <div class="local-cta">
        <h3>¿Cómo contactarnos?</h3>

        @if($local->whatsapp)
        <a href="https://wa.me/{{ preg_replace('/\D/', '', $local->whatsapp) }}?text={{ urlencode('Hola, me comunico desde la ' . $local->nombre) }}"
           target="_blank" rel="noopener"
           class="local-cta__btn local-cta__btn--wa">
            <span>💬</span> WhatsApp
        </a>
        @endif

        @if($local->telefono)
        <a href="tel:{{ preg_replace('/\D/', '', $local->telefono) }}"
           class="local-cta__btn local-cta__btn--tel">
            <span>📞</span> Llamar
        </a>
        @endif

        @if($local->email)
        <a href="mailto:{{ $local->email }}"
           class="local-cta__btn local-cta__btn--mail">
            <span>✉️</span> Enviar email
        </a>
        @endif

        <a href="{{ route('contacto') }}?sede={{ urlencode($local->nombre) }}"
           class="local-cta__btn local-cta__btn--mail" style="margin-top:4px;">
            <span>📋</span> Formulario de contacto
        </a>
    </div>

</div>

{{-- OTROS LOCALES --}}
@if($otrosLocales->isNotEmpty())
<div class="otros-locales">
    <h3>Otras sedes</h3>
    <div class="otros-locales-grid">
        @foreach($otrosLocales as $otro)
        <a href="{{ route('locales.show', $otro->id) }}" class="otro-local-card">
            @if($otro->imagen_url)
            <div class="otro-local-card__img" style="background-image:url('{{ $otro->imagen_url }}')"></div>
            @else
            <div class="otro-local-card__img"></div>
            @endif
            <div class="otro-local-card__body">
                <div class="otro-local-card__nombre">{{ $otro->nombre }}</div>
                <div class="otro-local-card__ciudad">{{ $otro->ciudad }}</div>
            </div>
        </a>
        @endforeach
    </div>
</div>
@endif

@endsection
