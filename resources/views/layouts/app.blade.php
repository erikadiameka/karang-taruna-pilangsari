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
    <meta property="og:image" content="@yield('og_image', asset('images/Logo2.png'))">
    <meta property="og:url" content="{{ request()->url() }}">
    <meta property="og:locale" content="id_ID">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', 'Karang Taruna Desa Pilangsari')">
    <meta name="twitter:description" content="@yield('description', 'Karang Taruna Desa Pilangsari')">
    <meta name="twitter:image" content="@yield('og_image', asset('images/Logo2.png'))">

    {{-- Canonical URL --}}
    <link rel="canonical" href="{{ request()->url() }}">

    {{-- Favicon --}}
    <link rel="icon" type="image/png" href="{{ asset('images/Logo2.png') }}">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>

<body class="bg-white font-sans antialiased" x-data>

    @if(request()->routeIs('beranda'))
    @include('partials.navbar')
    @else
    @include('partials.back-button')
    @endif

    <main class="page-enter">
        @yield('content')
    </main>

    @include('partials.footer')

    {{-- Floating WhatsApp Chat Widget --}}
    <div id="wa-widget" class="wa-widget">
        {{-- Chat Bubble Window --}}
        <div id="wa-window" class="wa-window" style="display: none;">
            {{-- Header --}}
            <div class="flex items-center justify-between bg-navy-dark p-4 text-white">
                <div class="flex items-center gap-3">
                    <div class="relative flex h-9 w-9 items-center justify-center rounded-full bg-[#25d366]">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946C.06 5.348 5.397.01 12.008.01c3.202.001 6.212 1.246 8.477 3.514 2.266 2.268 3.507 5.28 3.505 8.484-.004 6.657-5.34 11.997-11.953 11.997-2.005-.001-3.973-.504-5.73-1.465L0 24zm6.59-4.846c1.6.95 3.188 1.449 4.825 1.451 5.436 0 9.859-4.366 9.863-9.73.002-2.599-1.01-5.048-2.85-6.89C16.643 2.14 14.199 1.13 11.602 1.13c-5.45 0-9.875 4.369-9.879 9.736-.002 1.734.462 3.426 1.345 4.958l-.982 3.58 3.69-.958zm12.193-6.52c-.347-.173-2.054-1.012-2.37-1.127-.317-.116-.549-.173-.781.173-.232.348-.897 1.127-1.1 1.358-.202.232-.405.261-.752.088-.348-.174-1.467-.54-2.795-1.72-1.033-.919-1.73-2.054-1.933-2.4-.203-.347-.022-.536.151-.708.156-.155.348-.405.52-.608.174-.203.232-.347.348-.579.117-.232.058-.435-.029-.608-.088-.174-.781-1.88-.107-2.112.22-.075.478-.117.724-.117.245 0 .405.029.579.317.174.29.666 1.622.724 1.737.058.116.087.25.01.405-.078.155-.783.957-.96 1.159-.177.203-.362.21-.71.036-.348-.173-1.47-.541-2.8-1.723z" />
                        </svg>
                        <span class="absolute bottom-0 right-0 h-2.5 w-2.5 rounded-full border-2 border-navy-dark bg-gold"></span>
                    </div>
                    <div>
                        <p class="m-0 text-[13px] font-bold leading-tight text-white">Admin Karang Taruna</p>
                        <p class="mt-1 text-[10px] font-medium text-white/60">Desa Pilangsari</p>
                    </div>
                </div>
                <button type="button" onclick="toggleWaWidget()" aria-label="Tutup chat WhatsApp" class="rounded-lg p-2 text-white/70 transition hover:bg-white/10 hover:text-white">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" aria-hidden="true">
                        <path stroke-linecap="round" d="M6 6l12 12M18 6L6 18" />
                    </svg>
                </button>
            </div>
            
            {{-- Body --}}
            <div class="bg-slate-50 p-5 text-xs leading-relaxed text-slate-600">
                <div class="relative mb-3 rounded-xl border border-navy-dark/5 bg-white p-3">
                    Halo, ada yang bisa kami bantu? Silakan tanyakan seputar kegiatan, kemitraan, atau program Karang Taruna Desa Pilangsari.
                </div>
            </div>
            
            {{-- Footer (CTA Button) --}}
            <div class="bg-slate-50 px-5 pb-5">
                <a href="https://wa.me/6281234567890?text=Halo%20Admin%20Karang%20Taruna%20Desa%20Pilangsari%2C%20saya%20ingin%20bertanya%20mengenai%20..." 
                   target="_blank" 
                   class="flex items-center justify-center gap-2 rounded-xl bg-[#25d366] px-4 py-3 text-xs font-bold text-white shadow-sm transition hover:-translate-y-0.5 hover:bg-[#20bd5a]"
                   rel="noopener noreferrer">
                    <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946C.06 5.348 5.397.01 12.008.01c3.202.001 6.212 1.246 8.477 3.514 2.266 2.268 3.507 5.28 3.505 8.484-.004 6.657-5.34 11.997-11.953 11.997-2.005-.001-3.973-.504-5.73-1.465L0 24zm6.59-4.846c1.6.95 3.188 1.449 4.825 1.451 5.436 0 9.859-4.366 9.863-9.73.002-2.599-1.01-5.048-2.85-6.89C16.643 2.14 14.199 1.13 11.602 1.13c-5.45 0-9.875 4.369-9.879 9.736-.002 1.734.462 3.426 1.345 4.958l-.982 3.58 3.69-.958zm12.193-6.52c-.347-.173-2.054-1.012-2.37-1.127-.317-.116-.549-.173-.781.173-.232.348-.897 1.127-1.1 1.358-.202.232-.405.261-.752.088-.348-.174-1.467-.54-2.795-1.72-1.033-.919-1.73-2.054-1.933-2.4-.203-.347-.022-.536.151-.708.156-.155.348-.405.52-.608.174-.203.232-.347.348-.579.117-.232.058-.435-.029-.608-.088-.174-.781-1.88-.107-2.112.22-.075.478-.117.724-.117.245 0 .405.029.579.317.174.29.666 1.622.724 1.737.058.116.087.25.01.405-.078.155-.783.957-.96 1.159-.177.203-.362.21-.71.036-.348-.173-1.47-.541-2.8-1.723z" />
                    </svg>
                    Kirim pesan melalui WhatsApp
                </a>
            </div>
        </div>
        
        {{-- Floating Trigger Button --}}
        <button id="wa-trigger" type="button" onclick="toggleWaWidget()" class="wa-trigger wa-pulse" aria-label="Buka chat WhatsApp" aria-controls="wa-window" aria-expanded="false">
            <svg class="wa-icon h-7 w-7" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946C.06 5.348 5.397.01 12.008.01c3.202.001 6.212 1.246 8.477 3.514 2.266 2.268 3.507 5.28 3.505 8.484-.004 6.657-5.34 11.997-11.953 11.997-2.005-.001-3.973-.504-5.73-1.465L0 24zm6.59-4.846c1.6.95 3.188 1.449 4.825 1.451 5.436 0 9.859-4.366 9.863-9.73.002-2.599-1.01-5.048-2.85-6.89C16.643 2.14 14.199 1.13 11.602 1.13c-5.45 0-9.875 4.369-9.879 9.736-.002 1.734.462 3.426 1.345 4.958l-.982 3.58 3.69-.958zm12.193-6.52c-.347-.173-2.054-1.012-2.37-1.127-.317-.116-.549-.173-.781.173-.232.348-.897 1.127-1.1 1.358-.202.232-.405.261-.752.088-.348-.174-1.467-.54-2.795-1.72-1.033-.919-1.73-2.054-1.933-2.4-.203-.347-.022-.536.151-.708.156-.155.348-.405.52-.608.174-.203.232-.347.348-.579.117-.232.058-.435-.029-.608-.088-.174-.781-1.88-.107-2.112.22-.075.478-.117.724-.117.245 0 .405.029.579.317.174.29.666 1.622.724 1.737.058.116.087.25.01.405-.078.155-.783.957-.96 1.159-.177.203-.362.21-.71.036-.348-.173-1.47-.541-2.8-1.723z"/>
            </svg>
            <svg class="wa-close-icon h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" aria-hidden="true">
                <path stroke-linecap="round" d="M6 6l12 12M18 6L6 18" />
            </svg>
        </button>
    </div>

    <script>
        function toggleWaWidget() {
            const waWindow = document.getElementById('wa-window');
            const waTrigger = document.getElementById('wa-trigger');
            if (waWindow.style.display === 'none') {
                waWindow.style.display = 'block';
                waWindow.style.opacity = '0';
                waWindow.style.transform = 'translateY(10px)';
                setTimeout(() => {
                    waWindow.style.opacity = '1';
                    waWindow.style.transform = 'translateY(0)';
                }, 10);
                waTrigger.classList.add('is-open');
                waTrigger.setAttribute('aria-expanded', 'true');
                waTrigger.setAttribute('aria-label', 'Tutup chat WhatsApp');
            } else {
                waWindow.style.opacity = '0';
                waWindow.style.transform = 'translateY(10px)';
                setTimeout(() => {
                    waWindow.style.display = 'none';
                }, 300);
                waTrigger.classList.remove('is-open');
                waTrigger.setAttribute('aria-expanded', 'false');
                waTrigger.setAttribute('aria-label', 'Buka chat WhatsApp');
            }
        }
    </script>

    @stack('scripts')
</body>

</html>