<!DOCTYPE html>
<html lang="es" x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }" x-init="$watch('darkMode', v => localStorage.setItem('darkMode', v))" :class="{ 'dark': darkMode }">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e($title ?? 'Sistema de Tickets'); ?> · Ingeniería de Sistemas</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="bg-gray-50 dark:bg-gray-900 font-sans antialiased" x-data="{ sidebarOpen: true }">

    <div class="flex h-screen overflow-hidden">
        
        <aside
            class="flex flex-col border-r border-gray-200 bg-white transition-all duration-200 dark:border-gray-800 dark:bg-gray-950"
            :class="sidebarOpen ? 'w-64' : 'w-20'"
        >
            <div class="flex h-16 items-center justify-between px-4">
                <span class="text-lg font-bold text-brand-700 dark:text-brand-400" x-show="sidebarOpen">🎫 Tickets IT</span>
                <button x-on:click="sidebarOpen = !sidebarOpen" class="rounded-lg p-2 text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800">
                    ☰
                </button>
            </div>

            <nav class="flex-1 space-y-1 px-3">
                <?php if(auth()->guard()->check()): ?>
                    <?php if(auth()->user()->isEngineer()): ?>
                        <a href="<?php echo e(route('engineer.dashboard')); ?>" class="sidebar-link <?php echo e(request()->routeIs('engineer.dashboard') ? 'active' : ''); ?>">
                            📊 <span x-show="sidebarOpen">Dashboard</span>
                        </a>
                        <a href="<?php echo e(route('engineer.tickets.index')); ?>" class="sidebar-link <?php echo e(request()->routeIs('engineer.tickets.*') ? 'active' : ''); ?>">
                            🎫 <span x-show="sidebarOpen">Tickets</span>
                        </a>
                        <a href="<?php echo e(route('engineer.categories.index')); ?>" class="sidebar-link <?php echo e(request()->routeIs('engineer.categories.*') ? 'active' : ''); ?>">
                            🏷️ <span x-show="sidebarOpen">Categorías</span>
                        </a>
                        <a href="<?php echo e(route('engineer.reports.daily')); ?>" class="sidebar-link <?php echo e(request()->routeIs('engineer.reports.*') ? 'active' : ''); ?>">
                            📄 <span x-show="sidebarOpen">Reporte diario</span>
                        </a>
                    <?php else: ?>
                        <a href="<?php echo e(route('user.tickets.create')); ?>" class="sidebar-link <?php echo e(request()->routeIs('user.tickets.create') ? 'active' : ''); ?>">
                            ➕ <span x-show="sidebarOpen">Nuevo ticket</span>
                        </a>
                        <a href="<?php echo e(route('user.tickets.index')); ?>" class="sidebar-link <?php echo e(request()->routeIs('user.tickets.index') ? 'active' : ''); ?>">
                            📋 <span x-show="sidebarOpen">Mis tickets</span>
                        </a>
                    <?php endif; ?>
                <?php endif; ?>
            </nav>

            <div class="border-t border-gray-100 p-3 dark:border-gray-800">
                <button x-on:click="darkMode = !darkMode" class="sidebar-link w-full">
                    <span x-text="darkMode ? '☀️' : '🌙'"></span>
                    <span x-show="sidebarOpen" x-text="darkMode ? 'Modo claro' : 'Modo oscuro'"></span>
                </button>
            </div>
        </aside>

        
        <div class="flex flex-1 flex-col overflow-hidden">
            
            <header class="flex h-16 items-center justify-between border-b border-gray-200 bg-white px-6 dark:border-gray-800 dark:bg-gray-950">
                <div>
                    <?php echo e($breadcrumbs ?? ''); ?>

                </div>
                <div class="flex items-center gap-4">
                    <?php if(auth()->guard()->check()): ?>
                        <span class="text-sm text-gray-600 dark:text-gray-300">
                            <?php echo e(auth()->user()->name); ?>

                            <span class="ml-1 text-xs text-gray-400">(<?php echo e(auth()->user()->role->label); ?>)</span>
                        </span>
                        <form method="POST" action="<?php echo e(route('logout')); ?>">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="btn-secondary">Cerrar sesión</button>
                        </form>
                    <?php endif; ?>
                </div>
            </header>

            <main class="flex-1 overflow-y-auto p-6">
                <?php if (isset($component)) { $__componentOriginal7cfab914afdd05940201ca0b2cbc009b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7cfab914afdd05940201ca0b2cbc009b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.toast','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('toast'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7cfab914afdd05940201ca0b2cbc009b)): ?>
<?php $attributes = $__attributesOriginal7cfab914afdd05940201ca0b2cbc009b; ?>
<?php unset($__attributesOriginal7cfab914afdd05940201ca0b2cbc009b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7cfab914afdd05940201ca0b2cbc009b)): ?>
<?php $component = $__componentOriginal7cfab914afdd05940201ca0b2cbc009b; ?>
<?php unset($__componentOriginal7cfab914afdd05940201ca0b2cbc009b); ?>
<?php endif; ?>
                <?php echo e($slot); ?>

            </main>
        </div>
    </div>

</body>
</html>
<?php /**PATH C:\Users\PC\Desktop\sistema-tickets\resources\views/components/layouts/app.blade.php ENDPATH**/ ?>