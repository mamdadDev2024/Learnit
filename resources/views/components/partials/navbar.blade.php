<nav
    x-data="{ open: false }"
    class="backdrop-blur-xl bg-white/70 border-b border-gray-200 shadow-md rounded-2xl mx-4 my-3 sticky top-0 z-50 transition-all duration-500">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">

            {{-- لوگو --}}
            <div class="flex-shrink-0">
                <a href="{{ url('/') }}" class="text-2xl font-semibold text-gray-800 hover:text-indigo-600 transition duration-300">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>

            {{-- لینک‌های دسکتاپ --}}
            <div class="hidden md:flex space-x-6">
                {{ $links ?? '' }}
            </div>

            {{-- احراز هویت --}}
            <div class="hidden md:flex items-center space-x-4" x-data="{ openDropdown: false }">
                @auth
                    <div class="relative">
                        <button @click="openDropdown = !openDropdown"
                                class="flex items-center space-x-2 text-sm text-gray-800 hover:text-indigo-600 transition focus:outline-none">
                            <span>سلام، {{ auth()->user()->name }}</span>
                            <svg class="w-4 h-4 transform transition-transform duration-200"
                                 :class="{ 'rotate-180': openDropdown }"
                                 fill="none" stroke="currentColor" stroke-width="2"
                                 viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        {{-- دراپ‌داون --}}
                        <div
                            x-show="openDropdown"
                            @click.outside="openDropdown = false"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 translate-y-2"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 translate-y-2"
                            class="absolute right-0 mt-2 w-48 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl shadow-lg z-50"
                        >
                            <x-ui.link
                                href="{{ route('user.profile') }}"
                                text="داشبورد"
                                class="px-4 py-2"
                                icon="heroicon-o-home"
                                :active="request()->routeIs('user.profile')"
                            />

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                        class="w-full text-right px-4 py-2 text-sm text-red-600 hover:bg-red-50 dark:text-red-400 dark:hover:bg-red-800 transition">
                                    خروج
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-600 hover:text-indigo-600 transition">ورود</a>
                    <a href="{{ route('register') }}" class="text-sm text-gray-600 hover:text-indigo-600 transition">ثبت‌نام</a>
                @endauth
            </div>

            {{-- دکمه موبایل --}}
            <div class="md:hidden flex items-center">
                <button @click="open = !open" class="text-gray-700 focus:outline-none transition-all duration-300">
                    <svg x-show="!open" class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg x-show="open" class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- منوی موبایل --}}
    <div class="md:hidden transition-all duration-300 ease-in-out"
         x-show="open"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-2"
         @click.outside="open = false">

        <div class="px-4 pt-4 pb-2 space-y-2 border-t border-gray-200">
            {{ $links ?? '' }}
        </div>

        <div class="px-4 pt-2 pb-4 border-t border-gray-100">
            @auth
                <a href="{{ route('user.profile') }}" class="block text-sm text-gray-700 hover:text-indigo-600 mb-2 transition">پروفایل</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-form.button full>خروج</x-form.button>
                </form>
            @else
                <a href="{{ route('login') }}" class="block text-sm text-gray-700 hover:text-indigo-600 mb-2 transition">ورود</a>
                <a href="{{ route('register') }}" class="block text-sm text-gray-700 hover:text-indigo-600 transition">ثبت‌نام</a>
            @endauth
        </div>
    </div>
</nav>
