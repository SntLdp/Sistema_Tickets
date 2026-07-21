<x-layouts.app title="Ticket #{{ $ticket->id }}">
    <a href="{{ route('engineer.tickets.index') }}" class="mb-4 inline-block text-sm text-brand-600 hover:underline">← Volver al listado</a>

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
        {{-- Columna principal --}}
        <div class="space-y-6 lg:col-span-2">
            <div class="card">
                <div class="mb-4 flex items-center justify-between">
                    <h1 class="text-xl font-bold text-gray-900">Ticket #{{ $ticket->id }}</h1>
                    <x-badge-status :status="$ticket->status" />
                </div>

                <div class="grid grid-cols-2 gap-4 text-sm mb-4">
                    <div><p class="text-gray-500">Solicitante</p><p class="font-medium text-gray-900">{{ $ticket->user->name }}</p></div>
                    <div><p class="text-gray-500">Departamento</p><p class="font-medium text-gray-900">{{ $ticket->department ?? '—' }}</p></div>
                    <div><p class="text-gray-500">Fecha</p><p class="font-medium text-gray-900">{{ $ticket->created_at->format('d/m/Y') }}</p></div>
                    <div><p class="text-gray-500">Hora</p><p class="font-medium text-gray-900">{{ $ticket->created_at->format('H:i') }}</p></div>
                    <div><p class="text-gray-500">Prioridad</p><x-badge-priority :priority="$ticket->priority" /></div>
                    <div><p class="text-gray-500">Ingeniero asignado</p><p class="font-medium text-gray-900">{{ $ticket->engineer?->name ?? 'Sin asignar' }}</p></div>
                </div>

                <p class="mb-1 text-sm text-gray-500">Descripción</p>
                <p class="rounded-lg bg-gray-50 p-4 text-sm text-gray-700">{{ $ticket->description }}</p>
            </div>

            {{-- Comentarios / notas internas --}}
            <div class="card">
                <h2 class="mb-4 text-sm font-semibold text-gray-700">Notas internas y comentarios</h2>
                <div class="mb-4 space-y-3 max-h-72 overflow-y-auto">
                    @forelse ($ticket->comments as $comment)
                        <div class="rounded-lg border border-gray-100 p-3 text-sm">
                            <div class="mb-1 flex items-center justify-between">
                                <span class="font-medium text-gray-900">{{ $comment->user->name }}</span>
                                <span class="text-xs text-gray-400">{{ $comment->created_at->format('d/m/Y H:i') }}</span>
                            </div>
                            <p class="text-gray-600">{{ $comment->body }}</p>
                            @if ($comment->is_internal)
                                <span class="mt-1 inline-block text-xs text-amber-600">🔒 Nota interna</span>
                            @endif
                        </div>
                    @empty
                        <p class="text-sm text-gray-400">Sin comentarios todavía.</p>
                    @endforelse
                </div>

                <form method="POST" action="{{ route('engineer.tickets.comments.store', $ticket) }}" class="space-y-2">
                    @csrf
                    <textarea name="body" rows="3" required class="input-field" placeholder="Escribe una nota interna..."></textarea>
                    <div class="flex items-center justify-between">
                        <label class="flex items-center gap-2 text-sm text-gray-600">
                            <input type="checkbox" name="is_internal" value="1" checked class="rounded border-gray-300 text-brand-600">
                            Nota interna (no visible para el usuario)
                        </label>
                        <button type="submit" class="btn-primary">Agregar</button>
                    </div>
                </form>
            </div>
        </div>

        {{-- Columna lateral: acciones --}}
        <div class="space-y-6">
            <div class="card">
                <h2 class="mb-3 text-sm font-semibold text-gray-700">Cambiar estado</h2>
                <form method="POST" action="{{ route('engineer.tickets.status', $ticket) }}" class="space-y-3">
                    @csrf @method('PATCH')
                    <select name="status" class="input-field">
                        @foreach ($ticket->status->allowedTransitions() as $transition)
                            <option value="{{ $transition->value }}">{{ $transition->label() }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn-primary w-full" @if(empty($ticket->status->allowedTransitions())) disabled @endif>
                        Actualizar estado
                    </button>
                </form>
            </div>

            <div class="card">
                <h2 class="mb-3 text-sm font-semibold text-gray-700">Clasificación</h2>
                <form method="POST" action="{{ route('engineer.tickets.classify', $ticket) }}" class="space-y-3">
                    @csrf @method('PATCH')
                    <select name="category_id" class="input-field">
                        <option value="">Sin clasificar</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $ticket->category_id === $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn-secondary w-full">Guardar clasificación</button>
                </form>
            </div>

            <div class="card">
                <h2 class="mb-3 text-sm font-semibold text-gray-700">Historial de estado</h2>
                <ul class="space-y-2 text-sm">
                    @forelse ($ticket->statusHistory as $entry)
                        <li class="border-l-2 border-brand-200 pl-3">
                            <p class="text-gray-700">
                                {{ $entry->from_status ? \App\Enums\TicketStatus::from($entry->from_status)->label() : 'Creado' }}
                                → <span class="font-medium">{{ \App\Enums\TicketStatus::from($entry->to_status)->label() }}</span>
                            </p>
                            <p class="text-xs text-gray-400">{{ $entry->changedBy->name }} · {{ $entry->created_at->format('d/m/Y H:i') }}</p>
                        </li>
                    @empty
                        <li class="text-gray-400">Sin cambios registrados aún.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</x-layouts.app>
