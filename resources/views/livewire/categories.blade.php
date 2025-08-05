<div class="py-10 px-4 sm:px-8 md:px-16 lg:px-24">
    <h2 class="text-3xl font-bold mb-6 text-center">دسته‌بندی‌ها</h2>

    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
        @foreach($categories as $category)
            <a href="{{ route('categories.show', $category->slug) }}"
               class="group block p-4 bg-white rounded-xl shadow-md hover:shadow-xl transition-all duration-300 hover:bg-cyan-100"
            >
                <div class="text-center flex flex-col items-center justify-center">
                    <div class="text-3xl mb-2 transition-transform duration-300 group-hover:scale-110">
                        📂 {{-- می‌تونی اینو به $category->icon تغییر بدی --}}
                    </div>
                    <div class="font-semibold text-gray-800 text-sm">
                        {{ $category->name }}
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>
