<x-layouts.app title="Ticket #{{ $ticket->id }}">
    <div class="mx-auto max-w-2xl">
        <a href="{{ route('user.tickets.index') }}" class="mb-4 inline-block text-sm text-brand-600 hover:underline">← Volver a mis tickets</a>

        <div class="card space-y-5">
            <div class="flex items-center justify-between">
                <h1 class="text-xl font-bold text-gray-900">Ticket #{{ $ticket->id }}</h1>
                <x-badge-status :status="$ticket->status" />
            </div>

            <div class="grid grid-cols-2 gap-4 text-sm">
                <div>
                    <p class="text-gray-500">Fecha de creación</p>
                    <p class="font-medium text-gray-900">{{ $ticket->created_at->format('d/m/Y H:i') }}</p>
                </div>
                <div>
                    <p class="text-gray-500">Prioridad</p>
                    <x-badge-priority :priority="$ticket->priority" />
                </div>
                <div>
                    <p class="text-gray-500">Clasificación</p>
                    <p class="font-medium text-gray-900">{{ $ticket->category?->name ?? 'Aún sin clasificar' }}</p>
                </div>
                <div>
                    <p class="text-gray-500">Atendido por</p>
                    <p class="font-medium text-gray-900">{{ $ticket->engineer?->name ?? 'Sin asignar' }}</p>
                </div>
            </div>

            <div>
                <p class="mb-1 text-sm text-gray-500">Descripción</p>
                <p class="rounded-lg bg-gray-50 p-4 text-sm text-gray-700">{{ $ticket->description }}</p>
            </div>

            @if ($ticket->status->isLocked())
                <p class="rounded-lg bg-gray-100 p-3 text-sm text-gray-500">Este ticket está cerrado y ya no puede modificarse.</p>
            @endif
        </div>
    </div>
</x-layouts.app>
