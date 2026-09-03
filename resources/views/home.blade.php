@extends('layouts.app')
@section('title', 'MSA Automotriz - Concesionaria Oficial en el Norte del Perú')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/home.css') }}?v=16">
@endsection

@section('content')

{{-- ══ 1. HERO TRÍPTICO DE 3 BANNERS REALES (LIMPIO, ELEGANTE Y ESPACIOSO) ════════ --}}
<section class="hero-triptych">
    {{-- Banner 1: Chevrolet --}}
    <a href="{{ route('marcas.show', 'chevrolet') }}" class="hero-panel">
        <div class="hero-panel__bg" style="background-image: url('{{ asset('img/banners/baner_colorado.png') }}');"></div>
        <div class="hero-panel__overlay"></div>
        <div class="hero-panel__content">
            <span class="hero-panel__badge">Concesionario Oficial</span>
            <h2 class="hero-panel__title">CHEVROLET</h2>
            <p class="hero-panel__desc">SUVs, Pick-ups y Sedanes con entrega inmediata y garantía oficial de fábrica.</p>
            <span class="hero-panel__btn">
                <span>Ver Catálogo</span>
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </span>
        </div>
    </a>

    {{-- Banner 2: Honda Motos --}}
    <a href="{{ route('marcas.show', 'honda-motos') }}" class="hero-panel">
        <div class="hero-panel__bg" style="background-image: url('{{ asset('img/banners/baner_moto_honda.png') }}');"></div>
        <div class="hero-panel__overlay"></div>
        <div class="hero-panel__content">
            <span class="hero-panel__badge">Línea Oficial Honda</span>
            <h2 class="hero-panel__title">HONDA MOTOS</h2>
            <p class="hero-panel__desc">Máximo rendimiento, agilidad y el respaldo legendario de la marca #1 en dos ruedas.</p>
            <span class="hero-panel__btn">
                <span>Ver Motocicletas</span>
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </span>
        </div>
    </a>

    {{-- Banner 3: Isuzu Camiones --}}
    <a href="{{ route('marcas.show', 'isuzu-camiones') }}" class="hero-panel">
        <div class="hero-panel__bg" style="background-image: url('{{ asset('img/banners/baner_isuzu_cami.png') }}');"></div>
        <div class="hero-panel__overlay"></div>
        <div class="hero-panel__content">
            <span class="hero-panel__badge">Vehículos Comerciales</span>
            <h2 class="hero-panel__title">ISUZU CAMIONES</h2>
            <p class="hero-panel__desc">Resistencia probada y máxima capacidad de carga para impulsar la rentabilidad de tu negocio.</p>
            <span class="hero-panel__btn">
                <span>Línea Comercial</span>
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </span>
        </div>
    </a>
</section>

{{-- ══ 2. BARRA DE MARCAS OFICIALES (MITSUI BRAND BAR) ═══════════ --}}
<section class="brand-bar">
    <div class="brand-bar__inner">
        <span class="brand-bar__label">Marcas Oficiales:</span>
        <div class="brand-bar__items">
            @foreach($navMarcas as $m)
            @php $mLogo = $m->imagen ? (str_starts_with($m->imagen, 'http') ? $m->imagen : asset($m->imagen)) : null; @endphp
            <a href="{{ route('marcas.show', $m->slug) }}" class="brand-bar__item" title="{{ $m->nombre }}">
                @if($mLogo)
                <img src="{{ $mLogo }}" alt="{{ $m->nombre }}" class="brand-bar__logo">
                @else
                <span class="brand-bar__name">{{ $m->nombre }}</span>
                @endif
            </a>
            @endforeach
        </div>
    </div>
</section>

{{-- ══ 3. BUSCADOR DE VEHÍCULOS (VEHICLE FINDER LIMPIO) ══════════ --}}
<section class="finder-section">
    <div class="finder-container">
        <div class="finder-header">
            <div class="finder-tabs">
                <button type="button" class="finder-tab active" onclick="setFinderTipo(this, '0km')">
                    <span>Vehículos 0km</span>
                </button>
                <button type="button" class="finder-tab" onclick="setFinderTipo(this, 'seminuevo')">
                    <span>Seminuevos</span>
                </button>
            </div>
            <div class="finder-title-text">Encuentra tu próximo vehículo</div>
        </div>

        <div class="finder-form">
            <div class="finder-field">
                <label for="findMarca">Marca</label>
                <select id="findMarca" onchange="filtrarModelos()" aria-label="Seleccionar marca">
                    <option value="">Todas las marcas</option>
                    <option value="baic">BAIC</option>
                    <option value="chevrolet">Chevrolet</option>
                    <option value="dongfeng">Dongfeng</option>
                    <option value="forland">Forland</option>
                    <option value="foton">Foton</option>
                    <option value="honda-autos">Honda Autos</option>
                    <option value="honda-motos">Honda Motos</option>
                    <option value="isuzu-camiones">Isuzu Camiones</option>
                    <option value="isuzu-pick-ups">Isuzu Pick-Ups</option>
                    <option value="omoda-jaecoo">Omoda &amp; Jaecoo</option>
                </select>
            </div>

            <div class="finder-field">
                <label for="findUbicacion">Sede / Ciudad</label>
                <select id="findUbicacion" aria-label="Seleccionar sede">
                    <option value="">Todas las sedes</option>
                    <option value="cajamarca">Sede Cajamarca</option>
                    <option value="piura">Sede Piura</option>
                    <option value="chiclayo">Sede Chiclayo</option>
                    <option value="lima">Sede Lima</option>
                </select>
            </div>

            <div class="finder-field">
                <label for="findVehiculo">Modelo</label>
                <select id="findVehiculo" aria-label="Seleccionar modelo">
                    <option value="">Todos los modelos</option>
                </select>
            </div>

            <button type="button" class="finder-submit-btn" onclick="buscarVehiculo()">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                <span>Buscar</span>
            </button>
        </div>
    </div>
</section>

{{-- ══ 4. MODELOS DESTACADOS ════════════════════════════════════ --}}
<section class="models-section">
    <div class="section-header">
        <span class="section-tag">Catálogo Oficial</span>
        <h2 class="section-title">Modelos Destacados</h2>
        <p class="section-subtitle">Descubre los vehículos más cotizados con entrega inmediata y financiamiento a tu medida.</p>
    </div>
    <div class="models-grid">
        @forelse ($modelos as $modelo)
        @php $mdlImg = $modelo->imagen ? (str_starts_with($modelo->imagen, 'http') ? $modelo->imagen : asset($modelo->imagen)) : null; @endphp
        <a href="{{ route('modelos.show', [$modelo->marca->slug, $modelo->slug]) }}" class="model-card">
            <div class="model-card__img-wrap">
                <div class="model-card__img" @if($mdlImg) style="background-image: url('{{ $mdlImg }}');" @endif>
                    <span class="model-card__badge">{{ $modelo->marca->nombre }}</span>
                </div>
            </div>
            <div class="model-card__body">
                <h3 class="model-card__name">{{ $modelo->nombre }}</h3>
                <p class="model-card__desc">{{ Str::limit($modelo->descripcion ?? 'Consulta disponibilidad y cotiza con nuestros asesores comerciales.', 85) }}</p>
                <div class="model-card__footer">
                    <div class="model-card__price-box">
                        @if($modelo->precio)
                        <span class="model-card__price-label">Precio desde</span>
                        <span class="model-card__price-value">S/ {{ number_format($modelo->precio, 0, '.', ',') }}</span>
                        @else
                        <span class="model-card__price-label">Disponibilidad</span>
                        <span class="model-card__price-value" style="font-size: 0.95rem; color: var(--color-primary);">Consultar precio</span>
                        @endif
                    </div>
                    <span class="model-card__btn">Ver detalles &rsaquo;</span>
                </div>
            </div>
        </a>
        @empty
        <p style="grid-column:1/-1;text-align:center;color:#888;padding:40px 0;">
            Aún no hay modelos destacados. Márcalos desde el panel de administración.
        </p>
        @endforelse
    </div>
</section>

{{-- ══ 5. POSVENTA & SERVICIOS ═══════════════════════════════════ --}}
<section class="services-section">
    <div class="section-header">
        <span class="section-tag">Cuidado Integral</span>
        <h2 class="section-title">Servicio Posventa Especializado</h2>
        <p class="section-subtitle">Acompañamos tu inversión con talleres autorizados, repuestos genuinos y técnicos certificados.</p>
    </div>
    <div class="services-content">
        @foreach($servicios as $servicio)
        <a href="{{ route('servicios.show', $servicio->slug) }}" class="service-item">
            @if($servicio->imagen)
            @php $svcImg = str_starts_with($servicio->imagen, 'http') ? $servicio->imagen : asset($servicio->imagen); @endphp
            <div class="service-item__img" style="background-image: url('{{ $svcImg }}');"></div>
            @else
            <div class="service-item__img" style="background: #2b2b2b; display:flex; align-items:center; justify-content:center;">
                <svg width="42" height="42" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.4)" stroke-width="1.5"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg>
            </div>
            @endif
            <div class="service-item__body">
                <div class="service-item__title">{{ $servicio->nombre }}</div>
                <div class="service-item__desc">{{ Str::limit($servicio->descripcion ?? 'Consulta con nuestros especialistas en talleres oficiales.', 85) }}</div>
                <span class="service-item__btn">Solicitar servicio &rsaquo;</span>
            </div>
        </a>
        @endforeach
    </div>
</section>

{{-- ══ 6. TRANSPORTE Y RENTING ═══════════════════════════════════ --}}
<section class="renting-section">
    <div class="section-header">
        <span class="section-tag">Soluciones B2B</span>
        <h2 class="section-title">Transporte y Renting Corporativo</h2>
        <p class="section-subtitle">Flotas a la medida para empresas del sector minero, agroindustrial, logístico y comercial.</p>
    </div>
    <div class="renting-grid">
        @forelse($transporteRenting as $item)
        @php $rImg = $item->imagen ? (str_starts_with($item->imagen, 'http') ? $item->imagen : asset($item->imagen)) : null; @endphp
        <a href="{{ route('transporte-renting.show', $item->slug) }}" class="renting-card">
            <div class="renting-card__img" @if($rImg) style="background-image:url('{{ $rImg }}')" @endif>
                @unless($rImg)
                <svg width="60" height="42" viewBox="0 0 64 44" fill="none" stroke="#64748b" stroke-width="1.8" stroke-linecap="round">
                    <rect x="1" y="4" width="40" height="28" rx="4"/><path d="M41 14h12l8 12v8H41V14z"/>
                    <circle cx="14" cy="39" r="5"/><circle cx="52" cy="39" r="5"/>
                </svg>
                @endunless
            </div>
            <div class="renting-card__body">
                <div class="renting-card__title">{{ $item->nombre }}</div>
                <div class="renting-card__desc">{{ $item->descripcion }}</div>
                <span class="renting-card__link">Cotizar flota &rsaquo;</span>
            </div>
        </a>
        @empty
        <p style="grid-column:1/-1;text-align:center;color:#888;padding:20px 0;">
            Sin servicios de transporte registrados aún.
        </p>
        @endforelse
    </div>
</section>

{{-- ══ 7. ¿POR QUÉ ELEGIRNOS? ════════════════════════════════════ --}}
<section class="porque-section">
    <div class="section-header">
        <span class="section-tag">Confianza &amp; Trayectoria</span>
        <h2 class="section-title">¿Por qué elegir a MSA Automotriz?</h2>
        <p class="section-subtitle">Más de dos décadas liderando el sector automotriz en el norte del Perú con transparencia y solidez.</p>
    </div>

    {{-- Stats --}}
    <div class="porque-stats">
        <div class="porque-stat">
            <div class="porque-stat__num">+19</div>
            <div class="porque-stat__label">Años de experiencia oficial</div>
        </div>
        <div class="porque-stat">
            <div class="porque-stat__num">10</div>
            <div class="porque-stat__label">Marcas representadas</div>
        </div>
        <div class="porque-stat">
            <div class="porque-stat__num">4</div>
            <div class="porque-stat__label">Sedes en el norte del Perú</div>
        </div>
        <div class="porque-stat">
            <div class="porque-stat__num">+10K</div>
            <div class="porque-stat__label">Clientes satisfechos</div>
        </div>
    </div>

    {{-- Cards de valor --}}
    <div class="porque-cards">
        <div class="porque-card">
            <div class="porque-card__icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
            </div>
            <div class="porque-card__title">Garantía Certificada</div>
            <div class="porque-card__desc">Concesionario oficial con respaldo directo de fábrica y repuestos 100% legítimos.</div>
        </div>
        <div class="porque-card">
            <div class="porque-card__icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
            </div>
            <div class="porque-card__title">Precios Transparentes</div>
            <div class="porque-card__desc">Cotizaciones claras, sin cargos ocultos y con el mejor tipo de cambio del mercado.</div>
        </div>
        <div class="porque-card">
            <div class="porque-card__icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
            </div>
            <div class="porque-card__title">Servicio Posventa Total</div>
            <div class="porque-card__desc">Talleres mecánicos equipados con tecnología de diagnóstico computarizado de última generación.</div>
        </div>
        <div class="porque-card">
            <div class="porque-card__icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg>
            </div>
            <div class="porque-card__title">Crédito a tu Medida</div>
            <div class="porque-card__desc">Evaluación rápida con los principales bancos y financieras del país para tu vehículo nuevo.</div>
        </div>
    </div>
</section>

{{-- ══ 8. NUESTRAS SEDES ════════════════════════════════════════ --}}
<section class="sedes-section" id="sedes">
    <div class="section-header">
        <span class="section-tag">Presencia Regional</span>
        <h2 class="section-title">Nuestras Sedes</h2>
        <p class="section-subtitle">Encuentra el concesionario oficial más cercano en el norte del país.</p>
    </div>
    <div class="sedes-grid">
        @forelse($locales as $local)
        <div class="sede-card">
            @php
                $imgUrl = $local->imagen
                    ? (str_starts_with($local->imagen, 'http') ? $local->imagen : asset($local->imagen))
                    : null;
            @endphp
            <div class="sede-card__img" @if($imgUrl) style="background-image: url('{{ $imgUrl }}');" @endif>
                <span class="sede-card__status">Atención Hoy</span>
            </div>
            <div class="sede-card__body">
                <span class="sede-card__ciudad">{{ $local->ciudad }}</span>
                <h3 class="sede-card__nombre">{{ $local->nombre }}</h3>
                <div class="sede-card__dir">{{ $local->direccion }}</div>
                @if($local->telefono)
                <div class="sede-card__tel">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.61 3.41 2 2 0 0 1 3.6 1.21h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.82a16 16 0 0 0 6.29 6.29l.98-.98a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                    <span>{{ $local->telefono }}</span>
                </div>
                @endif
                <a href="{{ route('locales.show', $local->id) }}" class="sede-card__link">
                    <span>Ver información de sede</span>
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
            </div>
        </div>
        @empty
        <p style="color:#666; grid-column:1/-1; text-align:center; padding:40px 0;">
            No hay sedes registradas aún. Agrégalas desde el panel de administración.
        </p>
        @endforelse
    </div>
</section>

@endsection

@section('scripts')
<script src="{{ asset('js/home.js') }}?v=10"></script>
@endsection
