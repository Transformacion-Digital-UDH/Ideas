<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <header x-data="{ navbarOpen: false, }" class="absolute px-4 left-0 top-0 z-50 w-full shadow-sm border-b">
        <div class="container mx-auto">
            <div class="relative flex items-center justify-between">
                <div class="w-60 max-w-full">
                    <a href="/" class="block w-full py-5">
                        <img src="{{ asset('logo.webp') }}" alt="logo" class="block w-full dark:hidden" />
                        <img src="{{ asset('logo.webp') }}" alt="logo" class="hidden w-full dark:block" />
                    </a>
                </div>
                <div class="flex w-full items-center justify-between px-4">
                    <div>
                        <button @click="navbarOpen = !navbarOpen" :class="navbarOpen && 'navbarTogglerActive'"
                            id="navbarToggler"
                            class="absolute right-4 top-1/2 block -translate-y-1/2 rounded-lg px-3 py-[6px] ring-primary focus:ring-2 lg:hidden">
                            <span class="relative my-[6px] block h-[2px] w-[30px] bg-body-color dark:bg-white"></span>
                            <span class="relative my-[6px] block h-[2px] w-[30px] bg-body-color dark:bg-white"></span>
                            <span class="relative my-[6px] block h-[2px] w-[30px] bg-body-color dark:bg-white"></span>
                        </button>
                        <nav x-transition :class="!navbarOpen && 'hidden'" id="navbarCollapse"
                            class="absolute right-4 top-full w-full max-w-[250px] rounded-lg bg-white px-6 py-5 shadow transition-all lg:static lg:block lg:w-full lg:max-w-full lg:bg-transparent lg:shadow-none xl:ml-11 dark:bg-dark-2">
                            <ul class="block lg:flex">
                                <li>
                                    <a href="/"
                                        class="flex py-2 text-base font-medium text-dark hover:text-primary lg:ml-10 lg:inline-flex dark:text-white">
                                        Inicio
                                    </a>
                                </li>
                                <li>
                                    <a href="/"
                                        class="flex py-2 text-base font-medium text-dark hover:text-primary lg:ml-10 lg:inline-flex dark:text-white">
                                        Nosotros
                                    </a>
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

    <main class="pt-[70px] sm:pt-[100px] relative px-4 w-full">
        <div class="relative bg-white">
            <div class="container mx-auto">
                {{ $slot }}
            </div>
        </div>
    </main>

    <x-web-footer />
    @livewireScripts
</body>

</html>
