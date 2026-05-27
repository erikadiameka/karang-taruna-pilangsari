<!DOCTYPE html>
<html lang="id" x-data="{ darkMode: $persist(false) }" :class="{ 'dark': darkMode }">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- SEO Basic --}}
    <title>@yield('title', 'Karang Taruna Desa Pilangsari')</title>
    <meta name="description" content="@yield('description', 'Karang Taruna Desa Pilangsari - Organisasi pemuda yang bergerak untuk kemajuan dan kesejahteraan masyarakat Desa Pilangsari, Kec. Jatitujuh, Kab. Majalengka.')">
    <meta name="keywords" content="@yield('keywords', 'Karang Taruna, Desa Pilangsari, Jatitujuh, Majalengka, Organisasi Pemuda, Karang Taruna Pilangsari')">
    <meta name="author" content="Karang Taruna Desa Pilangsari">
    <meta name="robots" content="index, follow">

    {{-- Open Graph (Facebook, WhatsApp) --}}
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Karang Taruna Desa Pilangsari">
    <meta property="og:title" content="@yield('title', 'Karang Taruna Desa Pilangsari')">
    <meta property="og:description" content="@yield('description', 'Karang Taruna Desa Pilangsari - Organisasi pemuda yang bergerak untuk kemajuan masyarakat.')">
    <meta property="og:image" content="@yield('og_image', asset('images/Logo.jpeg'))">
    <meta property="og:url" content="{{ request()->url() }}">
    <meta property="og:locale" content="id_ID">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', 'Karang Taruna Desa Pilangsari')">
    <meta name="twitter:description" content="@yield('description', 'Karang Taruna Desa Pilangsari')">
    <meta name="twitter:image" content="@yield('og_image', asset('images/Logo.jpeg'))">

    {{-- Canonical URL --}}
    <link rel="canonical" href="{{ request()->url() }}">

    {{-- Favicon --}}
    <link rel="icon" type="image/jpeg" href="{{ asset('images/Logo.jpeg') }}">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>

<body class="bg-white font-sans antialiased" x-data>

    @if(request()->routeIs('beranda'))
    @include('partials.navbar')
    @endif

    <main class="page-enter">
        @yield('content')
    </main>

    @include('partials.footer')

    @stack('scripts')
</body>

</html>