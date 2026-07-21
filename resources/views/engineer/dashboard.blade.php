<x-layouts.app title="Dashboard">
    <h1 class="mb-1 text-2xl font-bold text-gray-900">Dashboard</h1>
    <p class="mb-6 text-sm text-gray-500">Resumen general del sistema de tickets.</p>

    {{-- Cards superiores --}}
    <div class="mb-6 grid grid-cols-2 gap-4 md:grid-cols-3 lg:grid-cols-5">
        <div class="card"><p class="text-2xl font-bold text-gray-900">{{ $stats['pendientes'] }}</p><p class="text-sm text-gray-500">Pendientes</p></div>
        <div class="card"><p class="text-2xl font-bold text-blue-600">{{ $stats['en_proceso'] }}</p><p class="text-sm text-gray-500">En proceso</p></div>
        <div class="card"><p class="text-2xl font-bold text-teal-600">{{ $stats['finalizados'] }}</p><p class="text-sm text-gray-500">Finalizados</p></div>
        <div class="card"><p class="text-2xl font-bold text-brand-600">{{ $stats['creados_hoy'] }}</p><p class="text-sm text-gray-500">Creados hoy</p></div>
        <div class="card"><p class="text-2xl font-bold text-red-600">{{ $stats['prioridad_alta'] }}</p><p class="text-sm text-gray-500">Prioridad alta</p></div>
    </div>

    <div class="mb-6 grid grid-cols-1 gap-6 lg:grid-cols-3">
        <div class="card lg:col-span-2">
            <h2 class="mb-4 text-sm font-semibold text-gray-700">Tickets creados (últimos 7 días)</h2>
            <canvas id="chart-semana" height="120"></canvas>
        </div>
        <div class="card">
            <h2 class="mb-4 text-sm font-semibold text-gray-700">Distribución por prioridad</h2>
            <canvas id="chart-prioridad" height="200"></canvas>
        </div>
    </div>

    <div class="card overflow-x-auto p-0">
        <h2 class="px-4 pt-4 text-sm font-semibold text-gray-700">Actividad reciente</h2>
        <table class="mt-2 w-full text-sm">
            <thead class="bg-gray-50 text-left text-xs uppercase text-gray-500">
                <tr>
                    <th class="px-4 py-3">ID</th>
                    <th class="px-4 py-3">Usuario</th>
                    <th class="px-4 py-3">Descripción</th>
                    <th class="px-4 py-3">Prioridad</th>
                    <th class="px-4 py-3">Estado</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach ($actividadReciente as $ticket)
                    <tr class="hover:bg-gray-50 cursor-pointer" onclick="window.location='{{ route('engineer.tickets.show', $ticket) }}'">
                        <td class="px-4 py-3 font-medium">#{{ $ticket->id }}</td>
                        <td class="px-4 py-3">{{ $ticket->user->name }}</td>
                        <td class="px-4 py-3 max-w-xs truncate">{{ $ticket->description }}</td>
                        <td class="px-4 py-3"><x-badge-priority :priority="$ticket->priority" /></td>
                        <td class="px-4 py-3"><x-badge-status :status="$ticket->status" /></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.0/chart.umd.min.js"></script>
    <script>
        new Chart(document.getElementById('chart-semana'), {
            type: 'bar',
            data: {
                labels: @json($ultimaSemana->pluck('fecha')),
                datasets: [{ label: 'Tickets', data: @json($ultimaSemana->pluck('total')), backgroundColor: '#2563eb', borderRadius: 6 }]
            },
            options: { plugins: { legend: { display: false } } }
        });

        new Chart(document.getElementById('chart-prioridad'), {
            type: 'doughnut',
            data: {
                labels: ['Alta', 'Moderada', 'Baja'],
                datasets: [{ data: [{{ $porPrioridad['alta'] }}, {{ $porPrioridad['moderada'] }}, {{ $porPrioridad['baja'] }}], backgroundColor: ['#ef4444', '#f59e0b', '#22c55e'] }]
            }
        });
    </script>
    @endpush
</x-layouts.app>
