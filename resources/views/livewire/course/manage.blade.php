<div class="max-w-7xl mx-auto p-4">

    {{-- جستجو --}}
    <div class="mb-6 flex flex-col sm:flex-row justify-between items-center gap-4">
        <input type="search" wire:model.debounce.300ms="search" placeholder="جستجوی دوره..."
               class="w-full sm:w-64 px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600
                      dark:bg-gray-800 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-cyan-500 transition" />

        <a href="{{ route('course.create') }}"
           class="px-4 py-2 rounded-lg bg-cyan-600 hover:bg-cyan-700 text-white font-semibold shadow transition">
            ایجاد دوره جدید
        </a>
    </div>

    {{-- جدول دوره‌ها --}}
    <div class="overflow-x-auto rounded-lg border border-gray-200 dark:border-gray-700 shadow-sm">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead class="bg-gray-100 dark:bg-gray-800">
            <tr>
                <th class="px-4 py-2 text-right text-sm font-semibold text-gray-700 dark:text-gray-300">نام دوره</th>
                <th class="px-4 py-2 text-right text-sm font-semibold text-gray-700 dark:text-gray-300">قیمت (تومان)</th>
                <th class="px-4 py-2 text-center text-sm font-semibold text-gray-700 dark:text-gray-300">تاریخ ایجاد</th>
                <th class="px-4 py-2 text-center text-sm font-semibold text-gray-700 dark:text-gray-300">عملیات</th>
            </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
            @forelse ($courses as $course)
                <tr>
                    <td class="px-4 py-3 text-right text-gray-900 dark:text-gray-100">{{ $course->name }}</td>
                    <td class="px-4 py-3 text-right text-gray-900 dark:text-gray-100">{{ number_format($course->price) }}</td>
                    <td class="px-4 py-3 text-center text-gray-700 dark:text-gray-400">{{ $course->created_at->format('Y/m/d') }}</td>
                    <td class="px-4 py-3 text-center space-x-3">

                        <a href="{{ route('course.edit', $course->id) }}"
                           class="text-cyan-600 hover:underline">ویرایش</a>

                        <button
                            wire:click="deleteCourse({{ $course->id }})"
                            onclick="return confirm('آیا از حذف این دوره مطمئن هستید؟')"
                            class="text-red-600 hover:underline">
                            حذف
                        </button>

                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center text-gray-500 py-6">
                        دوره‌ای یافت نشد.
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

    {{-- صفحه‌بندی --}}
    <div class="mt-6">
        {{ $courses->links() }}
    </div>

</div>
