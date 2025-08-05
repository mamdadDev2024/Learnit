<div class="space-y-24">

    {{-- Section 1: Intro --}}
    <section class="text-center px-4 py-20 bg-gradient-to-r from-cyan-100 to-white">
        <h1 class="text-4xl md:text-5xl font-bold mb-6 animate-fade-in-up">به پلتفرم آموزشی ما خوش آمدید</h1>
        <p class="text-lg md:text-xl text-gray-600 max-w-2xl mx-auto animate-fade-in-up delay-100">
            اینجا بهترین آموزش‌ها را پیدا می‌کنید. با دوره‌های کاربردی، مهارت خود را بالا ببرید.
        </p>
        <x-ui.button class="mt-8 animate-fade-in-up delay-200" href="{{ route('courses.index') }}">شروع یادگیری</x-ui.button>
    </section>

    {{-- Section 2: Courses --}}
    <section class="px-4">
        <h2 class="text-3xl font-bold mb-8 text-center">دوره‌های پیشنهادی</h2>
        @livewire('Ui.Slider')
    </section>

    {{-- Section 3: Categories --}}
    <section class="bg-gray-50 px-4 py-16">
        <h2 class="text-3xl font-bold mb-8 text-center">دسته‌بندی‌ها</h2>
        @livewire('categories')
    </section>

    {{-- Section 4: Articles --}}
    <section class="px-4 py-16">
        <h2 class="text-3xl font-bold mb-8 text-center">آخرین مقالات</h2>
        @livewire('home.articles-list')
    </section>

</div>
