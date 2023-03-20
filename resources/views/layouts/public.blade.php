<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/assets/public/images/favicon.ico') }}">
    <link
        href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,700italic,900,900italic&amp;subset=latin,latin-ext"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Open%20Sans:300,400,400italic,600,600italic,700,700italic&amp;subset=latin,latin-ext"
        rel="stylesheet">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/public/css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/public/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/public/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/public/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/public/css/chosen.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/public/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/public/css/color-01.css') }}">
    @livewireStyles
</head>

<body class="home-page home-01 ">

<x-public.header/>

{{ $slot }}

<x-public.footer/>

@livewireScripts

    <script src="{{ asset('assets/public/js/jquery-1.12.4.minb8ff.js?ver=1.12.4') }}"></script>
    <script src="{{ asset('assets/public/js/jquery-ui-1.12.4.minb8ff.js?ver=1.12.4') }}"></script>
    <script src="{{ asset('assets/public/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/public/js/jquery.flexslider.js') }}"></script>
    {{-- <script src="{{ asset('assets/public/js/chosen.jquery.min.js') }}"></script> --}}
    <script src="{{ asset('assets/public/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/public/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('assets/public/js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('assets/public/js/functions.js') }}"></script>

</body>

</html>
