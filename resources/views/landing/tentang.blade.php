@extends('layouts.app')
@section('title', 'Tentang Kami — Karang Taruna IKAPPI Desa Pilangsari')

@section('content')
<a href="{{ route('beranda') }}" class="btn-gold md:hidden fixed top-4 left-4 z-50 px-3 py-2 rounded-full shadow">← Beranda</a>

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
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12" data-aos="fade-up">
            <div class="section-badge mb-4">
                <span class="w-1.5 h-1.5 bg-gold rounded-full"></span>
                Struktur
            </div>
            <h2 class="text-3xl font-black text-navy-dark">Struktur <span class="text-gold">Organisasi</span></h2>
        </div>

        {{-- Posisi Inti (Tanpa Emoji) --}}
        <div class="mb-16">
            <h3 class="text-xl font-bold text-navy-dark mb-6 text-center">Pengurus Inti</h3>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
                @foreach([
                'Ketua',
                'Wakil Ketua',
                'Sekretaris 1',
                'Sekretaris 2',
                'Bendahara 1',
                'Bendahara 2',
                ] as $i => $posisi)
                <div class="bg-gradient-to-br from-gold/10 to-gold/5 rounded-2xl py-6 px-4 text-center border border-gold/20 hover:border-gold/50 transition-all duration-300 group cursor-pointer flex items-center justify-center"
                    data-aos="fade-up" data-aos-delay="{{ ($i+1) * 50 }}">
                    <div class="font-bold text-navy-dark text-sm md:text-base transition-colors">{{ $posisi }}</div>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Bidang (Tanpa Emoji) --}}
        <div>
            <h3 class="text-xl font-bold text-navy-dark mb-6 text-center">Bidang Organisasi</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach([
                ['nama' => 'Humas dan Keamanan', 'deskripsi' => 'Bidang komunikasi dan keamanan organisasi'],
                ['nama' => 'Seni Kreatif dan Medafor', 'deskripsi' => 'Bidang seni, kreativitas dan media'],
                ['nama' => 'Keagamaan', 'deskripsi' => 'Bidang pembinaan spiritual dan keagamaan'],
                ['nama' => 'Kepemudaan dan Olahraga', 'deskripsi' => 'Bidang pemberdayaan pemuda dan olahraga'],
                ] as $i => $bidang)
                <div class="bg-gray-50 rounded-2xl p-6 text-center hover:bg-navy-dark transition-all duration-300 group cursor-pointer border border-gray-200 hover:border-gold flex flex-col justify-center min-h-[120px]"
                    data-aos="fade-up" data-aos-delay="{{ ($i+1) * 100 }}">
                    <div class="font-bold text-navy-dark group-hover:text-white text-sm md:text-base mb-2 transition-colors">{{ $bidang['nama'] }}</div>
                    <div class="text-gray-600 group-hover:text-white/70 text-xs transition-colors leading-relaxed">{{ $bidang['deskripsi'] }}</div>
                </div>
                @endforeach
            </div>
        </div>

        {{-- TOMBOL KE HALAMAN ANGGOTA --}}
        <div class="text-center mt-16" data-aos="fade-up">
            <a href="{{ route('anggota.index') }}" class="inline-flex items-center gap-2 bg-navy-dark hover:bg-navy text-white font-bold py-3 px-8 rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl hover:-translate-y-1">
                Lihat Bagan & Daftar Anggota Lengkap
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </a>
        </div>

    </div>
</section>

{{-- Tombol Kembali --}}
<div class="bg-gray-50 py-10 text-center">
    <a href="{{ route('beranda') }}" class="btn-gold hidden md:inline-flex">
        ← Kembali ke Beranda
    </a>
</div>

@endsection