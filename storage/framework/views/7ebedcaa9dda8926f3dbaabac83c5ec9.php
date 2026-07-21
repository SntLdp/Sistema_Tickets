<?php if (isset($component)) { $__componentOriginal5863877a5171c196453bfa0bd807e410 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5863877a5171c196453bfa0bd807e410 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.app','data' => ['title' => 'Nuevo ticket']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Nuevo ticket']); ?>
    <div class="mx-auto max-w-2xl">
        <h1 class="mb-1 text-2xl font-bold text-gray-900">Registrar nueva solicitud</h1>
        <p class="mb-6 text-sm text-gray-500">Describe tu problema y un ingeniero lo atenderá lo antes posible.</p>

        <form method="POST" action="<?php echo e(route('user.tickets.store')); ?>" class="card space-y-5">
            <?php echo csrf_field(); ?>

            <div>
                <label class="block text-sm font-medium text-gray-700">Nombre del solicitante</label>
                <input type="text" value="<?php echo e(auth()->user()->name); ?>" disabled class="input-field mt-1 bg-gray-50 text-gray-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Departamento (opcional)</label>
                <input type="text" name="department" value="<?php echo e(old('department', auth()->user()->department)); ?>" class="input-field mt-1">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Descripción del problema</label>
                <textarea name="description" rows="6" required class="input-field mt-1" placeholder="Explica con detalle qué está sucediendo..."><?php echo e(old('description')); ?></textarea>
                <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Prioridad</label>
                <div class="grid grid-cols-3 gap-3">
                    <?php $__currentLoopData = \App\Enums\TicketPriority::cases(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $priority): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <label class="flex cursor-pointer items-center justify-center gap-2 rounded-lg border border-gray-200 py-3 text-sm font-medium has-[:checked]:border-brand-500 has-[:checked]:bg-brand-50">
                            <input type="radio" name="priority" value="<?php echo e($priority->value); ?>" class="hidden" <?php echo e(old('priority') === $priority->value ? 'checked' : ''); ?>>
                            <span class="h-2 w-2 rounded-full <?php echo e($priority->dotColor()); ?>"></span>
                            <?php echo e($priority->label()); ?>

                        </label>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php $__errorArgs = ['priority'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <button type="submit" class="btn-primary w-full">Enviar ticket</button>
        </form>
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
<?php /**PATH C:\Users\PC\Desktop\sistema-tickets\resources\views/user/create-ticket.blade.php ENDPATH**/ ?>