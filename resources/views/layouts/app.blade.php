<!DOCTYPE html>
<html lang="id" x-data="{ darkMode: $persist(false) }" :class="{ 'dark': darkMode }">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Karang Taruna Desa Pilangsari')</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>

<body class="bg-white font-sans antialiased">
    @include('partials.navbar')
    <main>
        @yield('content')
    </main>
    @include('partials.footer')
    @stack('scripts')
</body>

</html>