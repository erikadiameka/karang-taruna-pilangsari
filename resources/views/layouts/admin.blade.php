<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') — Karang Taruna</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-navy-dark font-sans" x-data="{ sidebarOpen: true }">
    <div class="flex min-h-screen">

        {{-- SIDEBAR --}}
        <aside class="w-64 bg-navy flex-shrink-0 flex flex-col"
            style="background: linear-gradient(180deg, #07112B 0%, #081F5C 100%);">

            {{-- Logo --}}
            <div class="p-6 border-b border-white/10">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-gold rounded-xl flex items-center justify-center">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="#07112B">
                            <path d="M12 2L2 7v10l10 5 10-5V7L12 2zm0 2.18L20 8.5v7l-8 4-8-4v-7l8-4.32z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-white font-bold text-sm leading-tight">Karang Taruna</p>
                        <p class="text-gold text-xs">Desa Pilangsari</p>
                    </div>
                </div>
            </div>

            {{-- Nav Menu --}}
            <nav class="flex-1 p-4 space-y-1 overflow-y-auto">
                <p class="text-white/30 text-xs uppercase tracking-widest font-semibold px-4 mb-3 mt-2">Menu Utama</p>

                <a href="{{ route('admin.dashboard') }}"
                    class="sidebar-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <rect x="3" y="3" width="7" height="7" rx="1" />
                        <rect x="14" y="3" width="7" height="7" rx="1" />
                        <rect x="14" y="14" width="7" height="7" rx="1" />
                        <rect x="3" y="14" width="7" height="7" rx="1" />
                    </svg>
                    Dashboard
                </a>

                <p class="text-white/30 text-xs uppercase tracking-widest font-semibold px-4 mb-3 mt-4">Konten</p>

                <a href="{{ route('admin.berita.index') }}"
                    class="sidebar-item {{ request()->routeIs('admin.berita.*') ? 'active' : '' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l4 4v10a2 2 0 01-2 2z" />
                        <line x1="9" y1="10" x2="15" y2="10" />
                        <line x1="9" y1="14" x2="15" y2="14" />
                    </svg>
                    Berita
                </a>

                <a href="{{ route('admin.kegiatan.index') }}"
                    class="sidebar-item {{ request()->routeIs('admin.kegiatan.*') ? 'active' : '' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <rect x="3" y="4" width="18" height="18" rx="2" />
                        <line x1="16" y1="2" x2="16" y2="6" />
                        <line x1="8" y1="2" x2="8" y2="6" />
                        <line x1="3" y1="10" x2="21" y2="10" />
                    </svg>
                    Kegiatan
                </a>

                <a href="{{ route('admin.galeri.index') }}"
                    class="sidebar-item {{ request()->routeIs('admin.galeri.*') ? 'active' : '' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <rect x="3" y="3" width="18" height="18" rx="2" />
                        <circle cx="8.5" cy="8.5" r="1.5" />
                        <polyline points="21 15 16 10 5 21" />
                    </svg>
                    Galeri
                </a>

                <a href="{{ route('admin.anggota.index') }}"
                    class="sidebar-item {{ request()->routeIs('admin.anggota.*') ? 'active' : '' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
                        <circle cx="9" cy="7" r="4" />
                        <path d="M23 21v-2a4 4 0 00-3-3.87" />
                        <path d="M16 3.13a4 4 0 010 7.75" />
                    </svg>
                    Anggota
                </a>

                <a href="{{ route('admin.pengumuman.index') }}"
                    class="sidebar-item {{ request()->routeIs('admin.pengumuman.*') ? 'active' : '' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path d="M18 8A6 6 0 006 8c0 7-3 9-3 9h18s-3-2-3-9" />
                        <path d="M13.73 21a2 2 0 01-3.46 0" />
                    </svg>
                    Pengumuman
                </a>

                @if(auth()->user()->isSuperAdmin())
                <p class="text-white/30 text-xs uppercase tracking-widest font-semibold px-4 mb-3 mt-4">Admin</p>
                <a href="{{ route('admin.users.index') }}"
                    class="sidebar-item {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2" />
                        <circle cx="12" cy="7" r="4" />
                    </svg>
                    Users
                </a>
                @endif
            </nav>

            {{-- User Info & Logout --}}
            <div class="p-4 border-t border-white/10">
                <div class="flex items-center gap-3 mb-3">
                    <div class="w-9 h-9 bg-gold/20 rounded-xl flex items-center justify-center text-gold font-bold text-sm">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-white text-sm font-semibold truncate">{{ auth()->user()->name }}</p>
                        <p class="text-white/40 text-xs">{{ auth()->user()->role }}</p>
                    </div>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-2 text-white/50 hover:text-red-400 text-sm px-3 py-2 rounded-lg hover:bg-white/5 transition-all">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4" />
                            <polyline points="16 17 21 12 16 7" />
                            <line x1="21" y1="12" x2="9" y2="12" />
                        </svg>
                        Logout
                    </button>
                </form>
                <a href="{{ route('beranda') }}" class="w-full flex items-center gap-2 text-white/50 hover:text-gold text-sm px-3 py-2 rounded-lg hover:bg-white/5 transition-all mt-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                        <polyline points="9 22 9 12 15 12 15 22" />
                    </svg>
                    Lihat Website
                </a>
            </div>
        </aside>

        {{-- MAIN CONTENT --}}
        <main class="flex-1 overflow-auto">
            {{-- Top Bar --}}
            <div class="bg-navy/50 border-b border-white/5 px-8 py-4 flex items-center justify-between backdrop-blur-sm sticky top-0 z-10">
                <h1 class="text-white font-semibold">@yield('page-title', 'Dashboard')</h1>
                <div class="flex items-center gap-3 text-white/50 text-sm">
                    <span>{{ now()->format('d F Y') }}</span>
                </div>
            </div>

            <div class="p-8">
                @if(session('success'))
                <div class="bg-green-500/10 border border-green-500/20 text-green-400 px-4 py-3 rounded-xl mb-6 text-sm">
                    {{ session('success') }}
                </div>
                @endif

                @if(session('error'))
                <div class="bg-red-500/10 border border-red-500/20 text-red-400 px-4 py-3 rounded-xl mb-6 text-sm">
                    {{ session('error') }}
                </div>
                @endif

                @yield('content')
            </div>
        </main>
    </div>
</body>

</html>