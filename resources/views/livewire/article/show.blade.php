<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16 space-y-12">

    {{-- عنوان مقاله --}}
    <h1 class="text-3xl md:text-4xl font-extrabold text-gray-800 leading-relaxed">
        {{ $article->title }}
    </h1>

    {{-- اطلاعات نویسنده و تاریخ --}}
    <div class="flex items-center gap-4 text-sm text-gray-500">
        <span class="flex items-center gap-1">
            <svg class="w-4 h-4 text-cyan-500" fill="none" stroke="currentColor" stroke-width="2"
                 viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                <path d="M5 13l4 4L19 7" />
            </svg>
            {{ $article->user->name }}
        </span>
        <span>•</span>
        <span>{{ $article->created_at->format('Y/m/d') }}</span>
    </div>

    {{-- تصویر شاخص --}}
    @if($article->image)
        <img src="{{ asset($article->image) }}" alt="{{ $article->title }}"
             class="rounded-2xl shadow-md w-full object-cover h-64 sm:h-96" />
    @endif

    {{-- بدنه مقاله --}}
    <div class="prose prose-lg max-w-none prose-p:leading-loose prose-p:text-gray-700 prose-img:rounded-xl dark:prose-invert">
        {!! nl2br(e($article->body)) !!}
    </div>

    {{-- دسته‌بندی‌ها (در صورت فعال بودن morphToMany) --}}
    @if($article->categories && $article->categories->count())
        <div class="mt-10 flex flex-wrap gap-3">
            @foreach($article->categories as $category)
                <a href="{{ route('category.show', $category->slug) }}"
                   class="text-sm bg-cyan-100 text-cyan-700 px-3 py-1 rounded-full hover:bg-cyan-200 transition">
                    {{ $category->name }}
                </a>
            @endforeach
        </div>
    @endif

    {{-- دکمه بازگشت --}}
    <div class="mt-16">
        <a href="{{ route('article.index') }}"
           class="inline-block text-cyan-600 hover:text-cyan-800 text-sm font-medium transition">
            ← بازگشت به مقالات
        </a>
    </div>

</div>
