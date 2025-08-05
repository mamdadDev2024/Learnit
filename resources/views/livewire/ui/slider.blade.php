<div class="relative w-full overflow-hidden rounded-xl shadow-xl">
    <div class="flex transition-all duration-700 ease-in-out animate-slide" style="width: {{ count($slides) * 100 }}%;">
        @foreach($slides as $slide)
            <div class="min-w-full flex flex-col md:flex-row items-center justify-between bg-white dark:bg-gray-800 p-6 md:p-12">
                <div class="max-w-md text-center md:text-right">
                    <h2 class="text-2xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                        {{ $slide['title'] }}
                    </h2>
                    <p class="text-gray-600 dark:text-gray-300 mb-6">
                        {{ $slide['description'] }}
                    </p>
                    <a href="{{ $slide['link'] }}" class="inline-block bg-cyan-500 text-white px-5 py-2 rounded-lg hover:bg-cyan-600 transition">
                        مشاهده بیشتر
                    </a>
                </div>
                <img src="{{ $slide['image'] }}" alt="{{ $slide['title'] }}" class="w-full md:w-1/2 mt-6 md:mt-0 rounded-xl shadow-md" loading="lazy">
            </div>
        @endforeach
    </div>
</div>
