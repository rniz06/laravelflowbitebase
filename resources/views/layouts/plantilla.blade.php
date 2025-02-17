<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Title Logo --}}
    <link rel="icon" type="image/x-icon" href="{{asset('img/cbvp-logo.webp')}}">

    <title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    {{-- Font Awesome v. 6.7.2 --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Css Personalido --}}
    @yield('css')

    {{-- Js Personalizado --}}
    @yield('js')

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased">

    {{-- Incluir el archivo de navegacion --}}
    @include('layouts.partials.nav')

    {{-- Incluir el archivo de sidebar --}}
    @include('layouts.partials.sidebar')

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
            {{-- Se incluye el navegador de pagina --}}
            @include('layouts.partials.navegador')

            {{-- Contenido --}}
            @yield('contenido')
        </div>
    </div>


    @stack('modals')

    @livewireScripts
</body>

</html>
