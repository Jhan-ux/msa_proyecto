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
    background: #111111;
    padding: 56px 24px 0;
    text-align: center;
}
.finder-content {
    max-width: 700px;
    margin: 0 auto 40px;
}
.finder-intro {
    color: rgba(255,255,255,0.55);
    font-size: 0.9rem;
    line-height: 1.7;
    margin-bottom: 22px;
}
.finder-title {
    color: #fff;
    font-size: clamp(1.5rem, 3vw, 2.2rem);
    font-weight: 700;
    margin-bottom: 12px;
    line-height: 1.25;
}
.finder-sub {
    color: rgba(255,255,255,0.55);
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
    background: rgba(255,255,255,0.05);
    border: 1px solid rgba(255,255,255,0.1);
    border-radius: 14px;
    padding: 18px 28px;
    color: rgba(255,255,255,0.55);
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
    background: rgba(204,17,17,0.12);
    border-color: rgba(204,17,17,0.4);
    color: #fff;
}
.finder-type-btn.active {
    background: rgba(204,17,17,0.18);
    border-color: #cc1111;
    color: #fff;
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
    background: #1a1a1a;
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
        @foreach ($modelos as $modelo)
        <div class="model-card">
            <div class="model-card__img" style="background-image: url('{{ asset($modelo['imagen']) }}'); background-size: cover; background-position: center;">
                <span class="model-card__badge">{{ $modelo['marca'] }}</span>
            </div>
            <div class="model-card__body">
                <h3 class="model-card__name">{{ $modelo['nombre'] }}</h3>
                <p class="model-card__desc">{{ $modelo['descripcion'] }}</p>
                <a href="{{ route('marcas.show', $modelo['slug']) }}" class="model-card__btn">Ver detalles</a>
            </div>
        </div>
        @endforeach
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

@endsection
