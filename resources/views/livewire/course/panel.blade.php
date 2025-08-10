
<div class="container grid grid-cols-2 mx-auto p-6 bg-white dark:bg-gray-900 rounded-2xl shadow-lg max-w-7xl">

    {{-- فرم ویرایش دوره --}}
    <section class="bg-gray-100 dark:bg-gray-800 p-6 rounded-lg shadow-lg mb-8 max-w-lg">
        <h2 class="text-xl font-bold mb-4 text-gray-900 dark:text-gray-100">ویرایش اطلاعات دوره</h2>
        <form wire:submit.prevent="updateCourse" class="space-y-4">

            <x-form.input wire:model.defer="name" label="نام دوره" type="text" required />

            <x-form.input wire:model.defer="description" label="توضیحات دوره" type="textarea" rows="4" required />

            <label class="block text-gray-700 dark:text-gray-300">
                تصویر دوره
                <input type="file" wire:model="newImage" accept="image/*" class="mt-1 block w-full" />
                @if ($image)
                    <img src="{{ is_string($image) ? asset('storage/'.$image) : $image->temporaryUrl() }}"
                         alt="{{ $name }}"
                         class="mt-2 w-40 rounded-lg shadow" />
                @endif
                @error('newImage') <span class="text-red-600">{{ $message }}</span> @enderror
            </label>

            <x-form.input wire:model.defer="price" label="قیمت (تومان)" type="number" min="0" required />

            <x-form.button formName="createCourse" type="submit" class="w-full mt-4 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">
                ذخیره تغییرات
            </x-form.button>

        </form>
    </section>

    {{-- افزودن درس جدید --}}
    <section class="bg-gray-100 dark:bg-gray-800 p-6 rounded-lg shadow-lg mb-8 max-w-lg">
        <h2 class="text-xl font-bold mb-4 text-gray-900 dark:text-gray-100">افزودن درس جدید</h2>
        <form wire:submit.prevent="addLesson" class="space-y-4">

            <x-form.input wire:model.defer="lessonTitle" label="عنوان درس" type="text" required />

            <x-form.input wire:model.defer="lessonVideo" label="ویدیو درس" type="file" accept="video" required />

            <div>
                <label for="">توضیحات درس</label>
                <textarea wire:model.defer="lessonDescription" class='w-full min-w-10 px-4 py-2 border rounded-xl shadow-sm focus:outline-none focus:ring focus:ring-cyan-500 focus:border-cyan-500 dark:bg-gray-800 dark:border-gray-600 dark:text-white transition' rows="5" required ></textarea>
                @error('lessonDescription')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <x-form.button type="submit" formName="createLesson" class="w-full mt-4 bg-green-600 hover:bg-green-700 text-white rounded-lg">
                افزودن درس
            </x-form.button>

        </form>
    </section>

    {{-- لیست دروس --}}
    <section class="bg-gray-100 dark:bg-gray-800 p-6 rounded-lg shadow-lg mb-8">
        <h2 class="text-xl font-bold mb-4 text-gray-900 dark:text-gray-100">دروس دوره ({{ $lessons->count() }})</h2>

        @if($lessons->isNotEmpty())
            <table class="w-full text-right border-collapse">
                <thead>
                <tr class="border-b border-gray-300 dark:border-gray-700">
                    <th class="p-3">عنوان درس</th>
                    <th class="p-3">وضعیت تایید</th>
                    <th class="p-3">عملیات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($lessons as $lesson)
                    <tr class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-200 dark:hover:bg-gray-700">
                        <td class="p-3">{{ $lesson->title }}</td>
                        <td class="p-3">
                            @if($lesson->is_approved)
                                <span class="text-green-600 font-semibold">تایید شده</span>
                            @else
                                <span class="text-red-600 font-semibold">در انتظار بررسی</span>
                            @endif
                        </td>
                        <td class="p-3 space-x-2 whitespace-nowrap">
                            <x-ui.link href="{{ route('lesson.edit', $lesson->id) }}" text="ویرایش" class="text-blue-600 hover:underline" />

                            <button
                                wire:click="deleteLesson({{ $lesson->id }})"
                                onclick="confirm('آیا مطمئن هستید حذف شود؟') || event.stopImmediatePropagation()"
                                class="text-red-600 hover:underline bg-transparent p-0 border-0 cursor-pointer"
                            >
                                حذف
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p class="text-gray-600 dark:text-gray-400">هیچ درسی ثبت نشده است.</p>
        @endif
    </section>

    {{-- نظرات دوره --}}
    <section class="bg-gray-100 dark:bg-gray-800 p-6 rounded-lg shadow-lg">
        <h2 class="text-xl font-bold mb-4 text-gray-900 dark:text-gray-100">نظرات دوره ({{ $comments->count() }})</h2>

        @if($comments->isNotEmpty())
            <ul class="space-y-4 max-h-96 overflow-auto">
                @foreach($comments as $comment)
                    <li class="border border-gray-300 dark:border-gray-700 rounded-lg p-4 bg-white dark:bg-gray-900">
                        <div class="flex justify-between items-center mb-2">
                            <div class="text-gray-700 dark:text-gray-300 font-semibold">{{ $comment->user->name ?? 'کاربر' }}</div>
                            <div class="text-sm text-gray-500 dark:text-gray-400">{{ $comment->created_at->diffForHumans() }}</div>
                        </div>
                        <p class="mb-3 text-gray-600 dark:text-gray-300">{{ $comment->content }}</p>
                        <div class="flex space-x-4 rtl:space-x-reverse">
                            @if(!$comment->is_approved)
                                <button wire:click="approveComment({{ $comment->id }})"
                                        class="text-green-600 hover:underline bg-transparent p-0 border-0 cursor-pointer">
                                    تایید
                                </button>
                            @endif
                            <button wire:click="deleteComment({{ $comment->id }})"
                                    onclick="confirm('آیا مطمئن هستید حذف شود؟') || event.stopImmediatePropagation()"
                                    class="text-red-600 hover:underline bg-transparent p-0 border-0 cursor-pointer">
                                حذف
                            </button>
                        </div>
                    </li>
                @endforeach
            </ul>
        @else
            <p class="text-gray-600 dark:text-gray-400">هیچ نظری ثبت نشده است.</p>
        @endif
    </section>

</div>
