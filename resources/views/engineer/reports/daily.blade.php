<x-layouts.app title="Reporte diario">
    <div class="mb-6 flex flex-wrap items-center justify-between gap-3 print:hidden">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Reporte diario</h1>
            <p class="text-sm text-gray-500">Solicitudes registradas el {{ \Carbon\Carbon::parse($date)->format('d/m/Y') }}.</p>
        </div>
        <div class="flex flex-wrap gap-2">
            <form method="GET">
                <input type="date" name="date" value="{{ $date }}" onchange="this.form.submit()" class="input-field">
            </form>
            <a href="{{ route('engineer.reports.daily.pdf', ['date' => $date]) }}" class="btn-secondary">📄 Exportar PDF</a>
            <a href="{{ route('engineer.reports.daily.excel', ['date' => $date]) }}" class="btn-secondary">📊 Exportar Excel</a>
            <button onclick="window.print()" class="btn-secondary">🖨️ Imprimir</button>
        </div>
    </div>

    <div class="mb-6 grid grid-cols-2 gap-4 md:grid-cols-6">
        <div class="card"><p class="text-xl font-bold text-gray-900">{{ $total }}</p><p class="text-xs text-gray-500">Total</p></div>
        <div class="card"><p class="text-xl font-bold text-red-600">{{ $alta }}</p><p class="text-xs text-gray-500">Alta</p></div>
        <div class="card"><p class="text-xl font-bold text-amber-600">{{ $moderada }}</p><p class="text-xs text-gray-500">Moderada</p></div>
        <div class="card"><p class="text-xl font-bold text-green-600">{{ $baja }}</p><p class="text-xs text-gray-500">Baja</p></div>
        <div class="card"><p class="text-xl font-bold text-teal-600">{{ $resueltos }}</p><p class="text-xs text-gray-500">Resueltas</p></div>
        <div class="card"><p class="text-xl font-bold text-gray-600">{{ $pendientes }}</p><p class="text-xs text-gray-500">Pendientes</p></div>
    </div>

    <div class="card overflow-x-auto p-0">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 text-left text-xs uppercase text-gray-500">
                <tr>
                    <th class="px-4 py-3">Hora</th>
                    <th class="px-4 py-3">Usuario</th>
                    <th class="px-4 py-3">Departamento</th>
                    <th class="px-4 py-3">Descripción</th>
                    <th class="px-4 py-3">Prioridad</th>
                    <th class="px-4 py-3">Clasificación</th>
                    <th class="px-4 py-3">Estado</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($tickets as $ticket)
                    <tr>
                        <td class="px-4 py-3">{{ $ticket->created_at->format('H:i') }}</td>
                        <td class="px-4 py-3">{{ $ticket->user->name }}</td>
                        <td class="px-4 py-3 text-gray-500">{{ $ticket->department ?? '—' }}</td>
                        <td class="px-4 py-3 max-w-xs truncate">{{ $ticket->description }}</td>
                        <td class="px-4 py-3"><x-badge-priority :priority="$ticket->priority" /></td>
                        <td class="px-4 py-3 text-gray-500">{{ $ticket->category?->name ?? 'Sin clasificar' }}</td>
                        <td class="px-4 py-3"><x-badge-status :status="$ticket->status" /></td>
                    </tr>
                @empty
                    <tr><td colspan="7" class="px-4 py-10 text-center text-gray-400">No hay solicitudes registradas en esta fecha.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-layouts.app>
