<nav id="main-navbar" class="fixed top-0 left-0 right-0 z-50 py-4 transition-all duration-500
    {{ request()->routeIs('beranda') ? '' : 'navbar-scrolled' }}">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between relative">

            <a href="{{ route('beranda') }}" class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl flex items-center justify-center flex-shrink-0 overflow-hidden">
                    <img src="/images/Logo2.png" alt="Logo" class="w-full h-full object-cover">
                </div>
                <div>
                    <p class="text-white font-bold text-sm leading-tight">Karang Taruna</p>
                    <p class="text-gold text-xs font-medium">Desa Pilangsari</p>
                </div>
            </a>

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
                    Admin
                </a>
                <form method="POST" action="{{ route('logout') }}" class="hidden md:block">
                    @csrf
                    <button type="submit"
                        class="flex items-center gap-2 bg-red-600 hover:bg-red-700 text-white font-semibold text-sm px-4 py-2.5 rounded-xl transition-all duration-300 hover:scale-105">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                            <path d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        Logout
                    </button>
                </form>
                @else
                <a href="{{ route('login') }}"
                    class="hidden md:flex items-center gap-2 bg-gold hover:bg-gold-light text-navy-dark font-semibold text-sm px-4 py-2.5 rounded-xl transition-all duration-300 hover:scale-105">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                        <path d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    Login
                </a>
                @endauth

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

                {{-- Mobile Menu Button --}}
                <button id="menu-toggle" class="lg:hidden p-2 text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>

        {{-- Mobile Menu --}}
        <div id="mobile-menu" class="hidden lg:hidden mt-2 bg-navy-dark/90 rounded-lg border border-gold/20 shadow-lg overflow-hidden transition-all duration-300 ease-out origin-top scale-y-0 opacity-0 w-full">
            <ul class="flex flex-col w-full">
                @foreach([
                ['beranda', 'Beranda'],
                ['tentang', 'Tentang'],
                ['kegiatan.index', 'Kegiatan'],
                ['berita.index', 'Berita'],
                ['galeri.index', 'Galeri'],
                ['anggota.index', 'Anggota'],
                ['kontak', 'Kontak'],
                ] as [$route, $label])
                <li class="border-b border-white/10 last:border-b-0">
                    <a href="{{ route($route) }}" class="block text-white/80 hover:text-gold hover:bg-white/5 py-3 px-4 text-sm font-medium transition-all w-full">
                        {{ $label }}
                    </a>
                </li>
                @endforeach

                {{-- Login/Dashboard di Mobile --}}
                <li class="border-t border-gold/20 pt-2 pb-2 px-4">
                    @auth
                    <div class="flex gap-2 mt-1">
                        <a href="{{ route('admin.dashboard') }}"
                            class="flex-1 flex items-center justify-center gap-2 bg-gold text-navy-dark font-semibold text-sm px-4 py-2.5 rounded-xl">
                            Admin
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="flex items-center gap-2 bg-red-600 text-white font-semibold text-sm px-4 py-2.5 rounded-xl">
                                Logout
                            </button>
                        </form>
                    </div>
                    @else
                    <a href="{{ route('login') }}"
                        class="flex items-center justify-center gap-2 bg-gold text-navy-dark font-semibold text-sm px-4 py-2.5 rounded-xl mt-1">
                        Login
                    </a>
                    @endauth
                </li>
            </ul>
        </div>

        <script>
            const menuToggle = document.getElementById('menu-toggle');
            const mobileMenu = document.getElementById('mobile-menu');

            menuToggle.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');

                setTimeout(() => {
                    mobileMenu.classList.toggle('scale-y-0');
                    mobileMenu.classList.toggle('opacity-0');
                }, 5);
            });

            // Close menu saat klik link
            document.querySelectorAll('#mobile-menu a').forEach(link => {
                link.addEventListener('click', function() {
                    mobileMenu.classList.add('scale-y-0', 'opacity-0');
                    setTimeout(() => mobileMenu.classList.add('hidden'), 300);
                });
            });
        </script>
    </div>
</nav>