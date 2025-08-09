<div class="relative w-full overflow-hidden rounded-2xl shadow-xl
            bg-gradient-to-br from-cyan-50 via-white to-blue-50
            dark:from-gray-900 dark:via-gray-800 dark:to-gray-900">

    @if ($courses->isNotEmpty())
        {{-- دکمه‌های ناوبری --}}
        <button class="absolute top-1/2 left-4 z-10 transform -translate-y-1/2
                       bg-white dark:bg-gray-700 shadow-md p-2 rounded-full
                       hover:bg-cyan-100 dark:hover:bg-gray-600 transition hidden md:block"
                onclick="prevSlide()">
            <i class="fas fa-chevron-left text-gray-800 dark:text-gray-200"></i>
        </button>
        <button class="absolute top-1/2 right-4 z-10 transform -translate-y-1/2
                       bg-white dark:bg-gray-700 shadow-md p-2 rounded-full
                       hover:bg-cyan-100 dark:hover:bg-gray-600 transition hidden md:block"
                onclick="nextSlide()">
            <i class="fas fa-chevron-right text-gray-800 dark:text-gray-200"></i>
        </button>

        {{-- اسلایدها --}}
        <div id="courseSlider"
             class="flex transition-transform duration-700 ease-in-out"
             style="width: {{ $courses->count() * 100 }}%;">
            @foreach($courses as $course)
                <div class="min-w-full flex flex-col md:flex-row items-center justify-between
                            p-6 md:p-12 bg-white dark:bg-gray-800 rounded-2xl">

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
                            text='مشاهده بیشتر...'
                            href='{{ route('course.show',$course->slug) }}'
                            class="inline-block mt-4 px-6 py-2 bg-blue-600 hover:bg-blue-700
                                   text-white rounded-lg shadow hover:shadow-lg transition"
                        />
                    </div>

                    {{-- تصویر --}}
                    <div class="w-full md:w-1/2 mt-6 md:mt-0">
                        <img src="{{ $course->image }}"
                             alt="{{ $course->title }}"
                             class="rounded-xl shadow-lg transform hover:scale-105 transition duration-300"
                             loading="lazy">
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="p-12 text-center text-gray-500 dark:text-gray-400">
            هنوز دوره‌ای اضافه نشده است.
        </div>
    @endif
</div>

{{-- اسکریپت --}}
<script>
    let currentSlide = 0;
    const slider = document.getElementById('courseSlider');
    const totalSlides = {{ $courses->count() }};

    function showSlide(index) {
        currentSlide = (index + totalSlides) % totalSlides;
        slider.style.transform = `translateX(-${currentSlide * 100}%)`;
    }
    function nextSlide() { showSlide(currentSlide + 1); }
    function prevSlide() { showSlide(currentSlide - 1); }
</script>
