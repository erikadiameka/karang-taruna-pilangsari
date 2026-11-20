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
    </div>
</div>
@endif

{{-- TENTANG --}}
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div class="relative" data-aos="fade-right">
                <div class="rounded-2xl overflow-hidden aspect-[4/3]">
                    <img src="{{ asset('images/program.jpeg') }}" alt="Karang Taruna" class="w-full h-full object-cover">
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
                    ['title' => 'Kreatif', 'desc' => 'Menciptakan ide dan inovasi untuk kemajuan desa.'],
                    ['title' => 'Aktif', 'desc' => 'Selalu bergerak dalam kegiatan positif dan bermanfaat.'],
                    ['title' => 'Solid', 'desc' => 'Bersatu dalam kebersamaan dan kekeluargaan.'],
                    ['title' => 'Berkarya', 'desc' => 'Memberikan kontribusi nyata untuk masyarakat.'],
                    ] as $f)
                    <div class="flex gap-3">
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

        <div class="text-center mb-12">
            <div data-aos="fade-up" class="flex flex-col items-center">
                <div class="section-badge mb-3">
                    <span class="w-1.5 h-1.5 bg-gold rounded-full"></span>
                    Program Unggulan
                </div>
                <h2 class="text-3xl md:text-4xl font-black text-white">Program <span class="text-gold">Kerja Kami</span></h2>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
            @foreach([
            ['nama' => 'Ambrewek Super Cup', 'deskripsi' => 'Turnamen sepak bola antar blok Desa Pilangsari yang digelar setiap Agustus untuk memeriahkan HUT RI.', 'gambar' => asset('images/ambrewek.jpg')],
            ['nama' => 'Semarak Kemerdekaan', 'deskripsi' => 'Rangkaian lomba tradisional hingga panggung seni budaya yang melibatkan seluruh lapisan masyarakat.', 'gambar' => asset('images/kemerdekaan.jpg')],
            ['nama' => 'Sedekah Bumi', 'deskripsi' => 'Tradisi tahunan warga sebagai wujud syukur atas hasil panen dan melestarikan adat budaya lokal.', 'gambar' => asset('images/sedekahbumi.jpg')],
            ['nama' => 'Bakti Sosial', 'deskripsi' => 'Pengumpulan zakat, infak, sedekah, serta pembekalan pemasaran digital untuk UMKM pemuda desa.', 'gambar' => asset('images/baktisosial.jpg')]
            ] as $i => $program)
            <div class="relative rounded-2xl overflow-hidden group cursor-pointer aspect-[4/3]" data-aos="fade-up" data-aos-delay="{{ ($i+1) * 100 }}">
                <img src="{{ $program['gambar'] }}" alt="{{ $program['nama'] }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">

                <div class="absolute inset-0 bg-gradient-to-t from-navy-dark/95 via-navy-dark/40 to-transparent flex flex-col justify-end p-5">
                    <h3 class="text-white font-bold text-base">{{ $program['nama'] }}</h3>
                    <p class="text-white/60 text-xs mt-1 leading-relaxed">{{ $program['deskripsi'] }}</p>
                    <span class="text-gold text-xs font-semibold mt-3 flex items-center gap-1">Selengkapnya →</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- AGENDA + BERITA --}}
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">

            {{-- Agenda Dinamis dari Database --}}
            <div data-aos="fade-up" data-aos-delay="100">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-bold text-navy-dark">Agenda Kegiatan</h3>
                </div>

                @forelse($kegiatanTerbaru as $k)
                <div class="bg-white rounded-2xl overflow-hidden mb-4 border border-gray-100 shadow-sm hover:shadow-md transition-all duration-300 group">
                    @if($k->thumbnail)
                    <div class="relative h-48 overflow-hidden">
                        {{-- UDAH DIBALIKIN KE STORAGE KARENA SYMLINK UDAH JALAN --}}
                        <img src="{{ Storage::url($k->thumbnail) }}" alt="{{ $k->nama }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">

                        <div class="absolute top-3 right-3 bg-gold text-navy-dark text-[10px] font-black uppercase px-3 py-1.5 rounded-lg tracking-widest shadow-lg">
                            {{ str_replace('_', ' ', $k->status) }}
                        </div>
                    </div>
                    @else
                    <div class="relative h-32 bg-navy-light flex items-center justify-center text-white/50">
                        <span class="text-3xl">📅</span>
                    </div>
                    @endif

                    <div class="p-5">
                        <div class="text-gray-500 text-xs font-bold mb-2 flex items-center gap-2">
                            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            {{ $k->tanggal_mulai->format('d M Y') }} &bull; {{ $k->tanggal_mulai->format('H.i') }} WIB
                        </div>
                        <h4 class="font-bold text-navy-dark text-base">{{ $k->nama }}</h4>
                        <p class="text-gray-500 text-xs mt-1.5 leading-relaxed line-clamp-2">
                            {{ $k->deskripsi }}
                        </p>
                        <div class="text-gray-400 text-xs mt-3 flex items-center gap-1">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            {{ $k->lokasi }}
                        </div>
                    </div>
                </div>
                @empty
                <div class="bg-gray-50 rounded-xl p-6 text-center border border-gray-100">
                    <p class="text-3xl mb-2">📅</p>
                    <p class="text-gray-400 text-sm">Belum ada agenda kegiatan.</p>
                </div>
                @endforelse
            </div>

            {{-- Berita RSS / Eksternal --}}
            <div data-aos="fade-up" data-aos-delay="300">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-bold text-navy-dark">Berita Nasional</h3>
                    <a href="https://kompas.com" target="_blank" class="text-gold text-xs font-semibold hover:underline">Kompas.com →</a>
                </div>

                @if(($externalNews ?? collect())->count() > 0)
                @foreach($externalNews as $r)
                <a href="{{ $r->url }}" target="_blank"
                    class="flex gap-3 mb-4 bg-white rounded-xl border border-gray-100 hover:shadow-md hover:translate-x-1 transition-all duration-300 overflow-hidden block">
                    <div class="w-20 h-20 bg-navy-light flex-shrink-0 flex items-center justify-center text-2xl">📰</div>
                    <div class="p-3 flex-1 min-w-0">
                        <div class="text-gray-400 text-xs">{{ $r->published_at?->format('d M Y') }}</div>
                        <div class="font-semibold text-navy-dark text-sm mt-1 line-clamp-2 leading-snug">{{ $r->title }}</div>
                        <div class="text-gray-400 text-xs mt-1 line-clamp-2">{{ Str::limit($r->summary, 80) }}</div>
                    </div>
                </a>
                @endforeach
                @else
                @forelse(($rssBerita ?? []) as $r)
                <a href="{{ $r['link'] }}" target="_blank"
                    class="flex gap-3 mb-4 bg-white rounded-xl border border-gray-100 hover:shadow-md hover:translate-x-1 transition-all duration-300 overflow-hidden block">
                    <div class="w-20 h-20 bg-navy-light flex-shrink-0 flex items-center justify-center text-2xl">📰</div>
                    <div class="p-3 flex-1 min-w-0">
                        <div class="text-gray-400 text-xs">
                            {{ !empty($r['published_at']) ? \Carbon\Carbon::parse($r['published_at'])->format('d M Y') : '' }}
                        </div>
                        <div class="font-semibold text-navy-dark text-sm mt-1 line-clamp-2 leading-snug">{{ $r['judul'] }}</div>
                        <div class="text-gray-400 text-xs mt-1 line-clamp-2">{{ Str::limit($r['desc'], 80) }}</div>
                    </div>
                </a>
                @empty
                <div class="bg-gray-50 rounded-xl p-6 text-center">
                    <p class="text-3xl mb-2">📡</p>
                    <p class="text-gray-400 text-sm">Berita tidak tersedia.</p>
                </div>
                @endforelse
                @endif
            </div>

        </div>
    </div>
</section>

@endsection