<x-layouts.app title="Mis tickets">
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Mis tickets</h1>
            <p class="text-sm text-gray-500">Consulta el estado de tus solicitudes.</p>
        </div>
        <a href="{{ route('user.tickets.create') }}" class="btn-primary">➕ Nuevo ticket</a>
    </div>

    <form method="GET" class="mb-4 flex gap-3">
        <select name="status" class="input-field max-w-xs" onchange="this.form.submit()">
            <option value="">Todos los estados</option>
            @foreach (\App\Enums\TicketStatus::cases() as $status)
                <option value="{{ $status->value }}" {{ request('status') === $status->value ? 'selected' : '' }}>
                    {{ $status->label() }}
                </option>
            @endforeach
        </select>
    </form>

    <div class="card overflow-x-auto p-0">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 text-left text-xs uppercase text-gray-500">
                <tr>
                    <th class="px-4 py-3">ID</th>
                    <th class="px-4 py-3">Fecha</th>
                    <th class="px-4 py-3">Descripción</th>
                    <th class="px-4 py-3">Prioridad</th>
                    <th class="px-4 py-3">Clasificación</th>
                    <th class="px-4 py-3">Estado</th>
                    <th class="px-4 py-3"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($tickets as $ticket)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 font-medium text-gray-900">#{{ $ticket->id }}</td>
                        <td class="px-4 py-3 text-gray-500">{{ $ticket->created_at->format('d/m/Y H:i') }}</td>
                        <td class="px-4 py-3 max-w-xs truncate">{{ $ticket->description }}</td>
                        <td class="px-4 py-3"><x-badge-priority :priority="$ticket->priority" /></td>
                        <td class="px-4 py-3 text-gray-500">{{ $ticket->category?->name ?? 'Sin clasificar' }}</td>
                        <td class="px-4 py-3"><x-badge-status :status="$ticket->status" /></td>
                        <td class="px-4 py-3">
                            <a href="{{ route('user.tickets.show', $ticket) }}" class="text-brand-600 hover:underline">Ver</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-4 py-10 text-center text-gray-400">Aún no has creado ningún ticket.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">{{ $tickets->links() }}</div>
</x-layouts.app>
