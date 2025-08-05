@props([
    'type' => 'submit',
    'color' => 'primary', // primary, secondary, danger
    'full' => false,
])

@php
    $colors = [
        'primary' => 'bg-blue-600 hover:bg-blue-700 text-white',
        'secondary' => 'bg-gray-500 hover:bg-gray-600 text-white',
        'danger' => 'bg-red-600 hover:bg-red-700 text-white',
    ];
@endphp

<button
    type="{{ $type }}"
    {{ $attributes->merge([
        'class' => "px-4 py-2 rounded-xl shadow-sm text-sm font-semibold focus:outline-none focus:ring " .
                    ($full ? 'w-full ' : '') .
                    ($colors[$color] ?? $colors['primary'])
    ]) }}
>
    {{ $slot }}
</button>
