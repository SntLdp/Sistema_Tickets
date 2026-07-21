@props(['id', 'title' => ''])

<div
    x-data="{ open: false }"
    x-show="open"
    x-on:open-modal.window="$event.detail === '{{ $id }}' && (open = true)"
    x-on:close-modal.window="open = false"
    x-on:keydown.escape.window="open = false"
    x-cloak
    class="fixed inset-0 z-50 flex items-center justify-center p-4"
>
    <div x-show="open" x-transition.opacity class="fixed inset-0 bg-gray-900/50" x-on:click="open = false"></div>

    <div
        x-show="open"
        x-transition:enter="animate-fade-in"
        class="relative w-full max-w-lg rounded-xl bg-white p-6 shadow-xl"
    >
        <div class="mb-4 flex items-center justify-between">
            <h3 class="text-lg font-semibold text-gray-900">{{ $title }}</h3>
            <button type="button" x-on:click="open = false" class="text-gray-400 hover:text-gray-600">✕</button>
        </div>
        {{ $slot }}
    </div>
</div>
