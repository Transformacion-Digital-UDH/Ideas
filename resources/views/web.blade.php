<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hero Section | TailGrids</title>
    <link rel="shortcut icon" href="../../assets/images/favicon.svg" type="image/x-icon" />
    <link rel="stylesheet" href="../../assets/css/tailwind.css" />

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <!-- ====== Navbar Section Start -->
    <header x-data="{
        navbarOpen: false,
    }" class="absolute left-0 top-0 z-50 w-full">
        <div class="container mx-auto">
            <div class="relative -mx-4 flex items-center justify-between">
                <div class="w-60 max-w-full px-4">
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
                    <div class="hidden justify-end">
                        <a href="{{ route('login') }}"
                            class="px-5 py-2 text-base font-medium border-2 border-udh_3 text-dark hover:text-primary text-udh_3 rounded-md">
                            {{ __('Login') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- ====== Navbar Section End -->

    <!-- ====== Hero Section Start -->
    <div class="relative bg-white pb-[110px] pt-[120px] lg:pt-[150px] dark:bg-dark">
        <div class="container mx-auto px-4">
            <div class="-mx-4 flex flex-wrap items-center">
                <div class="w-full px-4 lg:w-5/12">
                    <div class="hero-content">
                        <h1
                            class="mb-5 text-4xl font-bold !leading-[1.208] text-udh_3 sm:text-[42px] lg:text-[40px] xl:text-5xl dark:text-white">
                            De Necesidades <br>
                            Sociales a Soluciones <br> Tecnológicas
                        </h1>
                        <p class="mb-8 max-w-[480px] text-base text-body-color dark:text-dark-6">
                            Transformamos problemas sociales en soluciones concretas mediante investigación y proyectos
                            de transformación digital.
                        </p>
                        <ul class="flex flex-wrap items-center">
                            <li>
                                <a href="javascript:void(0)"
                                    class="inline-flex items-center justify-center rounded-md bg-udh_1 px-6 py-3 text-center text-base font-medium text-white hover:bg-blue-dark lg:px-7">
                                    Ingresa tu necesidad
                                    <i class="ml-2">--></i>
                                </a>
                            </li>
                        </ul>
                        <div class="clients pt-16">
                            <h6 class="mb-6 flex items-center text-sm font-normal text-udh_3">
                                Comunidad de Colaboradores
                                <span class="ml-3 inline-block h-px w-8 bg-body-color"></span>
                            </h6>
                            <div class="flex items-center gap-4 xl:gap-[50px]">
                                <a href="http://udh.edu.pe" class="block py-3" target="_blank">
                                    <img src="{{ asset('recursos/udh.webp') }}" width="110" alt="UDH" />
                                </a>
                                <a href="https://investigacion.udh.edu.pe" class="block py-3" target="_blank">
                                    <img src="{{ asset('recursos/vri.webp') }}" width="140" alt="VRI" />
                                </a>
                                <a href="https://www.facebook.com/MerakT01" class="block py-3" target="_blank">
                                    <img src="{{ asset('recursos/merakt.webp') }}" alt="Merakt" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hidden px-4 lg:block lg:w-1/12"></div>
                <div class="w-full px-4 lg:w-6/12">
                    <div class="lg:ml-auto lg:text-right">
                        <div class="relative z-10 inline-block pt-11 lg:pt-0">
                            <img src="../images/hero/hero-image-01.png" alt="hero" class="max-w-full lg:ml-auto" />
                            <span class="absolute -bottom-8 -left-8 z-[-1]">
                                <svg width="93" height="93" viewBox="0 0 93 93" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="2.5" cy="2.5" r="2.5" fill="#3056D3" />
                                    <circle cx="2.5" cy="24.5" r="2.5" fill="#3056D3" />
                                    <circle cx="2.5" cy="46.5" r="2.5" fill="#3056D3" />
                                    <circle cx="2.5" cy="68.5" r="2.5" fill="#3056D3" />
                                    <circle cx="2.5" cy="90.5" r="2.5" fill="#3056D3" />
                                    <circle cx="24.5" cy="2.5" r="2.5" fill="#3056D3" />
                                    <circle cx="24.5" cy="24.5" r="2.5" fill="#3056D3" />
                                    <circle cx="24.5" cy="46.5" r="2.5" fill="#3056D3" />
                                    <circle cx="24.5" cy="68.5" r="2.5" fill="#3056D3" />
                                    <circle cx="24.5" cy="90.5" r="2.5" fill="#3056D3" />
                                    <circle cx="46.5" cy="2.5" r="2.5" fill="#3056D3" />
                                    <circle cx="46.5" cy="24.5" r="2.5" fill="#3056D3" />
                                    <circle cx="46.5" cy="46.5" r="2.5" fill="#3056D3" />
                                    <circle cx="46.5" cy="68.5" r="2.5" fill="#3056D3" />
                                    <circle cx="46.5" cy="90.5" r="2.5" fill="#3056D3" />
                                    <circle cx="68.5" cy="2.5" r="2.5" fill="#3056D3" />
                                    <circle cx="68.5" cy="24.5" r="2.5" fill="#3056D3" />
                                    <circle cx="68.5" cy="46.5" r="2.5" fill="#3056D3" />
                                    <circle cx="68.5" cy="68.5" r="2.5" fill="#3056D3" />
                                    <circle cx="68.5" cy="90.5" r="2.5" fill="#3056D3" />
                                    <circle cx="90.5" cy="2.5" r="2.5" fill="#3056D3" />
                                    <circle cx="90.5" cy="24.5" r="2.5" fill="#3056D3" />
                                    <circle cx="90.5" cy="46.5" r="2.5" fill="#3056D3" />
                                    <circle cx="90.5" cy="68.5" r="2.5" fill="#3056D3" />
                                    <circle cx="90.5" cy="90.5" r="2.5" fill="#3056D3" />
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ====== Hero Section End -->
</body>

</html>
