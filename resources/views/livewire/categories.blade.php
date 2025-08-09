<div class="py-12 px-4 sm:px-8 md:px-16 lg:px-24">
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-6">
        @foreach($categories as $category)
            <a href="{{ route('category.show', $category->slug) }}"
               class="group flex flex-col items-center justify-center
                      bg-white dark:bg-gray-800 rounded-2xl shadow-sm dark:shadow-none
                      hover:shadow-lg dark:hover:shadow-cyan-700/50
                      hover:bg-gradient-to-br hover:from-cyan-50 hover:to-blue-50
                      transition-all duration-300 p-5 text-center
                      border border-transparent hover:border-cyan-200 dark:hover:border-cyan-400"
            >
                {{-- آیکون دسته‌بندی --}}
                <div class="text-4xl mb-3 text-cyan-600 dark:text-cyan-400
                            transition-transform duration-300 group-hover:scale-110">
                    {!! $category->icon ?? '<i class="fas fa-folder-open"></i>' !!}
                </div>

                {{-- نام دسته‌بندی --}}
                <span class="text-sm sm:text-base font-semibold
                             text-gray-700 dark:text-gray-300
                             group-hover:text-cyan-700 dark:group-hover:text-cyan-400
                             transition-colors duration-300">
                    {{ $category->name }}
                </span>

                {{-- توضیح کوتاه (اختیاری) --}}
                @if($category->description)
                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400
                              group-hover:text-gray-600 dark:group-hover:text-gray-300
                              line-clamp-2 transition-colors duration-300">
                        {{ $category->description }}
                    </p>
                @endif
            </a>
        @endforeach
    </div>
</div>
