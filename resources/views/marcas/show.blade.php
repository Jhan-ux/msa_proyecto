@extends('layouts.app')
@section('title', 'Modelos ' . $marca->nombre . ' - MSA Automotriz')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/pages.css') }}">
<link rel="stylesheet" href="{{ asset('css/marca_page.css') }}?v=30">
@endsection

@section('content')

{{-- BREADCRUMB --}}
<nav class="page-breadcrumb">
    <div class="page-breadcrumb__inner">
        <a href="{{ route('home') }}">Inicio</a>
        <span class="page-breadcrumb__separator">/</span>
        <a href="{{ route('marcas.index') }}">Marcas</a>
        <span class="page-breadcrumb__separator">/</span>
        <span class="page-breadcrumb__current">{{ $marca->nombre }}</span>
    </div>
</nav>

{{-- SECCIÓN DE MODELOS DE LA MARCA --}}
<section class="models-section">
    <div class="models-container">
        
        {{-- Encabezado de la Marca --}}
        <div class="marca-header">
            @if($marca->imagen)
            @php $logoUrl = str_starts_with($marca->imagen, 'http') ? $marca->imagen : asset($marca->imagen); @endphp
            <div class="marca-header__logo-wrap">
                <img src="{{ $logoUrl }}" alt="Logo {{ $marca->nombre }}" class="marca-header__logo">
            </div>
            @endif
            <div class="marca-header__info">
                <div class="marca-header__tags">
                    <span class="marca-header__tag">
                        <span class="tag-dot"></span> Concesionario Oficial
                    </span>
                </div>
                <h1 class="marca-header__title">Gama {{ $marca->nombre }}</h1>
                <p class="marca-header__desc">{{ $marca->descripcion ?? 'Descubre toda la línea de vehículos 0 Km con garantía oficial de fábrica, respaldo posventa y entrega inmediata.' }}</p>
            </div>
        </div>

        {{-- Filtros por Categoría --}}
        @php
            $modelosPorTipo = $modelos->groupBy(function($m) {
                return trim($m->tipo) !== '' ? trim($m->tipo) : 'General';
            });
        @endphp

        @if($modelosPorTipo->count() > 1)
        <div class="marca-tabs">
            <button type="button" class="marca-tab active" data-filter="all">
                <span>Todos</span>
            </button>
            @foreach($modelosPorTipo as $tipoNombre => $lista)
            <button type="button" class="marca-tab" data-filter="{{ Str::slug($tipoNombre) }}">
                <span>{{ $tipoNombre }}</span>
            </button>
            @endforeach
        </div>
        @endif

        {{-- Grilla de Modelos --}}
        <div class="models-grid">
            @forelse ($modelos as $modelo)
            @php 
                $mdlImg = $modelo->imagen ? (str_starts_with($modelo->imagen, 'http') ? $modelo->imagen : asset($modelo->imagen)) : null;
                $catSlug = Str::slug(trim($modelo->tipo) !== '' ? trim($modelo->tipo) : 'general');
            @endphp
            <a href="{{ route('modelos.show', [$marca->slug, $modelo->slug]) }}" 
               class="model-card"
               data-category="{{ $catSlug }}">
                
                <div class="model-card__media">
                    @if($mdlImg)
                    <img src="{{ $mdlImg }}" alt="{{ $modelo->nombre }}" class="model-card__img" loading="lazy">
                    @else
                    <div class="model-card__placeholder">
                        <svg width="48" height="32" viewBox="0 0 64 40" fill="none" stroke="currentColor" stroke-width="2"><path d="M8 30l6-14h36l6 14"/><rect x="4" y="30" width="56" height="9" rx="3"/><circle cx="16" cy="39" r="4"/><circle cx="48" cy="39" r="4"/></svg>
                    </div>
                    @endif

                    @if($modelo->tipo)
                    <span class="model-card__badge">{{ $modelo->tipo }}</span>
                    @endif
                </div>

                <div class="model-card__body">
                    <h3 class="model-card__name">{{ $modelo->nombre }}</h3>
                    <p class="model-card__desc">{{ $modelo->descripcion ?? 'Tecnología, seguridad y confort garantizado.' }}</p>
                    
                    @if($modelo->precio || $modelo->precio_dolares)
                    <div class="model-card__price-box">
                        <span class="model-card__price-label">Precio desde</span>
                        <div class="model-card__price-row">
                            @if($modelo->precio)
                            <strong class="model-card__price">S/ {{ number_format($modelo->precio, 0, '.', ',') }}</strong>
                            @endif
                            @if($modelo->precio_dolares)
                            <span class="model-card__price-usd">($ {{ number_format($modelo->precio_dolares, 0, '.', ',') }} USD)</span>
                            @endif
                        </div>
                    </div>
                    @endif

                    <span class="model-card__btn">
                        <span>Ver detalles</span>
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </span>
                </div>

            </a>
            @empty
            <div class="models-empty">
                <p>Próximamente más modelos disponibles para {{ $marca->nombre }}.</p>
            </div>
            @endforelse
        </div>

    </div>
</section>

@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const tabs = document.querySelectorAll('.marca-tab');
    const cards = document.querySelectorAll('.model-card');

    if (tabs.length && cards.length) {
        tabs.forEach(tab => {
            tab.addEventListener('click', function(e) {
                e.preventDefault();
                const filter = tab.dataset.filter;

                tabs.forEach(t => t.classList.remove('active'));
                tab.classList.add('active');

                cards.forEach(card => {
                    if (filter === 'all' || card.dataset.category === filter) {
                        card.style.display = 'flex';
                        card.classList.remove('fade-in-card');
                        void card.offsetWidth;
                        card.classList.add('fade-in-card');
                    } else {
                        card.style.display = 'none';
                        card.classList.remove('fade-in-card');
                    }
                });
            });
        });
    }
});
</script>
@endsection
