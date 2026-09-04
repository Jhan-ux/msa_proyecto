<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'MSA Automotriz - Concesionaria Oficial')</title>

    <!-- Favicon Oficial MSA -->
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}?v=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}?v=1">
    <link rel="apple-touch-icon" href="{{ asset('img/favicon.png') }}?v=1">

    <!-- Google Fonts: Plus Jakarta Sans & Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Plus+Jakarta+Sans:ital,wght@0,400;0,500;0,600;0,700;0,800;1,700&display=swap" rel="stylesheet">

    <!-- Global Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}?v=25">
    @yield('styles')
</head>
<body>

{{-- TOPBAR SUPERIOR (INFORMACIÓN & CONTACTO RÁPIDO) --}}
<div class="topbar">
    <div class="topbar-inner">
        <div class="topbar-info">
            <span class="topbar-item">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z"/><circle cx="12" cy="9" r="2.5"/></svg>
                <span>Av. Vía de Evitamiento Norte Cdra. 3, Cajamarca</span>
            </span>
            <span class="topbar-item topbar-item--hide-mobile">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                <span>Lun - Vie: 8:00am - 7:00pm | Sáb: 8:00am - 5:00pm</span>
            </span>
        </div>
        <div class="topbar-actions">
            <a href="tel:+51966154210" class="topbar-link">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.61 3.41 2 2 0 0 1 3.6 1.21h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.82a16 16 0 0 0 6.29 6.29l.98-.98a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                <span>+51 966 154 210</span>
            </a>
            <a href="{{ route('servicios') }}" class="topbar-badge">
                <span class="topbar-badge__dot"></span> Promociones del Mes
            </a>
        </div>
    </div>
</div>

{{-- NAVBAR PRINCIPAL --}}
<header class="navbar" id="siteNavbar">
    <div class="navbar-inner">

        <!-- Logo -->
        <a href="{{ route('home') }}" class="navbar-logo" aria-label="Inicio MSA Automotriz">
            <img src="{{ asset('img/logo_msa_letra_blanca.png') }}" alt="MSA Automotriz">
        </a>

        <!-- Botón hamburguesa (móvil) -->
        <button class="navbar-toggle" id="navToggle" aria-label="Abrir menú de navegación">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <!-- Navegación con dropdowns -->
        <nav class="navbar-links" id="navLinks">

            <!-- Nosotros -->
            <div class="nav-item">
                <a href="{{ route('nosotros') }}" class="nav-btn {{ request()->routeIs('nosotros') ? 'active' : '' }}">Nosotros</a>
            </div>

            <!-- Marcas & Megamenú -->
            <div class="nav-item nav-item--mega">
                <a href="{{ route('marcas.index') }}" class="nav-btn {{ request()->routeIs('marcas.*') ? 'active' : '' }}">
                    Marcas
                    <svg class="nav-chevron" width="10" height="6" viewBox="0 0 10 6" fill="none"><path d="M1 1L5 5L9 1" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </a>
                <div class="megamenu" id="dropMarcas">

                    {{-- Columna 1: lista de marcas con logos --}}
                    <div class="megamenu__brands">
                        <div class="megamenu__header-label">Marcas Oficiales</div>
                        @foreach($navMarcas as $navMarca)
                        <button class="megamenu__marca-btn" data-marca="{{ $navMarca->slug }}">
                            @php $mImg = $navMarca->imagen ? (str_starts_with($navMarca->imagen,'http') ? $navMarca->imagen : asset($navMarca->imagen)) : null; @endphp
                            @if($mImg)<img src="{{ $mImg }}" alt="{{ $navMarca->nombre }}" class="megamenu__marca-logo">@endif
                            <span class="megamenu__marca-name">{{ $navMarca->nombre }}</span>
                            <svg class="megamenu__marca-arrow" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M9 18l6-6-6-6"/></svg>
                        </button>
                        @endforeach
                        <a href="{{ route('marcas.index') }}" class="megamenu__ver-todas">
                            Ver todas las marcas &rsaquo;
                        </a>
                    </div>

                    {{-- Columna 2+3: panel por marca (tipos + tarjetas) --}}
                    @foreach($navMarcas as $navMarca)
                    @php
                        $mGrupos = $navMarca->modelos->groupBy(fn($m) => $m->tipo ?: 'General');
                    @endphp
                    <div class="megamenu__marca-panel" id="mega-{{ $navMarca->slug }}">

                        {{-- Tipos de vehículos (Sin 'Todos', primer tipo activo por defecto) --}}
                        <div class="megamenu__tipos">
                            <div class="megamenu__tipos-titulo">
                                <span>Modelos {{ $navMarca->nombre }}</span>
                                <a href="{{ route('marcas.show', $navMarca->slug) }}" class="megamenu__marca-link">
                                    Ver catálogo completo &rsaquo;
                                </a>
                            </div>
                            <div class="megamenu__tipos-pills">
                                @foreach($mGrupos as $tipo => $mods)
                                @php $tipoSlug = Str::slug($tipo); @endphp
                                <button class="megamenu__tipo-btn {{ $loop->first ? 'active' : '' }}" 
                                        data-panel="cards-{{ $tipoSlug }}-{{ $navMarca->slug }}">
                                    {{ $tipo }}
                                </button>
                                @endforeach
                            </div>
                        </div>

                        {{-- Grilla de tarjetas de modelos por tipo seleccionado --}}
                        <div class="megamenu__cards-wrap">
                            @foreach($mGrupos as $tipo => $mods)
                            @php $tipoSlug = Str::slug($tipo); @endphp
                            <div class="megamenu__tipo-cards {{ $loop->first ? 'active' : '' }}" id="cards-{{ $tipoSlug }}-{{ $navMarca->slug }}">
                                @foreach($mods->take(6) as $navMod)
                                @php $navModImg = $navMod->imagen ? (str_starts_with($navMod->imagen,'http') ? $navMod->imagen : asset($navMod->imagen)) : null; @endphp
                                <a href="{{ route('modelos.show', [$navMarca->slug, $navMod->slug]) }}" class="mega-card">
                                    <div class="mega-card__img" @if($navModImg) style="background-image:url('{{ $navModImg }}')" @endif>
                                        @if($navMod->tipo)<span class="mega-card__badge">{{ $navMod->tipo }}</span>@endif
                                    </div>
                                    <div class="mega-card__name">{{ $navMod->nombre }}</div>
                                    <div class="mega-card__price">
                                        @if($navMod->precio)
                                        <span>Desde: <strong>S/ {{ number_format($navMod->precio, 0, '.', ',') }}</strong></span>
                                        @else
                                        <span class="mega-card__price mega-card__price--consultar">Consultar precio</span>
                                        @endif
                                    </div>
                                </a>
                                @endforeach
                            </div>
                            @endforeach
                        </div>

                    </div>
                    @endforeach

                </div>
            </div>

            <!-- Seminuevos -->
            <div class="nav-item">
                <a href="{{ route('seminuevos') }}" class="nav-btn {{ request()->routeIs('seminuevos*') ? 'active' : '' }}">Seminuevos</a>
            </div>

            <!-- Posventa -->
            <div class="nav-item">
                <a href="{{ route('servicios') }}" class="nav-btn {{ request()->routeIs('servicios*') ? 'active' : '' }}" data-target="dropServicios">
                    Posventa
                    <svg class="nav-chevron" width="10" height="6" viewBox="0 0 10 6" fill="none"><path d="M1 1L5 5L9 1" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </a>
                <div class="dropdown-menu" id="dropServicios">
                    @foreach($navServicios as $navServicio)
                    <a href="{{ route('servicios.show', $navServicio->slug) }}">
                        <span>{{ $navServicio->nombre }}</span>
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </a>
                    @endforeach
                    <a href="{{ route('servicios') }}" class="dropdown-menu__highlight">
                        <span>Todos los servicios</span>
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </a>
                </div>
            </div>

            <!-- Transporte -->
            <div class="nav-item">
                <a href="{{ route('transporte-renting.show', 'transporte') }}" class="nav-btn {{ request()->is('transporte-renting/transporte*') ? 'active' : '' }}">Transporte</a>
            </div>

            <!-- Renting -->
            <div class="nav-item">
                <a href="{{ route('transporte-renting.show', 'renting') }}" class="nav-btn {{ request()->is('transporte-renting/renting*') ? 'active' : '' }}">Renting</a>
            </div>

            <!-- Locales -->
            <div class="nav-item">
                <a href="{{ route('locales') }}" class="nav-btn {{ request()->routeIs('locales*') ? 'active' : '' }}">Sedes</a>
            </div>

            <!-- Contacto -->
            <div class="nav-item">
                <a href="{{ route('contacto') }}" class="nav-btn {{ request()->routeIs('contacto') ? 'active' : '' }}" data-target="dropContacto">
                    Contacto
                    <svg class="nav-chevron" width="10" height="6" viewBox="0 0 10 6" fill="none"><path d="M1 1L5 5L9 1" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </a>
                <div class="dropdown-menu" id="dropContacto">
                    <a href="{{ route('contacto') }}">
                        <span>Formulario de Contacto</span>
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </a>
                    <a href="{{ route('locales') }}">
                        <span>Nuestras Sedes</span>
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </a>
                    <a href="https://wa.me/51966154210" target="_blank" rel="noopener">
                        <span>Asesor por WhatsApp</span>
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </a>
                </div>
            </div>

            <!-- CTA Cotizar -->
            <div class="nav-item nav-item--cta">
                <a href="{{ route('contacto') }}" class="nav-cta-btn">
                    <span>Cotizar</span>
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
            </div>
        </nav>
    </div>
</header>

{{-- CONTENIDO DINÁMICO --}}
<main class="main-content">
    @yield('content')
</main>

{{-- BOTÓN FLOTANTE WHATSAPP CON PULSO EN VIVO --}}
<div class="whatsapp-float-wrap">
    <div class="whatsapp-tooltip">
        <span class="whatsapp-tooltip__dot"></span> ¿En qué podemos ayudarte?
    </div>
    <a href="https://wa.me/51966154210" class="whatsapp-btn" id="waFloatBtn" target="_blank" rel="noopener" aria-label="Contactar por WhatsApp">
        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413z"/></svg>
    </a>
</div>

{{-- FOOTER MODERNO --}}
<footer class="site-footer">
    <div class="footer-top-strip">
        <div class="footer-top-inner">
            <div class="footer-feature">
                <div class="footer-feature__icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#d90429" stroke-width="2" stroke-linecap="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                </div>
                <div>
                    <div class="footer-feature__title">Garantía Oficial</div>
                    <div class="footer-feature__desc">Respaldo directo de las 10 marcas representadas.</div>
                </div>
            </div>
            <div class="footer-feature">
                <div class="footer-feature__icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#d90429" stroke-width="2" stroke-linecap="round"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
                </div>
                <div>
                    <div class="footer-feature__title">Servicio Posventa Especializado</div>
                    <div class="footer-feature__desc">Talleres certificados y repuestos 100% genuinos.</div>
                </div>
            </div>
            <div class="footer-feature">
                <div class="footer-feature__icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#d90429" stroke-width="2" stroke-linecap="round"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg>
                </div>
                <div>
                    <div class="footer-feature__title">Financiamiento a tu Medida</div>
                    <div class="footer-feature__desc">Convenios con las principales entidades financieras.</div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-inner">

        <!-- Col 1: Brand & Bio -->
        <div class="footer-col footer-col--brand">
            <a href="{{ route('home') }}" class="footer-logo-link">
                <img src="{{ asset('img/logo_msa_letra_blanca.png') }}" alt="MSA Automotriz Logo" class="footer-logo">
            </a>
            <p class="footer-about">Concesionario líder del norte del Perú con más de 19 años de trayectoria impecable, ofreciendo las mejores marcas y servicio posventa de excelencia.</p>
            <div class="footer-social">
                <a href="https://www.facebook.com/MSAautomotrizperu" class="footer-social__link" aria-label="Facebook" target="_blank" rel="noopener">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
                </a>
                <a href="https://www.instagram.com/msaautomotrizperu/" class="footer-social__link" aria-label="Instagram" target="_blank" rel="noopener">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
                </a>
                <a href="https://wa.me/51966154210" class="footer-social__link footer-social__link--wa" aria-label="WhatsApp" target="_blank" rel="noopener">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413z"/></svg>
                </a>
            </div>
        </div>

        <!-- Col 2: Marcas Oficiales -->
        <div class="footer-col">
            <h4 class="footer-col__title">Marcas Oficiales</h4>
            <ul class="footer-links">
                <li><a href="{{ route('marcas.show', 'baic') }}">BAIC</a></li>
                <li><a href="{{ route('marcas.show', 'chevrolet') }}">Chevrolet</a></li>
                <li><a href="{{ route('marcas.show', 'dongfeng') }}">Dongfeng</a></li>
                <li><a href="{{ route('marcas.show', 'forland') }}">Forland</a></li>
                <li><a href="{{ route('marcas.show', 'foton') }}">Foton</a></li>
                <li><a href="{{ route('marcas.show', 'honda-autos') }}">Honda Autos</a></li>
                <li><a href="{{ route('marcas.show', 'honda-motos') }}">Honda Motos</a></li>
                <li><a href="{{ route('marcas.show', 'isuzu-camiones') }}">Isuzu Camiones</a></li>
                <li><a href="{{ route('marcas.show', 'isuzu-pick-ups') }}">Isuzu Pick-Ups</a></li>
                <li><a href="{{ route('marcas.show', 'omoda-jaecoo') }}">Omoda &amp; Jaecoo</a></li>
            </ul>
        </div>

        <!-- Col 3: Enlaces Rápidos y Servicios -->
        <div class="footer-col">
            <h4 class="footer-col__title">Servicios &amp; Enlaces</h4>
            <ul class="footer-links">
                <li><a href="{{ route('seminuevos') }}">Seminuevos Certificados</a></li>
                <li><a href="{{ route('servicios') }}">Promociones y Ruleta</a></li>
                <li><a href="{{ route('servicios') }}">Taller y Mantenimiento</a></li>
                <li><a href="{{ route('servicios') }}">Repuestos Originales</a></li>
                <li><a href="{{ route('transporte-renting') }}">Transporte y Renting</a></li>
                <li><a href="{{ route('locales') }}">Nuestras Sedes</a></li>
                <li><a href="{{ route('terminos-condiciones') }}">Términos y Condiciones</a></li>
                <li><a href="{{ route('contacto') }}">Solicitar Cotización</a></li>
            </ul>
        </div>

        <!-- Col 4: Contacto & Horarios -->
        <div class="footer-col">
            <h4 class="footer-col__title">Atención &amp; Contacto</h4>
            <ul class="footer-contact">
                <li>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#d90429" stroke-width="2"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z"/><circle cx="12" cy="9" r="2.5"/></svg>
                    <span>Av. Vía de Evitamiento Norte Cdra. 3 S/N, Cajamarca</span>
                </li>
                <li>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#d90429" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.61 3.41 2 2 0 0 1 3.6 1.21h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.82a16 16 0 0 0 6.29 6.29l.98-.98a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                    <a href="tel:+51966154210">+51 966 154 210</a>
                </li>
                <li>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#d90429" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                    <a href="mailto:contacto@msaautomotriz.com">contacto@msaautomotriz.com</a>
                </li>
                <li>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#d90429" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                    <span>Lun - Vie: 8:00 am - 6:00 pm<br>Sáb: 8:00 am - 1:00 pm</span>
                </li>
            </ul>

            <!-- Libro de reclamaciones -->
            <div class="footer-complaints-box">
                <a href="{{ route('libro-reclamaciones') }}" class="complaints-link">
                    <img src="{{ asset('img/libro_reclamacion.png') }}" alt="Libro de Reclamaciones" class="footer-complaints__img">
                    <div class="complaints-text">
                        <strong>Libro de Reclamaciones</strong>
                        <span>Conforme al Código de Protección al Consumidor</span>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- Copyright -->
    <div class="footer-bottom">
        <div class="footer-bottom-inner">
            <p>&copy; {{ date('Y') }} <strong>MSA Automotriz S.A.A.</strong> Todos los derechos reservados. RUC: 20491781409.</p>
            <div class="footer-legal-links">
                <a href="{{ route('terminos-condiciones') }}">Términos y Condiciones</a>
                <span class="legal-sep">•</span>
                <a href="{{ route('libro-reclamaciones') }}">Libro de Reclamaciones</a>
            </div>
            <p class="footer-credit">Concesionaria Oficial en el Norte del Perú</p>
        </div>
    </div>
</footer>

{{-- MODAL SELECTOR DE WHATSAPP --}}
<div id="waChooser" class="wa-chooser-overlay">
    <div class="wa-chooser-card">
        <div class="wa-chooser-icon">
            <svg width="32" height="32" viewBox="0 0 24 24" fill="#25D366"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413z"/></svg>
        </div>
        <h3 class="wa-chooser-title">Atención por WhatsApp</h3>
        <p class="wa-chooser-desc">¿Con qué área deseas comunicarte el día de hoy?</p>
        <div class="wa-chooser-actions">
            <button type="button" id="waSalesBtn" class="wa-chooser-btn wa-chooser-btn--sales">
                <span class="wa-chooser-btn__icon">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.5 2.8C1.4 11.2 1 12 1 13v3c0 .6.4 1 1 1h2"/>
                        <circle cx="7" cy="17" r="2"/>
                        <path d="M9 17h6"/>
                        <circle cx="17" cy="17" r="2"/>
                    </svg>
                </span>
                <span class="wa-chooser-btn__text">
                    <strong>Ventas de Vehículos</strong>
                    <small>Cotizaciones, modelos y seminuevos</small>
                </span>
            </button>
            <button type="button" id="waAfterSalesBtn" class="wa-chooser-btn wa-chooser-btn--aftersales">
                <span class="wa-chooser-btn__icon">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/>
                    </svg>
                </span>
                <span class="wa-chooser-btn__text">
                    <strong>Taller &amp; Posventa</strong>
                    <small>Mantenimiento, citas y repuestos</small>
                </span>
            </button>
            <button type="button" id="waCancelBtn" class="wa-chooser-btn wa-chooser-btn--cancel">Cerrar ventana</button>
        </div>
    </div>
</div>

{{-- BANNER FLOTANTE DE ACEPTACIÓN DE TÉRMINOS Y PRIVACIDAD --}}
<div id="consentBanner" class="consent-banner">
    <div class="consent-banner__inner">
        <div class="consent-banner__icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
        </div>
        <div class="consent-banner__content">
            <strong class="consent-banner__title">Aviso de Privacidad y Términos</strong>
            <p class="consent-banner__desc">
                En <strong>MSA Automotriz</strong> utilizamos cookies y tratamos datos personales para mejorar tu navegación, brindarte cotizaciones y asesoría comercial. Al continuar, aceptas nuestros 
                <a href="{{ route('terminos-condiciones') }}" target="_blank">Términos y Condiciones</a>.
            </p>
        </div>
        <div class="consent-banner__actions">
            <a href="{{ route('terminos-condiciones') }}" class="consent-btn consent-btn--link">Ver Términos</a>
            <button type="button" id="acceptConsentBtn" class="consent-btn consent-btn--accept">
                <span>Aceptar y Continuar</span>
            </button>
        </div>
    </div>
</div>

<!-- Global Main JS -->
<script src="{{ asset('js/main.js') }}?v=30"></script>
@yield('scripts')
</body>
</html>
