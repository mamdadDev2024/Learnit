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
    @if($target === '_blank') rel="noopener noreferrer" @endif
    {{ $attributes->merge([
        'class' => "transition-all duration-300
                    " . ($active ? "underline font-semibold {$color}" : "hover:text-cyan-600 hover:underline text-gray-700 dark:text-gray-300")
    ]) }}
>
    @if ($icon)
        <x-dynamic-component :component="$icon" class="w-4 h-4 inline-block mr-1 align-text-bottom" />
    @endif
    <span>{{ $text }}</span>
</a>
