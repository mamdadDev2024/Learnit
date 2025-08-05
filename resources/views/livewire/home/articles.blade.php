<div class="py-12 bg-white dark:bg-gray-900" x-data>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold mb-10 text-gray-800 dark:text-white transition-all duration-500">آخرین مقالات</h2>
        
        <div class="grid gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            @foreach ($articles as $article)
                <a href="{{ route('articles.show', $article) }}" class="bg-white dark:bg-gray-800 rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 p-5 flex flex-col justify-between">
                    <div>
                        <img src="{{ $article->image_url ?? '/placeholder.jpg' }}" alt="{{ $article->title }}" class="rounded-xl h-40 w-full object-cover mb-4">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">{{ $article->title }}</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400 line-clamp-3">{{ $article->excerpt }}</p>
                    </div>
                    <div class="mt-4 text-right text-cyan-600 font-medium">
                        ادامه مطلب →
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>
