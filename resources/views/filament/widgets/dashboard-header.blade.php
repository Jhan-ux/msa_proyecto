@php
    $user = $this->getUser();
    $isAdmin = $user?->isAdmin();
    $cat = $user?->categoria_vendedor ?? 'todos';
    $catLabel = match($cat) {
        'autos' => 'Autos & SUVs',
        'motos' => 'Motos',
        'camiones' => 'Camiones & Pesados',
        default => 'Todas las Categorías',
    };
@endphp

<div class="fi-wi-dashboard-header" style="
    background: linear-gradient(135deg, #111111 0%, #1f1f1f 100%);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-left: 5px solid #d90429;
    border-radius: 14px;
    padding: 24px 28px;
    color: #ffffff;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.12);
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 20px;
    margin-bottom: 8px;
">
    <div style="display: flex; align-items: center; gap: 18px;">
        <div style="
            width: 52px;
            height: 52px;
            border-radius: 12px;
            background: linear-gradient(135deg, #d90429 0%, #9e021c 100%);
            display: grid;
            place-items: center;
            font-size: 1.5rem;
            font-weight: 900;
            color: #ffffff;
            box-shadow: 0 4px 14px rgba(217, 4, 41, 0.4);
            flex-shrink: 0;
        ">
            {{ strtoupper(substr($user?->name ?? 'M', 0, 1)) }}
        </div>
        <div>
            <div style="display: flex; align-items: center; gap: 10px; flex-wrap: wrap; margin-bottom: 4px;">
                <h2 style="font-size: 1.35rem; font-weight: 800; margin: 0; color: #ffffff; letter-spacing: -0.01em;">
                    ¡Hola, {{ $user?->name ?? 'Usuario' }}!
                </h2>
                @if($isAdmin)
                    <span style="
                        background: rgba(217, 4, 41, 0.2);
                        border: 1px solid rgba(217, 4, 41, 0.5);
                        color: #ff6b81;
                        font-size: 0.72rem;
                        font-weight: 800;
                        text-transform: uppercase;
                        padding: 3px 10px;
                        border-radius: 20px;
                    ">
                        Administrador
                    </span>
                @else
                    <span style="
                        background: rgba(59, 130, 246, 0.2);
                        border: 1px solid rgba(59, 130, 246, 0.5);
                        color: #93c5fd;
                        font-size: 0.72rem;
                        font-weight: 800;
                        text-transform: uppercase;
                        padding: 3px 10px;
                        border-radius: 20px;
                    ">
                        Asesor Comercial • {{ $catLabel }}
                    </span>
                @endif
            </div>
            <p style="font-size: 0.88rem; color: #a0a0a0; margin: 0; line-height: 1.4;">
                @if($isAdmin)
                    Panel de Control Global MSA Automotriz • Gestión de Catálogo, Ventas y Usuarios
                @else
                    Bienvenido a tu estación de trabajo. Atiende tus cotizaciones y contacta a tus prospectos por WhatsApp.
                @endif
            </p>
        </div>
    </div>

    <div style="display: flex; align-items: center; gap: 12px;">
        <a href="{{ url('/admin/contactos') }}" style="
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #d90429;
            color: #ffffff;
            font-size: 0.84rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            padding: 10px 18px;
            border-radius: 8px;
            text-decoration: none;
            box-shadow: 0 4px 12px rgba(217, 4, 41, 0.35);
            transition: all 0.2s ease;
        ">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
            <span>Ver Cotizaciones</span>
        </a>

        <a href="{{ url('/') }}" target="_blank" style="
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.15);
            color: #ffffff;
            font-size: 0.84rem;
            font-weight: 700;
            padding: 10px 16px;
            border-radius: 8px;
            text-decoration: none;
            transition: all 0.2s ease;
        ">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
            <span>Ver Sitio Web</span>
        </a>
    </div>
</div>
