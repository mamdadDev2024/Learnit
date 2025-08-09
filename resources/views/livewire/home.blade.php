<div class="space-y-24">

    {{-- بخش معرفی (Hero Section) --}}
    <section class="relative text-center px-6 py-20 sm:py-24 bg-gradient-to-tr from-cyan-50 via-white to-blue-50
                    dark:from-gray-900 dark:via-gray-800 dark:to-cyan-900 rounded-3xl shadow-inner overflow-hidden">

        {{-- پس‌زمینه تزئینی --}}
        <div class="absolute inset-0 bg-[url('/images/pattern.svg')] opacity-5 dark:opacity-10 pointer-events-none"></div>

        <h1 class="relative text-3xl sm:text-4xl md:text-5xl font-extrabold text-gray-900 dark:text-gray-100 leading-snug mb-6
                   animate-fade-in-up">
            به پلتفرم آموزشی ما خوش آمدید
        </h1>

        <p class="relative text-sm sm:text-base md:text-lg text-gray-700 dark:text-gray-300 max-w-3xl mx-auto animate-fade-in-up delay-100 leading-relaxed">
            اینجا بهترین آموزش‌ها را پیدا می‌کنید. با دوره‌های کاربردی، مهارت خود را بالا ببرید و آینده خود را بسازید.
        </p>

        <x-form.button
            href="{{ route('course.index') }}"
            class="relative mt-10 animate-fade-in-up delay-200 px-8 py-3 text-base rounded-full
                   bg-blue-600 hover:bg-blue-700 text-white dark:bg-cyan-500 dark:hover:bg-cyan-600
                   transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5"
        >
            شروع یادگیری
        </x-form.button>
    </section>

    {{-- بخش دوره‌های پیشنهادی --}}
    <section class="px-4 sm:px-8 max-w-7xl mx-auto">
        <h2 class="text-xl sm:text-2xl md:text-3xl font-extrabold text-gray-900 dark:text-gray-100 text-center mb-10">
            🎯 دوره‌های پیشنهادی
        </h2>
        @livewire('ui.slider')
    </section>

    {{-- بخش دسته‌بندی‌ها --}}
    <section class="bg-gray-50 dark:bg-gray-900 px-4 sm:px-8 py-16 rounded-3xl max-w-7xl mx-auto">
        <h2 class="text-xl sm:text-2xl md:text-3xl font-extrabold text-gray-900 dark:text-gray-100 text-center mb-10">
            📚 دسته‌بندی‌ها
        </h2>
        @livewire('categories')
    </section>

    {{-- بخش مقالات اخیر --}}
    <section class="px-4 sm:px-8 py-16 max-w-7xl mx-auto">
        <h2 class="text-xl sm:text-2xl md:text-3xl font-extrabold text-gray-900 dark:text-gray-100 text-center mb-10">
            📝 مقالات اخیر
        </h2>
        @livewire('article.index')
    </section>

</div>
