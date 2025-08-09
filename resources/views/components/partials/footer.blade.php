<footer class="bg-white/40 dark:bg-gray-900/70 backdrop-blur-sm shadow-md rounded-xl mx-4 my-8 p-6 text-gray-800 dark:text-gray-200 transition-colors duration-300">
    <div class="max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
        @foreach(['دسته اول', 'دسته دوم', 'دسته سوم', 'دسته چهارم'] as $section)
            <div class="flex flex-col gap-3">
                <h3 class="text-base font-bold text-cyan-700 dark:text-cyan-400 mb-2">
                    {{ $section }}
                </h3>

                <x-ui.link
                    text="صفحه اصلی"
                    href="{{ route('home') }}"
                    class="text-sm text-gray-700 dark:text-gray-300 hover:text-cyan-600 dark:hover:text-cyan-400 transition focus:outline-none focus:ring-2 focus:ring-cyan-400 rounded"
                />
                <x-ui.link
                    text="درباره ما"
                    href="{{ route('home') }}"
                    class="text-sm text-gray-700 dark:text-gray-300 hover:text-cyan-600 dark:hover:text-cyan-400 transition focus:outline-none focus:ring-2 focus:ring-cyan-400 rounded"
                />
                <x-ui.link
                    text="تماس با ما"
                    href="{{ route('home') }}"
                    class="text-sm text-gray-700 dark:text-gray-300 hover:text-cyan-600 dark:hover:text-cyan-400 transition focus:outline-none focus:ring-2 focus:ring-cyan-400 rounded"
                />
            </div>
        @endforeach
    </div>

    <div class="mt-10 text-center text-xs text-gray-500 dark:text-gray-400 tracking-wide select-none">
        © {{ date('Y') }} پروژه شما. همه حقوق محفوظ است.
    </div>
</footer>
