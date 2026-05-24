@extends('layouts.app')
@section('title', 'Beranda — Karang Taruna Desa Pilangsari')

@section('content')

{{-- HERO --}}
<section class="relative min-h-screen flex flex-col justify-center overflow-hidden"
    style="background: linear-gradient(to right, rgba(7,17,43,0.92) 0%, rgba(8,31,92,0.7) 50%, rgba(7,17,43,0.5) 100%), url('/images/About.png') center/cover no-repeat;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-32 pb-16">

        <div class="inline-flex items-center gap-2 bg-white/10 border border-gold/40 text-white text-sm font-medium px-4 py-2 rounded-full mb-6 backdrop-blur-sm" data-aos="fade-up">
            <span class="w-2 h-2 bg-gold rounded-full animate-pulse"></span>
            Organisasi Pemuda Desa Pilangsari
        </div>

        <div data-aos="fade-up" data-aos-delay="100">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-black text-white leading-tight max-w-2xl">
                Bersama Membangun Desa,<br>
                <span class="text-gold">Berkarya untuk Masyarakat</span>
            </h1>
            <p class="text-white/70 text-base md:text-lg mt-5 max-w-lg leading-relaxed">
                Karang Taruna Desa Pilangsari hadir sebagai wadah pemuda untuk berkarya, berinovasi dan berkontribusi nyata bagi kemajuan desa.
            </p>
        </div>

        <div class="flex gap-4 mt-8 flex-wrap" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('tentang') }}" class="btn-gold">
                Kenali Kami
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                    <path d="M5 12h14M12 5l7 7-7 7" />
                </svg>
            </a>
            <a href="{{ route('kegiatan.index') }}" class="btn-outline-white">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <rect x="3" y="4" width="18" height="18" rx="2" />
                    <line x1="16" y1="2" x2="16" y2="6" />
                    <line x1="8" y1="2" x2="8" y2="6" />
                    <line x1="3" y1="10" x2="21" y2="10" />
                </svg>
                Lihat Kegiatan
            </a>
        </div>

        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mt-12" data-aos="fade-up" data-aos-delay="300">
            @foreach([
            ['icon' => '👥', 'value' => $stats['anggota'], 'label' => 'Anggota Aktif'],
            ['icon' => '📅', 'value' => $stats['kegiatan'], 'label' => 'Kegiatan Terlaksana'],
            ['icon' => '📰', 'value' => $stats['berita'], 'label' => 'Artikel Berita'],
            ['icon' => '🏆', 'value' => $stats['tahun'], 'label' => 'Tahun Berdiri'],
            ] as $stat)
            <div class="glass-card p-5 flex items-center gap-4 hover:-translate-y-1 transition-transform duration-300">
                <div class="w-12 h-12 bg-gold/20 rounded-xl flex items-center justify-center text-2xl flex-shrink-0">
                    {{ $stat['icon'] }}
                </div>
                <div>
                    <div class="text-2xl font-black text-gold" data-counter="{{ $stat['value'] }}">{{ $stat['value'] }}+</div>
                    <div class="text-gray-600 text-xs mt-0.5">{{ $stat['label'] }}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- MARQUEE --}}
@if($pengumuman->count())
<div class="bg-navy-light border-y border-gold/20 py-4 overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 flex items-center gap-4">
        <div class="flex-shrink-0 bg-gold text-navy-dark font-bold text-xs uppercase tracking-wider px-4 py-2 rounded-lg flex items-center gap-2">
            📢 PENGUMUMAN
        </div>
        <div class="overflow-hidden flex-1">
            <div class="marquee-content whitespace-nowrap text-white/80 text-sm">
                @foreach($pengumuman as $p)
                {{ $p->judul }} &nbsp;&nbsp;•&nbsp;&nbsp;
                @endforeach
            </div>
        </div>
        <a href="#" class="flex-shrink-0 text-gold text-sm font-semibold border border-gold/30 px-4 py-2 rounded-lg hover:bg-gold/10 transition-all flex items-center gap-2">
            Lihat Semua →
        </a>
    </div>
</div>
@endif

{{-- TENTANG --}}
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div class="relative" data-aos="fade-right">
                <div class="rounded-2xl overflow-hidden aspect-[4/3]">
                    <img src="https://images.unsplash.com/photo-1529156069898-49953e39b3ac?w=600&q=80" alt="Karang Taruna" class="w-full h-full object-cover">
                </div>
                <div class="absolute -bottom-5 -right-5 w-40 h-28 rounded-xl overflow-hidden border-4 border-white shadow-xl">
                    <img src="https://images.unsplash.com/photo-1540479859555-17af45c78602?w=300&q=80" alt="Kegiatan" class="w-full h-full object-cover">
                </div>
            </div>
            <div data-aos="fade-left">
                <div class="section-badge mb-4">
                    <span class="w-1.5 h-1.5 bg-gold rounded-full"></span>
                    Tentang Kami
                </div>
                <h2 class="text-3xl md:text-4xl font-black text-navy-dark">
                    Karang Taruna<br><span class="text-gold">Desa Pilangsari</span>
                </h2>
                <p class="text-gray-500 text-sm leading-relaxed mt-4 mb-8">
                    Karang Taruna adalah organisasi sosial kepemudaan sebagai wadah pengembangan generasi muda nonpartisan, yang tumbuh dan berkembang atas dasar kesadaran dan tanggung jawab sosial dari, oleh dan untuk masyarakat terutama generasi muda di Desa Pilangsari.
                </p>
                <div class="grid grid-cols-2 gap-5 mb-8">
                    @foreach([
                    ['emoji' => '🎨', 'title' => 'Kreatif', 'desc' => 'Menciptakan ide dan inovasi untuk kemajuan desa.'],
                    ['emoji' => '⚡', 'title' => 'Aktif', 'desc' => 'Selalu bergerak dalam kegiatan positif dan bermanfaat.'],
                    ['emoji' => '🤝', 'title' => 'Solid', 'desc' => 'Bersatu dalam kebersamaan dan kekeluargaan.'],
                    ['emoji' => '🌟', 'title' => 'Berkarya', 'desc' => 'Memberikan kontribusi nyata untuk masyarakat.'],
                    ] as $f)
                    <div class="flex gap-3">
                        <div class="w-12 h-12 bg-navy-light rounded-xl flex items-center justify-center text-xl flex-shrink-0">{{ $f['emoji'] }}</div>
                        <div>
                            <div class="font-bold text-navy-dark text-sm">{{ $f['title'] }}</div>
                            <div class="text-gray-400 text-xs mt-1 leading-relaxed">{{ $f['desc'] }}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <a href="{{ route('tentang') }}" class="btn-gold">Selengkapnya →</a>
            </div>
        </div>
    </div>
</section>

{{-- PROGRAM KERJA --}}
<section class="py-24 bg-navy-dark">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-end justify-between mb-12">
            <div data-aos="fade-up">
                <div class="section-badge mb-3">
                    <span class="w-1.5 h-1.5 bg-gold rounded-full"></span>
                    Program Unggulan
                </div>
                <h2 class="text-3xl md:text-4xl font-black text-white">Program <span class="text-gold">Kerja Kami</span></h2>
            </div>
            <a href="{{ route('kegiatan.index') }}" class="text-gold text-sm font-semibold border border-gold/30 px-5 py-2.5 rounded-xl hover:bg-gold/10 transition-all flex items-center gap-2" data-aos="fade-up">
                Lihat Semua →
            </a>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
            @foreach($programUnggulan as $i => $program)
            <div class="relative rounded-2xl overflow-hidden group cursor-pointer aspect-[4/3]" data-aos="fade-up" data-aos-delay="{{ ($i+1) * 100 }}">
                <img src="https://images.unsplash.com/photo-{{ ['1529156069898-49953e39b3ac','1509099836639-18ba1795216d','1556742049-0cfed4f6a45d','1533174072545-7a4b6ad7a6c3'][$i] }}?w=400&q=80"
                    alt="{{ $program['nama'] }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-navy-dark/95 via-navy-dark/40 to-transparent flex flex-col justify-end p-5">
                    <div class="w-10 h-10 bg-gold rounded-xl flex items-center justify-center text-lg mb-3">{{ ['👨‍🎓','❤️','💼','🎭'][$i] }}</div>
                    <h3 class="text-white font-bold text-base">{{ $program['nama'] }}</h3>
                    <p class="text-white/60 text-xs mt-1 leading-relaxed">{{ $program['deskripsi'] }}</p>
                    <span class="text-gold text-xs font-semibold mt-3 flex items-center gap-1">Selengkapnya →</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- AGENDA + BERITA + GALERI --}}
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">

            {{-- Agenda --}}
            <div data-aos="fade-up" data-aos-delay="100">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-bold text-navy-dark">Agenda Kegiatan</h3>
                    <a href="{{ route('kegiatan.index') }}" class="text-gold text-xs font-semibold hover:underline">Lihat Semua</a>
                </div>
                @forelse($kegiatanTerbaru as $k)
                <div class="bg-white rounded-xl p-4 flex gap-4 mb-3 border border-gray-100 hover:shadow-md hover:translate-x-1 transition-all duration-300">
                    <div class="bg-navy-dark text-white rounded-xl p-3 text-center min-w-[52px] flex-shrink-0">
                        <div class="text-xl font-black leading-none">{{ $k->tanggal_mulai->format('d') }}</div>
                        <div class="text-xs opacity-60 mt-1">{{ $k->tanggal_mulai->format('M Y') }}</div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="font-semibold text-navy-dark text-sm truncate">{{ $k->nama }}</div>
                        <div class="text-gray-400 text-xs mt-1">{{ $k->tanggal_mulai->format('H.i') }} WIB</div>
                        <div class="text-gray-400 text-xs">{{ $k->lokasi }}</div>
                    </div>
                    @if($k->status === 'akan_datang')
                    <span class="text-amber-600 bg-amber-50 text-xs font-semibold px-2 py-1 rounded-full h-fit flex-shrink-0">Akan Datang</span>
                    @elseif($k->status === 'selesai')
                    <span class="text-green-600 bg-green-50 text-xs font-semibold px-2 py-1 rounded-full h-fit flex-shrink-0">Selesai</span>
                    @endif
                </div>
                @empty
                <p class="text-gray-400 text-sm text-center py-8">Belum ada kegiatan.</p>
                @endforelse
            </div>

            {{-- Berita --}}
            <div data-aos="fade-up" data-aos-delay="200">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-bold text-navy-dark">Berita Terbaru</h3>
                    <a href="{{ route('berita.index') }}" class="text-gold text-xs font-semibold hover:underline">Lihat Semua</a>
                </div>
                @forelse($beritaTerbaru as $b)
                <a href="{{ route('berita.show', $b->slug) }}" class="flex gap-3 mb-4 bg-white rounded-xl border border-gray-100 hover:shadow-md hover:translate-x-1 transition-all duration-300 overflow-hidden block">
                    @if($b->thumbnail)
                    <img src="{{ Storage::url($b->thumbnail) }}" alt="{{ $b->judul }}" class="w-20 h-20 object-cover flex-shrink-0">
                    @else
                    <div class="w-20 h-20 bg-navy-light flex-shrink-0 flex items-center justify-center text-2xl">📰</div>
                    @endif
                    <div class="p-3 flex-1 min-w-0">
                        <div class="text-gray-400 text-xs">{{ $b->published_at?->format('d M Y') }}</div>
                        <div class="font-semibold text-navy-dark text-sm mt-1 line-clamp-2 leading-snug">{{ $b->judul }}</div>
                        <div class="text-gray-400 text-xs mt-1 line-clamp-2">{{ $b->ringkasan }}</div>
                    </div>
                </a>
                @empty
                <p class="text-gray-400 text-sm text-center py-8">Belum ada berita.</p>
                @endforelse
            </div>

            {{-- Galeri --}}
            <div data-aos="fade-up" data-aos-delay="300">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-bold text-navy-dark">Galeri Kegiatan</h3>
                    <a href="{{ route('galeri.index') }}" class="text-gold text-xs font-semibold hover:underline">Lihat Semua</a>
                </div>
                <div class="grid grid-cols-2 gap-2">
                    @forelse($galeriTerbaru as $i => $g)
                    <div class="{{ $i === 0 ? 'col-span-2 aspect-video' : 'aspect-square' }} rounded-xl overflow-hidden group cursor-pointer">
                        <img src="{{ Storage::url($g->file_path) }}" alt="{{ $g->judul }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    </div>
                    @empty
                    <div class="col-span-2 bg-gray-100 rounded-xl aspect-video flex items-center justify-center">
                        <p class="text-gray-400 text-sm">Belum ada galeri.</p>
                    </div>
                    @endforelse
                </div>
            </div>

        </div>
    </div>
</section>

@endsection