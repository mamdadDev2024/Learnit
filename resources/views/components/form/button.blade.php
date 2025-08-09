@props([
    'type' => 'submit',
    'color' => 'primary', // primary, secondary, danger, یا سفارشی
    'full' => false,
    'loadingText' => 'در حال پردازش...',
])

@php
    $colors = [
        'primary' => 'bg-blue-600 hover:bg-blue-700 text-white',
        'secondary' => 'bg-gray-500 hover:bg-gray-600 text-white',
        'danger' => 'bg-red-600 hover:bg-red-700 text-white',
    ];

    $selectedColor = $colors[$color] ?? $color; // اگر رشته سفارشی بود، همون رو استفاده کن
@endphp

<button
    wire:loading.attr="disabled"
    type="{{ $type }}"
    {{ $attributes->merge([
        'class' => "px-4 py-2 rounded-xl shadow-sm text-sm font-semibold focus:outline-none focus:ring " .
                    ($full ? 'w-full ' : '') . $selectedColor
    ]) }}
>
    <span wire:loading.remove>
        {{ $slot }}
    </span>

    <span wire:loading.flex class="items-center gap-2">
        <svg class="animate-spin h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10"
                    stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor"
                  d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
        </svg>
        {{ $loadingText }}
    </span>
</button>
