<x-layouts.guest title="Iniciar sesión">
    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf
        <div>
            <label class="block text-sm font-medium text-gray-700">Correo electrónico</label>
            <input type="email" name="email" value="{{ old('email') }}" required autofocus class="input-field mt-1">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Contraseña</label>
            <input type="password" name="password" required class="input-field mt-1">
        </div>
        <label class="flex items-center gap-2 text-sm text-gray-600">
            <input type="checkbox" name="remember" class="rounded border-gray-300 text-brand-600">
            Recordarme
        </label>
        <button type="submit" class="btn-primary w-full">Iniciar sesión</button>
    </form>
    <p class="mt-6 text-center text-sm text-gray-500">
        ¿No tienes cuenta? <a href="{{ route('register') }}" class="font-medium text-brand-600 hover:underline">Regístrate</a>
    </p>
</x-layouts.guest>
