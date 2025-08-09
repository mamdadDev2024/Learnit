<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl" class="scroll-smooth antialiased">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? config('app.name', 'Learnit') }}</title>

    <link rel="icon" href="{{ asset('favicon.ico') }}">

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    @livewireStyles
    @stack('styles')

    <script>
        if (
            localStorage.theme === 'dark' ||
            (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)
        ) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
</head>
<body class="bg-gray-50 text-gray-800 font-display dark:bg-gray-900 dark:text-gray-100 min-h-screen flex flex-col transition-colors duration-300">

<x-partials.navbar />

<main class="flex-1 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    {{ $slot }}
</main>

<x-partials.footer />

<button
    x-data
    @click="
            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                localStorage.theme = 'light';
            } else {
                document.documentElement.classList.add('dark');
                localStorage.theme = 'dark';
            }
        "
    class="fixed bottom-6 left-6 z-50 bg-white dark:bg-gray-700 text-gray-800 dark:text-gray-200
               rounded-full shadow-lg p-3 hover:scale-105 hover:shadow-xl transition transform"
    aria-label="تغییر حالت">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
         stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M12 3v1m0 16v1m8.66-13.66l-.71.71M4.05 19.95l-.71-.71M21 12h-1M4 12H3m16.95 7.95l-.71-.71M4.05 4.05l-.71.71M12 5a7 7 0 000 14 7 7 0 000-14z"/>
    </svg>
</button>

<x-toaster-hub />

@livewireScripts
@stack('scripts')
</body>
</html>
