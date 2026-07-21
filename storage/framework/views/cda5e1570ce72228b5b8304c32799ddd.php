<?php if (isset($component)) { $__componentOriginal5863877a5171c196453bfa0bd807e410 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5863877a5171c196453bfa0bd807e410 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.app','data' => ['title' => 'Tickets']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Tickets']); ?>
    <h1 class="mb-1 text-2xl font-bold text-gray-900">Gestión de tickets</h1>
    <p class="mb-6 text-sm text-gray-500">Todas las solicitudes registradas en el sistema.</p>

    <form method="GET" class="card mb-6 grid grid-cols-2 gap-3 md:grid-cols-5">
        <input type="text" name="q" value="<?php echo e(request('q')); ?>" placeholder="Buscar descripción..." class="input-field">
        <input type="text" name="user" value="<?php echo e(request('user')); ?>" placeholder="Usuario..." class="input-field">
        <select name="status" class="input-field">
            <option value="">Estado</option>
            <?php $__currentLoopData = \App\Enums\TicketStatus::cases(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($status->value); ?>" <?php echo e(request('status') === $status->value ? 'selected' : ''); ?>><?php echo e($status->label()); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <select name="priority" class="input-field">
            <option value="">Prioridad</option>
            <?php $__currentLoopData = \App\Enums\TicketPriority::cases(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $priority): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($priority->value); ?>" <?php echo e(request('priority') === $priority->value ? 'selected' : ''); ?>><?php echo e($priority->label()); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <select name="category_id" class="input-field">
            <option value="">Clasificación</option>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($category->id); ?>" <?php echo e((int) request('category_id') === $category->id ? 'selected' : ''); ?>><?php echo e($category->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <input type="date" name="date" value="<?php echo e(request('date')); ?>" class="input-field">
        <button type="submit" class="btn-primary">Filtrar</button>
        <a href="<?php echo e(route('engineer.tickets.index')); ?>" class="btn-secondary text-center">Limpiar</a>
    </form>

    <div class="card overflow-x-auto p-0">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 text-left text-xs uppercase text-gray-500">
                <tr>
                    <th class="px-4 py-3">ID</th>
                    <th class="px-4 py-3">Fecha</th>
                    <th class="px-4 py-3">Usuario</th>
                    <th class="px-4 py-3">Departamento</th>
                    <th class="px-4 py-3">Descripción</th>
                    <th class="px-4 py-3">Prioridad</th>
                    <th class="px-4 py-3">Clasificación</th>
                    <th class="px-4 py-3">Estado</th>
                    <th class="px-4 py-3">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <?php $__empty_1 = true; $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 font-medium text-gray-900">#<?php echo e($ticket->id); ?></td>
                        <td class="px-4 py-3 text-gray-500"><?php echo e($ticket->created_at->format('d/m/Y H:i')); ?></td>
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
                        <td class="px-4 py-3">
                            <a href="<?php echo e(route('engineer.tickets.show', $ticket)); ?>" class="text-brand-600 hover:underline">Gestionar</a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr><td colspan="9" class="px-4 py-10 text-center text-gray-400">No hay tickets que coincidan con los filtros.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="mt-4"><?php echo e($tickets->links()); ?></div>
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
<?php /**PATH C:\Users\PC\Desktop\sistema-tickets\resources\views/engineer/tickets/index.blade.php ENDPATH**/ ?>