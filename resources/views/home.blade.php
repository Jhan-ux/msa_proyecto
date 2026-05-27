@extends('layouts.app')
@section('title', 'MSA Automotriz - Concesionaria')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/baner.css') }}?v=2">
<link rel="stylesheet" href="{{ asset('css/body_modelos.css') }}">
<link rel="stylesheet" href="{{ asset('css/body_servicios.css') }}">
<link rel="stylesheet" href="{{ asset('css/body_transporte_renting.css') }}">
<link rel="stylesheet" href="{{ asset('css/body_novedades.css') }}">
<style>
/* ── Buscador de vehículos ─────────────────────────────── */
.finder-section {
    background: #ffffff;
    padding: 56px 24px 0;
    text-align: center;
    border-top: 1px solid #e8e8e8;
}
.finder-content {
    max-width: 700px;
    margin: 0 auto 40px;
}
.finder-intro {
    color: #666666;
    font-size: 0.9rem;
    line-height: 1.7;
    margin-bottom: 22px;
}
.finder-title {
    color: #111111;
    font-size: clamp(1.5rem, 3vw, 2.2rem);
    font-weight: 700;
    margin-bottom: 12px;
    line-height: 1.25;
}
.finder-sub {
    color: #666666;
    font-size: 0.92rem;
}
.finder-types {
    display: flex;
    justify-content: center;
    gap: 20px;
    margin-top: 36px;
    flex-wrap: wrap;
}
.finder-type-btn {
    background: #f5f5f5;
    border: 1px solid #e0e0e0;
    border-radius: 14px;
    padding: 18px 28px;
    color: #555555;
    cursor: pointer;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 12px;
    font-size: 0.9rem;
    font-weight: 500;
    min-width: 130px;
    transition: all 0.25s ease;
}
.finder-type-btn:hover {
    background: #fef2f2;
    border-color: rgba(204,17,17,0.4);
    color: #111111;
}
.finder-type-btn.active {
    background: #fef2f2;
    border-color: #cc1111;
    color: #111111;
}
.finder-type-icon {
    width: 68px;
    height: 68px;
    border-radius: 50%;
    background: #cc1111;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background 0.25s;
}
.finder-type-btn.active .finder-type-icon {
    background: #aa0e0e;
    box-shadow: 0 0 0 4px rgba(204,17,17,0.25);
}
.finder-bar {
    margin-top: 40px;
    background: #111111;
    border-top: 2px solid #cc1111;
    padding: 22px 24px;
    display: flex;
    gap: 12px;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
}
.finder-select-wrap {
    position: relative;
}
.finder-select-wrap select {
    appearance: none;
    -webkit-appearance: none;
    background: rgba(255,255,255,0.06);
    border: 1px solid rgba(255,255,255,0.18);
    color: rgba(255,255,255,0.85);
    padding: 13px 42px 13px 16px;
    border-radius: 8px;
    min-width: 210px;
    font-size: 0.88rem;
    cursor: pointer;
    outline: none;
    transition: border-color 0.2s;
}
.finder-select-wrap select:focus {
    border-color: #cc1111;
}
.finder-select-wrap select option {
    background: #1a1a1a;
    color: #fff;
}
.finder-arrow {
    position: absolute;
    right: 14px;
    top: 50%;
    transform: translateY(-50%);
    pointer-events: none;
    color: rgba(255,255,255,0.55);
}
.finder-btn {
    background: #cc1111;
    color: #fff;
    border: none;
    padding: 13px 40px;
    border-radius: 50px;
    font-weight: 700;
    font-size: 0.9rem;
    cursor: pointer;
    transition: all 0.2s;
    letter-spacing: 0.3px;
}
.finder-btn:hover {
    background: #aa0e0e;
    transform: translateY(-1px);
}
@media (max-width: 600px) {
    .finder-select-wrap select { min-width: 100%; }
    .finder-select-wrap { width: 100%; }
    .finder-btn { width: 100%; }
}

/* ── ¿Por qué elegirnos? ──────────────────────────────── */
.porque-section {
    background: #ffffff;
    padding: 72px 32px;
    text-align: center;
}
.porque-section .section-title {
    color: #111111;
    font-size: 2rem;
    font-weight: 800;
    margin-bottom: 8px;
}
.porque-section .section-title::after {
    content: '';
    display: block;
    width: 50px;
    height: 3px;
    background: #cc1111;
    margin: 10px auto 0;
    border-radius: 2px;
}
.porque-section .section-subtitle {
    color: #666666;
    font-size: 1rem;
    margin-top: 14px;
    margin-bottom: 56px;
}

/* Estadísticas */
.porque-stats {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 0;
    max-width: 900px;
    margin: 0 auto 64px;
    border: 1px solid #e8e8e8;
    border-radius: 14px;
    overflow: hidden;
}
.porque-stat {
    padding: 32px 20px;
    border-right: 1px solid #e8e8e8;
}
.porque-stat:last-child { border-right: none; }
.porque-stat__num {
    font-size: 2.6rem;
    font-weight: 900;
    color: #cc1111;
    line-height: 1;
    margin-bottom: 6px;
}
.porque-stat__label {
    font-size: 0.82rem;
    color: #666666;
    text-transform: uppercase;
    letter-spacing: 0.08em;
    line-height: 1.4;
}

/* Cards de valor */
.porque-cards {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
    max-width: 1080px;
    margin: 0 auto;
}
.porque-card {
    background: #ffffff;
    border: 1px solid #e8e8e8;
    border-top: 3px solid #cc1111;
    border-radius: 10px;
    padding: 32px 24px;
    text-align: left;
    transition: border-color 0.2s, box-shadow 0.2s, transform 0.2s;
}
.porque-card:hover {
    border-color: #cc1111;
    transform: translateY(-4px);
    box-shadow: 0 12px 32px rgba(0,0,0,0.1);
}
.porque-card__icon {
    width: 52px;
    height: 52px;
    background: rgba(204,17,17,0.15);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 18px;
}
.porque-card__title {
    font-size: 1rem;
    font-weight: 700;
    color: #111111;
    margin-bottom: 8px;
}
.porque-card__desc {
    font-size: 0.86rem;
    color: #666666;
    line-height: 1.6;
}

@media (max-width: 900px) {
    .porque-stats { grid-template-columns: repeat(2, 1fr); }
    .porque-cards { grid-template-columns: repeat(2, 1fr); }
    .porque-stat:nth-child(2) { border-right: none; }
    .porque-stat:nth-child(3) { border-top: 1px solid #e8e8e8; }
    .porque-stat:nth-child(4) { border-top: 1px solid #e8e8e8; }
}
@media (max-width: 560px) {
    .porque-stats { grid-template-columns: repeat(2, 1fr); }
    .porque-cards { grid-template-columns: 1fr; }
}

/* ── Paleta: Blanco · Negro · Rojo ──────────────────────── */
body { background: #ffffff; }

/* Modelos: blanco limpio, tarjetas blancas con acento rojo */
.models-section {
    background: #ffffff;
    max-width: 100%;
    margin: 0;
    padding: 60px 32px 56px;
}
.models-section .section-title { color: #111111; }
.models-section .section-title::after { background: #cc1111; }
.models-section .section-subtitle { color: #666666; }
.models-grid { max-width: 1400px; margin: 0 auto; }
.model-card {
    background: #ffffff;
    border: 1px solid #e8e8e8;
    border-top: 3px solid #cc1111;
}
.model-card:hover {
    border-color: #cc1111;
    box-shadow: 0 8px 28px rgba(0,0,0,0.12);
    transform: translateY(-4px);
}
.model-card__name { color: #111111; }
.model-card__desc { color: #666666; }
.model-card__btn { color: #cc1111; border-color: #cc1111; }
.model-card__btn:hover { background: #cc1111; color: #fff; }

/* Servicios: gris muy claro, tarjetas con cabecera negra */
.services-section { background: #f5f5f5; }
.services-section .section-title { color: #111111; }
.services-section .section-subtitle { color: #666666; }

/* ── Transporte y Renting ─────────────────────────── */
.renting-section {
    background: #ffffff;
    padding: 80px 32px 88px;
    text-align: center;
    border-top: 1px solid #e8e8e8;
}
.renting-section .section-title  { color: #111111; }
.renting-section .section-title::after { background: #cc1111; }
.renting-section .section-subtitle { color: #666666; }
.renting-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 28px;
    max-width: 900px;
    margin: 48px auto 0;
}
.renting-card {
    background: #fff;
    border: 1.5px solid #e8e8e8;
    border-top: 4px solid #cc1111;
    border-radius: 14px;
    overflow: hidden;
    text-decoration: none;
    color: inherit;
    display: block;
    text-align: left;
    transition: transform .22s ease, box-shadow .22s ease;
}
.renting-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 32px rgba(0,0,0,.1);
}
.renting-card__img {
    height: 200px;
    background: #f0f0f0 center/cover no-repeat;
    display: flex;
    align-items: center;
    justify-content: center;
}
.renting-card__body {
    padding: 28px 26px 30px;
}
.renting-card__title {
    font-size: 1.2rem;
    font-weight: 800;
    color: #111111;
    margin-bottom: 10px;
    letter-spacing: .01em;
}
.renting-card__desc {
    font-size: .9rem;
    color: #666666;
    line-height: 1.65;
    margin-bottom: 20px;
}
.renting-card__link {
    display: inline-block;
    background: #cc1111;
    color: #fff;
    font-weight: 700;
    font-size: .85rem;
    padding: 9px 22px;
    border-radius: 50px;
    letter-spacing: .3px;
    transition: background .2s;
}
.renting-card:hover .renting-card__link { background: #a00d0d; }

/* Buscador: fondo blanco, barra inferior negra */
.finder-section { background: #ffffff; border-top: 1px solid #e8e8e8; }

/* ── Nuestras Sedes ───────────────────────────────── */
.sedes-section {
    background: #f5f5f5;
    padding: 72px 32px 80px;
    text-align: center;
    border-top: 1px solid #e8e8e8;
}
.sedes-section .section-title { color: #111111; }
.sedes-section .section-subtitle { color: #666666; }
.sedes-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
    gap: 24px;
    max-width: 1100px;
    margin: 48px auto 0;
}
.sede-card {
    background: #ffffff;
    border: 1px solid #e8e8e8;
    border-top: 3px solid #cc1111;
    border-radius: 10px;
    overflow: hidden;
    text-align: left;
    transition: box-shadow 0.2s, transform 0.2s;
    display: flex;
    flex-direction: column;
}
.sede-card:hover {
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    transform: translateY(-3px);
}
.sede-card__img {
    height: 180px;
    background: #111111;
    background-size: cover;
    background-position: center;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}
.sede-card__img svg { opacity: 0.25; }
.sede-card__body {
    padding: 20px 22px 24px;
    flex: 1;
    display: flex;
    flex-direction: column;
}
.sede-card__ciudad {
    display: inline-block;
    background: #cc1111;
    color: #fff;
    font-size: 0.68rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.08em;
    padding: 3px 10px;
    border-radius: 3px;
    margin-bottom: 10px;
}
.sede-card__nombre {
    font-size: 1.05rem;
    font-weight: 700;
    color: #111111;
    margin-bottom: 6px;
}
.sede-card__dir {
    font-size: 0.85rem;
    color: #666666;
    line-height: 1.5;
    margin-bottom: 6px;
}
.sede-card__tel {
    font-size: 0.83rem;
    color: #444444;
    margin-bottom: 16px;
}
.sede-card__link {
    display: inline-block;
    margin-top: auto;
    padding: 9px 22px;
    border: 1.5px solid #cc1111;
    color: #cc1111;
    border-radius: 50px;
    font-size: 0.82rem;
    font-weight: 600;
    text-decoration: none;
    transition: background 0.2s, color 0.2s;
    align-self: flex-start;
}
.sede-card__link:hover {
    background: #cc1111;
    color: #fff;
}
@media (max-width: 900px) {
    .renting-grid { grid-template-columns: 1fr; }
}
@media (max-width: 600px) {
    .renting-section { padding: 48px 20px 56px; }
    .sedes-grid { grid-template-columns: 1fr; }
    .sedes-section { padding: 48px 20px 60px; }
}
</style>
@endsection

@section('content')

<!-- Banner principal -->
<section class="banner-wrap">
    <div class="banner-panel" style="background-image: url('{{ asset('img/chevrolet/chevrolet_pruebas.jpeg') }}');">
        <div class="banner-panel__overlay"></div>
        <div class="banner-panel__content">
            <div class="banner-panel__brand">CHEVROLET</div>
            <p class="banner-panel__tagline">La comodidad de escoger tu camino.</p>
            <a href="{{ route('marcas.show', 'chevrolet') }}" class="banner-panel__btn">&iexcl;Lo quiero! &rsaquo;</a>
        </div>
    </div>
    <div class="banner-panel" style="background-image: url('{{ asset('img/honda_motos/hondamo_pruebas.jpeg') }}');">
        <div class="banner-panel__overlay"></div>
        <div class="banner-panel__content">
            <div class="banner-panel__brand">HONDA MOTOS</div>
            <p class="banner-panel__tagline">Potencia y estilo en cada curva.</p>
            <a href="{{ route('marcas.show', 'honda-motos') }}" class="banner-panel__btn">&iexcl;Lo quiero! &rsaquo;</a>
        </div>
    </div>
    <div class="banner-panel" style="background-image: url('{{ asset('img/isuzu_camiones/isuzuca_pruebas.jpeg') }}');">
        <div class="banner-panel__overlay"></div>
        <div class="banner-panel__content">
            <div class="banner-panel__brand">ISUZU CAMIONES</div>
            <p class="banner-panel__tagline">Resistencia y eficiencia para tu negocio.</p>
            <a href="{{ route('marcas.show', 'isuzu-camiones') }}" class="banner-panel__btn">&iexcl;Lo quiero! &rsaquo;</a>
        </div>
    </div>
</section>

<!-- Modelos Destacados -->
<section class="models-section">
    <h2 class="section-title">Modelos Destacados</h2>
    <p class="section-subtitle">Una selección de los vehículos más solicitados</p>
    <div class="models-grid">
        @forelse ($modelos as $modelo)
        @php $mdlImg = $modelo->imagen ? (str_starts_with($modelo->imagen, 'http') ? $modelo->imagen : asset($modelo->imagen)) : null; @endphp
        <a href="{{ route('modelos.show', [$modelo->marca->slug, $modelo->slug]) }}" class="model-card" style="text-decoration:none;color:inherit;">
            <div class="model-card__img" @if($mdlImg) style="background-image: url('{{ $mdlImg }}'); background-size: cover; background-position: center;" @endif>
                <span class="model-card__badge">{{ $modelo->marca->nombre }}</span>
                @unless($mdlImg)
                <div class="model-card__img-placeholder">
                    <svg viewBox="0 0 64 40" fill="none" xmlns="http://www.w3.org/2000/svg" style="width:56px;height:auto;opacity:.35">
                        <path d="M8 30l6-14h36l6 14" stroke="#fff" stroke-width="2.5" stroke-linejoin="round"/>
                        <rect x="4" y="30" width="56" height="9" rx="3" stroke="#fff" stroke-width="2.5"/>
                        <circle cx="16" cy="39" r="4" stroke="#fff" stroke-width="2.5"/>
                        <circle cx="48" cy="39" r="4" stroke="#fff" stroke-width="2.5"/>
                        <path d="M24 16h16M22 21h20" stroke="#fff" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </div>
                @endunless
            </div>
            <div class="model-card__body">
                <h3 class="model-card__name">{{ $modelo->nombre }}</h3>
                <p class="model-card__desc">{{ $modelo->descripcion ?? 'Consulta disponibilidad con nuestros asesores.' }}</p>
                <span class="model-card__btn">Ver detalles</span>
            </div>
        </a>
        @empty
        <p style="grid-column:1/-1;text-align:center;color:#888;padding:40px 0;">
            Aún no hay modelos destacados. Márcalos desde el panel de administración.
        </p>
        @endforelse
    </div>
</section>

{{-- ══ POSVENTA / SERVICIOS ══════════════════════════════════════ --}}
<section class="services-section">
    <h2 class="section-title">Servicios de Posventa</h2>
    <p class="section-subtitle">Te acompañamos antes y después de tu compra</p>
    <div class="services-content">
        @foreach($servicios as $servicio)
        <a href="{{ route('servicios.show', $servicio->slug) }}" class="service-item" style="text-decoration:none;">
            @if($servicio->imagen)
            @php $svcImg = str_starts_with($servicio->imagen, 'http') ? $servicio->imagen : asset($servicio->imagen); @endphp
            <div class="service-item__img" style="background-image: url('{{ $svcImg }}');"></div>
            @else
            <div class="service-item__img" style="background: linear-gradient(135deg, #2a2a2a 0%, #0a0a0a 100%); display:flex; align-items:center; justify-content:center;">
                <svg width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.2)" stroke-width="1.2" stroke-linecap="round"><circle cx="12" cy="12" r="3"/><path d="M12 2v3M12 19v3M4.22 4.22l2.12 2.12M17.66 17.66l2.12 2.12M2 12h3M19 12h3M4.22 19.78l2.12-2.12M17.66 6.34l2.12-2.12"/></svg>
            </div>
            @endif
            <div class="service-item__body">
                <div class="service-item__title">{{ $servicio->nombre }}</div>
                <div class="service-item__desc">{{ $servicio->descripcion ?? 'Consulta con nuestros especialistas.' }}</div>
                <span class="service-item__btn">Conoce más</span>
            </div>
        </a>
        @endforeach
    </div>
    <div style="text-align:center; padding: 36px 0 48px;">
        <a href="{{ route('servicios') }}"
           style="display:inline-block; background:#cc1111; color:#fff; font-weight:700; font-size:.95rem; padding:14px 40px; border-radius:50px; text-decoration:none; letter-spacing:.3px; transition:background .2s;"
           onmouseover="this.style.background='#a00d0d'" onmouseout="this.style.background='#cc1111'">
            Ver todos los servicios &rsaquo;
        </a>
    </div>
</section>

{{-- ══ TRANSPORTE Y RENTING ═══════════════════════════════════════ --}}
<section class="renting-section">
    <h2 class="section-title">Transporte y Renting</h2>
    <p class="section-subtitle">Soluciones de movilidad para empresas y personas</p>
    <div class="renting-grid">
        @forelse($transporteRenting as $item)
        @php $rImg = $item->imagen ? (str_starts_with($item->imagen, 'http') ? $item->imagen : asset($item->imagen)) : null; @endphp
        <a href="{{ route('transporte-renting.show', $item->slug) }}" class="renting-card">
            <div class="renting-card__img" @if($rImg) style="background-image:url('{{ $rImg }}')" @endif>
                @unless($rImg)
                <svg width="56" height="40" viewBox="0 0 64 44" fill="none" stroke="#ccc" stroke-width="1.5" stroke-linecap="round">
                    <rect x="1" y="4" width="40" height="28" rx="4"/><path d="M41 14h12l8 12v8H41V14z"/>
                    <circle cx="14" cy="39" r="5"/><circle cx="52" cy="39" r="5"/>
                </svg>
                @endunless
            </div>
            <div class="renting-card__body">
                <div class="renting-card__title">{{ $item->nombre }}</div>
                <div class="renting-card__desc">{{ $item->descripcion }}</div>
                <span class="renting-card__link">Ver más &rsaquo;</span>
            </div>
        </a>
        @empty
        <p style="grid-column:1/-1;text-align:center;color:#888;padding:20px 0;">
            Sin servicios registrados aún.
        </p>
        @endforelse
    </div>
</section>

<!-- Buscador de vehículos -->
<section class="finder-section">
    <div class="finder-content">
        <p class="finder-intro">En MSA Automotriz estamos comprometidos en brindar el mejor servicio a nuestros clientes, con años de experiencia como concesionaria líder en el norte del Perú.</p>
        <h2 class="finder-title">Encuentra el vehículo perfecto para ti</h2>
        <p class="finder-sub">Sedanes, comerciales, camionetas, híbridos y a gas para uso personal o de tu negocio.</p>
        <div class="finder-types">
            <button class="finder-type-btn active" onclick="setTipo(this)">
                <span class="finder-type-icon">
                    <svg width="36" height="28" viewBox="0 0 36 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4 17l4-9h20l4 9" stroke="#fff" stroke-width="1.8" stroke-linejoin="round"/>
                        <rect x="2" y="17" width="32" height="8" rx="2.5" stroke="#fff" stroke-width="1.8"/>
                        <circle cx="9" cy="25" r="3" stroke="#fff" stroke-width="1.8"/>
                        <circle cx="27" cy="25" r="3" stroke="#fff" stroke-width="1.8"/>
                        <path d="M22 4l1.5-3M26 6l2.5-1.5" stroke="#fff" stroke-width="1.4" stroke-linecap="round"/>
                    </svg>
                </span>
                Vehículo Nuevo
            </button>
            <button class="finder-type-btn" onclick="setTipo(this)">
                <span class="finder-type-icon">
                    <svg width="36" height="28" viewBox="0 0 36 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4 17l4-9h20l4 9" stroke="#fff" stroke-width="1.8" stroke-linejoin="round"/>
                        <rect x="2" y="17" width="32" height="8" rx="2.5" stroke="#fff" stroke-width="1.8"/>
                        <circle cx="9" cy="25" r="3" stroke="#fff" stroke-width="1.8"/>
                        <circle cx="27" cy="25" r="3" stroke="#fff" stroke-width="1.8"/>
                    </svg>
                </span>
                Seminuevo
            </button>
        </div>
    </div>
    <div class="finder-bar">
        <div class="finder-select-wrap">
            <select id="findMarca" onchange="filtrarModelos()">
                <option value="">Seleccione la marca</option>
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
            <svg class="finder-arrow" width="12" height="8" viewBox="0 0 12 8"><path d="M1 1l5 5 5-5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
        </div>
        <div class="finder-select-wrap">
            <select id="findUbicacion">
                <option value="">&iquest;D&oacute;nde se encuentra?</option>
                <option value="cajamarca">Cajamarca</option>
                <option value="lima">Lima</option>
                <option value="piura">Piura</option>
            </select>
            <svg class="finder-arrow" width="12" height="8" viewBox="0 0 12 8"><path d="M1 1l5 5 5-5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
        </div>
        <div class="finder-select-wrap">
            <select id="findVehiculo">
                <option value="">Selecciona tu veh&iacute;culo</option>
            </select>
            <svg class="finder-arrow" width="12" height="8" viewBox="0 0 12 8"><path d="M1 1l5 5 5-5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
        </div>
        <button class="finder-btn" onclick="buscarVehiculo()">Buscar</button>
    </div>
</section>

<script>
const marcaModelos = {
    'baic':           ['BJ30', 'BJ40', 'BJ212', 'X35'],
    'chevrolet':      ['Onix', 'Tracker', 'Montana', 'N300 Max'],
    'dongfeng':       ['Rich 6', 'H30 Cross', 'S50'],
    'forland':        ['Fonton 3T', 'Fonton 5T', 'Furgón'],
    'foton':          ['Aumark S', 'Aumark GT', 'Toano', 'Toplander'],
    'honda-autos':    ['HR-V', 'City', 'Civic', 'WR-V'],
    'honda-motos':    ['CB190R', 'CG150', 'Tornado 250', 'XR150L'],
    'isuzu-camiones': ['NPR 400', 'NQR 700', 'FRR 800', 'ELF 350'],
    'isuzu-pick-ups': ['D-Max 4x2', 'D-Max 4x4'],
    'omoda-jaecoo':   ['Omoda 5', 'Omoda C5', 'Jaecoo 7'],
};

function setTipo(btn) {
    document.querySelectorAll('.finder-type-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
}

function filtrarModelos() {
    const marca = document.getElementById('findMarca').value;
    const sel = document.getElementById('findVehiculo');
    sel.innerHTML = '<option value="">Selecciona tu vehículo</option>';
    if (marca && marcaModelos[marca]) {
        marcaModelos[marca].forEach(function(m) {
            var opt = document.createElement('option');
            opt.value = m;
            opt.textContent = m;
            sel.appendChild(opt);
        });
    }
}

function buscarVehiculo() {
    var marca = document.getElementById('findMarca').value;
    var base = '{{ url("/marcas") }}';
    window.location.href = marca ? base + '/' + marca : base;
}
</script>

{{-- ══ ¿POR QUÉ ELEGIRNOS? ══════════════════════════════════════ --}}
<section class="porque-section">
    <h2 class="section-title">¿Por qué elegirnos?</h2>
    <p class="section-subtitle">Más de dos décadas siendo el aliado automotriz del norte del Perú</p>

    {{-- Stats --}}
    <div class="porque-stats">
        <div class="porque-stat">
            <div class="porque-stat__num">+19</div>
            <div class="porque-stat__label">Años de<br>experiencia</div>
        </div>
        <div class="porque-stat">
            <div class="porque-stat__num">10</div>
            <div class="porque-stat__label">Marcas<br>representadas</div>
        </div>
        <div class="porque-stat">
            <div class="porque-stat__num">4</div>
            <div class="porque-stat__label">Sedes en<br>el norte del Perú</div>
        </div>
        <div class="porque-stat">
            <div class="porque-stat__num">+10K</div>
            <div class="porque-stat__label">Clientes<br>satisfechos</div>
        </div>
    </div>

    {{-- Cards de valor --}}
    <div class="porque-cards">
        <div class="porque-card">
            <div class="porque-card__icon">
                <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#cc1111" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                </svg>
            </div>
            <div class="porque-card__title">Calidad certificada</div>
            <div class="porque-card__desc">Concesionario oficial con respaldo directo de las marcas que representamos.</div>
        </div>
        <div class="porque-card">
            <div class="porque-card__icon">
                <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#cc1111" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/>
                </svg>
            </div>
            <div class="porque-card__title">Precios transparentes</div>
            <div class="porque-card__desc">Sin letra pequeña. Cotizaciones claras y financiamiento a tu medida.</div>
        </div>
        <div class="porque-card">
            <div class="porque-card__icon">
                <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#cc1111" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/>
                </svg>
            </div>
            <div class="porque-card__title">Servicio posventa</div>
            <div class="porque-card__desc">Taller técnico especializado, repuestos originales y seguimiento personalizado.</div>
        </div>
        <div class="porque-card">
            <div class="porque-card__icon">
                <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#cc1111" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="1" y="4" width="22" height="16" rx="2" ry="2"/><line x1="1" y1="10" x2="23" y2="10"/>
                </svg>
            </div>
            <div class="porque-card__title">Financiamiento flexible</div>
            <div class="porque-card__desc">Trabajamos con los principales bancos y financieras para facilitar tu compra.</div>
        </div>
    </div>
</section>

{{-- ══ NUESTRAS SEDES ══════════════════════════════════════════ --}}
<section class="sedes-section">
    <h2 class="section-title">Nuestras Sedes</h2>
    <p class="section-subtitle">Encuéntranos en el norte del Perú — elige la sede más cercana a ti</p>
    <div class="sedes-grid">
        @forelse($locales as $local)
        <div class="sede-card">
            @php
                $imgUrl = $local->imagen
                    ? (str_starts_with($local->imagen, 'http') ? $local->imagen : asset($local->imagen))
                    : null;
            @endphp
            <div class="sede-card__img" @if($imgUrl) style="background-image: url('{{ $imgUrl }}');" @endif>
                @unless($imgUrl)
                <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.2" stroke-linecap="round">
                    <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z"/>
                    <circle cx="12" cy="9" r="2.5"/>
                </svg>
                @endunless
            </div>
            <div class="sede-card__body">
                <span class="sede-card__ciudad">{{ $local->ciudad }}</span>
                <div class="sede-card__nombre">{{ $local->nombre }}</div>
                <div class="sede-card__dir">{{ $local->direccion }}</div>
                @if($local->telefono)
                <div class="sede-card__tel">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#cc1111" stroke-width="2" stroke-linecap="round" style="vertical-align:middle; margin-right:4px;"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.61 3.41 2 2 0 0 1 3.6 1.21h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.82a16 16 0 0 0 6.29 6.29l.98-.98a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                    {{ $local->telefono }}
                </div>
                @endif
                <a href="{{ route('locales.show', $local->id) }}" class="sede-card__link">Ver sede &rsaquo;</a>
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
