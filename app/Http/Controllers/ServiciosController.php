<?php

namespace App\Http\Controllers;

use App\Models\ConsultaServicio;
use App\Models\PromocionEvento;
use App\Models\PromocionIntento;
use App\Models\PromocionParticipante;
use App\Models\PromocionPremio;
use App\Models\Servicio;
use App\Models\Seminuevo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ServiciosController extends Controller
{
    public function index()
    {
        $servicios = Servicio::where('activo', '=', true, 'and')->orderBy('orden')->get();
        return view('servicios', compact('servicios'));
    }

    public function show(string $slug)
    {
        $servicio = Servicio::where('slug', '=', $slug, 'and')->where('activo', '=', true, 'and')->firstOrFail();

        if ($slug === 'promociones') {
            return $this->showPromociones($servicio);
        }

        $otrosServicios = Servicio::where('activo', '=', true, 'and')->where('id', '!=', $servicio->id, 'and')->orderBy('orden')->get();
        return view('servicios.show', compact('servicio', 'otrosServicios'));
    }

    public function registrarPromocion(Request $request, int $eventoId)
    {
        $evento = $this->findActivePromocionEvento($eventoId);

        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'apellidos' => 'required|string|max:140',
            'telefono' => 'required|string|max:20',
            'email' => 'nullable|email|max:150',
        ]);

        $participante = PromocionParticipante::create([
            'evento_id' => $evento->id,
            'nombre' => trim($validated['nombre']),
            'apellidos' => trim($validated['apellidos']),
            'telefono' => trim($validated['telefono']),
            'email' => $validated['email'] ?? null,
            'acepta_terminos' => true,
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        session([
            $this->sessionKey($evento->id, 'participante_id') => $participante->id,
            $this->sessionKey($evento->id, 'quiz_aprobado') => false,
            $this->sessionKey($evento->id, 'spin_realizado') => false,
            $this->sessionKey($evento->id, 'intento_id') => null,
            $this->sessionKey($evento->id, 'preguntas_ids') => null,
            $this->sessionKey($evento->id, 'premio') => null,
        ]);

        return back()->with('promocion_ok', 'Registro completado. Responde 3 preguntas para continuar.');
    }

    public function evaluarPromocion(Request $request, int $eventoId)
    {
        $evento = $this->findActivePromocionEvento($eventoId);
        $participante = $this->getParticipanteFromSession($evento->id);

        if (! $participante) {
            return back()->withErrors(['promocion' => 'Primero debes registrarte para participar.']);
        }

        $intentosActuales = PromocionIntento::where('evento_id', '=', $evento->id, 'and')
            ->where('participante_id', '=', $participante->id, 'and')
            ->count();

        if ($intentosActuales >= $evento->max_intentos_por_participante) {
            return back()->withErrors(['promocion' => 'Ya alcanzaste el maximo de intentos permitidos para este evento.']);
        }

        $preguntasIds = session($this->sessionKey($evento->id, 'preguntas_ids'));

        if (! is_array($preguntasIds) || count($preguntasIds) !== 3) {
            return back()->withErrors(['promocion' => 'No se encontro un cuestionario valido. Recarga la pagina.']);
        }

        $validated = $request->validate([
            'respuestas' => 'required|array|size:3',
        ]);

        $preguntas = $evento->preguntas()
            ->whereIn('id', $preguntasIds)
            ->where('activa', true)
            ->with('opciones')
            ->get()
            ->keyBy('id');

        if ($preguntas->count() !== 3) {
            return back()->withErrors(['promocion' => 'Las preguntas ya no estan disponibles. Vuelve a intentarlo.']);
        }

        $correctas = 0;

        foreach ($preguntasIds as $preguntaId) {
            $opcionId = $validated['respuestas'][$preguntaId] ?? null;
            $pregunta = $preguntas->get((int) $preguntaId);

            if (! $pregunta || ! $opcionId) {
                continue;
            }

            $opcion = $pregunta->opciones->firstWhere('id', (int) $opcionId);

            if ($opcion && $opcion->es_correcta) {
                $correctas++;
            }
        }

        $aprobado = $correctas >= 2;

        $intento = PromocionIntento::create([
            'evento_id' => $evento->id,
            'participante_id' => $participante->id,
            'puntaje_total' => $correctas,
            'habilitado_ruleta' => $aprobado,
            'estado' => $aprobado ? 'en_proceso' : 'finalizado',
            'fecha_juego' => now(),
        ]);

        session([
            $this->sessionKey($evento->id, 'quiz_aprobado') => $aprobado,
            $this->sessionKey($evento->id, 'intento_id') => $intento->id,
            $this->sessionKey($evento->id, 'spin_realizado') => false,
        ]);

        if (! $aprobado) {
            return back()->withErrors(['promocion' => 'Obtuviste ' . $correctas . '/3. Necesitas al menos 2 respuestas correctas para girar la ruleta.']);
        }

        return back()->with('promocion_ok', 'Buen trabajo: ' . $correctas . '/3. Ya puedes girar una vez la ruleta.');
    }

    public function girarPromocion(Request $request, int $eventoId)
    {
        $evento = $this->findActivePromocionEvento($eventoId);
        $participante = $this->getParticipanteFromSession($evento->id);

        if (! $participante) {
            return back()->withErrors(['promocion' => 'Primero debes registrarte para participar.']);
        }

        $intentoId = session($this->sessionKey($evento->id, 'intento_id'));
        $intento = PromocionIntento::where('evento_id', '=', $evento->id, 'and')
            ->where('participante_id', '=', $participante->id, 'and')
            ->where('id', '=', $intentoId, 'and')
            ->first();

        if (! $intento || ! $intento->habilitado_ruleta) {
            return back()->withErrors(['promocion' => 'No tienes un intento habilitado para ruleta.']);
        }

        if ($intento->premio_id || session($this->sessionKey($evento->id, 'spin_realizado'))) {
            return back()->withErrors(['promocion' => 'Solo tienes un giro por intento.']);
        }

        $resultado = DB::transaction(function () use ($evento, $intento) {
            $premios = PromocionPremio::where('evento_id', '=', $evento->id, 'and')
                ->where('activo', '=', true, 'and')
                ->where('stock_disponible', '>', 0)
                ->where('puntaje_minimo', '<=', $intento->puntaje_total)
                ->where(function ($query) use ($intento) {
                    $query->whereNull('puntaje_maximo')
                        ->orWhere('puntaje_maximo', '>=', $intento->puntaje_total);
                })
                ->orderBy('orden')
                ->lockForUpdate()
                ->get();

            if ($premios->isEmpty()) {
                $intento->estado = 'finalizado';
                $intento->save();

                return null;
            }

            $premio = $this->pickWeightedPrize($premios);

            if (! $premio) {
                return null;
            }

            $premio->stock_disponible = max(0, $premio->stock_disponible - 1);
            $premio->save();

            $intento->premio_id = $premio->id;
            $intento->codigo_premio = $this->generatePremioCode();
            $intento->estado = 'finalizado';
            $intento->fecha_juego = now();
            $intento->save();

            return [
                'nombre' => $premio->nombre,
                'descripcion' => $premio->descripcion,
                'codigo' => $intento->codigo_premio,
            ];
        });

        session([
            $this->sessionKey($evento->id, 'spin_realizado') => true,
            $this->sessionKey($evento->id, 'premio') => $resultado,
        ]);

        if (! $resultado) {
            return back()->withErrors(['promocion' => 'No hay premios disponibles para tu puntaje en este momento.']);
        }

        return back()->with('promocion_ok', 'Ruleta completada. Premio asignado correctamente.');
    }

    public function consultar(Request $request, string $slug)
    {
        $servicio = Servicio::where('slug', '=', $slug, 'and')->where('activo', '=', true, 'and')->firstOrFail();

        $validated = $request->validate([
            'nombre'   => 'required|string|max:100',
            'email'    => 'required|email|max:150',
            'telefono' => 'nullable|string|max:20',
            'vehiculo' => 'nullable|string|max:100',
            'mensaje'  => 'nullable|string|max:1000',
        ]);

        ConsultaServicio::create([
            'servicio_id'     => $servicio->id,
            'servicio_nombre' => $servicio->nombre,
            'nombre'          => $validated['nombre'],
            'email'           => $validated['email'],
            'telefono'        => $validated['telefono'] ?? null,
            'vehiculo'        => $validated['vehiculo'] ?? null,
            'mensaje'         => $validated['mensaje'] ?? null,
            'estado'          => 'nuevo',
        ]);

        return back()->with('consulta_enviada', true);
    }

    public function seminuevos()
    {
        $seminuevos = Seminuevo::where('activo', '=', true, 'and')->orderBy('orden')->get();
        return view('seminuevos', compact('seminuevos'));
    }

    public function showSeminuevo(string $slug)
    {
        $seminuevo = Seminuevo::where('slug', '=', $slug, 'and')->where('activo', '=', true, 'and')->firstOrFail();
        $otros = Seminuevo::where('activo', '=', true, 'and')->where('id', '!=', $seminuevo->id, 'and')->orderBy('orden')->get();
        return view('seminuevos.show', compact('seminuevo', 'otros'));
    }

    private function showPromociones(Servicio $servicio)
    {
        $evento = PromocionEvento::query()
            ->where('activo', '=', true, 'and')
            ->where('estado', '!=', 'finalizado', 'and')
            ->where(function ($query) use ($servicio) {
                $query->whereNull('servicio_id')
                    ->orWhere('servicio_id', $servicio->id);
            })
            ->orderByRaw("case when estado = 'publicado' then 0 when estado = 'borrador' then 1 else 2 end")
            ->orderByRaw('case when fecha_inicio is null then 0 else 1 end')
            ->orderBy('fecha_inicio')
            ->orderBy('orden')
            ->first();

        if (! $evento) {
            return view('servicios.promociones', [
                'servicio' => $servicio,
                'evento' => null,
                'participante' => null,
                'preguntas' => collect(),
                'premiosRuleta' => collect(),
                'intento' => null,
                'premioGanado' => null,
                'spinRealizado' => false,
                'eventoDisponibleParaJugar' => false,
            ]);
        }

        $eventoDisponibleParaJugar =
            ($evento->fecha_inicio === null || $evento->fecha_inicio <= now())
            && ($evento->fecha_fin === null || $evento->fecha_fin >= now());

        // If the user simply refreshes the page (no fresh success/error flash),
        // start a clean promotion flow and remove sticky participant session state.
        $hasFreshActionFeedback = session()->has('promocion_ok') || session()->has('errors');

        if (! $hasFreshActionFeedback) {
            session()->forget([
                $this->sessionKey($evento->id, 'participante_id'),
                $this->sessionKey($evento->id, 'quiz_aprobado'),
                $this->sessionKey($evento->id, 'spin_realizado'),
                $this->sessionKey($evento->id, 'intento_id'),
                $this->sessionKey($evento->id, 'preguntas_ids'),
                $this->sessionKey($evento->id, 'premio'),
            ]);
        }

        $participante = $this->getParticipanteFromSession($evento->id);
        $preguntas = collect();

        if ($participante) {
            $preguntasIds = session($this->sessionKey($evento->id, 'preguntas_ids'));

            if (! is_array($preguntasIds) || count($preguntasIds) !== 3) {
                $preguntasIds = $evento->preguntas()
                    ->where('activa', true)
                    ->inRandomOrder()
                    ->limit(3)
                    ->pluck('id')
                    ->all();

                session([$this->sessionKey($evento->id, 'preguntas_ids') => $preguntasIds]);
            }

            if (count($preguntasIds) === 3) {
                $preguntas = $evento->preguntas()
                    ->whereIn('id', $preguntasIds)
                    ->where('activa', true)
                    ->with(['opciones' => fn ($q) => $q->orderBy('orden')])
                    ->get()
                    ->sortBy(fn ($p) => array_search($p->id, $preguntasIds, true))
                    ->values();
            }
        }

        $premiosRuleta = $evento->premios()
            ->where('activo', true)
            ->where('stock_disponible', '>', 0)
            ->orderBy('orden')
            ->get(['id', 'nombre']);

        if ($premiosRuleta->isEmpty()) {
            $premiosRuleta = $evento->premios()
                ->where('activo', true)
                ->orderBy('orden')
                ->get(['id', 'nombre']);
        }

        $intento = null;
        $intentoId = session($this->sessionKey($evento->id, 'intento_id'));

        if ($intentoId) {
            $intento = PromocionIntento::with('premio')->find($intentoId);
        }

        return view('servicios.promociones', [
            'servicio' => $servicio,
            'evento' => $evento,
            'participante' => $participante,
            'preguntas' => $preguntas,
            'premiosRuleta' => $premiosRuleta,
            'intento' => $intento,
            'premioGanado' => session($this->sessionKey($evento->id, 'premio')),
            'spinRealizado' => (bool) session($this->sessionKey($evento->id, 'spin_realizado'), false),
            'eventoDisponibleParaJugar' => $eventoDisponibleParaJugar,
        ]);
    }

    private function findActivePromocionEvento(int $eventoId): PromocionEvento
    {
        return PromocionEvento::query()
            ->where('id', '=', $eventoId, 'and')
            ->where('activo', '=', true, 'and')
            ->where('estado', '!=', 'finalizado', 'and')
            ->where(function ($query) {
                $query->whereNull('fecha_inicio')
                    ->orWhere('fecha_inicio', '<=', now());
            })
            ->where(function ($query) {
                $query->whereNull('fecha_fin')
                    ->orWhere('fecha_fin', '>=', now());
            })
            ->firstOrFail();
    }

    private function getParticipanteFromSession(int $eventoId): ?PromocionParticipante
    {
        $id = session($this->sessionKey($eventoId, 'participante_id'));

        if (! $id) {
            return null;
        }

        return PromocionParticipante::where('evento_id', '=', $eventoId, 'and')->find($id);
    }

    private function sessionKey(int $eventoId, string $suffix): string
    {
        return 'promo_' . $eventoId . '_' . $suffix;
    }

    private function pickWeightedPrize($premios): ?PromocionPremio
    {
        $totalWeight = (int) $premios->sum(fn ($premio) => max(0, (int) $premio->probabilidad_peso));

        if ($totalWeight <= 0) {
            return $premios->first();
        }

        $random = random_int(1, $totalWeight);
        $acc = 0;

        foreach ($premios as $premio) {
            $acc += max(0, (int) $premio->probabilidad_peso);

            if ($random <= $acc) {
                return $premio;
            }
        }

        return $premios->first();
    }

    private function generatePremioCode(): string
    {
        do {
            $code = 'PROMO-' . Str::upper(Str::random(8));
        } while (PromocionIntento::where('codigo_premio', '=', $code, 'and')->exists());

        return $code;
    }
}

