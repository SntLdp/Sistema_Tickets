<?php if (isset($component)) { $__componentOriginal1e6834b7596effc838ab3adb1475b477 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1e6834b7596effc838ab3adb1475b477 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.guest','data' => ['title' => 'Iniciar sesión']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.guest'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Iniciar sesión']); ?>
    <form method="POST" action="<?php echo e(route('login')); ?>" class="space-y-4">
        <?php echo csrf_field(); ?>
        <div>
            <label class="block text-sm font-medium text-gray-700">Correo electrónico</label>
            <input type="email" name="email" value="<?php echo e(old('email')); ?>" required autofocus class="input-field mt-1">
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
        ¿No tienes cuenta? <a href="<?php echo e(route('register')); ?>" class="font-medium text-brand-600 hover:underline">Regístrate</a>
    </p>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1e6834b7596effc838ab3adb1475b477)): ?>
<?php $attributes = $__attributesOriginal1e6834b7596effc838ab3adb1475b477; ?>
<?php unset($__attributesOriginal1e6834b7596effc838ab3adb1475b477); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1e6834b7596effc838ab3adb1475b477)): ?>
<?php $component = $__componentOriginal1e6834b7596effc838ab3adb1475b477; ?>
<?php unset($__componentOriginal1e6834b7596effc838ab3adb1475b477); ?>
<?php endif; ?>
<?php /**PATH C:\Users\PC\Desktop\sistema-tickets\resources\views/auth/login.blade.php ENDPATH**/ ?>