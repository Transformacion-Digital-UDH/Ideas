<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <meta name="description"
        content="Transformamos tus IDEAS en Soluciones Tecnológicas mediante investigación y proyectos de transformación digital.">
    <meta name="keywords"
        content="Copilot UDH, Copiloto UDH, copiloto, copiloto udh, proyectos UDH, Necesidades UDH, UDH, Universidad de Huanuco, Huanuco, UDH">
    <meta name="author" content="Laboratorio de Transformacion Digital">
    <meta name="theme-color" content="#2EBAA0">

    <!-- Open Graph -->
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="{{ config('app.name', 'Banco de proyectos UDH') }}">
    <meta property="og:title" content="{{ config('app.name') }}">
    <meta property="og:description"
        content="Transformamos tus IDEAS en Soluciones Tecnológicas mediante investigación y proyectos de transformación digital.">
    <meta property="og:image" content="{{ asset('og_image.jpg') }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:type" content="website">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <x-web-header />

    <main class="pt-[70px] sm:pt-[100px] relative px-4 w-full">
        <div class="relative bg-white">
            <div class="container mx-auto">
                {{ $slot }}
            </div>
        </div>
    </main>

    <x-web-footer />
    {{-- @livewireScripts --}}
    <script src="{{ asset('livewire.js') }}" data-update-uri="livewire/update"></script>
</body>

</html>
