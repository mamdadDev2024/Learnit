<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title ?? config('app.name', 'Learnit') }}</title>

        <link rel="icon" href="{{ asset('favicon.ico') }}">

        {{-- Vite Assets --}}
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif

        {{-- Livewire Styles --}}
        @livewireStyles
        @stack('styles')
    </head>
    <body class="bg-gray-50 text-gray-800 dark:bg-gray-900 dark:text-gray-100 min-h-screen flex flex-col font-sans antialiased transition-colors duration-300">

    <x-partials.navbar />

    <div class="fixed top-20 inset-x-0 flex justify-center z-50">
        @foreach (['success' => 'green', 'error' => 'red'] as $type => $color)
            @if (session($type))
                <div
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition:enter="transition ease-out duration-500"
                    x-transition:enter-start="opacity-0 -translate-y-2"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-start="opacity-100 translate-y-0"
                    x-transition:leave-end="opacity-0 -translate-y-2"
                    x-init="setTimeout(() => show = false, 4000)"
                    class="bg-{{ $color }}-100 border border-{{ $color }}-300 text-{{ $color }}-700 px-6 py-3 rounded-xl shadow-md text-center w-full max-w-md mx-auto">
                    {{ session($type) }}
                </div>
            @endif
        @endforeach
    </div>

    <main class="flex-1 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        {{ $slot }}
    </main>

    <x-partials.footer />

    <x-toaster-hub />
    @livewireScripts
    @stack('scripts')
    </body>
</html>
