<?php if (isset($component)) { $__componentOriginal5863877a5171c196453bfa0bd807e410 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5863877a5171c196453bfa0bd807e410 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.app','data' => ['title' => 'Dashboard']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Dashboard']); ?>
    <h1 class="mb-1 text-2xl font-bold text-gray-900">Dashboard</h1>
    <p class="mb-6 text-sm text-gray-500">Resumen general del sistema de tickets.</p>

    
    <div class="mb-6 grid grid-cols-2 gap-4 md:grid-cols-3 lg:grid-cols-5">
        <div class="card"><p class="text-2xl font-bold text-gray-900"><?php echo e($stats['pendientes']); ?></p><p class="text-sm text-gray-500">Pendientes</p></div>
        <div class="card"><p class="text-2xl font-bold text-blue-600"><?php echo e($stats['en_proceso']); ?></p><p class="text-sm text-gray-500">En proceso</p></div>
        <div class="card"><p class="text-2xl font-bold text-teal-600"><?php echo e($stats['finalizados']); ?></p><p class="text-sm text-gray-500">Finalizados</p></div>
        <div class="card"><p class="text-2xl font-bold text-brand-600"><?php echo e($stats['creados_hoy']); ?></p><p class="text-sm text-gray-500">Creados hoy</p></div>
        <div class="card"><p class="text-2xl font-bold text-red-600"><?php echo e($stats['prioridad_alta']); ?></p><p class="text-sm text-gray-500">Prioridad alta</p></div>
    </div>

    <div class="mb-6 grid grid-cols-1 gap-6 lg:grid-cols-3">
        <div class="card lg:col-span-2">
            <h2 class="mb-4 text-sm font-semibold text-gray-700">Tickets creados (últimos 7 días)</h2>
            <canvas id="chart-semana" height="120"></canvas>
        </div>
        <div class="card">
            <h2 class="mb-4 text-sm font-semibold text-gray-700">Distribución por prioridad</h2>
            <canvas id="chart-prioridad" height="200"></canvas>
        </div>
    </div>

    <div class="card overflow-x-auto p-0">
        <h2 class="px-4 pt-4 text-sm font-semibold text-gray-700">Actividad reciente</h2>
        <table class="mt-2 w-full text-sm">
            <thead class="bg-gray-50 text-left text-xs uppercase text-gray-500">
                <tr>
                    <th class="px-4 py-3">ID</th>
                    <th class="px-4 py-3">Usuario</th>
                    <th class="px-4 py-3">Descripción</th>
                    <th class="px-4 py-3">Prioridad</th>
                    <th class="px-4 py-3">Estado</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <?php $__currentLoopData = $actividadReciente; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="hover:bg-gray-50 cursor-pointer" onclick="window.location='<?php echo e(route('engineer.tickets.show', $ticket)); ?>'">
                        <td class="px-4 py-3 font-medium">#<?php echo e($ticket->id); ?></td>
                        <td class="px-4 py-3"><?php echo e($ticket->user->name); ?></td>
                        <td class="px-4 py-3 max-w-xs truncate"><?php echo e($ticket->description); ?></td>
                        <td class="px-4 py-3"><?php if (isset($component)) { $__componentOriginal28f90e342589094c2a2fc9ba307e3b72 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal28f90e342589094c2a2fc9ba307e3b72 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.badge-priority','data' => ['priority' => $ticket->priority]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('badge-priority'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['priority' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($ticket->priority)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal28f90e342589094c2a2fc9ba307e3b72)): ?>
<?php $attributes = $__attributesOriginal28f90e342589094c2a2fc9ba307e3b72; ?>
<?php unset($__attributesOriginal28f90e342589094c2a2fc9ba307e3b72); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal28f90e342589094c2a2fc9ba307e3b72)): ?>
<?php $component = $__componentOriginal28f90e342589094c2a2fc9ba307e3b72; ?>
<?php unset($__componentOriginal28f90e342589094c2a2fc9ba307e3b72); ?>
<?php endif; ?></td>
                        <td class="px-4 py-3"><?php if (isset($component)) { $__componentOriginal435aefee4aa6dd7f20df034696ae03b9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal435aefee4aa6dd7f20df034696ae03b9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.badge-status','data' => ['status' => $ticket->status]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('badge-status'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['status' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($ticket->status)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal435aefee4aa6dd7f20df034696ae03b9)): ?>
<?php $attributes = $__attributesOriginal435aefee4aa6dd7f20df034696ae03b9; ?>
<?php unset($__attributesOriginal435aefee4aa6dd7f20df034696ae03b9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal435aefee4aa6dd7f20df034696ae03b9)): ?>
<?php $component = $__componentOriginal435aefee4aa6dd7f20df034696ae03b9; ?>
<?php unset($__componentOriginal435aefee4aa6dd7f20df034696ae03b9); ?>
<?php endif; ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>

    <?php $__env->startPush('scripts'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.0/chart.umd.min.js"></script>
    <script>
        new Chart(document.getElementById('chart-semana'), {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($ultimaSemana->pluck('fecha'), 15, 512) ?>,
                datasets: [{ label: 'Tickets', data: <?php echo json_encode($ultimaSemana->pluck('total'), 15, 512) ?>, backgroundColor: '#2563eb', borderRadius: 6 }]
            },
            options: { plugins: { legend: { display: false } } }
        });

        new Chart(document.getElementById('chart-prioridad'), {
            type: 'doughnut',
            data: {
                labels: ['Alta', 'Moderada', 'Baja'],
                datasets: [{ data: [<?php echo e($porPrioridad['alta']); ?>, <?php echo e($porPrioridad['moderada']); ?>, <?php echo e($porPrioridad['baja']); ?>], backgroundColor: ['#ef4444', '#f59e0b', '#22c55e'] }]
            }
        });
    </script>
    <?php $__env->stopPush(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5863877a5171c196453bfa0bd807e410)): ?>
<?php $attributes = $__attributesOriginal5863877a5171c196453bfa0bd807e410; ?>
<?php unset($__attributesOriginal5863877a5171c196453bfa0bd807e410); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5863877a5171c196453bfa0bd807e410)): ?>
<?php $component = $__componentOriginal5863877a5171c196453bfa0bd807e410; ?>
<?php unset($__componentOriginal5863877a5171c196453bfa0bd807e410); ?>
<?php endif; ?>
<?php /**PATH C:\Users\PC\Desktop\sistema-tickets\resources\views/engineer/dashboard.blade.php ENDPATH**/ ?>