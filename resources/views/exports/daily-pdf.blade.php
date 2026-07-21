<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: 'DejaVu Sans', sans-serif; font-size: 11px; color: #1f2937; }
        h1 { font-size: 16px; margin-bottom: 2px; color: #1e40af; }
        .subtitle { color: #6b7280; margin-bottom: 16px; }
        .summary { display: table; width: 100%; margin-bottom: 16px; }
        .summary-item { display: table-cell; text-align: center; padding: 8px; border: 1px solid #e5e7eb; }
        table { width: 100%; border-collapse: collapse; }
        th { background: #f3f4f6; text-align: left; padding: 6px 8px; font-size: 10px; text-transform: uppercase; color: #6b7280; }
        td { padding: 6px 8px; border-bottom: 1px solid #f3f4f6; }
        .badge { padding: 2px 8px; border-radius: 10px; font-size: 9px; }
        .alta { background: #fee2e2; color: #b91c1c; }
        .moderada { background: #fef3c7; color: #b45309; }
        .baja { background: #dcfce7; color: #15803d; }
    </style>
</head>
<body>
    <h1>Reporte diario de tickets</h1>
    <p class="subtitle">{{ \Carbon\Carbon::parse($date)->format('d/m/Y') }}</p>

    <div class="summary">
        <div class="summary-item"><strong>{{ $total }}</strong><br>Total</div>
        <div class="summary-item"><strong>{{ $alta }}</strong><br>Alta</div>
        <div class="summary-item"><strong>{{ $moderada }}</strong><br>Moderada</div>
        <div class="summary-item"><strong>{{ $baja }}</strong><br>Baja</div>
        <div class="summary-item"><strong>{{ $resueltos }}</strong><br>Resueltas</div>
        <div class="summary-item"><strong>{{ $pendientes }}</strong><br>Pendientes</div>
    </div>

    <table>
        <thead>
            <tr>
                <th>Hora</th><th>Usuario</th><th>Departamento</th><th>Descripción</th><th>Prioridad</th><th>Clasificación</th><th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tickets as $ticket)
                <tr>
                    <td>{{ $ticket->created_at->format('H:i') }}</td>
                    <td>{{ $ticket->user->name }}</td>
                    <td>{{ $ticket->department ?? '—' }}</td>
                    <td>{{ $ticket->description }}</td>
                    <td><span class="badge {{ $ticket->priority->value }}">{{ $ticket->priority->label() }}</span></td>
                    <td>{{ $ticket->category?->name ?? 'Sin clasificar' }}</td>
                    <td>{{ $ticket->status->label() }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
