<footer class="bg-cyan-100 shadow-inner rounded-2xl m-5 p-6 text-gray-800">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
        @foreach(['دسته اول', 'دسته دوم', 'دسته سوم', 'دسته چهارم'] as $section)
            <div class="flex flex-col gap-3">
                <h3 class="text-lg font-semibold text-cyan-700">{{ $section }}</h3>
                <x-ui.link
                    text="صفحه اصلی"
                    href="{{ route('home') }}"
                />
                <x-ui.link
                    text="درباره ما"
                    href="{{ route('home') }}"
                />
                <x-ui.link
                    text="تماس با ما"
                    href="{{ route('home') }}"
                />
            </div>
        @endforeach
    </div>
    <div class="text-center text-sm text-gray-500 mt-8">
        © {{ date('Y') }} پروژه شما. همه حقوق محفوظ است.
    </div>
</footer>
