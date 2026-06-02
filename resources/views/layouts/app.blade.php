<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'MSA - Concesionaria')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}?v=5">
    @yield('styles')
</head>
<body>

<header class="navbar">
    <div class="navbar-inner">

        <!-- Logo -->
        <a href="{{ route('home') }}" class="navbar-logo">
            <img src="{{ asset('img/logo_msa.jpeg') }}" alt="MSA Logo">
        </a>

        <!-- Botón hamburguesa (móvil) -->
        <button class="navbar-toggle" id="navToggle" aria-label="Menú">&#9776;</button>

        <!-- Navegación con dropdowns -->
        <nav class="navbar-links" id="navLinks">

            <!-- Nosotros -->
            <div class="nav-item">
                <a href="{{ route('nosotros') }}" class="nav-btn">NOSOTROS</a>
            </div>

            <!-- Marcas -->
            <div class="nav-item nav-item--mega">
                <a href="{{ route('marcas.index') }}" class="nav-btn">MARCAS</a>
                <div class="megamenu" id="dropMarcas">

                    {{-- Columna 1: lista de marcas --}}
                    <div class="megamenu__brands">
                        @foreach($navMarcas as $navMarca)
                        <button class="megamenu__marca-btn" data-marca="{{ $navMarca->slug }}">
                            @php $mImg = $navMarca->imagen ? (str_starts_with($navMarca->imagen,'http') ? $navMarca->imagen : asset($navMarca->imagen)) : null; @endphp
                            @if($mImg)<img src="{{ $mImg }}" alt="{{ $navMarca->nombre }}">@endif
                            <span>{{ $navMarca->nombre }}</span>
                            <svg width="10" height="10" viewBox="0 0 10 10" fill="none"><path d="M3 2l4 3-4 3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </button>
                        @endforeach
                    </div>

                    {{-- Columna 2+3: panel por marca (tipos + tarjetas) --}}
                    @foreach($navMarcas as $navMarca)
                    @php
                        $mGrupos = $navMarca->modelos->groupBy(fn($m) => $m->tipo ?: '__todos__');
                        $mPrimerTipo = $mGrupos->keys()->first();
                    @endphp
                    <div class="megamenu__marca-panel" id="mega-{{ $navMarca->slug }}">

                        {{-- Tipos --}}
                        <div class="megamenu__tipos">
                            <div class="megamenu__tipos-titulo">{{ $navMarca->nombre }}</div>
                            @foreach($mGrupos->keys() as $tipo)
                            <button class="megamenu__tipo-btn {{ $loop->first ? 'active' : '' }}"
                                    data-panel="mega-{{ $navMarca->slug }}-{{ Str::slug($tipo) }}">
                                {{ $tipo === '__todos__' ? 'Todos' : $tipo }}
                            </button>
                            @endforeach

                        </div>

                        {{-- Tarjetas por tipo --}}
                        <div class="megamenu__cards-wrap">
                            @foreach($mGrupos as $tipo => $mModelos)
                            <div class="megamenu__tipo-cards {{ $loop->first ? 'active' : '' }}"
                                 id="mega-{{ $navMarca->slug }}-{{ Str::slug($tipo) }}">
                                @foreach($mModelos as $mModelo)
                                @php $mModeloImg = $mModelo->imagen ? (str_starts_with($mModelo->imagen,'http') ? $mModelo->imagen : asset($mModelo->imagen)) : null; @endphp
                                <a href="{{ route('modelos.show', [$navMarca->slug, $mModelo->slug]) }}" class="mega-card">
                                    <div class="mega-card__img" @if($mModeloImg) style="background-image:url('{{ $mModeloImg }}')" @endif></div>
                                    <span class="mega-card__name">{{ $mModelo->nombre }}</span>
                                    @if($mModelo->precio)
                                    <span class="mega-card__price">Desde S/ {{ number_format($mModelo->precio, 0, '.', ',') }}</span>
                                    @endif
                                </a>
                                @endforeach
                            </div>
                            @endforeach
                        </div>

                    </div>
                    @endforeach

                </div>
            </div>

            <!-- Posventa -->
            <div class="nav-item">
                <a href="{{ route('servicios') }}" class="nav-btn" data-target="dropServicios">POSVENTA</a>
                <div class="dropdown-menu" id="dropServicios">
                    @foreach($navServicios as $navServicio)
                    <a href="{{ route('servicios.show', $navServicio->slug) }}">{{ strtoupper($navServicio->nombre) }}</a>
                    @endforeach
                </div>
            </div>

            <!-- Locales -->
            <div class="nav-item">
                <a href="{{ route('locales') }}" class="nav-btn" data-target="dropLocales">LOCALES</a>
                <div class="dropdown-menu" id="dropLocales">
                    @foreach($navLocales as $navLocal)
                    <a href="{{ route('locales.show', $navLocal->id) }}">{{ strtoupper($navLocal->nombre) }}</a>
                    @endforeach
                </div>
            </div>

            <!-- Contacto -->
            <div class="nav-item">
                <a href="{{ route('contacto') }}" class="nav-btn" data-target="dropContacto">CONTACTO</a>
                <div class="dropdown-menu" id="dropContacto">
                    <a href="{{ route('contacto') }}">FORMULARIO</a>
                    <a href="{{ route('locales') }}">NUESTROS LOCALES</a>
                    <a href="https://wa.me/51986339369" target="_blank" rel="noopener">WHATSAPP</a>
                </div>
            </div>

        </nav>
    </div>
</header>

@yield('content')

<!-- Botón flotante WhatsApp -->
<a href="https://wa.me/51986339369" class="whatsapp-btn" target="_blank" rel="noopener" aria-label="Contactar por WhatsApp">
    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413z"/></svg>
</a>

<footer class="site-footer">
    <div class="footer-inner">

        <!-- Col 1: Logo + descripción + redes -->
        <div class="footer-col footer-col--brand">
            <a href="{{ route('home') }}">
                <img src="{{ asset('img/logo_msa.jpeg') }}" alt="MSA Automotriz Logo" class="footer-logo">
            </a>
            <p class="footer-about">Concesionaria l&iacute;der en Cajamarca con m&aacute;s de 19 a&ntilde;os brindando las mejores marcas del mercado automotriz.</p>
            <div class="footer-social">
                <a href="https://www.facebook.com/MSAautomotrizperu" class="footer-social__link" aria-label="Facebook" target="_blank" rel="noopener">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
                </a>
                <a href="https://www.instagram.com/msaautomotrizperu/" class="footer-social__link" aria-label="Instagram" target="_blank" rel="noopener">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
                </a>
                <a href="https://wa.me/51986339369" class="footer-social__link footer-social__link--wa" aria-label="WhatsApp" target="_blank" rel="noopener">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413z"/></svg>
                </a>
            </div>
        </div>

        <!-- Col 2: Marcas -->
        <div class="footer-col">
            <h4 class="footer-col__title">Nuestras Marcas</h4>
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

        <!-- Col 3: Servicios -->
        <div class="footer-col">
            <h4 class="footer-col__title">Servicios</h4>
            <ul class="footer-links">
                <li><a href="{{ route('servicios') }}">Promociones</a></li>
                <li><a href="{{ route('servicios') }}">Accesorios</a></li>
                <li><a href="{{ route('servicios') }}">Mantenimiento</a></li>
                <li><a href="{{ route('servicios') }}">Repuestos</a></li>
                <li><a href="{{ route('servicios') }}">Carrocer&iacute;a y Pintura</a></li>
                <li><a href="{{ route('servicios') }}">Seguros</a></li>
                <li><a href="{{ route('servicios') }}">Agenda tu Cita</a></li>
            </ul>
        </div>

        <!-- Col 4: Contacto -->
        <div class="footer-col">
            <h4 class="footer-col__title">Contacto</h4>
            <ul class="footer-contact">
                <li><span>Av. Independencia 1234, Cajamarca, Per&uacute;</span></li>
                <li><span>Carretera Ba&ntilde;os del Inca km 3.5</span></li>
                <li><span>(076) 123-456 &nbsp;|&nbsp; (076) 789-012</span></li>
                <li><span>+51 986 339 369</span></li>
                <li><span>contacto@msaautomotriz.com</span></li>
                <li><span>Lun &ndash; Vie: 8:00 am &ndash; 6:00 pm<br>S&aacute;b: 8:00 am &ndash; 1:00 pm</span></li>
            </ul>
        </div>
    </div>

    <!-- Libro de reclamaciones -->
    <div class="footer-complaints" style="text-align:center; margin: 32px 0;">
        <a href="{{ route('libro-reclamaciones') }}" class="complaints-link">
            <img src="{{ asset('img/libro_reclamacion.png') }}" alt="Libro de Reclamaciones" class="complaints-img" style="max-width:180px;cursor:pointer;">
        </a>
    </div>

    <div class="footer-bottom">
        <p>&copy; {{ date('Y') }} MSA Automotriz. Todos los derechos reservados.</p>
        <p>Dise&ntilde;ado para Cajamarca, Per&uacute;.</p>
    </div>
</footer>

<script src="{{ asset('js/main.js') }}"></script>
<script>
(function () {
    const megamenu = document.getElementById('dropMarcas');
    if (!megamenu) return;

    const marcaBtns   = megamenu.querySelectorAll('.megamenu__marca-btn');
    const marcaPanels = megamenu.querySelectorAll('.megamenu__marca-panel');
    const navItem     = megamenu.closest('.nav-item--mega');
    const trigger     = navItem ? navItem.querySelector('.nav-btn') : null;

    function activateMarca(slug) {
        marcaBtns.forEach(b => b.classList.toggle('active', b.dataset.marca === slug));
        marcaPanels.forEach(p => p.classList.toggle('active', p.id === 'mega-' + slug));
    }

    // Activar primera marca por defecto
    if (marcaBtns.length) activateMarca(marcaBtns[0].dataset.marca);

    marcaBtns.forEach(btn => {
        btn.addEventListener('mouseenter', () => activateMarca(btn.dataset.marca));
        btn.addEventListener('click', () => activateMarca(btn.dataset.marca));
    });

    // Tipos dentro de cada marca
    megamenu.querySelectorAll('.megamenu__tipo-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            const panelId = btn.dataset.panel;
            const wrap = btn.closest('.megamenu__marca-panel');
            wrap.querySelectorAll('.megamenu__tipo-btn').forEach(b => b.classList.remove('active'));
            wrap.querySelectorAll('.megamenu__tipo-cards').forEach(p => p.classList.remove('active'));
            btn.classList.add('active');
            const panel = document.getElementById(panelId);
            if (panel) panel.classList.add('active');
        });
    });

    // Click en trigger: abrir/cerrar megamenú solo en desktop
    if (trigger) {
        trigger.addEventListener('click', function (e) {
            if (window.innerWidth > 1024) {
                e.preventDefault();
                navItem.classList.toggle('mega-open');
            }
            // En móvil: navega normalmente a la página de marcas
        });
    }

    // Cerrar al hacer clic fuera
    document.addEventListener('click', function (e) {
        if (navItem && !navItem.contains(e.target)) {
            navItem.classList.remove('mega-open');
        }
    });
})();
</script>
</body>
</html>
