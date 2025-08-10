@props([
    'label' => '',
    'type' => 'text',
    'accept' => '',
    'name' => '',
    'model' => '',
    'required' => false,
    'autocomplete' => null,
    'value' => null
])

<div>
    <label for="{{ $name }}" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">{{ $label }}</label>

    <input
        type="{{ $type }}"
        accept="{{ $accept }}"
        name="{{ $name }}"
        id="{{ $name }}"
        wire:model.defer="{{ $model }}"
        @if($required) required @endif
        @if($autocomplete) autocomplete="{{ $autocomplete }}" @endif
        {{ $attributes->merge([
            'class' => 'w-full px-4 py-2 border rounded-xl shadow-sm focus:outline-none focus:ring focus:ring-cyan-500 focus:border-cyan-500 dark:bg-gray-800 dark:border-gray-600 dark:text-white transition'
        ]) }}
        @if($value !== null) value="{{ $value }}" @endif
    >
    @error($model)
        <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror
</div>
