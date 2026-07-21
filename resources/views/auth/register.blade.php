<x-layouts.guest title="Crear cuenta">
    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf
        <div>
            <label class="block text-sm font-medium text-gray-700">Nombre completo</label>
            <input type="text" name="name" value="{{ old('name') }}" required autofocus class="input-field mt-1">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Correo electrónico</label>
            <input type="email" name="email" value="{{ old('email') }}" required class="input-field mt-1">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Departamento (opcional)</label>
            <input type="text" name="department" value="{{ old('department') }}" class="input-field mt-1">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Contraseña</label>
            <input type="password" name="password" required class="input-field mt-1">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Confirmar contraseña</label>
            <input type="password" name="password_confirmation" required class="input-field mt-1">
        </div>
        <button type="submit" class="btn-primary w-full">Crear cuenta</button>
    </form>
    <p class="mt-6 text-center text-sm text-gray-500">
        ¿Ya tienes cuenta? <a href="{{ route('login') }}" class="font-medium text-brand-600 hover:underline">Inicia sesión</a>
    </p>
</x-layouts.guest>
