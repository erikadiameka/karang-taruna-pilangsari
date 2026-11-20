@extends('layouts.app')
@section('title', 'Tentang Kami — Karang Taruna IKAPPI Desa Pilangsari')

@section('content')
{{-- Hero --}}
<section class="relative py-32 overflow-hidden"
    style="background: linear-gradient(135deg, #07112B 0%, #081F5C 100%);">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="section-badge mb-4" data-aos="fade-up">
            <span class="w-1.5 h-1.5 bg-gold rounded-full"></span>
            Tentang Kami
        </div>
        <h1 class="text-4xl md:text-5xl font-black text-white mt-4" data-aos="fade-up" data-aos-delay="100">
            Karang Taruna <span class="text-gold">IKAPPI</span>
        </h1>
        <p class="text-white/60 mt-4 max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="200">
            Ikatan Pemuda Pemudi Pilangsari — Organisasi sosial kepemudaan yang bergerak untuk kemajuan dan kesejahteraan masyarakat Desa Pilangsari.
        </p>
    </div>
</section>

{{-- Sejarah --}}
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div data-aos="fade-right">
                <div class="section-badge mb-4">
                    <span class="w-1.5 h-1.5 bg-gold rounded-full"></span>
                    Sejarah Singkat
                </div>
                <h2 class="text-3xl font-black text-navy-dark mb-6">
                    Berdiri Sejak <span class="text-gold">Tahun 2010</span>
                </h2>
                <p class="text-gray-500 text-sm leading-relaxed mb-4">
                    Karang Taruna <strong>IKAPPI (Ikatan Pemuda Pemudi Pilangsari)</strong> lahir dari semangat pemuda-pemudi desa yang ingin berkontribusi nyata bagi kemajuan masyarakat. Didirikan pada tahun <strong>2010</strong>, organisasi ini tumbuh dari kesadaran kolektif generasi muda akan pentingnya peran aktif dalam pembangunan Desa Pilangsari, Kecamatan Jatitujuh, Kabupaten Majalengka.
                </p>
                <p class="text-gray-500 text-sm leading-relaxed">
                    Sejak berdiri, IKAPPI telah aktif melaksanakan berbagai program kegiatan sosial, pendidikan, ekonomi, seni budaya, dan olahraga. Mulai dari turnamen olahraga bergengsi seperti <strong>Ambrewek Super Cup</strong>, aksi peduli sesama melalui <strong>Bakti Sosial</strong>, hingga pelestarian tradisi leluhur seperti <strong>Sedekah Bumi</strong>.
                </p>
            </div>
            <div data-aos="fade-left">
                <img src="{{ asset('images/tentang.jpeg') }}"
                    alt="Karang Taruna IKAPPI" class="w-full rounded-2xl shadow-xl object-cover border-4 border-white">
            </div>
        </div>
    </div>
</section>

{{-- Visi Misi --}}
<section class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12" data-aos="fade-up">
            <div class="section-badge mb-4">
                <span class="w-1.5 h-1.5 bg-gold rounded-full"></span>
                Visi & Misi
            </div>
            <h2 class="text-3xl font-black text-navy-dark">Landasan <span class="text-gold">Organisasi</span></h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-navy-dark rounded-2xl p-8" data-aos="fade-right">
                <h3 class="text-xl font-bold text-white mb-4">Visi</h3>
                <p class="text-white/60 leading-relaxed">
                    Terwujudnya generasi muda Desa Pilangsari yang beriman, bertakwa, berkarakter, mandiri, berdaya saing, dan berkontribusi nyata bagi kemajuan desa dan bangsa.
                </p>
            </div>
            <div class="bg-navy-dark rounded-2xl p-8" data-aos="fade-left">
                <h3 class="text-xl font-bold text-white mb-4">Misi</h3>
                <ul class="text-white/60 space-y-2 text-sm">
                    @foreach([
                    'Meningkatkan kualitas SDM generasi muda melalui pendidikan dan pelatihan',
                    'Mengembangkan jiwa kewirausahaan dan kemandirian ekonomi pemuda',
                    'Melestarikan seni, budaya, dan kearifan lokal Desa Pilangsari',
                    'Menumbuhkan semangat gotong royong dan kepedulian sosial',
                    'Membangun kerjasama dengan berbagai pihak untuk kemajuan desa',
                    ] as $m)
                    <li class="flex items-start gap-2">
                        <span class="text-gold mt-0.5">✓</span>
                        {{ $m }}
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>

{{-- Struktur Organisasi --}}
<section id="struktur" class="relative overflow-hidden bg-gradient-to-b from-white via-gray-50 to-white py-20 md:py-24">
    <div class="pointer-events-none absolute -right-32 top-12 h-80 w-80 rounded-full bg-gold/5 blur-3xl"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="relative text-center mb-14" data-aos="fade-up">
            <div class="section-badge mb-4">
                <span class="w-1.5 h-1.5 bg-gold rounded-full"></span>
                Kepengurusan
            </div>
            <h2 class="text-3xl font-black text-navy-dark">Struktur <span class="text-gold">Organisasi</span></h2>
            <p class="text-gray-500 text-sm mt-3 max-w-xl mx-auto">Bersama menggerakkan potensi pemuda dan membangun Desa Pilangsari.</p>
        </div>

        <div class="relative mb-14">
            <div class="flex items-center justify-center gap-3 mb-6">
                <span class="h-px w-8 bg-gold/50"></span>
                <h3 class="text-sm font-bold uppercase tracking-[0.18em] text-navy-dark">Pengurus Inti</h3>
                <span class="h-px w-8 bg-gold/50"></span>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-3 sm:gap-4">
                @foreach([
                'Ketua',
                'Wakil Ketua',
                'Sekretaris 1',
                'Sekretaris 2',
                'Bendahara 1',
                'Bendahara 2',
                ] as $i => $posisi)
                <div class="group relative overflow-hidden rounded-2xl border border-gray-200/80 bg-white p-4 sm:p-5 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-gold/50 hover:shadow-lg hover:shadow-navy-dark/5"
                    data-aos="fade-up" data-aos-delay="{{ ($i+1) * 50 }}">
                    <div class="absolute inset-x-0 top-0 h-1 bg-gradient-to-r from-gold/30 via-gold to-gold/30"></div>
                    <div class="flex items-center justify-between gap-2 mb-4">
                        <span class="text-[10px] font-black tracking-widest text-gold">0{{ $i + 1 }}</span>
                        <span class="flex h-9 w-9 items-center justify-center rounded-xl bg-navy-dark text-gold transition-transform duration-300 group-hover:scale-110">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2m6-10a4 4 0 100-8 4 4 0 000 8zm10 10v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75" />
                            </svg>
                        </span>
                    </div>
                    <div class="font-bold text-navy-dark text-sm leading-snug">{{ $posisi }}</div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="relative">
            <div class="flex items-center justify-center gap-3 mb-6">
                <span class="h-px w-8 bg-gold/50"></span>
                <h3 class="text-sm font-bold uppercase tracking-[0.18em] text-navy-dark">Bidang Organisasi</h3>
                <span class="h-px w-8 bg-gold/50"></span>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                @foreach([
                ['nama' => 'Humas dan Keamanan', 'deskripsi' => 'Bidang komunikasi dan keamanan organisasi', 'icon' => 'komunikasi'],
                ['nama' => 'Seni Kreatif dan Medafor', 'deskripsi' => 'Bidang seni, kreativitas dan media', 'icon' => 'kreatif'],
                ['nama' => 'Keagamaan', 'deskripsi' => 'Bidang pembinaan spiritual dan keagamaan', 'icon' => 'keagamaan'],
                ['nama' => 'Kepemudaan dan Olahraga', 'deskripsi' => 'Bidang pemberdayaan pemuda dan olahraga', 'icon' => 'pemuda'],
                ] as $i => $bidang)
                <div class="group relative overflow-hidden rounded-2xl border border-gray-200/80 bg-white p-5 sm:p-6 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-gold/50 hover:shadow-xl hover:shadow-navy-dark/5"
                    data-aos="fade-up" data-aos-delay="{{ ($i+1) * 100 }}">
                    <div class="absolute inset-x-0 top-0 h-1 bg-gradient-to-r from-gold/20 via-gold to-gold/20"></div>
                    <div class="flex items-start justify-between gap-4">
                        <div class="flex h-11 w-11 flex-shrink-0 items-center justify-center rounded-xl bg-gold/10 text-gold">
                            @switch($bidang['icon'])
                                @case('komunikasi')
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 10h8m-8 4h5m-8 6l1.5-3H6a3 3 0 01-3-3V6a3 3 0 013-3h12a3 3 0 013 3v8a3 3 0 01-3 3h-5l-7 3z" />
                                </svg>
                                @break
                                @case('kreatif')
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 3l1.9 5.8L20 11l-6.1 2.2L12 19l-1.9-5.8L4 11l6.1-2.2L12 3zm7 11l1 2.5 2.5 1-2.5 1-1 2.5-1-2.5-2.5-1 2.5-1 1-2.5z" />
                                </svg>
                                @break
                                @case('keagamaan')
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 7v14m0-14c-2-2-5-3-9-3v14c4 0 7 1 9 3m0-14c2-2 5-3 9-3v14c-4 0-7 1-9 3" />
                                </svg>
                                @break
                                @case('pemuda')
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 3l2.2 5.3L20 10l-4.2 3.6L17 19l-5-3-5 3 1.2-5.4L4 10l5.8-1.7L12 3z" />
                                </svg>
                                @break
                            @endswitch
                        </div>
                        <span class="text-[10px] font-bold uppercase tracking-widest text-gold/80">0{{ $i + 1 }}</span>
                    </div>
                    <h4 class="mt-5 font-bold text-navy-dark text-sm md:text-base leading-snug">{{ $bidang['nama'] }}</h4>
                    <p class="mt-2 text-gray-500 text-xs leading-relaxed">{{ $bidang['deskripsi'] }}</p>
                </div>
                @endforeach
            </div>
        </div>

        {{-- TOMBOL KE HALAMAN ANGGOTA --}}
        <div class="text-center mt-16" data-aos="fade-up">
            <a href="{{ route('anggota.index') }}" class="inline-flex items-center gap-2 bg-navy-dark hover:bg-navy text-white font-bold py-3 px-6 sm:px-8 rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl hover:-translate-y-1">
                Lihat Daftar Anggota
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </a>
        </div>

    </div>
</section>

@endsection