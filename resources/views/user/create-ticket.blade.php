<x-layouts.app title="Nuevo ticket">
    <div class="mx-auto max-w-2xl">
        <h1 class="mb-1 text-2xl font-bold text-gray-900">Registrar nueva solicitud</h1>
        <p class="mb-6 text-sm text-gray-500">Describe tu problema y un ingeniero lo atenderá lo antes posible.</p>

        <form method="POST" action="{{ route('user.tickets.store') }}" class="card space-y-5">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700">Nombre del solicitante</label>
                <input type="text" value="{{ auth()->user()->name }}" disabled class="input-field mt-1 bg-gray-50 text-gray-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Departamento (opcional)</label>
                <input type="text" name="department" value="{{ old('department', auth()->user()->department) }}" class="input-field mt-1">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Descripción del problema</label>
                <textarea name="description" rows="6" required class="input-field mt-1" placeholder="Explica con detalle qué está sucediendo...">{{ old('description') }}</textarea>
                @error('description') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Prioridad</label>
                <div class="grid grid-cols-3 gap-3">
                    @foreach (\App\Enums\TicketPriority::cases() as $priority)
                        <label class="flex cursor-pointer items-center justify-center gap-2 rounded-lg border border-gray-200 py-3 text-sm font-medium has-[:checked]:border-brand-500 has-[:checked]:bg-brand-50">
                            <input type="radio" name="priority" value="{{ $priority->value }}" class="hidden" {{ old('priority') === $priority->value ? 'checked' : '' }}>
                            <span class="h-2 w-2 rounded-full {{ $priority->dotColor() }}"></span>
                            {{ $priority->label() }}
                        </label>
                    @endforeach
                </div>
                @error('priority') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <button type="submit" class="btn-primary w-full">Enviar ticket</button>
        </form>
    </div>
</x-layouts.app>
