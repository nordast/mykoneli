<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Custom web development">
    <meta name="keywords" content="ai, highload, bigdata, devops">
    <meta name="theme-color" content="#2e2a8f">
    <link href="{{ asset('images/favicon.png') }}" rel="icon">

    @hasSection('page.title')
        <title>{{ config('app.name') . '.' }} @yield('page.title')</title>
    @else
        <title>{{ config('app.name') }}</title>
    @endif

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css'])
    @stack('styles')
    @stack('head')
    @include('includes.gtag')
</head>
<body class="glassmorphism">
    @include('includes.header')

    <main role="main">
        @yield('content')
    </main>

    @include('includes.footer')

    @vite(['resources/js/app.js'])
    @stack('scripts')
</body>
</html>
