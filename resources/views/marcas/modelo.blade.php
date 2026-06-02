@extends('layouts.app')
@section('title', $modelo->nombre . ' ' . $marca->nombre . ' - MSA Automotriz')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/pages.css') }}">
<style>
/* ── Hero del modelo ── */
.modelo-hero {
    position: relative;
    height: clamp(420px, 62vh, 760px);
    background: linear-gradient(135deg, #111 0%, #2d2d2d 100%);
    display: flex;
    align-items: flex-end;
    overflow: hidden;
}
.modelo-hero__img {
    position: absolute;
    inset: 0;
    background-size: cover;
    background-position: center center;
    opacity: 0.6;
}
.modelo-hero__overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(to top, rgba(0,0,0,0.85) 0%, rgba(0,0,0,0.2) 60%, transparent 100%);
}
.modelo-hero__content {
    position: relative;
    z-index: 2;
    padding: 0 48px 40px;
    color: #fff;
    width: 100%;
}
.modelo-hero__badge {
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
.modelo-hero__title {
    font-size: 2.8rem;
    font-weight: 900;
    letter-spacing: 0.03em;
    margin: 0;
    text-shadow: 0 2px 12px rgba(0,0,0,0.4);
}
.modelo-hero__sub {
    font-size: 1rem;
    color: #ddd;
    margin-top: 6px;
}

/* ── Contenido principal ── */
.modelo-body {
    max-width: 1100px;
    margin: 48px auto;
    padding: 0 32px;
    display: grid;
    grid-template-columns: 1fr 360px;
    gap: 48px;
    align-items: start;
}

/* Panel izquierdo */
.modelo-info h2 {
    font-size: 1.5rem;
    font-weight: 800;
    color: #111;
    margin: 0 0 16px;
}
.modelo-info h2::after {
    content: '';
    display: block;
    width: 40px;
    height: 3px;
    background: #cc1111;
    margin-top: 8px;
    border-radius: 2px;
}
.modelo-info p {
    font-size: 1.02rem;
    color: #444;
    line-height: 1.75;
    margin-bottom: 24px;
}
.modelo-specs {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(140px,1fr));
    gap: 14px;
    margin-top: 8px;
}
.spec-card {
    background: #fff;
    border: 1px solid #ececec;
    border-radius: 10px;
    padding: 16px 18px;
    text-align: center;
}
.spec-card__label {
    font-size: 0.75rem;
    color: #888;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.06em;
    margin-bottom: 6px;
}
.spec-card__value {
    font-size: 1.05rem;
    font-weight: 800;
    color: #111;
}

/* Panel derecho — cotización */
.modelo-cta {
    background: #fff;
    border: 1.5px solid #e8e8e8;
    border-radius: 14px;
    padding: 32px 28px;
    box-shadow: 0 4px 24px rgba(0,0,0,0.07);
    position: sticky;
    top: 100px;
}
.modelo-cta__precio {
    font-size: 0.9rem;
    color: #888;
    margin-bottom: 4px;
}
.modelo-cta__monto {
    font-size: 2rem;
    font-weight: 900;
    color: #cc1111;
    margin-bottom: 20px;
}
.modelo-cta__monto span {
    font-size: 1.1rem;
    font-weight: 600;
}
.modelo-cta__btn {
    display: block;
    width: 100%;
    text-align: center;
    background: #cc1111;
    color: #fff;
    font-size: 1rem;
    font-weight: 700;
    padding: 14px;
    border-radius: 8px;
    text-decoration: none;
    transition: background 0.2s;
    margin-bottom: 12px;
}
.modelo-cta__btn:hover { background: #a00d0d; }
.modelo-cta__btn--outline {
    background: transparent;
    border: 2px solid #111;
    color: #111;
}
.modelo-cta__btn--outline:hover { background: #111; color: #fff; }
.modelo-cta__note {
    font-size: 0.8rem;
    color: #999;
    text-align: center;
    margin-top: 14px;
    line-height: 1.5;
}

/* ── Otros modelos ── */
.otros-modelos {
    max-width: 1100px;
    margin: 0 auto 64px;
    padding: 0 32px;
}
.otros-modelos h3 {
    font-size: 1.4rem;
    font-weight: 800;
    color: #111;
    margin-bottom: 24px;
}
.otros-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
    gap: 20px;
}
.otro-card {
    background: #fff;
    border: 1px solid #e8e8e8;
    border-radius: 10px;
    overflow: hidden;
    text-decoration: none;
    transition: transform 0.2s, box-shadow 0.2s;
}
.otro-card:hover { transform: translateY(-4px); box-shadow: 0 8px 24px rgba(0,0,0,0.1); }
.otro-card__img {
    height: 130px;
    background: linear-gradient(135deg, #1a1a1a, #2d2d2d);
    background-size: cover;
    background-position: center;
    display: flex;
    align-items: center;
    justify-content: center;
}
.otro-card__body { padding: 14px 16px; }
.otro-card__name { font-size: 0.95rem; font-weight: 700; color: #111; margin-bottom: 4px; }
.otro-card__price { font-size: 0.85rem; color: #cc1111; font-weight: 600; }

/* ── Versiones ── */
.versiones-section {
    max-width: 1100px;
    margin: 0 auto 56px;
    padding: 0 32px;
}
.versiones-section h2 {
    font-size: 1.5rem;
    font-weight: 800;
    color: #111;
    margin-bottom: 24px;
}
.versiones-section h2::after {
    content: '';
    display: block;
    width: 40px;
    height: 3px;
    background: #cc1111;
    margin-top: 8px;
    border-radius: 2px;
}
.versiones-tabs {
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
    margin-bottom: 24px;
    border-bottom: 2px solid #e8e8e8;
    padding-bottom: 0;
}
.version-tab {
    padding: 10px 20px;
    font-size: 0.9rem;
    font-weight: 600;
    color: #666;
    cursor: pointer;
    border-bottom: 3px solid transparent;
    margin-bottom: -2px;
    transition: color 0.2s, border-color 0.2s;
    background: none;
    border-top: none;
    border-left: none;
    border-right: none;
}
.version-tab:hover { color: #111; }
.version-tab.active { color: #cc1111; border-bottom-color: #cc1111; }
.version-panel { display: none; }
.version-panel.active { display: grid; grid-template-columns: 1fr 340px; gap: 40px; align-items: start; }
.version-panel__img {
    height: 300px;
    border-radius: 12px;
    background: linear-gradient(135deg, #1a1a1a, #2d2d2d);
    background-size: contain;
    background-repeat: no-repeat;
    background-position: center center;
    background-color: #ffffff;
}
.version-panel__info ul {
    list-style: none;
    padding: 0;
    margin: 0 0 20px;
}
.version-panel__info ul li {
    font-size: 0.95rem;
    color: #555;
    line-height: 1.6;
    padding: 5px 0 5px 18px;
    position: relative;
    border-bottom: 1px solid #f0f0f0;
}
.version-panel__info ul li::before {
    content: '';
    position: absolute;
    left: 0;
    top: 50%;
    transform: translateY(-50%);
    width: 6px;
    height: 6px;
    background: #cc1111;
    border-radius: 50%;
}
.version-panel__info p {
    font-size: 0.97rem;
    color: #555;
    line-height: 1.7;
    margin-bottom: 20px;
}
.version-panel__precios {
    display: flex;
    flex-direction: column;
    gap: 4px;
    margin-bottom: 20px;
}
.version-panel__precio-label {
    font-size: 0.8rem;
    color: #888;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}
.version-panel__precio-valor {
    font-size: 1.8rem;
    font-weight: 900;
    color: #cc1111;
    line-height: 1.1;
}
.version-panel__precio-valor span { font-size: 1rem; font-weight: 600; }
.version-panel__btn {
    display: inline-block;
    background: #cc1111;
    color: #fff;
    font-size: 0.9rem;
    font-weight: 700;
    padding: 12px 24px;
    border-radius: 8px;
    text-decoration: none;
    transition: background 0.2s;
}
.version-panel__btn:hover { background: #a00d0d; }
@media (max-width: 800px) {
    .version-panel.active { grid-template-columns: 1fr; }
    .version-panel__img { height: 220px; }
}

@media (max-width: 900px) {
    .modelo-body { grid-template-columns: 1fr; }
    .modelo-cta { position: static; }
    .modelo-hero { height: clamp(340px, 52vh, 560px); }
    .modelo-hero__title { font-size: 2rem; }
    .modelo-hero__content { padding: 0 24px 28px; }
}
@media (max-width: 500px) {
    .modelo-hero { height: clamp(300px, 45vh, 420px); }
    .modelo-hero__title { font-size: 1.6rem; }
}
</style>
@endsection

@section('content')

{{-- HERO --}}
@php
    if ($modelo->imagen) {
        $heroImg = str_starts_with($modelo->imagen, 'http') ? $modelo->imagen : asset($modelo->imagen);
    } elseif ($marca->imagen_hero) {
        $heroImg = str_starts_with($marca->imagen_hero, 'http') ? $marca->imagen_hero : asset($marca->imagen_hero);
    } else {
        $heroImg = asset('img/localprueba.jpg');
    }
@endphp
<div class="modelo-hero" id="modeloHero" data-hero-src="{{ $heroImg }}">
    <div class="modelo-hero__img" style="background-image:url('{{ $heroImg }}')"></div>
    <div class="modelo-hero__overlay"></div>
    <div class="modelo-hero__content">
        <span class="modelo-hero__badge">{{ $marca->nombre }}</span>
        <h1 class="modelo-hero__title">{{ $modelo->nombre }}</h1>
    </div>
</div>

{{-- BREADCRUMB --}}
<nav class="page-breadcrumb">
    <a href="{{ route('home') }}">Inicio</a>
    <span>/</span>
    <a href="{{ route('marcas.index') }}">Marcas</a>
    <span>/</span>
    <a href="{{ route('marcas.show', $marca->slug) }}">{{ $marca->nombre }}</a>
    <span>/</span>
    {{ $modelo->nombre }}
</nav>

{{-- CUERPO --}}
<div class="modelo-body">

    {{-- INFO --}}
    <div class="modelo-info">
        <h2>Sobre el {{ $modelo->nombre }}</h2>
        <p>{{ $modelo->descripcion ?? 'Conoce todos los detalles de este vehículo consultando a nuestros asesores.' }}</p>

        {{-- Especificaciones básicas (se pueden ampliar desde la BD cuando se agreguen más campos) --}}
        <div class="modelo-specs">
            <div class="spec-card">
                <div class="spec-card__label">Marca</div>
                <div class="spec-card__value">{{ $marca->nombre }}</div>
            </div>
            <div class="spec-card">
                <div class="spec-card__label">Modelo</div>
                <div class="spec-card__value">{{ $modelo->nombre }}</div>
            </div>
            @if($modelo->precio || $modelo->precio_dolares)
            <div class="spec-card">
                <div class="spec-card__label">Precio desde</div>
                @if($modelo->precio)
                <div class="spec-card__value">S/ {{ number_format($modelo->precio, 0, '.', ',') }}</div>
                @endif
                @if($modelo->precio_dolares)
                <div class="spec-card__value">$ {{ number_format($modelo->precio_dolares, 0, '.', ',') }}</div>
                @endif
            </div>
            @endif
        </div>
    </div>

    {{-- CTA --}}
    <div class="modelo-cta">
        @if($modelo->precio || $modelo->precio_dolares)
        <p class="modelo-cta__precio">Precio referencial desde</p>
        @if($modelo->precio)
        <p class="modelo-cta__monto"><span>S/ </span>{{ number_format($modelo->precio, 0, '.', ',') }}</p>
        @endif
        @if($modelo->precio_dolares)
        <p class="modelo-cta__monto"><span>$ </span>{{ number_format($modelo->precio_dolares, 0, '.', ',') }}</p>
        @endif
        @else
        <p class="modelo-cta__precio" style="margin-bottom:20px;">Consulta el precio con nuestros asesores</p>
        @endif

        <a href="{{ route('contacto') }}?marca={{ $marca->slug }}&modelo={{ urlencode($modelo->nombre) }}"
           class="modelo-cta__btn">
            Solicitar cotización
        </a>
        <a href="https://wa.me/51986339369?text={{ urlencode('Hola, quiero información sobre el ' . $marca->nombre . ' ' . $modelo->nombre) }}"
           target="_blank" rel="noopener"
           class="modelo-cta__btn modelo-cta__btn--outline">
            Consultar por WhatsApp
        </a>
        <p class="modelo-cta__note">Un asesor te contactará a la brevedad con toda la información.</p>
    </div>

</div>

{{-- VERSIONES --}}
@if($modelo->versiones->isNotEmpty())
<div class="versiones-section">
    <h2>Versiones disponibles</h2>
    <div class="versiones-tabs">
        @foreach($modelo->versiones as $i => $version)
        <button class="version-tab {{ $i === 0 ? 'active' : '' }}" data-tab="version-{{ $version->id }}">
            {{ $version->nombre }}
        </button>
        @endforeach
    </div>
    @foreach($modelo->versiones as $i => $version)
    @php
        $vImg = $version->imagen
            ? (str_starts_with($version->imagen, 'http') ? $version->imagen : asset($version->imagen))
            : null;
    @endphp
    <div class="version-panel {{ $i === 0 ? 'active' : '' }}" id="version-{{ $version->id }}">
        @if($vImg)
        <div class="version-panel__img" style="background-image:url('{{ $vImg }}')"></div>
        @else
        <div class="version-panel__img"></div>
        @endif
        <div class="version-panel__info">
            <h3>{{ $modelo->nombre }} — {{ $version->nombre }}</h3>
            @if($version->descripcion)
            @php $items = array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', $version->descripcion))); @endphp
            <ul>
                @foreach($items as $item)
                <li>{{ $item }}</li>
                @endforeach
            </ul>
            @endif
            @if($version->precio || $version->precio_dolares)
            <div class="version-panel__precios">
                <span class="version-panel__precio-label">Precio desde</span>
                @if($version->precio)
                <div class="version-panel__precio-valor"><span>S/ </span>{{ number_format($version->precio, 0, '.', ',') }}</div>
                @endif
                @if($version->precio_dolares)
                <div class="version-panel__precio-valor"><span>$ </span>{{ number_format($version->precio_dolares, 0, '.', ',') }}</div>
                @endif
            </div>
            @endif
            <a href="{{ route('contacto') }}?marca={{ $marca->slug }}&modelo={{ urlencode($modelo->nombre . ' ' . $version->nombre) }}" class="version-panel__btn">
                Solicitar cotización
            </a>
        </div>
    </div>
    @endforeach
</div>
<script>
document.querySelectorAll('.version-tab').forEach(tab => {
    tab.addEventListener('click', () => {
        document.querySelectorAll('.version-tab').forEach(t => t.classList.remove('active'));
        document.querySelectorAll('.version-panel').forEach(p => p.classList.remove('active'));
        tab.classList.add('active');
        document.getElementById(tab.dataset.tab).classList.add('active');
    });
});
</script>
@endif

{{-- OTROS MODELOS --}}
@if($otrosModelos->isNotEmpty())
<div class="otros-modelos">
    <h3>Otros modelos {{ $marca->nombre }}</h3>
    <div class="otros-grid">
        @foreach($otrosModelos as $otro)
        <a href="{{ route('modelos.show', [$marca->slug, $otro->slug]) }}" class="otro-card">
            @php $otroImg = $otro->imagen ? (str_starts_with($otro->imagen, 'http') ? $otro->imagen : asset($otro->imagen)) : null; @endphp
            <div class="otro-card__img" @if($otroImg) style="background-image:url('{{ $otroImg }}')" @endif>
                @unless($otro->imagen)
                <svg width="40" height="26" viewBox="0 0 64 40" fill="none" xmlns="http://www.w3.org/2000/svg" style="opacity:.4">
                    <path d="M8 30l6-14h36l6 14" stroke="#fff" stroke-width="2.5" stroke-linejoin="round"/>
                    <rect x="4" y="30" width="56" height="9" rx="3" stroke="#fff" stroke-width="2.5"/>
                    <circle cx="16" cy="39" r="4" stroke="#fff" stroke-width="2.5"/>
                    <circle cx="48" cy="39" r="4" stroke="#fff" stroke-width="2.5"/>
                </svg>
                @endunless
            </div>
            <div class="otro-card__body">
                <div class="otro-card__name">{{ $otro->nombre }}</div>
                @if($otro->precio)
                <div class="otro-card__price">Desde S/ {{ number_format($otro->precio, 0, '.', ',') }}</div>
                @endif
            </div>
        </a>
        @endforeach
    </div>
</div>
@endif

<script>
(function () {
    const hero = document.getElementById('modeloHero');
    if (!hero) return;

    const src = hero.dataset.heroSrc;
    if (!src) return;

    const img = new Image();

    function applyResponsiveHeroHeight() {
        if (!img.naturalWidth || !img.naturalHeight) return;

        const ratio = img.naturalWidth / img.naturalHeight;
        const viewportW = window.innerWidth;

        let minH = 300;
        let maxH = 820;

        if (viewportW <= 500) {
            minH = 280;
            maxH = 460;
        } else if (viewportW <= 900) {
            minH = 330;
            maxH = 620;
        }

        let target = Math.round(viewportW / ratio);
        target = Math.max(minH, Math.min(maxH, target));

        hero.style.height = target + 'px';
    }

    img.addEventListener('load', applyResponsiveHeroHeight);
    window.addEventListener('resize', applyResponsiveHeroHeight);

    img.src = src;
})();
</script>

@endsection
