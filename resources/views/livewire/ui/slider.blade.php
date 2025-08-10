<div class="relative w-full rounded-2xl shadow-xl
            bg-gradient-to-br from-cyan-50 via-white to-blue-50
            dark:from-gray-900 dark:via-gray-800 dark:to-gray-900"
     role="region" aria-label="اسلایدر دوره‌ها">

    @if ($courses->isNotEmpty())
        <!-- Swiper container -->
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @foreach($courses as $course)
                    <div class="swiper-slide p-6 md:p-12 bg-white dark:bg-gray-800 rounded-2xl flex flex-col md:flex-row items-center justify-between select-none">
                        {{-- متن --}}
                        <div class="max-w-md text-center md:text-right">
                            <h2 class="text-2xl md:text-4xl font-extrabold
                                       text-gray-900 dark:text-gray-100 mb-4">
                                {{ $course->name }}
                            </h2>
                            <p class="text-gray-600 dark:text-gray-300 mb-6 leading-relaxed">
                                {{ Str::limit($course->description, 150) }}
                            </p>
                            <x-ui.link
                                text="مشاهده بیشتر..."
                                :href="route('course.show', $course->slug)"
                                class="inline-block mt-4 px-6 py-2 bg-blue-600 hover:bg-blue-700
                                       text-white rounded-lg shadow hover:shadow-lg transition focus:outline-none focus:ring-2 focus:ring-blue-500"
                            />
                        </div>

                        {{-- تصویر --}}
                        <div class="w-full md:w-1/2 mt-6 md:mt-0">
                            <img src="{{ $course->image }}"
                                 alt="{{ $course->name }}"
                                 class="rounded-xl shadow-lg transform hover:scale-105 transition duration-300"
                                 loading="lazy" />
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- دکمه‌های ناوبری -->
            @if($courses->count() > 1)
                <button class="swiper-button-prev text-gray-800 dark:text-gray-200" aria-label="اسلاید قبلی"></button>
                <button class="swiper-button-next text-gray-800 dark:text-gray-200" aria-label="اسلاید بعدی"></button>
            @endif

            <!-- نقطه‌های pagination (اختیاری) -->
            @if($courses->count() > 1)
                <div class="swiper-pagination mt-4"></div>
            @endif
        </div>

    @else
        <div class="p-12 text-center text-gray-500 dark:text-gray-400 select-none">
            هنوز دوره‌ای اضافه نشده است.
        </div>
    @endif
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        @if($courses->count() > 1)
        const swiper = new Swiper('.swiper-container', {
            loop: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            speed: 700,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            effect: 'slide',
        });
        @endif
    });
</script>
