<x-layouts.app title="Tickets">
    <h1 class="mb-1 text-2xl font-bold text-gray-900">Gestión de tickets</h1>
    <p class="mb-6 text-sm text-gray-500">Todas las solicitudes registradas en el sistema.</p>

    <form method="GET" class="card mb-6 grid grid-cols-2 gap-3 md:grid-cols-5">
        <input type="text" name="q" value="{{ request('q') }}" placeholder="Buscar descripción..." class="input-field">
        <input type="text" name="user" value="{{ request('user') }}" placeholder="Usuario..." class="input-field">
        <select name="status" class="input-field">
            <option value="">Estado</option>
            @foreach (\App\Enums\TicketStatus::cases() as $status)
                <option value="{{ $status->value }}" {{ request('status') === $status->value ? 'selected' : '' }}>{{ $status->label() }}</option>
            @endforeach
        </select>
        <select name="priority" class="input-field">
            <option value="">Prioridad</option>
            @foreach (\App\Enums\TicketPriority::cases() as $priority)
                <option value="{{ $priority->value }}" {{ request('priority') === $priority->value ? 'selected' : '' }}>{{ $priority->label() }}</option>
            @endforeach
        </select>
        <select name="category_id" class="input-field">
            <option value="">Clasificación</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ (int) request('category_id') === $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
            @endforeach
        </select>
        <input type="date" name="date" value="{{ request('date') }}" class="input-field">
        <button type="submit" class="btn-primary">Filtrar</button>
        <a href="{{ route('engineer.tickets.index') }}" class="btn-secondary text-center">Limpiar</a>
    </form>

    <div class="card overflow-x-auto p-0">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 text-left text-xs uppercase text-gray-500">
                <tr>
                    <th class="px-4 py-3">ID</th>
                    <th class="px-4 py-3">Fecha</th>
                    <th class="px-4 py-3">Usuario</th>
                    <th class="px-4 py-3">Departamento</th>
                    <th class="px-4 py-3">Descripción</th>
                    <th class="px-4 py-3">Prioridad</th>
                    <th class="px-4 py-3">Clasificación</th>
                    <th class="px-4 py-3">Estado</th>
                    <th class="px-4 py-3">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($tickets as $ticket)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 font-medium text-gray-900">#{{ $ticket->id }}</td>
                        <td class="px-4 py-3 text-gray-500">{{ $ticket->created_at->format('d/m/Y H:i') }}</td>
                        <td class="px-4 py-3">{{ $ticket->user->name }}</td>
                        <td class="px-4 py-3 text-gray-500">{{ $ticket->department ?? '—' }}</td>
                        <td class="px-4 py-3 max-w-xs truncate">{{ $ticket->description }}</td>
                        <td class="px-4 py-3"><x-badge-priority :priority="$ticket->priority" /></td>
                        <td class="px-4 py-3 text-gray-500">{{ $ticket->category?->name ?? 'Sin clasificar' }}</td>
                        <td class="px-4 py-3"><x-badge-status :status="$ticket->status" /></td>
                        <td class="px-4 py-3">
                            <a href="{{ route('engineer.tickets.show', $ticket) }}" class="text-brand-600 hover:underline">Gestionar</a>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="9" class="px-4 py-10 text-center text-gray-400">No hay tickets que coincidan con los filtros.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">{{ $tickets->links() }}</div>
</x-layouts.app>
