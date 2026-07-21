@props(['priority'])

<span {{ $attributes->merge(['class' => 'badge ' . $priority->badgeClass()]) }}>
    <span class="h-1.5 w-1.5 rounded-full {{ $priority->dotColor() }}"></span>
    {{ $priority->label() }}
</span>
