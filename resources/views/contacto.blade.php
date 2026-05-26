@extends('layouts.app')
@section('title', 'Contacto - MSA Automotriz')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/pages.css') }}">
<link rel="stylesheet" href="{{ asset('css/contacto.css') }}">
@endsection

@section('content')

<div class="page-hero" style="background-image: url('{{ asset('img/localprueba.jpg') }}');">
    <div class="page-hero__overlay"></div>
    <div class="page-hero__content">
        <span class="page-hero__badge">MSA Automotriz</span>
        <h1 class="page-hero__title">CONT&Aacute;CTANOS</h1>
        <p class="page-hero__sub">Estamos aquí para ayudarte. Escríbenos o llámanos y te atendemos de inmediato.</p>
    </div>
</div>

<nav class="page-breadcrumb">
    <a href="{{ route('home') }}">Inicio</a>
    <span>/</span>
    Contacto
</nav>

<div class="contacto-wrap">

    <div>
        <h2 class="contacto-form__title">Envíanos un mensaje</h2>
        <p class="contacto-form__sub">Completa el formulario y nos pondremos en contacto contigo a la brevedad posible.</p>

        @if(session('success'))
            <div style="background:#d4edda;color:#155724;padding:12px 16px;border-radius:6px;margin-bottom:16px;">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div style="background:#f8d7da;color:#721c24;padding:12px 16px;border-radius:6px;margin-bottom:16px;">
                <ul style="margin:0;padding-left:18px;">
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
                    <input type="text" id="nombre" name="nombre" placeholder="Tu nombre" value="{{ old('nombre') }}" required>
                </div>
                <div class="form-group">
                    <label for="telefono">Teléfono / Celular *</label>
                    <input type="tel" id="telefono" name="telefono" placeholder="Ej: 987 654 321" value="{{ old('telefono') }}" required>
                </div>
            </div>

            <div class="form-group">
                <label for="email">Correo electrónico</label>
                <input type="email" id="email" name="email" placeholder="tucorreo@email.com" value="{{ old('email') }}">
            </div>

            <div class="form-group">
                <label for="marca">Marca de interés</label>
                <select id="marca" name="marca">
                    <option value="">-- Selecciona una marca --</option>
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
                    <option value="otro" {{ old('marca') == 'otro' ? 'selected' : '' }}>Otro / Servicio</option>
                </select>
            </div>

            <div class="form-group">
                <label for="asunto">Asunto *</label>
                <input type="text" id="asunto" name="asunto" placeholder="¿En qué podemos ayudarte?" value="{{ old('asunto') }}" required>
            </div>

            <div class="form-group">
                <label for="mensaje">Mensaje *</label>
                <textarea id="mensaje" name="mensaje" placeholder="Escribe tu consulta aquí..." required>{{ old('mensaje') }}</textarea>
            </div>

            <button type="submit" class="form-submit">Enviar mensaje</button>
        </form>
    </div>

    <aside class="contacto-info">
        <h3 class="contacto-info__title">Información de Contacto</h3>
        <ul class="contacto-info__list">
            <li><div><strong>Teléfono</strong>(076) 123-456 &nbsp;|&nbsp; (076) 789-012</div></li>
            <li><div><strong>WhatsApp</strong>+51 986 339 369</div></li>
            <li><div><strong>Correo</strong>contacto@msaautomotriz.com</div></li>
            <li><div><strong>Sede Cajamarca</strong>Av. Independencia 1234, Cajamarca</div></li>
            <li><div><strong>Sede Baños del Inca</strong>Carretera Baños del Inca km 3.5</div></li>
            <li><div><strong>Horario de Atención</strong>Lun &ndash; Vie: 8:00 am a 6:00 pm<br>Sáb: 8:00 am a 1:00 pm</div></li>
        </ul>
        <a href="https://wa.me/51986339369?text=Hola,%20me%20comunico%20desde%20la%20página%20web%20y%20quisiera%20más%20información" class="contacto-info__wa" target="_blank" rel="noopener">
            Escribir por WhatsApp
        </a>
    </aside>
</div>

@endsection
