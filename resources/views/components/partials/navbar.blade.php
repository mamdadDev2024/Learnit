<nav x-data="{ open: false, dropdown: false }" class="bg-white/40 dark:bg-gray-900/40 backdrop-blur-md border border-gray-200 dark:border-gray-700 rounded-xl mx-2 my-4 sticky top-0 z-50 shadow-lg transition-all duration-500">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">

            {{-- لوگو --}}
            <div class="flex items-center space-x-2">
                <a href="{{ url('/') }}"
                   class="text-xl font-bold text-gray-800 dark:text-gray-100 hover:text-indigo-600 dark:hover:text-indigo-400 transition focus:outline-none focus:ring-2 focus:ring-indigo-500 rounded">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>

            {{-- لینک‌ها (دسکتاپ) --}}
            <div class="hidden md:flex items-center gap-6 text-sm font-medium text-gray-700 dark:text-gray-200">
                {{ $links ?? '' }}
            </div>

            {{-- احراز هویت (دسکتاپ) --}}
            <div class="hidden md:flex items-center ml-14 gap-3">
                @auth
                    <div class="relative">
                        <button @click="dropdown = !dropdown"
                                class="flex items-center gap-1 text-sm font-medium text-gray-800 dark:text-gray-200 hover:text-indigo-600 dark:hover:text-indigo-400 transition focus:outline-none focus:ring-2 focus:ring-indigo-500 rounded">
                            سلام، {{ auth()->user()->name }}
                            <svg class="w-4 h-4 transform transition-transform" :class="{ 'rotate-180': dropdown }" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="dropdown" @click.outside="dropdown = false" x-transition
                             class="absolute right-0 mt-2 w-44 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl shadow-lg overflow-hidden z-50">
                            <a href="{{ route('user.profile') }}"
                               class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 transition focus:outline-none focus:bg-gray-200 dark:focus:bg-gray-600">
                                داشبورد
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                        class="w-full text-right px-4 py-2 text-sm text-red-600 dark:text-red-400 hover:bg-red-100 dark:hover:bg-red-700 transition focus:outline-none focus:bg-red-200 dark:focus:bg-red-800">
                                    خروج
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-300 hover:text-indigo-600 transition focus:outline-none focus:ring-2 focus:ring-indigo-500 rounded">ورود</a>
                    <a href="{{ route('register') }}" class="text-sm text-gray-700 dark:text-gray-300 hover:text-indigo-600 transition focus:outline-none focus:ring-2 focus:ring-indigo-500 rounded">ثبت‌نام</a>
                @endauth
            </div>

            {{-- دکمه منو موبایل --}}
            <div class="md:hidden flex items-center">
                <button @click="open = !open"
                        class="text-gray-700 dark:text-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 rounded p-1">
                    <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg x-show="open" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- منوی موبایل --}}
    <div x-show="open" @click.outside="open = false" x-transition
         class="md:hidden bg-white dark:bg-gray-900 border-t border-gray-200 dark:border-gray-700 px-4 pb-4 space-y-2 text-sm text-gray-700 dark:text-gray-200">
        <div class="py-3 space-y-2 border-b border-gray-200 dark:border-gray-700">
            {{ $links ?? '' }}
        </div>

        <div class="pt-2">
            @auth
                <a href="{{ route('user.profile') }}" class="block py-2 hover:text-indigo-600 transition focus:outline-none focus:ring-2 focus:ring-indigo-500 rounded">پروفایل</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left py-2 text-red-600 dark:text-red-400 hover:text-red-800 transition focus:outline-none focus:ring-2 focus:ring-red-500 rounded">
                        خروج
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="block py-2 hover:text-indigo-600 transition focus:outline-none focus:ring-2 focus:ring-indigo-500 rounded">ورود</a>
                <a href="{{ route('register') }}" class="block py-2 hover:text-indigo-600 transition focus:outline-none focus:ring-2 focus:ring-indigo-500 rounded">ثبت‌نام</a>
            @endauth
        </div>
    </div>
</nav>
