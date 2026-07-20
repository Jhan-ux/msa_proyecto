@extends('layouts.app')
@section('title', 'Promociones - Posventa MSA Automotriz')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/pages.css') }}">
<style>
.promocion-wrap {
    max-width: 1100px;
    margin: 40px auto 64px;
    padding: 0 24px;
}
.promocion-box {
    background: #fff;
    border: 1px solid #e8e8e8;
    border-radius: 14px;
    padding: 26px;
    box-shadow: 0 6px 26px rgba(0,0,0,0.06);
    margin-bottom: 20px;
}
.promocion-title {
    margin: 0 0 10px;
    font-size: 1.35rem;
    font-weight: 800;
    color: #121212;
}
.promocion-sub {
    margin: 0;
    color: #555;
    line-height: 1.7;
}
.step-chip {
    display: inline-block;
    background: #cc1111;
    color: #fff;
    font-size: 0.78rem;
    font-weight: 700;
    padding: 5px 10px;
    border-radius: 6px;
    margin-bottom: 10px;
}
.form-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 14px;
}
.form-grid .full {
    grid-column: 1 / -1;
}
label {
    display: block;
    margin-bottom: 6px;
    font-size: 0.85rem;
    font-weight: 700;
    color: #2f2f2f;
}
input[type="text"],
input[type="email"] {
    width: 100%;
    box-sizing: border-box;
    border: 1px solid #d9d9d9;
    border-radius: 8px;
    padding: 10px 12px;
    font-size: 0.9rem;
    background: #fafafa;
}
button.btn-main {
    border: none;
    background: #cc1111;
    color: #fff;
    font-weight: 700;
    font-size: 0.9rem;
    padding: 11px 18px;
    border-radius: 8px;
    cursor: pointer;
}
button.btn-main:hover {
    background: #a70d0d;
}
.alert-ok {
    background: #ecfdf5;
    border: 1px solid #8fe6bf;
    color: #0b6a4d;
    padding: 11px 13px;
    border-radius: 8px;
    margin-bottom: 14px;
    font-weight: 600;
}
.alert-error {
    background: #fef2f2;
    border: 1px solid #f8b4b4;
    color: #9b1c1c;
    padding: 11px 13px;
    border-radius: 8px;
    margin-bottom: 14px;
    font-weight: 600;
}
.quiz-q {
    padding: 14px;
    border: 1px solid #ececec;
    border-radius: 10px;
    margin-bottom: 14px;
}
.quiz-q h4 {
    margin: 0 0 10px;
    font-size: 0.98rem;
    color: #1d1d1d;
}
.quiz-op {
    display: block;
    margin-bottom: 8px;
    font-size: 0.9rem;
    color: #404040;
}
.badge-mini {
    display: inline-block;
    background: #0f172a;
    color: #fff;
    padding: 6px 10px;
    border-radius: 999px;
    font-size: 0.75rem;
    font-weight: 700;
}
.ruleta-shell {
    margin-top: 14px;
    display: grid;
    justify-items: center;
    gap: 12px;
}
.ruleta-stage {
    position: relative;
    width: 330px;
    max-width: 100%;
}
.ruleta-pointer {
    position: absolute;
    left: 50%;
    top: -8px;
    transform: translateX(-50%);
    width: 0;
    height: 0;
    border-left: 14px solid transparent;
    border-right: 14px solid transparent;
    border-top: 24px solid #111;
    z-index: 4;
}
.ruleta-wheel {
    --rotation: 0deg;
    position: relative;
    width: 320px;
    height: 320px;
    margin: 0 auto;
    border-radius: 50%;
    border: 8px solid #111;
    box-shadow: 0 10px 34px rgba(0, 0, 0, 0.2);
    background: var(--ruleta-gradient, conic-gradient(#cc1111 0deg, #ffffff 120deg, #111111 240deg, #cc1111 360deg));
    transform: rotate(var(--rotation));
    transition: transform 3.6s cubic-bezier(0.18, 0.9, 0.12, 1);
    overflow: hidden;
}
.ruleta-label {
    position: absolute;
    left: 50%;
    top: 50%;
    transform-origin: 0 0;
    transform: rotate(var(--angle)) translateY(-126px);
    z-index: 2;
}
.ruleta-label span {
    display: inline-block;
    width: 112px;
    transform: rotate(calc(-1 * var(--angle)));
    font-size: 0.73rem;
    font-weight: 800;
    line-height: 1.2;
    color: var(--label-color, #fff);
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.45);
    text-align: center;
}
.ruleta-center {
    position: absolute;
    left: 50%;
    top: 50%;
    width: 88px;
    height: 88px;
    transform: translate(-50%, -50%);
    border-radius: 50%;
    background: #111;
    color: #fff;
    font-size: 0.92rem;
    font-weight: 900;
    display: grid;
    place-items: center;
    z-index: 3;
    letter-spacing: 0.8px;
}
.ruleta-help {
    margin: 0;
    font-size: 0.84rem;
    color: #555;
    text-align: center;
}
@media (max-width: 820px) {
    .form-grid {
        grid-template-columns: 1fr;
    }
    .ruleta-stage {
        width: 280px;
    }
    .ruleta-wheel {
        width: 270px;
        height: 270px;
    }
    .ruleta-label {
        transform: rotate(var(--angle)) translateY(-105px);
    }
    .ruleta-label span {
        width: 90px;
        font-size: 0.66rem;
    }
}
</style>
@endsection

@section('content')
<div class="page-hero" style="background-image: url('{{ asset('img/posventa/baner.jfif') }}');">
    <div class="page-hero__overlay"></div>
    <div class="page-hero__content">
        <span class="page-hero__badge">POSVENTA</span>
        <h1 class="page-hero__title">Promociones</h1>
    </div>
</div>

<nav class="page-breadcrumb">
    <a href="{{ route('home') }}">Inicio</a>
    <span>/</span>
    <a href="{{ route('servicios') }}">Posventa</a>
    <span>/</span>
    Promociones
</nav>

<div class="promocion-wrap">
    @if(session('promocion_ok'))
        <div class="alert-ok">{{ session('promocion_ok') }}</div>
    @endif

    @if($errors->any())
        <div class="alert-error">
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    @if(! $evento)
        <div class="promocion-box">
            <h2 class="promocion-title">No hay evento activo por ahora</h2>
        </div>
    @else
        <div class="promocion-box">
            <span class="step-chip">Evento activo</span>
            <h2 class="promocion-title">{{ $evento->nombre }}</h2>
            @if($evento->descripcion_corta)
                <p class="promocion-sub">{{ $evento->descripcion_corta }}</p>
            @endif
            @if(! $eventoDisponibleParaJugar)
                <div class="alert-error" style="margin-top:14px; margin-bottom:0;">
                    Este evento aun no esta habilitado para jugar.
                    @if($evento->fecha_inicio)
                        Inicio programado: {{ \Illuminate\Support\Carbon::parse($evento->fecha_inicio)->format('d/m/Y H:i') }}
                    @endif
                </div>
            @endif
            @if($participante)
                <p style="margin-top:12px;"><span class="badge-mini">Participante: {{ $participante->nombre }} {{ $participante->apellidos }}</span></p>
            @endif
        </div>

        @if($eventoDisponibleParaJugar && ! $participante)
            <div class="promocion-box">
                <span class="step-chip">Paso 1</span>
                <h3 class="promocion-title" style="font-size:1.2rem;">Registro del participante</h3>
                <form method="POST" action="{{ route('promociones.registrar', $evento->id) }}">
                    @csrf
                    <div class="form-grid">
                        <div>
                            <label for="promo_nombre">Nombre</label>
                            <input id="promo_nombre" type="text" name="nombre" required maxlength="100" value="{{ old('nombre') }}">
                        </div>
                        <div>
                            <label for="promo_apellidos">Apellidos</label>
                            <input id="promo_apellidos" type="text" name="apellidos" required maxlength="140" value="{{ old('apellidos') }}">
                        </div>
                        <div>
                            <label for="promo_telefono">Telefono (obligatorio)</label>
                            <input id="promo_telefono" type="tel" name="telefono" required maxlength="20" value="{{ old('telefono') }}" pattern="[0-9+\-()\s]{7,20}">
                        </div>
                        <div class="full">
                            <label for="promo_email">Correo (opcional)</label>
                            <input id="promo_email" type="email" name="email" maxlength="150" value="{{ old('email') }}">
                        </div>
                    </div>
                    <button class="btn-main" type="submit" style="margin-top:14px;">Registrarme</button>
                </form>
            </div>
        @endif

        @if($eventoDisponibleParaJugar && $participante && (! $intento || ! $intento->habilitado_ruleta))
            <div class="promocion-box">
                <span class="step-chip">Paso 2</span>
                <h3 class="promocion-title" style="font-size:1.2rem;">Quiz (3 preguntas)</h3>
                <p class="promocion-sub" style="margin-bottom:16px;">Necesitas al menos 2 respuestas correctas para habilitar el giro.</p>

                @if($preguntas->count() === 3)
                    <form method="POST" action="{{ route('promociones.evaluar', $evento->id) }}">
                        @csrf
                        @foreach($preguntas as $index => $pregunta)
                            <div class="quiz-q">
                                <h4>{{ $index + 1 }}. {{ $pregunta->pregunta }}</h4>
                                @foreach($pregunta->opciones as $opcion)
                                    <label class="quiz-op">
                                        <input type="radio" name="respuestas[{{ $pregunta->id }}]" value="{{ $opcion->id }}" required>
                                        {{ $opcion->texto }}
                                    </label>
                                @endforeach
                            </div>
                        @endforeach
                        <button class="btn-main" type="submit">Enviar respuestas</button>
                    </form>
                @else
                    <div class="alert-error">No hay suficientes preguntas activas para el evento (se requieren 3).</div>
                @endif
            </div>
        @endif

        @if($eventoDisponibleParaJugar && $participante && $intento && $intento->habilitado_ruleta)
            <div class="promocion-box">
                <span class="step-chip">Paso 3</span>
                <h3 class="promocion-title" style="font-size:1.2rem;">Ruleta de premios</h3>
                <p class="promocion-sub" style="margin-bottom:16px;">Tu puntaje fue {{ $intento->puntaje_total }}/3. Tienes 1 giro disponible.</p>

                @if($premiosRuleta->isEmpty())
                    <div class="alert-error" style="margin-bottom:0;">No hay premios configurados para esta ruleta.</div>
                @else
                    <div class="ruleta-shell" data-ruleta data-premio-ganado="{{ $premioGanado['nombre'] ?? '' }}">
                        <div class="ruleta-stage">
                            <div class="ruleta-pointer"></div>
                            @php
                                $totalPremios = max($premiosRuleta->count(), 1);
                                $sectorGrados = 360 / $totalPremios;
                                $coloresRuleta = ['#cc1111', '#ffffff', '#111111'];
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
                                    $coloresTextoRuleta = ['#ffffff', '#111111', '#ffffff'];
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
                                <div class="ruleta-center">MSA</div>
                            </div>
                        </div>
                        <p class="ruleta-help">La flecha superior indica el premio final del giro.</p>

                        @if(! $spinRealizado && ! $intento->premio_id)
                            <form method="POST" action="{{ route('promociones.girar', $evento->id) }}" data-spin-form>
                                @csrf
                                <button class="btn-main" type="submit" data-spin-button>Girar ruleta (1 vez)</button>
                            </form>
                        @endif
                    </div>
                @endif
            </div>
        @endif

        @if($premioGanado)
            <div class="promocion-box" style="border-color:#cc1111;">
                <span class="step-chip">Resultado</span>
                <h3 class="promocion-title" style="font-size:1.2rem;">Premio ganado: {{ $premioGanado['nombre'] }}</h3>
                @if(! empty($premioGanado['descripcion']))
                    <p class="promocion-sub">{{ $premioGanado['descripcion'] }}</p>
                @endif
                <p style="margin-top:12px; font-weight:700; color:#111;">Codigo de premio: {{ $premioGanado['codigo'] }}</p>
            </div>
        @endif
    @endif
</div>

<script>
(function () {
    const ruletas = document.querySelectorAll('[data-ruleta]');
    if (!ruletas.length) return;

    const normalize = (value) => (value || '').toString().trim().toLowerCase();

    ruletas.forEach((ruleta) => {
        const wheel = ruleta.querySelector('[data-wheel]');
        if (!wheel) return;

        const labels = Array.from(ruleta.querySelectorAll('.ruleta-label'));
        const form = ruleta.querySelector('[data-spin-form]');
        const button = ruleta.querySelector('[data-spin-button]');
        const premioGanado = normalize(ruleta.getAttribute('data-premio-ganado'));
        const total = labels.length;

        const rotateToPrize = (nombrePremio, extraTurns = 5) => {
            if (!nombrePremio || total === 0) return;

            const index = labels.findIndex((label) => normalize(label.getAttribute('data-premio')) === nombrePremio);
            if (index < 0) return;

            const sector = 360 / total;
            const centroSector = (index * sector) + (sector / 2);
            const destino = (360 - centroSector) + (extraTurns * 360);
            wheel.style.setProperty('--rotation', destino + 'deg');
        };

        if (premioGanado) {
            window.setTimeout(() => rotateToPrize(premioGanado, 6), 120);
        }

        if (!form || !button) return;

        button.addEventListener('click', (event) => {
            event.preventDefault();
            button.disabled = true;
            button.textContent = 'Girando...';

            const randomTurns = 6 + Math.floor(Math.random() * 2);
            const randomAngle = Math.floor(Math.random() * 360);
            wheel.style.setProperty('--rotation', ((randomTurns * 360) + randomAngle) + 'deg');

            window.setTimeout(() => {
                form.submit();
            }, 3600);
        });
    });
})();
</script>
@endsection
