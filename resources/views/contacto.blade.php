@extends('layouts.app')
@section('title', 'Contacto y Asesoría Automotriz - MSA Automotriz')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/pages.css') }}">
<link rel="stylesheet" href="{{ asset('css/contacto.css') }}?v=6">
@endsection

@section('content')

{{-- HERO --}}
<div class="page-hero" style="background-image: url('{{ asset('img/contactanos.jfif') }}');">
    <div class="page-hero__overlay"></div>
    <div class="page-hero__content">
        <span class="page-hero__badge">Atención al Cliente</span>
        <h1 class="page-hero__title">Contáctanos</h1>
        <p class="page-hero__sub">Estamos listos para asesorarte en la compra de tu vehículo nuevo, seminuevo o en la atención de tu servicio posventa.</p>
    </div>
</div>

{{-- BREADCRUMB --}}
<nav class="page-breadcrumb">
    <a href="{{ route('home') }}">Inicio</a>
    <span>/</span>
    <span>Contacto</span>
</nav>

{{-- CUERPO PRINCIPAL --}}
<div class="contacto-wrap">

    <div class="contacto-form-card">
        <h2 class="contacto-form__title">Envíanos un mensaje</h2>
        <p class="contacto-form__sub">Completa el formulario y un asesor especializado se pondrá en contacto contigo a la brevedad.</p>

        @if(session('success'))
            <div class="alert-box alert-box--success">
                ✓ {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert-box alert-box--error">
                <ul class="alert-box__list">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="contacto-form" action="{{ route('contacto.store') }}" method="POST">
            @csrf

            <div class="form-row">
                <div class="form-group">
                    <label for="nombre">Nombre completo *</label>
                    <input type="text" id="nombre" name="nombre" placeholder="Tu nombre y apellido" value="{{ old('nombre') }}" required>
                </div>
                <div class="form-group">
                    <label for="telefono">Teléfono / Celular *</label>
                    <input type="tel" id="telefono" name="telefono" placeholder="Ej: 987 654 321" value="{{ old('telefono') }}" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="email">Correo electrónico</label>
                    <input type="email" id="email" name="email" placeholder="tucorreo@email.com" value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <label for="marca">Marca o Área de Interés</label>
                    <select id="marca" name="marca">
                        <option value="">-- Selecciona una opción --</option>
                        <option value="baic" {{ old('marca') == 'baic' ? 'selected' : '' }}>BAIC</option>
                        <option value="chevrolet" {{ old('marca') == 'chevrolet' ? 'selected' : '' }}>Chevrolet</option>
                        <option value="dongfeng" {{ old('marca') == 'dongfeng' ? 'selected' : '' }}>Dongfeng</option>
                        <option value="forland" {{ old('marca') == 'forland' ? 'selected' : '' }}>Forland</option>
                        <option value="foton" {{ old('marca') == 'foton' ? 'selected' : '' }}>Foton</option>
                        <option value="honda_autos" {{ old('marca') == 'honda_autos' ? 'selected' : '' }}>Honda Autos</option>
                        <option value="honda_motos" {{ old('marca') == 'honda_motos' ? 'selected' : '' }}>Honda Motos</option>
                        <option value="isuzu_camiones" {{ old('marca') == 'isuzu_camiones' ? 'selected' : '' }}>Isuzu Camiones</option>
                        <option value="isuzu_pickups" {{ old('marca') == 'isuzu_pickups' ? 'selected' : '' }}>Isuzu Pick-Ups</option>
                        <option value="omoda_jaecoo" {{ old('marca') == 'omoda_jaecoo' ? 'selected' : '' }}>Omoda &amp; Jaecoo</option>
                        <option value="seminuevos" {{ old('marca') == 'seminuevos' ? 'selected' : '' }}>Seminuevos</option>
                        <option value="taller" {{ old('marca') == 'taller' ? 'selected' : '' }}>Taller y Posventa</option>
                        <option value="otro" {{ old('marca') == 'otro' ? 'selected' : '' }}>Otro / Consulta General</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="asunto">Asunto *</label>
                <input type="text" id="asunto" name="asunto" placeholder="¿En qué podemos ayudarte?" value="{{ old('asunto', request('asunto') ?? (request('marca') ? 'Cotización ' . request('marca') . ' ' . request('modelo') : '')) }}" required>
            </div>

            <div class="form-group">
                <label for="mensaje">Mensaje *</label>
                <textarea id="mensaje" name="mensaje" placeholder="Escribe aquí tu consulta detallada..." required>{{ old('mensaje') }}</textarea>
            </div>

            <button type="submit" class="form-submit">
                <span>Enviar Mensaje</span>
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </button>
        </form>
    </div>

    <aside class="contacto-info">
        <h3 class="contacto-info__title">Canales de Atención</h3>
        <ul class="contacto-info__list">
            <li>
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.61 3.41 2 2 0 0 1 3.6 1.21h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.82a16 16 0 0 0 6.29 6.29l.98-.98a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                <div>
                    <strong>Central Telefónica & WhatsApp</strong>
                    <a href="tel:+51966154210" style="color: inherit; text-decoration: none;">+51 966 154 210</a>
                </div>
            </li>
            <li>
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                <div>
                    <strong>Correo Electrónico</strong>
                    contacto@msaautomotriz.com
                </div>
            </li>
            <li>
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z"/><circle cx="12" cy="9" r="2.5"/></svg>
                <div>
                    <strong>Sede Principal Cajamarca</strong>
                    Av. Vía de Evitamiento Norte Cdra. 3 S/N
                </div>
            </li>
            <li>
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                <div>
                    <strong>Horario de Atención</strong>
                    Lun &ndash; Vie: 8:00 am &ndash; 6:00 pm<br>Sáb: 8:00 am &ndash; 1:00 pm
                </div>
            </li>
        </ul>
        <a href="https://wa.me/51966154210?text={{ urlencode('¡Hola! Me comunico desde la web de MSA Automotriz y deseo información.') }}" class="contacto-info__wa" target="_blank" rel="noopener">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413z"/></svg>
            <span>Escribir por WhatsApp</span>
        </a>
    </aside>

</div>

@endsection
