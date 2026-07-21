<x-layouts.app title="Categorías">
    <h1 class="mb-1 text-2xl font-bold text-gray-900">Categorías de clasificación</h1>
    <p class="mb-6 text-sm text-gray-500">Administra las categorías disponibles para clasificar tickets.</p>

    <form method="POST" action="{{ route('engineer.categories.store') }}" class="card mb-6 flex gap-3">
        @csrf
        <input type="text" name="name" required placeholder="Nombre de la nueva categoría..." class="input-field">
        <button type="submit" class="btn-primary shrink-0">➕ Agregar categoría</button>
    </form>

    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
        @foreach ($categories as $category)
            <div class="card flex items-center justify-between">
                <div>
                    <p class="font-medium text-gray-900">{{ $category->name }}</p>
                    <p class="text-xs text-gray-500">{{ $category->tickets_count }} tickets</p>
                </div>
                <form method="POST" action="{{ route('engineer.categories.toggle', $category) }}">
                    @csrf @method('PATCH')
                    <button type="submit" class="badge {{ $category->is_active ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-500' }}">
                        {{ $category->is_active ? 'Activa' : 'Inactiva' }}
                    </button>
                </form>
            </div>
        @endforeach
    </div>
</x-layouts.app>
