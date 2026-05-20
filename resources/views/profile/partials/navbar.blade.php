<nav id="main-navbar" class="fixed top-0 left-0 right-0 z-50 py-4 transition-all duration-500">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between">

            {{-- Logo --}}
            <a href="{{ route('beranda') }}" class="flex items-center gap-3">
                <div class="w-10 h-10 bg-gold rounded-xl flex items-center justify-center">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="#07112B">
                        <path d="M12 2L2 7v10l10 5 10-5V7L12 2zm0 2.18L20 8.5v7l-8 4-8-4v-7l8-4.32z" />
                    </svg>
                </div>
                <div>
                    <p class="text-white font-bold text-sm leading-tight">Karang Taruna</p>
                    <p class="text-gold text-xs font-medium">Desa Pilangsari</p>
                </div>
            </a>

            {{-- Menu Desktop --}}
            <ul class="hidden lg:flex items-center gap-8">
                @foreach([
                ['beranda', 'Beranda'],
                ['tentang', 'Tentang'],
                ['kegiatan.index', 'Kegiatan'],
                ['berita.index', 'Berita'],
                ['galeri.index', 'Galeri'],
                ['anggota.index', 'Anggota'],
                ['kontak', 'Kontak'],
                ] as [$route, $label])
                <li>
                    <a href="{{ route($route) }}"
                        class="text-white/80 hover:text-gold text-sm font-medium transition-colors duration-200 relative
                              after:absolute after:bottom-[-4px] after:left-0 after:h-0.5 after:w-0
                              after:bg-gold after:transition-all after:duration-300 hover:after:w-full
                              {{ request()->routeIs($route) ? '!text-gold after:!w-full' : '' }}">
                        {{ $label }}
                    </a>
                </li>
                @endforeach
            </ul>

            {{-- Kanan --}}
            <div class="flex items-center gap-3">
                @auth
                <a href="{{ route('admin.dashboard') }}"
                    class="hidden md:flex items-center gap-2 bg-gold hover:bg-gold-light text-navy-dark font-semibold text-sm px-4 py-2.5 rounded-xl transition-all duration-300 hover:scale-105">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                        <rect x="3" y="3" width="7" height="7" rx="1" />
                        <rect x="14" y="3" width="7" height="7" rx="1" />
                        <rect x="14" y="14" width="7" height="7" rx="1" />
                        <rect x="3" y="14" width="7" height="7" rx="1" />
                    </svg>
                    Dashboard
                </a>
                @else
                <a href="{{ route('login') }}"
                    class="hidden md:flex items-center gap-2 bg-gold hover:bg-gold-light text-navy-dark font-semibold text-sm px-4 py-2.5 rounded-xl transition-all duration-300 hover:scale-105">
                    Dashboard
                </a>
                @endauth

                {{-- Dark Mode --}}
                <button @click="darkMode = !darkMode"
                    class="p-2.5 rounded-xl border border-white/20 text-white/80 hover:text-white hover:border-white/40 transition-all duration-200">
                    <svg x-show="!darkMode" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                    </svg>
                    <svg x-show="darkMode" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <circle cx="12" cy="12" r="5" />
                        <line x1="12" y1="1" x2="12" y2="3" />
                        <line x1="12" y1="21" x2="12" y2="23" />
                        <line x1="4.22" y1="4.22" x2="5.64" y2="5.64" />
                        <line x1="18.36" y1="18.36" x2="19.78" y2="19.78" />
                        <line x1="1" y1="12" x2="3" y2="12" />
                        <line x1="21" y1="12" x2="23" y2="12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</nav>