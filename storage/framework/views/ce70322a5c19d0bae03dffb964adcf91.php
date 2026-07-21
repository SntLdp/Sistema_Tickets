<?php if (isset($component)) { $__componentOriginal5863877a5171c196453bfa0bd807e410 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5863877a5171c196453bfa0bd807e410 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.app','data' => ['title' => 'Reporte diario']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Reporte diario']); ?>
    <div class="mb-6 flex flex-wrap items-center justify-between gap-3 print:hidden">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Reporte diario</h1>
            <p class="text-sm text-gray-500">Solicitudes registradas el <?php echo e(\Carbon\Carbon::parse($date)->format('d/m/Y')); ?>.</p>
        </div>
        <div class="flex flex-wrap gap-2">
            <form method="GET">
                <input type="date" name="date" value="<?php echo e($date); ?>" onchange="this.form.submit()" class="input-field">
            </form>
            <a href="<?php echo e(route('engineer.reports.daily.pdf', ['date' => $date])); ?>" class="btn-secondary">📄 Exportar PDF</a>
            <a href="<?php echo e(route('engineer.reports.daily.excel', ['date' => $date])); ?>" class="btn-secondary">📊 Exportar Excel</a>
            <button onclick="window.print()" class="btn-secondary">🖨️ Imprimir</button>
        </div>
    </div>

    <div class="mb-6 grid grid-cols-2 gap-4 md:grid-cols-6">
        <div class="card"><p class="text-xl font-bold text-gray-900"><?php echo e($total); ?></p><p class="text-xs text-gray-500">Total</p></div>
        <div class="card"><p class="text-xl font-bold text-red-600"><?php echo e($alta); ?></p><p class="text-xs text-gray-500">Alta</p></div>
        <div class="card"><p class="text-xl font-bold text-amber-600"><?php echo e($moderada); ?></p><p class="text-xs text-gray-500">Moderada</p></div>
        <div class="card"><p class="text-xl font-bold text-green-600"><?php echo e($baja); ?></p><p class="text-xs text-gray-500">Baja</p></div>
        <div class="card"><p class="text-xl font-bold text-teal-600"><?php echo e($resueltos); ?></p><p class="text-xs text-gray-500">Resueltas</p></div>
        <div class="card"><p class="text-xl font-bold text-gray-600"><?php echo e($pendientes); ?></p><p class="text-xs text-gray-500">Pendientes</p></div>
    </div>

    <div class="card overflow-x-auto p-0">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 text-left text-xs uppercase text-gray-500">
                <tr>
                    <th class="px-4 py-3">Hora</th>
                    <th class="px-4 py-3">Usuario</th>
                    <th class="px-4 py-3">Departamento</th>
                    <th class="px-4 py-3">Descripción</th>
                    <th class="px-4 py-3">Prioridad</th>
                    <th class="px-4 py-3">Clasificación</th>
                    <th class="px-4 py-3">Estado</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <?php $__empty_1 = true; $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td class="px-4 py-3"><?php echo e($ticket->created_at->format('H:i')); ?></td>
                        <td class="px-4 py-3"><?php echo e($ticket->user->name); ?></td>
                        <td class="px-4 py-3 text-gray-500"><?php echo e($ticket->department ?? '—'); ?></td>
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
                        <td class="px-4 py-3 text-gray-500"><?php echo e($ticket->category?->name ?? 'Sin clasificar'); ?></td>
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
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr><td colspan="7" class="px-4 py-10 text-center text-gray-400">No hay solicitudes registradas en esta fecha.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
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
<?php /**PATH C:\Users\PC\Desktop\sistema-tickets\resources\views/engineer/reports/daily.blade.php ENDPATH**/ ?>