@props([
    'href' => '#',
    'target' => '_self',
    'icon' => null,
    'text' => '',
    'active' => false,
    'color' => 'text-blue-600 hover:underline',
])

<a
    href="{{ $href }}"
    target="{{ $target }}"
    {{ $attributes->merge(['class' => 'transition-all duration-300 hover:text-cyan-600 hover:underline']) }}
>
    @if ($icon)
        <x-dynamic-component :component="$icon" class="w-4 h-4" />
    @endif
    <span>{{ $text }}</span>
</a>
