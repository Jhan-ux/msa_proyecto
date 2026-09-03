@extends('layouts.app')
@section('title', 'Promociones & Ruleta de Premios - Posventa MSA Automotriz')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/pages.css') }}">
<link rel="stylesheet" href="{{ asset('css/promociones.css') }}?v=2">
@endsection

@section('content')

{{-- HERO HEADER CORPORATIVO --}}
<div class="promo-hero" style="background-image: linear-gradient(rgba(10, 10, 10, 0.78), rgba(10, 10, 10, 0.88)), url('{{ asset('img/posventa/baner.jfif') }}');">
    <div class="promo-hero__inner">
        <span class="promo-hero__badge">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
            CLUB POSVENTA MSA
        </span>
        <h1 class="promo-hero__title">Promociones &amp; Ruleta de Premios</h1>
        <p class="promo-hero__desc">
            Participa en nuestras dinámicas oficiales de taller, demuestra tus conocimientos y gana descuentos, mantenimientos y premios exclusivos para tu vehículo.
        </p>
    </div>
</div>

{{-- BREADCRUMB --}}
<nav class="page-breadcrumb">
    <div class="page-breadcrumb__inner">
        <a href="{{ route('home') }}">Inicio</a>
        <span class="page-breadcrumb__separator">/</span>
        <a href="{{ route('servicios') }}">Posventa</a>
        <span class="page-breadcrumb__separator">/</span>
        <span class="page-breadcrumb__current">Promociones</span>
    </div>
</nav>

<div class="promocion-wrap">

    {{-- ALERTAS DE SESIÓN --}}
    @if(session('promocion_ok'))
        <div class="promo-alert promo-alert--success">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
            <span>{{ session('promocion_ok') }}</span>
        </div>
    @endif

    @if($errors->any())
        <div class="promo-alert promo-alert--error">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
            <div>
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        </div>
    @endif

    @if(! $evento)
        {{-- SIN EVENTO ACTIVO --}}
        <div class="promo-card promo-card--empty">
            <div class="promo-empty-icon">
                <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><path d="M16 16s-1.5-2-4-2-4 2-4 2"/><line x1="9" y1="9" x2="9.01" y2="9"/><line x1="15" y1="9" x2="15.01" y2="9"/></svg>
            </div>
            <h2 class="promo-empty-title">No hay campañas promocionales activas en este momento</h2>
            <p class="promo-empty-desc">Pronto lanzaremos nuevas dinámicas con descuentos y premios para tus mantenimientos en MSA Automotriz.</p>
            <a href="{{ route('servicios') }}" class="promo-btn promo-btn--outline">Ver Servicios de Taller</a>
        </div>
    @else

        {{-- BARRA DE PROGRESO / STEPPER --}}
        @php
            $currentStep = 1;
            if ($participante && ! $intento) {
                $currentStep = 2;
            } elseif ($participante && $intento && ! $premioGanado) {
                $currentStep = 3;
            } elseif ($premioGanado) {
                $currentStep = 4;
            }
        @endphp

        <div class="promo-stepper">
            <div class="promo-step {{ $currentStep >= 1 ? 'is-active' : '' }} {{ $currentStep > 1 ? 'is-done' : '' }}">
                <div class="promo-step__num">
                    @if($currentStep > 1)
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg>
                    @else
                        1
                    @endif
                </div>
                <div class="promo-step__text">
                    <strong>Registro</strong>
                    <small>Tus datos</small>
                </div>
            </div>
            <div class="promo-step-line {{ $currentStep > 1 ? 'is-done' : '' }}"></div>

            <div class="promo-step {{ $currentStep >= 2 ? 'is-active' : '' }} {{ $currentStep > 2 ? 'is-done' : '' }}">
                <div class="promo-step__num">
                    @if($currentStep > 2)
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg>
                    @else
                        2
                    @endif
                </div>
                <div class="promo-step__text">
                    <strong>Quiz</strong>
                    <small>3 Preguntas</small>
                </div>
            </div>
            <div class="promo-step-line {{ $currentStep > 2 ? 'is-done' : '' }}"></div>

            <div class="promo-step {{ $currentStep >= 3 ? 'is-active' : '' }} {{ $currentStep > 3 ? 'is-done' : '' }}">
                <div class="promo-step__num">
                    @if($currentStep > 3)
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg>
                    @else
                        3
                    @endif
                </div>
                <div class="promo-step__text">
                    <strong>Ruleta</strong>
                    <small>Gira y gana</small>
                </div>
            </div>
            <div class="promo-step-line {{ $currentStep >= 4 ? 'is-done' : '' }}"></div>

            <div class="promo-step {{ $currentStep === 4 ? 'is-active is-done' : '' }}">
                <div class="promo-step__num">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><path d="M6 9H4.5a2.5 2.5 0 0 1 0-5H6"/><path d="M18 9h1.5a2.5 2.5 0 0 0 0-5H18"/><path d="M4 22h16"/><path d="M10 14.66V17c0 .55-.45 1-1 1H7v2h10v-2h-2c-.55 0-1-.45-1-1v-2.34c3.27-.58 5.79-3.23 5.98-6.66H4.02C4.21 11.43 6.73 14.08 10 14.66z"/></svg>
                </div>
                <div class="promo-step__text">
                    <strong>Tu Premio</strong>
                    <small>Cupón oficial</small>
                </div>
            </div>
        </div>

        {{-- CABECERA DEL EVENTO ACTIVO --}}
        <div class="promo-card promo-card--event">
            <div class="promo-event-header">
                <div>
                    <span class="promo-chip promo-chip--live">
                        <span class="promo-chip__dot"></span>
                        Campaña Activa
                    </span>
                    <h2 class="promo-event-title">{{ $evento->nombre }}</h2>
                    @if($evento->descripcion_corta)
                        <p class="promo-event-desc">{{ $evento->descripcion_corta }}</p>
                    @endif
                </div>
                @if($participante)
                    <div class="promo-user-badge">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                        <div>
                            <small>Participante registrado</small>
                            <strong>{{ $participante->nombre }} {{ $participante->apellidos }}</strong>
                        </div>
                    </div>
                @endif
            </div>

            @if(! $eventoDisponibleParaJugar)
                <div class="promo-alert promo-alert--warning">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                    <div>
                        Este evento aún no está habilitado para jugar.
                        @if($evento->fecha_inicio)
                            <br><strong>Inicio programado:</strong> {{ \Illuminate\Support\Carbon::parse($evento->fecha_inicio)->format('d/m/Y H:i') }}
                        @endif
                    </div>
                </div>
            @endif
        </div>

        {{-- PASO 1: REGISTRO --}}
        @if($eventoDisponibleParaJugar && ! $participante)
            <div class="promo-card">
                <div class="promo-card__header">
                    <span class="promo-step-badge">Paso 1 de 3</span>
                    <h3 class="promo-card__title">Registro del Participante</h3>
                    <p class="promo-card__subtitle">Ingresa tus datos para validar tu participación y emitir tu código de premio personalizado.</p>
                </div>

                <form method="POST" action="{{ route('promociones.registrar', $evento->id) }}" class="promo-form">
                    @csrf
                    <div class="promo-form-grid">
                        <div class="promo-field">
                            <label for="promo_nombre">Nombre(s) *</label>
                            <div class="promo-input-wrap">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                                <input id="promo_nombre" type="text" name="nombre" required maxlength="100" placeholder="Ej: Juan Carlos" value="{{ old('nombre') }}">
                            </div>
                        </div>

                        <div class="promo-field">
                            <label for="promo_apellidos">Apellidos *</label>
                            <div class="promo-input-wrap">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                                <input id="promo_apellidos" type="text" name="apellidos" required maxlength="140" placeholder="Ej: Pérez García" value="{{ old('apellidos') }}">
                            </div>
                        </div>

                        <div class="promo-field">
                            <label for="promo_telefono">Teléfono Celular *</label>
                            <div class="promo-input-wrap">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                                <input id="promo_telefono" type="tel" name="telefono" required maxlength="20" placeholder="Ej: 966154210" value="{{ old('telefono') }}" pattern="[0-9+\-()\s]{7,20}">
                            </div>
                        </div>

                        <div class="promo-field">
                            <label for="promo_email">Correo Electrónico (Opcional)</label>
                            <div class="promo-input-wrap">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                                <input id="promo_email" type="email" name="email" maxlength="150" placeholder="juan.perez@ejemplo.com" value="{{ old('email') }}">
                            </div>
                        </div>
                    </div>

                    <div class="promo-form-actions">
                        <button class="promo-btn promo-btn--primary" type="submit">
                            <span>Comenzar Quiz</span>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 18 15 12 9 6"/></svg>
                        </button>
                    </div>
                </form>
            </div>
        @endif

        {{-- PASO 2: QUIZ INTERACTIVO --}}
        @if($eventoDisponibleParaJugar && $participante && ! $intento)
            <div class="promo-card">
                <div class="promo-card__header">
                    <span class="promo-step-badge">Paso 2 de 3</span>
                    <h3 class="promo-card__title">Trivia de Posventa &amp; Cuidado Vehicular</h3>
                    <p class="promo-card__subtitle">Responde las siguientes 3 preguntas para desbloquear tu giro en la Ruleta MSA.</p>
                </div>

                @if($preguntas->count() === 3)
                    <form method="POST" action="{{ route('promociones.evaluar', $evento->id) }}" class="promo-quiz-form">
                        @csrf
                        <div class="promo-questions-list">
                            @foreach($preguntas as $index => $pregunta)
                                <div class="promo-question-block">
                                    <div class="promo-question-head">
                                        <span class="promo-question-number">{{ $index + 1 }}</span>
                                        <h4 class="promo-question-text">{{ $pregunta->pregunta }}</h4>
                                    </div>
                                    <div class="promo-options-grid">
                                        @foreach($pregunta->opciones as $opcion)
                                            <label class="promo-option-label">
                                                <input type="radio" name="respuestas[{{ $pregunta->id }}]" value="{{ $opcion->id }}" required>
                                                <span class="promo-option-custom"></span>
                                                <span class="promo-option-text">{{ $opcion->texto }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="promo-form-actions">
                            <button class="promo-btn promo-btn--primary" type="submit">
                                <span>Enviar Respuestas y Desbloquear Ruleta</span>
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 18 15 12 9 6"/></svg>
                            </button>
                        </div>
                    </form>
                @else
                    <div class="promo-alert promo-alert--error">
                        No hay suficientes preguntas activas configuradas para este evento (se requieren 3).
                    </div>
                @endif
            </div>
        @endif

        {{-- REVISIÓN DEL QUIZ (SI YA RESPONDIÓ) --}}
        @if($eventoDisponibleParaJugar && $participante && $intento && $preguntas->count() === 3)
            <div class="promo-card promo-card--review">
                <div class="promo-card__header">
                    <span class="promo-step-badge promo-step-badge--review">Resultados del Quiz</span>
                    <h3 class="promo-card__title">Corrección de Respuestas</h3>
                    <p class="promo-card__subtitle">
                        Puntaje obtenido: <strong>{{ $intento->puntaje_total }} de 3 correctas</strong>. 
                        @if($intento->puntaje_total === 3)
                            ¡Excelente conocimiento automotriz! 🎉
                        @else
                            ¡Buen intento! Ya puedes girar la ruleta por tu premio.
                        @endif
                    </p>
                </div>

                <div class="promo-questions-list">
                    @foreach($preguntas as $index => $pregunta)
                        @php
                            $revision = $quizRevision[$pregunta->id] ?? null;
                            $seleccionadaId = $revision['seleccionada'] ?? null;
                            $correctaId = $revision['correcta'] ?? null;
                        @endphp
                        <div class="promo-question-block promo-question-block--review">
                            <div class="promo-question-head">
                                <span class="promo-question-number promo-question-number--review">{{ $index + 1 }}</span>
                                <h4 class="promo-question-text">{{ $pregunta->pregunta }}</h4>
                            </div>
                            <div class="promo-options-grid">
                                @foreach($pregunta->opciones as $opcion)
                                    @php
                                        $esCorrecta = $correctaId && (int) $correctaId === (int) $opcion->id;
                                        $esSeleccionada = $seleccionadaId && (int) $seleccionadaId === (int) $opcion->id;
                                        $esSeleccionadaErronea = $esSeleccionada && ! $esCorrecta;
                                    @endphp
                                    <div class="promo-review-option {{ $esCorrecta ? 'is-correct' : '' }} {{ $esSeleccionadaErronea ? 'is-wrong' : '' }}">
                                        <div class="promo-review-icon">
                                            @if($esCorrecta)
                                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg>
                                            @elseif($esSeleccionadaErronea)
                                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                                            @else
                                                <span class="dot-neutral"></span>
                                            @endif
                                        </div>
                                        <span class="promo-review-text">{{ $opcion->texto }}</span>
                                        @if($esCorrecta)
                                            <span class="promo-review-tag promo-review-tag--correct">Correcta</span>
                                        @endif
                                        @if($esSeleccionadaErronea)
                                            <span class="promo-review-tag promo-review-tag--wrong">Tu Elección</span>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        {{-- PASO 3: RULETA INTERACTIVA MSA --}}
        @if($eventoDisponibleParaJugar && $participante && $intento)
            <div class="promo-card promo-card--roulette">
                <div class="promo-card__header promo-card__header--center">
                    <span class="promo-step-badge">Paso 3 de 3</span>
                    <h3 class="promo-card__title">La Gran Ruleta Posventa MSA</h3>
                    <p class="promo-card__subtitle">Tienes <strong>1 giro oficial</strong> disponible. ¡Haz girar la ruleta y descubre tu beneficio exclusivo!</p>
                </div>

                @if($premiosRuleta->isEmpty())
                    <div class="promo-alert promo-alert--error">No hay premios configurados para esta ruleta.</div>
                @else
                    <div class="ruleta-shell" data-ruleta data-premio-ganado="{{ $premioGanado['nombre'] ?? '' }}">
                        <div class="ruleta-outer-rim">
                            <div class="ruleta-stage">
                                {{-- PUNTERO INDICADOR PREMIUM --}}
                                <div class="ruleta-pointer">
                                    <svg width="34" height="42" viewBox="0 0 34 42" fill="none">
                                        <path d="M17 42L4 14C1 7.5 5.5 0 13 0H21C28.5 0 33 7.5 30 14L17 42Z" fill="#d90429"/>
                                        <path d="M17 32L8 14C6 9.5 9 4 14 4H20C25 4 28 9.5 26 14L17 32Z" fill="#ffffff"/>
                                    </svg>
                                </div>

                                @php
                                    $totalPremios = max($premiosRuleta->count(), 1);
                                    $sectorGrados = 360 / $totalPremios;
                                    // Paleta Corporativa MSA: Rojo Oficial, Blanco Puro, Negro Obsidiana
                                    $coloresRuleta = ['#d90429', '#ffffff', '#141414', '#b50322', '#f1f1f1', '#1f1f1f'];
                                    $segmentosGradiente = [];

                                    for ($i = 0; $i < $totalPremios; $i++) {
                                        $inicio = $i * $sectorGrados;
                                        $fin = ($i + 1) * $sectorGrados;
                                        $color = $coloresRuleta[$i % count($coloresRuleta)];
                                        $segmentosGradiente[] = $color . ' ' . $inicio . 'deg ' . $fin . 'deg';
                                    }

                                    $gradienteRuleta = 'conic-gradient(' . implode(', ', $segmentosGradiente) . ')';
                                @endphp

                                <div class="ruleta-wheel" data-wheel style="--ruleta-gradient: {{ $gradienteRuleta }};">
                                    @php
                                        $coloresTextoRuleta = ['#ffffff', '#111111', '#ffffff', '#ffffff', '#111111', '#ffffff'];
                                    @endphp
                                    @foreach($premiosRuleta as $premio)
                                        @php
                                            $angulo = ($loop->index * 360) / $totalPremios;
                                            $colorTexto = $coloresTextoRuleta[$loop->index % count($coloresTextoRuleta)];
                                        @endphp
                                        <div class="ruleta-label" data-premio="{{ $premio->nombre }}" style="--angle: {{ $angulo }}deg;">
                                            <span style="--label-color: {{ $colorTexto }};">{{ $premio->nombre }}</span>
                                        </div>
                                    @endforeach

                                    {{-- CENTRO DE LA RULETA --}}
                                    <div class="ruleta-center">
                                        <div class="ruleta-center__logo">
                                            <span>MSA</span>
                                            <small>TALLER</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <p class="ruleta-help">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></svg>
                            El premio que señale la flecha superior al detenerse será tu beneficio asignado.
                        </p>

                        @if(! $spinRealizado && ! $intento->premio_id)
                            <form method="POST" action="{{ route('promociones.girar', $evento->id) }}" data-spin-form class="ruleta-form">
                                @csrf
                                <button class="promo-btn promo-btn--spin" type="submit" data-spin-button>
                                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M21.5 2v6h-6M21.34 15.57a10 10 0 1 1-.57-8.38l5.67-5.67"/></svg>
                                    <span>¡Girar Ruleta Ahora!</span>
                                </button>
                            </form>
                        @endif
                    </div>
                @endif
            </div>
        @endif

        {{-- RESULTADO Y CUPÓN DE PREMIO --}}
        @if($premioGanado)
            <div class="promo-card promo-card--winner">
                <div class="promo-winner-badge">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                    ¡FELICITACIONES! BENEFICIO OBTENIDO
                </div>

                <div class="promo-voucher">
                    <div class="promo-voucher__left">
                        <span class="promo-voucher__tag">CUPÓN OFICIAL MSA</span>
                        <h3 class="promo-voucher__title">{{ $premioGanado['nombre'] }}</h3>
                        @if(! empty($premioGanado['descripcion']))
                            <p class="promo-voucher__desc">{{ $premioGanado['descripcion'] }}</p>
                        @endif
                        <div class="promo-voucher__meta">
                            <span>Válido para: <strong>{{ $participante->nombre }} {{ $participante->apellidos }}</strong></span>
                            <span>Teléfono: <strong>{{ $participante->telefono }}</strong></span>
                        </div>
                    </div>

                    <div class="promo-voucher__divider"></div>

                    <div class="promo-voucher__right">
                        <span class="promo-code-label">CÓDIGO DE CANJE</span>
                        <div class="promo-code-box">
                            <strong>{{ $premioGanado['codigo'] }}</strong>
                        </div>
                        <small class="promo-code-note">Presenta este código en recepción de taller o al agendar por WhatsApp</small>

                        @php
                            $msgWa = urlencode("¡Hola MSA Automotriz! Acabo de ganar el premio '{$premioGanado['nombre']}' en su Ruleta Web con el código: {$premioGanado['codigo']}. Deseo agendar mi cita en taller.");
                        @endphp
                        <a href="https://wa.me/51966154210?text={{ $msgWa }}" target="_blank" class="promo-btn promo-btn--whatsapp">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.711 2.598 2.664-.698c.972.53 1.769.813 2.796.813 3.179 0 5.765-2.587 5.767-5.766.001-3.187-2.575-5.77-5.767-5.77zm0 10.457c-.894 0-1.638-.255-2.372-.69l-.17-.101-1.579.414.421-1.539-.111-.177c-.477-.762-.767-1.554-.767-2.598 0-2.586 2.103-4.689 4.69-4.689 2.584 0 4.688 2.103 4.689 4.689 0 2.587-2.103 4.691-4.681 4.691z"/></svg>
                            <span>Canjear por WhatsApp</span>
                        </a>
                    </div>
                </div>
            </div>
        @endif

    @endif

</div>

@endsection

@section('scripts')
<script src="{{ asset('js/promociones.js') }}"></script>
@endsection
