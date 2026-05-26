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
            <div class="nav-item">
                <a href="{{ route('marcas.index') }}" class="nav-btn" data-target="dropMarcas">MARCAS</a>
                <div class="dropdown-menu" id="dropMarcas">

                    <div class="marca-flyout-item">
                        <a href="{{ route('marcas.show', 'baic') }}" class="marca-flyout-link">BAIC</a>
                        <div class="marca-flyout-panel">
                            <p class="marca-flyout-titulo">Modelos BAIC</p>
                            <div class="marca-flyout-grid">
                                <a href="{{ route('marcas.show', 'baic') }}" class="modelo-prev-card">
                                    <div class="modelo-prev-img" style="background-image:url('{{ asset('img/baic/baic_pruebas.jpg') }}')"></div>
                                    <span class="modelo-prev-name">X55 Plus</span>
                                </a>
                                <a href="{{ route('marcas.show', 'baic') }}" class="modelo-prev-card">
                                    <div class="modelo-prev-img" style="background-image:url('{{ asset('img/baic/baic_pruebas.jpg') }}')"></div>
                                    <span class="modelo-prev-name">X35</span>
                                </a>
                                <a href="{{ route('marcas.show', 'baic') }}" class="modelo-prev-card">
                                    <div class="modelo-prev-img" style="background-image:url('{{ asset('img/baic/baic_pruebas.jpg') }}')"></div>
                                    <span class="modelo-prev-name">BJ40</span>
                                </a>
                            </div>
                            <a href="{{ route('marcas.show', 'baic') }}" class="marca-flyout-vermas">Ver todos los modelos &rarr;</a>
                        </div>
                    </div>

                    <div class="marca-flyout-item">
                        <a href="{{ route('marcas.show', 'chevrolet') }}" class="marca-flyout-link">CHEVROLET</a>
                        <div class="marca-flyout-panel">
                            <p class="marca-flyout-titulo">Modelos Chevrolet</p>
                            <div class="marca-flyout-grid">
                                <a href="{{ route('marcas.show', 'chevrolet') }}" class="modelo-prev-card">
                                    <div class="modelo-prev-img" style="background-image:url('{{ asset('img/chevrolet/chevrolet_pruebas.jpeg') }}')"></div>
                                    <span class="modelo-prev-name">Tracker</span>
                                </a>
                                <a href="{{ route('marcas.show', 'chevrolet') }}" class="modelo-prev-card">
                                    <div class="modelo-prev-img" style="background-image:url('{{ asset('img/chevrolet/chevrolet_pruebas.jpeg') }}')"></div>
                                    <span class="modelo-prev-name">Captiva</span>
                                </a>
                                <a href="{{ route('marcas.show', 'chevrolet') }}" class="modelo-prev-card">
                                    <div class="modelo-prev-img" style="background-image:url('{{ asset('img/chevrolet/chevrolet_pruebas.jpeg') }}')"></div>
                                    <span class="modelo-prev-name">Onix Plus</span>
                                </a>
                            </div>
                            <a href="{{ route('marcas.show', 'chevrolet') }}" class="marca-flyout-vermas">Ver todos los modelos &rarr;</a>
                        </div>
                    </div>

                    <div class="marca-flyout-item">
                        <a href="{{ route('marcas.show', 'dongfeng') }}" class="marca-flyout-link">DONGFENG</a>
                        <div class="marca-flyout-panel">
                            <p class="marca-flyout-titulo">Modelos Dongfeng</p>
                            <div class="marca-flyout-grid">
                                <a href="{{ route('marcas.show', 'dongfeng') }}" class="modelo-prev-card">
                                    <div class="modelo-prev-img" style="background-image:url('{{ asset('img/dongfeng/dongfeng_pruebas.jpg') }}')"></div>
                                    <span class="modelo-prev-name">AX5</span>
                                </a>
                                <a href="{{ route('marcas.show', 'dongfeng') }}" class="modelo-prev-card">
                                    <div class="modelo-prev-img" style="background-image:url('{{ asset('img/dongfeng/dongfeng_pruebas.jpg') }}')"></div>
                                    <span class="modelo-prev-name">AX7</span>
                                </a>
                                <a href="{{ route('marcas.show', 'dongfeng') }}" class="modelo-prev-card">
                                    <div class="modelo-prev-img" style="background-image:url('{{ asset('img/dongfeng/dongfeng_pruebas.jpg') }}')"></div>
                                    <span class="modelo-prev-name">S50</span>
                                </a>
                            </div>
                            <a href="{{ route('marcas.show', 'dongfeng') }}" class="marca-flyout-vermas">Ver todos los modelos &rarr;</a>
                        </div>
                    </div>

                    <div class="marca-flyout-item">
                        <a href="{{ route('marcas.show', 'forland') }}" class="marca-flyout-link">FORLAND</a>
                        <div class="marca-flyout-panel">
                            <p class="marca-flyout-titulo">Modelos Forland</p>
                            <div class="marca-flyout-grid">
                                <a href="{{ route('marcas.show', 'forland') }}" class="modelo-prev-card">
                                    <div class="modelo-prev-img" style="background-image:url('{{ asset('img/forland/forland_pruebas.jpg') }}')"></div>
                                    <span class="modelo-prev-name">F1</span>
                                </a>
                            </div>
                            <a href="{{ route('marcas.show', 'forland') }}" class="marca-flyout-vermas">Ver todos los modelos &rarr;</a>
                        </div>
                    </div>

                    <div class="marca-flyout-item">
                        <a href="{{ route('marcas.show', 'foton') }}" class="marca-flyout-link">FOTON</a>
                        <div class="marca-flyout-panel">
                            <p class="marca-flyout-titulo">Modelos Foton</p>
                            <div class="marca-flyout-grid">
                                <a href="{{ route('marcas.show', 'foton') }}" class="modelo-prev-card">
                                    <div class="modelo-prev-img" style="background-image:url('{{ asset('img/foton/foton_pruebas.jpg') }}')"></div>
                                    <span class="modelo-prev-name">Aumark</span>
                                </a>
                            </div>
                            <a href="{{ route('marcas.show', 'foton') }}" class="marca-flyout-vermas">Ver todos los modelos &rarr;</a>
                        </div>
                    </div>

                    <div class="marca-flyout-item">
                        <a href="{{ route('marcas.show', 'honda-autos') }}" class="marca-flyout-link">HONDA AUTOS</a>
                        <div class="marca-flyout-panel">
                            <p class="marca-flyout-titulo">Modelos Honda Autos</p>
                            <div class="marca-flyout-grid">
                                <a href="{{ route('marcas.show', 'honda-autos') }}" class="modelo-prev-card">
                                    <div class="modelo-prev-img" style="background-image:url('{{ asset('img/honda_autos/hondaau_pruebas.jpg') }}')"></div>
                                    <span class="modelo-prev-name">HR-V</span>
                                </a>
                            </div>
                            <a href="{{ route('marcas.show', 'honda-autos') }}" class="marca-flyout-vermas">Ver todos los modelos &rarr;</a>
                        </div>
                    </div>

                    <div class="marca-flyout-item">
                        <a href="{{ route('marcas.show', 'honda-motos') }}" class="marca-flyout-link">HONDA MOTOS</a>
                        <div class="marca-flyout-panel">
                            <p class="marca-flyout-titulo">Modelos Honda Motos</p>
                            <div class="marca-flyout-grid">
                                <a href="{{ route('marcas.show', 'honda-motos') }}" class="modelo-prev-card">
                                    <div class="modelo-prev-img" style="background-image:url('{{ asset('img/honda_motos/hondamo_pruebas.jpeg') }}')"></div>
                                    <span class="modelo-prev-name">CB190R</span>
                                </a>
                            </div>
                            <a href="{{ route('marcas.show', 'honda-motos') }}" class="marca-flyout-vermas">Ver todos los modelos &rarr;</a>
                        </div>
                    </div>

                    <div class="marca-flyout-item">
                        <a href="{{ route('marcas.show', 'isuzu-camiones') }}" class="marca-flyout-link">ISUZU CAMIONES</a>
                        <div class="marca-flyout-panel">
                            <p class="marca-flyout-titulo">Modelos Isuzu Camiones</p>
                            <div class="marca-flyout-grid">
                                <a href="{{ route('marcas.show', 'isuzu-camiones') }}" class="modelo-prev-card">
                                    <div class="modelo-prev-img" style="background-image:url('{{ asset('img/isuzu_camiones/isuzuca_pruebas.jpeg') }}')"></div>
                                    <span class="modelo-prev-name">NLR</span>
                                </a>
                            </div>
                            <a href="{{ route('marcas.show', 'isuzu-camiones') }}" class="marca-flyout-vermas">Ver todos los modelos &rarr;</a>
                        </div>
                    </div>

                    <div class="marca-flyout-item">
                        <a href="{{ route('marcas.show', 'isuzu-pick-ups') }}" class="marca-flyout-link">ISUZU PICK-UPS</a>
                        <div class="marca-flyout-panel">
                            <p class="marca-flyout-titulo">Modelos Isuzu Pick-Ups</p>
                            <div class="marca-flyout-grid">
                                <a href="{{ route('marcas.show', 'isuzu-pick-ups') }}" class="modelo-prev-card">
                                    <div class="modelo-prev-img" style="background-image:url('{{ asset('img/isuzu_pick_ups/isuzupic_pruebas.jpeg') }}')"></div>
                                    <span class="modelo-prev-name">D-Max</span>
                                </a>
                            </div>
                            <a href="{{ route('marcas.show', 'isuzu-pick-ups') }}" class="marca-flyout-vermas">Ver todos los modelos &rarr;</a>
                        </div>
                    </div>

                    <div class="marca-flyout-item">
                        <a href="{{ route('marcas.show', 'omoda-jaecoo') }}" class="marca-flyout-link">OMODA &amp; JAECOO</a>
                        <div class="marca-flyout-panel">
                            <p class="marca-flyout-titulo">Modelos Omoda &amp; Jaecoo</p>
                            <div class="marca-flyout-grid">
                                <a href="{{ route('marcas.show', 'omoda-jaecoo') }}" class="modelo-prev-card">
                                    <div class="modelo-prev-img" style="background-image:url('{{ asset('img/omoda_faecoo/omoda_pruebas.jpg') }}')"></div>
                                    <span class="modelo-prev-name">Omoda 5</span>
                                </a>
                            </div>
                            <a href="{{ route('marcas.show', 'omoda-jaecoo') }}" class="marca-flyout-vermas">Ver todos los modelos &rarr;</a>
                        </div>
                    </div>

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
<a href="https://wa.me/51986339369" class="whatsapp-btn" target="_blank" rel="noopener" aria-label="Contactar por WhatsApp">&#x1F4DE;</a>

<footer class="site-footer">
    <div class="footer-inner">

        <!-- Col 1: Logo + descripción + redes -->
        <div class="footer-col footer-col--brand">
            <a href="{{ route('home') }}">
                <img src="{{ asset('img/logo_msa.jpeg') }}" alt="MSA Automotriz Logo" class="footer-logo">
            </a>
            <p class="footer-about">Concesionaria l&iacute;der en Cajamarca con m&aacute;s de 19 a&ntilde;os brindando las mejores marcas del mercado automotriz.</p>
            <div class="footer-social">
                <a href="#" class="footer-social__link" aria-label="Facebook" target="_blank" rel="noopener">f</a>
                <a href="#" class="footer-social__link" aria-label="Instagram" target="_blank" rel="noopener">in</a>
                <a href="https://wa.me/51986339369" class="footer-social__link footer-social__link--wa" aria-label="WhatsApp" target="_blank" rel="noopener">wa</a>
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
</body>
</html>
