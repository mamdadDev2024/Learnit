<div class="flex justify-center w-full ">
    <form wire:submit.prevent="update" class=" flex  max-w-xl w-lg py-6 rounded-4xl border px-4  flex-col gap-2">
        <h3 class=" text-xl font-bold mx-auto">
            Update Profile
        </h3>
        @if($currentAvatar)
            <img src="{{ $currentAvatar }}" class="rounded-full mx-auto h-20 w-20 my-2">
        @endif
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">ایمیل</label>
            <x-form.input id="email" type="email" name="email" model="email" />
            @error('email')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">نام</label>
            <x-form.input id="name" type="text" name="name" model="name" />
            @error('name')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">عکس</label>
            <x-form.input id="image" type="file" name="image" model="image" />
            @error('image')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <x-form.button full class=" my-3">
            ارسال
        </x-form.button>
    </form>
</div>
