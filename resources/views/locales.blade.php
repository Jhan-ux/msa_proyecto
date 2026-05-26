@extends('layouts.app')
@section('title', 'Nuestros Locales - MSA Automotriz')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/pages.css') }}">
<link rel="stylesheet" href="{{ asset('css/locales.css') }}">
@endsection

@section('content')

<div class="page-hero" style="background-image: url('{{ asset('img/localprueba.jpg') }}');">
    <div class="page-hero__overlay"></div>
    <div class="page-hero__content">
        <span class="page-hero__badge">MSA Automotriz</span>
        <h1 class="page-hero__title">NUESTROS LOCALES</h1>
        <p class="page-hero__sub">V&iacute;sitanos en nuestras sedes en Cajamarca, Lima y Piura.</p>
    </div>
</div>

<nav class="page-breadcrumb">
    <a href="{{ route('home') }}">Inicio</a>
    <span>/</span>
    Locales
</nav>

<section style="max-width:1100px;margin:48px auto;padding:0 24px;display:grid;grid-template-columns:repeat(auto-fit,minmax(300px,1fr));gap:32px;">

    @forelse($locales as $local)
    <div style="background:#fff;border-radius:12px;padding:32px;box-shadow:0 2px 16px rgba(0,0,0,.09);position:relative;">
        @if($local->imagen)
            <img src="{{ asset($local->imagen) }}" alt="{{ $local->nombre }}" style="width:100%;max-height:180px;object-fit:cover;border-radius:8px;margin-bottom:16px;">
        @endif
        <h2 style="margin-bottom:12px;">{{ $local->nombre }}</h2>
        <p><strong>Dirección:</strong> {{ $local->direccion }}</p>
        @if($local->telefono)
        <p><strong>Teléfono:</strong> {{ $local->telefono }}</p>
        @endif
        @if($local->whatsapp)
        <p><strong>WhatsApp:</strong> {{ $local->whatsapp }}</p>
        @endif
        @if($local->email)
        <p><strong>Email:</strong> {{ $local->email }}</p>
        @endif
        @if($local->horario)
        <p><strong>Horario:</strong> {{ $local->horario }}</p>
        @endif
        @if($local->mapa_embed)
        <div style="margin-top:16px;">
            @if(str_starts_with(trim($local->mapa_embed), '<'))
                {!! $local->mapa_embed !!}
            @else
                <iframe src="{{ $local->mapa_embed }}" width="100%" height="200" style="border:0;border-radius:6px;" allowfullscreen loading="lazy"></iframe>
            @endif
        </div>
        @endif
        @if($local->whatsapp)
        <a href="https://wa.me/{{ preg_replace('/\D/', '', $local->whatsapp) }}"
           target="_blank" rel="noopener"
           style="display:inline-block;margin-top:16px;background:#25d366;color:#fff;padding:10px 20px;border-radius:6px;text-decoration:none;">
            Escribir por WhatsApp
        </a>
        @endif
        <a href="{{ route('locales.show', $local->id) }}"
           style="display:inline-block;margin-top:10px;margin-left:8px;background:#111;color:#fff;padding:10px 20px;border-radius:6px;text-decoration:none;font-size:.9rem;font-weight:700;">
            Ver sede &rsaquo;
        </a>
    </div>
    @empty
    {{-- Fallback mientras no haya datos en la BD --}}
    @foreach([
        ['Sede Cajamarca',     'Av. Independencia 1234, Cajamarca',     '(076) 123-456', '+51 986 339 369', 'Lun – Vie: 8:00 am – 6:00 pm | Sáb: 8:00 am – 1:00 pm'],
        ['Sede Baños del Inca','Carretera Baños del Inca km 3.5',       '(076) 789-012', '+51 986 339 369', 'Lun – Vie: 8:00 am – 6:00 pm | Sáb: 8:00 am – 1:00 pm'],
        ['Sede Lima',          'Av. Principal 567, Lima',               '(01) 456-789',  '+51 986 339 369', 'Lun – Vie: 8:00 am – 6:00 pm | Sáb: 8:00 am – 1:00 pm'],
        ['Sede Piura',         'Av. Grau 890, Piura',                   '(073) 321-654', '+51 986 339 369', 'Lun – Vie: 8:00 am – 6:00 pm | Sáb: 8:00 am – 1:00 pm'],
    ] as [$nombre, $dir, $tel, $wa, $horario])
    <div style="background:#fff;border-radius:12px;padding:32px;box-shadow:0 2px 16px rgba(0,0,0,.09);">
        <h2 style="margin-bottom:12px;">{{ $nombre }}</h2>
        <p><strong>Dirección:</strong> {{ $dir }}</p>
        <p><strong>Teléfono:</strong> {{ $tel }}</p>
        <p><strong>WhatsApp:</strong> {{ $wa }}</p>
        <p><strong>Horario:</strong> {{ $horario }}</p>
        <a href="https://wa.me/{{ preg_replace('/\D/', '', $wa) }}" target="_blank" rel="noopener"
           style="display:inline-block;margin-top:16px;background:#25d366;color:#fff;padding:10px 20px;border-radius:6px;text-decoration:none;">
            Escribir por WhatsApp
        </a>
    </div>
    @endforeach
    @endforelse

</section>

@endsection
