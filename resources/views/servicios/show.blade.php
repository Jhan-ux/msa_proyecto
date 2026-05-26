@extends('layouts.app')
@section('title', $servicio->nombre . ' - Posventa MSA Automotriz')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/pages.css') }}">
<style>
.servicio-hero {
    position: relative;
    height: 380px;
    background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
    display: flex;
    align-items: flex-end;
    overflow: hidden;
}
.servicio-hero__img {
    position: absolute;
    inset: 0;
    background-size: cover;
    background-position: center;
    opacity: 0.45;
}
.servicio-hero__overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(to top, rgba(0,0,0,0.85) 0%, rgba(0,0,0,0.15) 60%, transparent 100%);
}
.servicio-hero__content {
    position: relative;
    z-index: 2;
    padding: 0 48px 40px;
    color: #fff;
}
.servicio-hero__badge {
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
.servicio-hero__title {
    font-size: 2.6rem;
    font-weight: 900;
    margin: 0;
    text-shadow: 0 2px 12px rgba(0,0,0,0.4);
}

/* Cuerpo */
.servicio-body {
    max-width: 1060px;
    margin: 52px auto 64px;
    padding: 0 32px;
    display: grid;
    grid-template-columns: 1fr 340px;
    gap: 48px;
    align-items: start;
}
.servicio-info h2 {
    font-size: 1.4rem;
    font-weight: 800;
    color: #111;
    margin: 0 0 14px;
}
.servicio-info h2::after {
    content: '';
    display: block;
    width: 40px;
    height: 3px;
    background: #cc1111;
    margin-top: 8px;
    border-radius: 2px;
}
.servicio-info p {
    font-size: 1.02rem;
    color: #444;
    line-height: 1.8;
}

/* CTA lateral */
.servicio-cta {
    background: #fff;
    border: 1.5px solid #e8e8e8;
    border-radius: 14px;
    padding: 28px 24px;
    box-shadow: 0 4px 24px rgba(0,0,0,0.07);
    position: sticky;
    top: 100px;
}
.servicio-cta h3 { font-size: 1.1rem; font-weight: 700; color: #111; margin: 0 0 18px; text-align: center; }

/* Formulario */
.consulta-form label {
    display: block;
    font-size: 0.82rem;
    font-weight: 700;
    color: #444;
    margin-bottom: 4px;
    margin-top: 12px;
}
.consulta-form label:first-of-type { margin-top: 0; }
.consulta-form input,
.consulta-form textarea {
    width: 100%;
    box-sizing: border-box;
    border: 1.5px solid #ddd;
    border-radius: 7px;
    padding: 9px 12px;
    font-size: 0.88rem;
    color: #222;
    font-family: inherit;
    background: #fafafa;
    transition: border-color 0.2s;
}
.consulta-form input:focus,
.consulta-form textarea:focus {
    outline: none;
    border-color: #cc1111;
    background: #fff;
}
.consulta-form textarea { resize: vertical; min-height: 80px; }
.consulta-form__submit {
    display: block;
    width: 100%;
    margin-top: 14px;
    background: #cc1111;
    color: #fff;
    font-size: 0.93rem;
    font-weight: 700;
    padding: 12px;
    border-radius: 8px;
    border: none;
    cursor: pointer;
    transition: background 0.2s;
}
.consulta-form__submit:hover { background: #a00d0d; }

.consulta-form__alert {
    background: #ecfdf5;
    border: 1.5px solid #6ee7b7;
    border-radius: 8px;
    padding: 12px 14px;
    font-size: 0.88rem;
    color: #065f46;
    margin-bottom: 16px;
    font-weight: 600;
}

/* Botón WhatsApp */
.btn-wa {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    width: 100%;
    box-sizing: border-box;
    margin-top: 10px;
    background: #25d366;
    color: #fff;
    font-size: 0.9rem;
    font-weight: 700;
    padding: 11px;
    border-radius: 8px;
    text-decoration: none;
    transition: background 0.2s;
}
.btn-wa:hover { background: #1aad52; }

/* Otros servicios */
.otros-servicios {
    max-width: 960px;
    margin: 0 auto 64px;
    padding: 0 32px;
}
.otros-servicios h3 { font-size: 1.3rem; font-weight: 800; color: #111; margin-bottom: 20px; }
.otros-servicios-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
    gap: 16px;
}
.otro-servicio-card {
    display: block;
    background: #fff;
    border: 1px solid #e8e8e8;
    border-radius: 10px;
    padding: 20px 16px;
    text-align: center;
    text-decoration: none;
    transition: transform 0.2s, box-shadow 0.2s, border-color 0.2s;
}
.otro-servicio-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 6px 20px rgba(0,0,0,0.09);
    border-color: #cc1111;
}
.otro-servicio-card__nombre { font-size: 0.93rem; font-weight: 700; color: #111; margin-bottom: 6px; }
.otro-servicio-card__desc { font-size: 0.8rem; color: #777; line-height: 1.4; }

@media (max-width: 780px) {
    .servicio-body { grid-template-columns: 1fr; }
    .servicio-cta { position: static; }
    .servicio-hero__title { font-size: 1.9rem; }
    .servicio-hero__content { padding: 0 24px 28px; }
}
</style>
@endsection

@section('content')

{{-- HERO --}}
<div class="servicio-hero">
    @if($servicio->imagen)
    <div class="servicio-hero__img" style="background-image:url('{{ asset($servicio->imagen) }}')"></div>
    @endif
    <div class="servicio-hero__overlay"></div>
    <div class="servicio-hero__content">
        <span class="servicio-hero__badge">Posventa</span>
        <h1 class="servicio-hero__title">{{ $servicio->nombre }}</h1>
    </div>
</div>

{{-- BREADCRUMB --}}
<nav class="page-breadcrumb">
    <a href="{{ route('home') }}">Inicio</a>
    <span>/</span>
    <a href="{{ route('servicios') }}">Posventa</a>
    <span>/</span>
    {{ $servicio->nombre }}
</nav>

{{-- CUERPO --}}
<div class="servicio-body">
    <div class="servicio-info">
        <h2>{{ $servicio->nombre }}</h2>
        <p>{{ $servicio->descripcion ?? 'Consulta con nuestros especialistas para conocer todos los detalles de este servicio.' }}</p>
    </div>

    <div class="servicio-cta">
        <h3>Solicitar información</h3>

        @if(session('consulta_enviada'))
        <div class="consulta-form__alert">
            ✓ ¡Consulta enviada! Te contactaremos pronto.
        </div>
        @endif

        <form method="POST" action="{{ route('servicios.consultar', $servicio->slug) }}" class="consulta-form" novalidate>
            @csrf
            <label for="cs_nombre">Nombre *</label>
            <input type="text" id="cs_nombre" name="nombre" value="{{ old('nombre') }}" required placeholder="Tu nombre completo">
            @error('nombre')<span style="color:#cc1111;font-size:.78rem;">{{ $message }}</span>@enderror

            <label for="cs_email">Email *</label>
            <input type="email" id="cs_email" name="email" value="{{ old('email') }}" required placeholder="tu@email.com">
            @error('email')<span style="color:#cc1111;font-size:.78rem;">{{ $message }}</span>@enderror

            <label for="cs_telefono">Teléfono</label>
            <input type="tel" id="cs_telefono" name="telefono" value="{{ old('telefono') }}" placeholder="999 999 999">

            <label for="cs_vehiculo">Vehículo</label>
            <input type="text" id="cs_vehiculo" name="vehiculo" value="{{ old('vehiculo') }}" placeholder="Ej: Toyota Hilux 2022">

            <label for="cs_mensaje">Mensaje</label>
            <textarea id="cs_mensaje" name="mensaje" placeholder="Describe tu consulta o lo que necesitas...">{{ old('mensaje') }}</textarea>

            <button type="submit" class="consulta-form__submit">Enviar consulta</button>
        </form>

        <a href="https://wa.me/51986339369?text={{ urlencode('Hola, quiero información sobre el servicio: ' . $servicio->nombre) }}"
           target="_blank" rel="noopener"
           class="btn-wa">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
            </svg>
            Consultar por WhatsApp
        </a>
    </div>
</div>

{{-- OTROS SERVICIOS --}}
@if($otrosServicios->isNotEmpty())
<div class="otros-servicios">
    <h3>Otros servicios de Posventa</h3>
    <div class="otros-servicios-grid">
        @foreach($otrosServicios as $otro)
        <a href="{{ route('servicios.show', $otro->slug) }}" class="otro-servicio-card">
            <div class="otro-servicio-card__nombre">{{ $otro->nombre }}</div>
            @if($otro->descripcion)
            <div class="otro-servicio-card__desc">{{ Str::limit($otro->descripcion, 60) }}</div>
            @endif
        </a>
        @endforeach
    </div>
</div>
@endif

@endsection
