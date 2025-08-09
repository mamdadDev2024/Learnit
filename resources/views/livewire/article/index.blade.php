<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 p-4">
    @foreach($articles as $article)
        <div
            class="bg-white dark:bg-gray-800 rounded-2xl shadow-md dark:shadow-none hover:shadow-lg dark:hover:shadow-cyan-700/50
                   transition-all duration-300 overflow-hidden border border-gray-100 dark:border-gray-700 flex flex-col"
        >
            <a href="{{ route('article.show', $article->slug) }}" class="block overflow-hidden">
                <img
                    src="{{ $article->thumbnail_url }}"
                    alt="{{ $article->title }}"
                    class="w-full h-48 object-cover transition-transform duration-300 hover:scale-105"
                    loading="lazy"
                />
            </a>
            <div class="p-4 flex flex-col justify-between flex-grow">
                <div>
                    <div class="flex flex-wrap gap-2 mb-2">
                        @foreach ($article->categories as $category)
                            <span class="text-xs font-semibold text-cyan-700 dark:text-cyan-400 bg-cyan-100 dark:bg-cyan-900 rounded px-2 py-0.5">
                                {{ $category->name }}
                            </span>
                        @endforeach
                    </div>
                    <h2 class="text-lg font-bold text-gray-800 dark:text-gray-100 mt-1">
                        <a href="{{ route('article.show', $article->slug) }}" class="hover:text-cyan-600 dark:hover:text-cyan-400 transition-colors duration-300">
                            {{ $article->title }}
                        </a>
                    </h2>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-2 line-clamp-3 leading-relaxed">
                        {{ $article->excerpt }}
                    </p>
                </div>

                <div class="flex justify-between items-center mt-4 text-sm text-gray-500 dark:text-gray-400">
                    <time datetime="{{ $article->published_at }}">
                        {{ \Carbon\Carbon::parse($article->published_at)->translatedFormat('d F Y') }}
                    </time>
                    <a href="{{ route('article.show', $article->slug) }}" class="text-cyan-600 dark:text-cyan-400 hover:underline">
                        ادامه مطلب →
                    </a>
                </div>
            </div>
        </div>
    @endforeach
</div>
