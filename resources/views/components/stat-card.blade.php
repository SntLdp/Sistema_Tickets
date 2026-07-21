@props(['label', 'value', 'icon' => 'chart-bar', 'color' => 'brand'])

<div class="card flex items-center gap-4">
    <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-{{ $color }}-50 text-{{ $color }}-600">
        <x-dynamic-component :component="'icons.' . $icon" class="h-6 w-6" />
    </div>
    <div>
        <p class="text-2xl font-semibold text-gray-900">{{ $value }}</p>
        <p class="text-sm text-gray-500">{{ $label }}</p>
    </div>
</div>
