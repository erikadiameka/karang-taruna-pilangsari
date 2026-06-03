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
    @endif

    <main class="page-enter">
        @yield('content')
    </main>

    @include('partials.footer')

    {{-- Floating WhatsApp Chat Widget --}}
    <div id="wa-widget" style="position: fixed; bottom: 24px; left: 24px; z-index: 9999; font-family: 'Poppins', sans-serif;">
        {{-- Chat Bubble Window --}}
        <div id="wa-window" style="display: none; width: 320px; background: white; border-radius: 20px; box-shadow: 0 12px 32px rgba(7,17,43,0.15); border: 1px solid rgba(7,17,43,0.08); overflow: hidden; margin-bottom: 16px; transition: all 0.3s ease;">
            {{-- Header --}}
            <div style="background: #07112B; color: white; padding: 16px; display: flex; align-items: center; justify-content: space-between;">
                <div style="display: flex; align-items: center; gap: 10px;">
                    <div style="position: relative; width: 36px; height: 36px; background: #D4AF37; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 18px;">
                        💬
                        <span style="position: absolute; bottom: 0; right: 0; width: 10px; height: 10px; background: #22c55e; border: 2px solid #07112B; border-radius: 50%;"></span>
                    </div>
                    <div>
                        <p style="margin: 0; font-size: 13px; font-weight: 700; color: white; line-height: 1.2;">Admin Karang Taruna</p>
                        <p style="margin: 2px 0 0 0; font-size: 10px; color: #22c55e; font-weight: 500;">Online (Respon Cepat)</p>
                    </div>
                </div>
                <button onclick="toggleWaWidget()" style="background: none; border: none; color: white; font-size: 20px; cursor: pointer; padding: 0 4px; line-height: 1;">×</button>
            </div>
            
            {{-- Body --}}
            <div style="padding: 20px; background: #f8fafc; font-size: 12px; color: #475569; line-height: 1.6;">
                <div style="background: white; padding: 12px; border-radius: 12px; border: 1px solid rgba(7,17,43,0.05); margin-bottom: 12px; position: relative;">
                    Halo! Ada yang bisa kami bantu? Silakan tanyakan hal seputar kegiatan, kemitraan, atau program Karang Taruna Desa Pilangsari di sini. 😊
                </div>
            </div>
            
            {{-- Footer (CTA Button) --}}
            <div style="padding: 0 20px 20px 20px; background: #f8fafc;">
                <a href="https://wa.me/6281234567890?text=Halo%20Admin%20Karang%20Taruna%20Desa%20Pilangsari%2C%20saya%20ingin%20bertanya%20mengenai%20..." 
                   target="_blank" 
                   style="display: flex; align-items: center; justify-content: center; gap: 8px; background: #22c55e; color: white; text-decoration: none; padding: 10px 16px; border-radius: 12px; font-size: 12px; font-weight: 700; transition: all 0.3s; box-shadow: 0 4px 12px rgba(34,197,94,0.3);"
                   onmouseover="this.style.transform='scale(1.02)';" 
                   onmouseout="this.style.transform='scale(1)';">
                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24" style="margin-top: 1px;">
                        <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946C.06 5.348 5.397.01 12.008.01c3.202.001 6.212 1.246 8.477 3.514 2.266 2.268 3.507 5.28 3.505 8.484-.004 6.657-5.34 11.997-11.953 11.997-2.005-.001-3.973-.504-5.73-1.465L0 24zm6.59-4.846c1.6.95 3.188 1.449 4.825 1.451 5.436 0 9.859-4.366 9.863-9.73.002-2.599-1.01-5.048-2.85-6.89C16.643 2.14 14.199 1.13 11.602 1.13c-5.45 0-9.875 4.369-9.879 9.736-.002 1.734.462 3.426 1.345 4.958l-.982 3.58 3.69-.958zm12.193-6.52c-.347-.173-2.054-1.012-2.37-1.127-.317-.116-.549-.173-.781.173-.232.348-.897 1.127-1.1 1.358-.202.232-.405.261-.752.088-.348-.174-1.467-.54-2.795-1.72-1.033-.919-1.73-2.054-1.933-2.4-.203-.347-.022-.536.151-.708.156-.155.348-.405.52-.608.174-.203.232-.347.348-.579.117-.232.058-.435-.029-.608-.088-.174-.781-1.88-.107-2.112.22-.075.478-.117.724-.117.245 0 .405.029.579.317.174.29.666 1.622.724 1.737.058.116.087.25.01.405-.078.155-.783.957-.96 1.159-.177.203-.362.21-.71.036-.348-.173-1.47-.541-2.8-1.723z"/>
                    </svg>
                    Hubungi WhatsApp
                </a>
            </div>
        </div>
        
        {{-- Floating Trigger Button --}}
        <button id="wa-trigger" onclick="toggleWaWidget()" style="width: 56px; height: 56px; background: #22c55e; border: none; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 26px; cursor: pointer; box-shadow: 0 8px 24px rgba(34,197,94,0.4); border: 2px solid white; transition: all 0.3s; animation: waPulse 2s infinite;">
            <svg width="28" height="28" fill="currentColor" viewBox="0 0 24 24">
                <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946C.06 5.348 5.397.01 12.008.01c3.202.001 6.212 1.246 8.477 3.514 2.266 2.268 3.507 5.28 3.505 8.484-.004 6.657-5.34 11.997-11.953 11.997-2.005-.001-3.973-.504-5.73-1.465L0 24zm6.59-4.846c1.6.95 3.188 1.449 4.825 1.451 5.436 0 9.859-4.366 9.863-9.73.002-2.599-1.01-5.048-2.85-6.89C16.643 2.14 14.199 1.13 11.602 1.13c-5.45 0-9.875 4.369-9.879 9.736-.002 1.734.462 3.426 1.345 4.958l-.982 3.58 3.69-.958zm12.193-6.52c-.347-.173-2.054-1.012-2.37-1.127-.317-.116-.549-.173-.781.173-.232.348-.897 1.127-1.1 1.358-.202.232-.405.261-.752.088-.348-.174-1.467-.54-2.795-1.72-1.033-.919-1.73-2.054-1.933-2.4-.203-.347-.022-.536.151-.708.156-.155.348-.405.52-.608.174-.203.232-.347.348-.579.117-.232.058-.435-.029-.608-.088-.174-.781-1.88-.107-2.112.22-.075.478-.117.724-.117.245 0 .405.029.579.317.174.29.666 1.622.724 1.737.058.116.087.25.01.405-.078.155-.783.957-.96 1.159-.177.203-.362.21-.71.036-.348-.173-1.47-.541-2.8-1.723z"/>
            </svg>
        </button>
    </div>

    <style>
        @keyframes waPulse {
            0% { box-shadow: 0 0 0 0 rgba(34, 197, 94, 0.5); }
            70% { box-shadow: 0 0 0 12px rgba(34, 197, 94, 0); }
            100% { box-shadow: 0 0 0 0 rgba(34, 197, 94, 0); }
        }
    </style>

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
                waTrigger.style.transform = 'rotate(135deg)';
                waTrigger.style.background = '#dc2626';
                waTrigger.innerHTML = '×';
            } else {
                waWindow.style.opacity = '0';
                waWindow.style.transform = 'translateY(10px)';
                setTimeout(() => {
                    waWindow.style.display = 'none';
                }, 300);
                waTrigger.style.transform = 'rotate(0deg)';
                waTrigger.style.background = '#22c55e';
                waTrigger.innerHTML = '<svg width="28" height="28" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946C.06 5.348 5.397.01 12.008.01c3.202.001 6.212 1.246 8.477 3.514 2.266 2.268 3.507 5.28 3.505 8.484-.004 6.657-5.34 11.997-11.953 11.997-2.005-.001-3.973-.504-5.73-1.465L0 24zm6.59-4.846c1.6.95 3.188 1.449 4.825 1.451 5.436 0 9.859-4.366 9.863-9.73.002-2.599-1.01-5.048-2.85-6.89C16.643 2.14 14.199 1.13 11.602 1.13c-5.45 0-9.875 4.369-9.879 9.736-.002 1.734.462 3.426 1.345 4.958l-.982 3.58 3.69-.958zm12.193-6.52c-.347-.173-2.054-1.012-2.37-1.127-.317-.116-.549-.173-.781.173-.232.348-.897 1.127-1.1 1.358-.202.232-.405.261-.752.088-.348-.174-1.467-.54-2.795-1.72-1.033-.919-1.73-2.054-1.933-2.4-.203-.347-.022-.536.151-.708.156-.155.348-.405.52-.608.174-.203.232-.347.348-.579.117-.232.058-.435-.029-.608-.088-.174-.781-1.88-.107-2.112.22-.075.478-.117.724-.117.245 0 .405.029.579.317.174.29.666 1.622.724 1.737.058.116.087.25.01.405-.078.155-.783.957-.96 1.159-.177.203-.362.21-.71.036-.348-.173-1.47-.541-2.8-1.723z"/></svg>';
            }
        }
    </script>

    @stack('scripts')
</body>

</html>