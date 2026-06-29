<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Aether — Masuk ke Akun Anda')</title>
    <meta name="description" content="@yield('meta_description', 'Masuk ke Aether, platform pendamping kesehatan mental berbasis AI untuk mahasiswa.')">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" type="image/png" href="{{ asset('AE.png') }}">
    @vite('resources/css/app.css')
</head>
<body style="background-color: #F3FBFC; min-height: 100vh;">
    @yield('content')
    @stack('scripts')
</body>
</html>
