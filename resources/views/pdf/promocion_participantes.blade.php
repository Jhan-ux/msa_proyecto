<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Participantes de promociones</title>
    <style>
        * { box-sizing: border-box; }
        body {
            font-family: Helvetica, Arial, sans-serif;
            color: #111;
            font-size: 12px;
            margin: 20px;
        }
        h1 {
            margin: 0 0 6px;
            font-size: 20px;
        }
        .meta {
            margin: 0 0 14px;
            color: #444;
            font-size: 11px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th,
        td {
            border: 1px solid #d8d8d8;
            padding: 7px 8px;
            text-align: left;
            vertical-align: top;
        }
        thead th {
            background: #111;
            color: #fff;
            font-weight: 700;
            font-size: 11px;
        }
        tbody tr:nth-child(even) {
            background: #f6f6f6;
        }
        .muted {
            color: #777;
        }
    </style>
</head>
<body>
    <h1>Participantes de promociones</h1>
    <p class="meta">Generado: {{ $generadoEn->format('d/m/Y H:i') }}</p>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Evento</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Telefono</th>
                <th>Correo</th>
                <th>Fecha registro</th>
            </tr>
        </thead>
        <tbody>
            @forelse($participantes as $index => $p)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $p->evento->nombre ?? '-' }}</td>
                    <td>{{ $p->nombre }}</td>
                    <td>{{ $p->apellidos }}</td>
                    <td>{{ $p->telefono ?? '-' }}</td>
                    <td>{{ $p->email ?? '-' }}</td>
                    <td>{{ optional($p->created_at)->format('d/m/Y H:i') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="muted">No hay participantes registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
