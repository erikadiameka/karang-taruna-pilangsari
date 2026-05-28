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
                    Dashboard
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
                            Dashboard
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
            let menuOpen = false;

            function openMenu() {
                mobileMenu.classList.remove('hidden');
                requestAnimationFrame(() => {
                    mobileMenu.classList.remove('scale-y-0', 'opacity-0');
                });
                menuOpen = true;
            }

            function closeMenu() {
                mobileMenu.classList.add('scale-y-0', 'opacity-0');
                setTimeout(() => mobileMenu.classList.add('hidden'), 300);
                menuOpen = false;
            }

            menuToggle.addEventListener('click', function() {
                if (!menuOpen) openMenu(); else closeMenu();
            });

            // Close menu saat klik link
            document.querySelectorAll('#mobile-menu a').forEach(link => {
                link.addEventListener('click', function() {
                    closeMenu();
                });
            });

            // Ensure menu closed on wider screens or when resizing
            window.addEventListener('resize', () => {
                if (window.innerWidth >= 1024 && menuOpen) {
                    closeMenu();
                }
            });
        </script>
    </div>
</nav>