<header x-data="{ navbarOpen: false, }" class="absolute px-4 left-0 top-0 z-50 w-full shadow-md border-b">
    <div class="container mx-auto">
        <div class="relative flex items-center justify-between">
            <div class="w-60 max-w-full">
                <a href="{{ route('welcome') }}" class="block w-full py-5">
                    <img src="{{ asset('logo.webp') }}" alt="logo" class="block w-full dark:hidden" />
                    <img src="{{ asset('logo.webp') }}" alt="logo" class="hidden w-full dark:block" />
                </a>
            </div>
            <div class="flex w-full items-center justify-between px-4">
                <div>
                    <button @click="navbarOpen = !navbarOpen" :class="navbarOpen && 'navbarTogglerActive'"
                        id="navbarToggler"
                        class="absolute right-4 top-1/2 block -translate-y-1/2 rounded-lg py-[6px] lg:hidden">
                        <span class="relative my-[6px] block h-[2px] w-[30px] bg-udh_3 dark:bg-white"></span>
                        <span class="relative my-[6px] block h-[2px] w-[30px] bg-udh_3 dark:bg-white"></span>
                        <span class="relative my-[6px] block h-[2px] w-[30px] bg-udh_3 dark:bg-white"></span>
                    </button>
                    <nav x-transition :class="!navbarOpen && 'hidden'" id="navbarCollapse"
                        class="absolute right-4 top-full w-full max-w-[200px] rounded-lg bg-white px-6 py-5 shadow transition-all lg:static lg:block lg:w-full lg:max-w-full lg:bg-transparent lg:shadow-none xl:ml-11 dark:bg-dark-2">
                        <ul class="block lg:flex">
                            <li>
                                <a href="{{ route('welcome') }}"
                                    class="flex py-2 font-sm font-bold text-udh_3 hover:text-primary lg:ml-10 lg:inline-flex dark:text-white">
                                    Inicio
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('nosotros') }}"
                                    class="flex py-2 font-sm font-bold text-udh_3 hover:text-primary lg:ml-10 lg:inline-flex dark:text-white">
                                    Nosotros
                                </a>
                            </li>
                            <li class="mt-3 block sm:hidden">
                                @if (Route::has('login'))
                                    @auth
                                        <a href="{{ route('panel') }}"
                                            class="px-3 py-1 text-sm font-bold border bg-udh_3 text-white hover:text-whiterounded-sm">
                                            {{ __('Dashboard') }}
                                        </a>
                                    @else
                                        <a href="{{ route('login') }}"
                                            class="px-3 py-1 text-sm font-bold border border-udh_3 text-dark hover:bg-udh_3 hover:text-white text-udh_3 rounded-sm">
                                            {{ __('Login') }}
                                        </a>
                                    @endauth
                                @endif
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="hidden justify-end pr-16 sm:flex lg:pr-0">
                    @if (Route::has('login'))
                        <nav class="-mx-3 flex flex-1 justify-end">
                            @auth
                                <a href="{{ route('panel') }}"
                                    class="px-3 py-1 text-sm font-bold border bg-udh_3 text-white hover:text-whiterounded-sm">
                                    {{ __('Dashboard') }}
                                </a>
                            @else
                                <a href="{{ route('login') }}"
                                    class="px-3 py-1 text-sm font-bold border border-udh_3 text-dark hover:bg-udh_3 hover:text-white text-udh_3 rounded-sm">
                                    {{ __('Login') }}
                                </a>

                                {{-- @if (Route::has('register'))
                                    <a href="{{ route('register') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                        Registrate
                                    </a>
                                @endif --}}
                            @endauth
                        </nav>
                    @endif
                </div>
            </div>
        </div>
    </div>
</header>
