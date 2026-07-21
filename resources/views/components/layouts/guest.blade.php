<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Acceso' }} · Sistema de Tickets</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex min-h-screen items-center justify-center bg-gradient-to-br from-brand-50 via-white to-gray-50 font-sans antialiased">
    <div class="w-full max-w-md">
        <div class="mb-8 text-center">
            <span class="text-3xl">🎫</span>
            <h1 class="mt-2 text-xl font-bold text-gray-900">Sistema de Tickets</h1>
            <p class="text-sm text-gray-500">Departamento de Ingeniería de Sistemas</p>
        </div>
        <div class="card animate-fade-in">
            <x-toast />
            {{ $slot }}
        </div>
    </div>
</body>
</html>
