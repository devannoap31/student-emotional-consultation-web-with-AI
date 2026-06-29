<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Aether — Platform Kesehatan Mental AI untuk Mahasiswa')</title>
    <meta name="description" content="@yield('meta_description', 'Aether adalah platform pendamping kesehatan mental berbasis AI untuk mahasiswa dengan pendekatan CBT dan psikologi berbasis riset.')">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" type="image/png" href="{{ asset('AE.png') }}">
    @vite('resources/css/app.css')
</head>
<body>
    @yield('content')

    @stack('scripts')
</body>
</html>
