<?php if (isset($component)) { $__componentOriginal5863877a5171c196453bfa0bd807e410 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5863877a5171c196453bfa0bd807e410 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.app','data' => ['title' => 'Categorías']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Categorías']); ?>
    <h1 class="mb-1 text-2xl font-bold text-gray-900">Categorías de clasificación</h1>
    <p class="mb-6 text-sm text-gray-500">Administra las categorías disponibles para clasificar tickets.</p>

    <form method="POST" action="<?php echo e(route('engineer.categories.store')); ?>" class="card mb-6 flex gap-3">
        <?php echo csrf_field(); ?>
        <input type="text" name="name" required placeholder="Nombre de la nueva categoría..." class="input-field">
        <button type="submit" class="btn-primary shrink-0">➕ Agregar categoría</button>
    </form>

    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card flex items-center justify-between">
                <div>
                    <p class="font-medium text-gray-900"><?php echo e($category->name); ?></p>
                    <p class="text-xs text-gray-500"><?php echo e($category->tickets_count); ?> tickets</p>
                </div>
                <form method="POST" action="<?php echo e(route('engineer.categories.toggle', $category)); ?>">
                    <?php echo csrf_field(); ?> <?php echo method_field('PATCH'); ?>
                    <button type="submit" class="badge <?php echo e($category->is_active ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-500'); ?>">
                        <?php echo e($category->is_active ? 'Activa' : 'Inactiva'); ?>

                    </button>
                </form>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php /**PATH C:\Users\PC\Desktop\sistema-tickets\resources\views/engineer/categories/index.blade.php ENDPATH**/ ?>