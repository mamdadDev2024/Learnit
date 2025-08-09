@props([
    'label' => '',
    'type' => 'text',
    'name' => '',
    'model' => '',
    'required' => false,
    'autocomplete' => null,
    'value' => null
])

    <input
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $name }}"
        wire:model="{{ $model }}"
        @if($required) required @endif
        @if($autocomplete) autocomplete="{{ $autocomplete }}" @endif
        {{ $attributes->merge([
            'class' => 'w-full px-4 py-2 border rounded-xl shadow-sm focus:outline-none focus:ring focus:border-blue-400 dark:bg-gray-800 dark:border-gray-600 dark:text-white'
        ]) }}
        value="{{ $value  }}"
    >
