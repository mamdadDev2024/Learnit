<form wire:submit.prevent="createCourse" class="space-y-6" enctype="multipart/form-data">

    {{-- نام دوره --}}
    <div>
        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">نام دوره</label>
        <x-form.input
            id="name"
            name="name"
            type="text"
            model="name"
            required="true"
            autocomplete="off"
            placeholder="نام دوره را وارد کنید"
            class="bg-white dark:bg-gray-700"
        />
        @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">توضیحات</label>
        <textarea
            id="description"
            wire:model.defer="description"
            rows="4"
            class="w-full rounded-md border border-gray-300 dark:border-gray-600
                   bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100
                   focus:ring-2 focus:ring-cyan-500 focus:outline-none transition"
            placeholder="توضیح مختصری درباره دوره"></textarea>
        @error('description') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    {{-- قیمت --}}
    <div>
        <label for="price" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">قیمت (تومان)</label>
        <x-form.input
            id="price"
            name="price"
            type="number"
            model="price"
            required="true"
            min="0"
            placeholder="مثلا 100000"
            class="bg-white dark:bg-gray-700"
        />
        @error('price') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    {{-- تصویر --}}
    <div>
        <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">تصویر دوره</label>
        <input
            type="file"
            id="image"
            wire:model="image"
            accept="image/*"
            required
            class="w-full rounded-md border border-gray-300 dark:border-gray-600
                   bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100
                   focus:ring-2 focus:ring-cyan-500 focus:outline-none transition"
        >
        @error('image') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror

        {{-- پیش‌نمایش تصویر --}}
        @if ($image)
            <img src="{{ $image->temporaryUrl() }}" alt="Preview" class="mt-3 rounded-lg max-h-48">
        @endif
    </div>

    <x-form.button full class=" my-3">
        ارسال
    </x-form.button>
</form>
