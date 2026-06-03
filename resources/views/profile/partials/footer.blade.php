<footer class="bg-navy-dark pt-16 pb-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-10">

            {{-- Brand --}}
            <div class="lg:col-span-2">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 bg-gold rounded-xl flex items-center justify-center">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="#07112B">
                            <path d="M12 2L2 7v10l10 5 10-5V7L12 2zm0 2.18L20 8.5v7l-8 4-8-4v-7l8-4.32z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-white font-bold text-sm">Karang Taruna</p>
                        <p class="text-gold text-xs">Desa Pilangsari</p>
                    </div>
                </div>
                <p class="text-white/50 text-sm leading-relaxed mb-5">
                    Organisasi pemuda yang bergerak untuk kemajuan dan kesejahteraan masyarakat Desa Pilangsari.
                </p>
                <div class="flex gap-2">
                    @foreach(['facebook', 'instagram', 'youtube', 'github'] as $social)
                    <a href="#" class="w-9 h-9 bg-white/5 hover:bg-gold rounded-lg flex items-center justify-center transition-all duration-300">
                        <span class="text-white text-xs">{{ strtoupper(substr($social, 0, 2)) }}</span>
                    </a>
                    @endforeach
                </div>
            </div>

            {{-- Menu --}}
            <div>
                <h4 class="text-white font-bold text-xs uppercase tracking-widest mb-4">Menu</h4>
                @foreach(['Beranda' => 'beranda', 'Tentang Kami' => 'tentang', 'Kegiatan' => 'kegiatan.index', 'Berita' => 'berita.index', 'Galeri' => 'galeri.index', 'Anggota' => 'anggota.index', 'Kontak' => 'kontak'] as $label => $route)
                <a href="{{ route($route) }}" class="block text-white/50 hover:text-gold text-sm mb-2.5 transition-colors">{{ $label }}</a>
                @endforeach
            </div>

            {{-- Tautan Cepat --}}
            <div>
                <h4 class="text-white font-bold text-xs uppercase tracking-widest mb-4">Tautan Cepat</h4>
                @foreach([
                    'Program Kerja' => 'kegiatan.index',
                    'Struktur Organisasi' => 'anggota.index',
                    'Dokumentasi' => 'dokumentasi',
                    'Pengumuman' => 'pengumuman.index',
                    'FAQ' => 'faq',
                    'UMKM Pemuda' => 'umkm',
                    'Klub & Komunitas' => 'klub',
                    'Kotak Aspirasi' => 'aspirasi'
                ] as $label => $route)
                <a href="{{ route($route) }}" class="block text-white/50 hover:text-gold text-sm mb-2.5 transition-colors">{{ $label }}</a>
                @endforeach
            </div>

            {{-- Kontak & Newsletter --}}
            <div>
                <h4 class="text-white font-bold text-xs uppercase tracking-widest mb-4">Kontak Kami</h4>
                <div class="space-y-2.5 text-white/50 text-sm mb-6">
                    <p>📍 Jl. Pilangsari No.01, Kec. Jatitujuh, Kab. Majalengka 45458</p>
                    <p>📞 (0233) 123456</p>
                    <p>✉️ karangtaruna.pilangsari@gmail.com</p>
                    <p>🕐 Senin – Sabtu (08.00 – 17.00 WIB)</p>
                </div>
                <h4 class="text-white font-bold text-xs uppercase tracking-widest mb-3">Newsletter</h4>
                <div class="flex gap-2">
                    <input type="email" placeholder="Email Anda"
                        class="flex-1 bg-white/5 border border-white/10 rounded-lg px-3 py-2 text-white text-sm placeholder-white/30 focus:outline-none focus:border-gold/50">
                    <button class="bg-gold hover:bg-gold-light text-navy-dark font-bold px-3 py-2 rounded-lg transition-all">→</button>
                </div>
            </div>
        </div>

        {{-- Bottom --}}
        <div class="border-t border-white/5 mt-12 pt-6 flex flex-col md:flex-row justify-between items-center gap-4">
            <p class="text-white/30 text-xs">© {{ date('Y') }} Karang Taruna Desa Pilangsari. All Rights Reserved.</p>
            <div class="flex gap-6">
                <a href="#" class="text-white/30 hover:text-gold text-xs transition-colors">Kebijakan Privasi</a>
                <a href="#" class="text-white/30 hover:text-gold text-xs transition-colors">Syarat & Ketentuan</a>
            </div>
        </div>
    </div>
</footer>