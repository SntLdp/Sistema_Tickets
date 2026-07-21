<?php if(session('success') || session('error') || $errors->any()): ?>
    <div
        x-data="{ show: true }"
        x-show="show"
        x-init="setTimeout(() => show = false, 4000)"
        x-transition
        class="fixed top-4 right-4 z-50 w-full max-w-sm"
    >
        <?php if(session('success')): ?>
            <div class="flex items-start gap-3 rounded-lg border border-green-200 bg-green-50 p-4 shadow-lg">
                <span class="text-green-500">✓</span>
                <p class="text-sm font-medium text-green-800"><?php echo e(session('success')); ?></p>
            </div>
        <?php elseif(session('error') || $errors->any()): ?>
            <div class="flex items-start gap-3 rounded-lg border border-red-200 bg-red-50 p-4 shadow-lg">
                <span class="text-red-500">✕</span>
                <p class="text-sm font-medium text-red-800">
                    <?php echo e(session('error') ?? $errors->first()); ?>

                </p>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>
<?php /**PATH C:\Users\PC\Desktop\sistema-tickets\resources\views/components/toast.blade.php ENDPATH**/ ?>