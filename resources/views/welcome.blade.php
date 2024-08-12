<x-web-layout>
    <div class="pt-5 pb-20 flex flex-wrap items-center">
        <div class="w-full lg:w-5/12">
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
                        <a href="{{ route('panel') }}"
                            class="inline-flex items-center justify-center rounded-md bg-udh_1 px-6 py-3 text-center text-base font-medium text-white hover:translate-x-6 transition-transform duration-300 ease-in-out lg:px-7">
                            Ingresa tu necesidad
                            <i class="ml-4 fa-solid fa-arrow-right"></i>
                        </a>
                    </li>
                </ul>
                <div class="clients pt-16">
                    <h6 class="mb-6 flex items-center text-sm font-normal text-udh_3">
                        Comunidad de colaboradores
                        <span class="ml-3 inline-block h-px w-8 bg-udh_2"></span>
                    </h6>
                    <div class="flex items-center gap-4 xl:gap-[50px]">
                        <a href="http://udh.edu.pe"
                            class="py-3 transition-transform duration-300 ease-in-out transform hover:-translate-y-2"
                            target="_blank">
                            <img src="{{ asset('recursos/udh.webp') }}" width="110" alt="UDH" />
                        </a>
                        <a href="https://investigacion.udh.edu.pe"
                            class="py-3 transition-transform duration-300 ease-in-out transform hover:-translate-y-2"
                            target="_blank">
                            <img src="{{ asset('recursos/vri.webp') }}" width="140" alt="VRI" />
                        </a>
                        <a href="https://www.facebook.com/MerakT01"
                            class="py-3 transition-transform duration-300 ease-in-out transform hover:-translate-y-2"
                            target="_blank">
                            <img src="{{ asset('recursos/merakt.webp') }}" width="110" alt="Merakt" />
                        </a>
                    </div>

                </div>
            </div>
        </div>
        <div class="hidden lg:block lg:w-1/12"></div>
        <div class="w-full lg:w-6/12">
            <div class="lg:ml-auto lg:text-right">
                <div class="relative z-10 inline-block pt-11 lg:pt-0">
                    <img src="{{ asset('recursos/portada.jpeg') }}" alt="hero"
                        class="max-w-full lg:ml-auto rounded-xl" />
                    <span class="absolute -bottom-8 -left-8 z-[-1]">
                        <svg width="93" height="93" viewBox="0 0 93 93" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <circle cx="2.5" cy="2.5" r="2.5" fill="#001B4A" />
                            <circle cx="2.5" cy="24.5" r="2.5" fill="#001B4A" />
                            <circle cx="2.5" cy="46.5" r="2.5" fill="#001B4A" />
                            <circle cx="2.5" cy="68.5" r="2.5" fill="#001B4A" />
                            <circle cx="2.5" cy="90.5" r="2.5" fill="#001B4A" />
                            <circle cx="24.5" cy="2.5" r="2.5" fill="#001B4A" />
                            <circle cx="24.5" cy="24.5" r="2.5" fill="#001B4A" />
                            <circle cx="24.5" cy="46.5" r="2.5" fill="#001B4A" />
                            <circle cx="24.5" cy="68.5" r="2.5" fill="#001B4A" />
                            <circle cx="24.5" cy="90.5" r="2.5" fill="#001B4A" />
                            <circle cx="46.5" cy="2.5" r="2.5" fill="#001B4A" />
                            <circle cx="46.5" cy="24.5" r="2.5" fill="#001B4A" />
                            <circle cx="46.5" cy="46.5" r="2.5" fill="#001B4A" />
                            <circle cx="46.5" cy="68.5" r="2.5" fill="#001B4A" />
                            <circle cx="46.5" cy="90.5" r="2.5" fill="#001B4A" />
                            <circle cx="68.5" cy="2.5" r="2.5" fill="#001B4A" />
                            <circle cx="68.5" cy="24.5" r="2.5" fill="#001B4A" />
                            <circle cx="68.5" cy="46.5" r="2.5" fill="#001B4A" />
                            <circle cx="68.5" cy="68.5" r="2.5" fill="#001B4A" />
                            <circle cx="68.5" cy="90.5" r="2.5" fill="#001B4A" />
                            <circle cx="90.5" cy="2.5" r="2.5" fill="#001B4A" />
                            <circle cx="90.5" cy="24.5" r="2.5" fill="#001B4A" />
                            <circle cx="90.5" cy="46.5" r="2.5" fill="#001B4A" />
                            <circle cx="90.5" cy="68.5" r="2.5" fill="#001B4A" />
                            <circle cx="90.5" cy="90.5" r="2.5" fill="#001B4A" />
                        </svg>
                    </span>
                </div>
            </div>
        </div>
    </div>

</x-web-layout>
