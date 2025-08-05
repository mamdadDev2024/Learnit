<div class="min-h-screen flex items-center justify-center bg-gray-100 dark:bg-gray-900 px-4">
    <div class="w-full max-w-md bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-8">
        <h2 class="text-2xl font-bold text-center text-gray-800 dark:text-white mb-6">ورود به حساب</h2>

        <form wire:submit.prevent="login" class="space-y-6">
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">ایمیل</label>
                <x-form.input id="email" type="email" name="email" model="email" />
                @error('email')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">رمز عبور</label>
                <x-form.input id="password" type="password" name="password" model="password" />
                @error('password')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="pt-4">
                <x-form.button full>ورود</x-form.button>
            </div>
        </form>
    </div>
</div>
