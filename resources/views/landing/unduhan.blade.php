@extends('layouts.app')
@section('title', 'Unduhan — Karang Taruna Desa Pilangsari')
@section('description', 'Download dokumen, logo, dan atribut resmi Karang Taruna Desa Pilangsari.')

@section('content')

{{-- Hero --}}
<section style="background: linear-gradient(135deg, #07112B 0%, #081F5C 100%); padding: 8rem 0 4rem;">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <div class="section-badge mb-4" data-aos="fade-up">
            <span class="w-1.5 h-1.5 bg-gold rounded-full"></span>
            Dokumen Resmi
        </div>
        <h1 class="text-4xl md:text-5xl font-black text-white mt-4" data-aos="fade-up" data-aos-delay="100">
            Pusat <span class="text-gold">Unduhan</span>
        </h1>
        <p class="text-white/50 mt-4 text-sm max-w-xl mx-auto" data-aos="fade-up" data-aos-delay="200">
            Download dokumen, logo, dan atribut resmi Karang Taruna Desa Pilangsari
        </p>
    </div>
</section>

{{-- Konten --}}
<section class="py-20 bg-gray-50">
    <div class="max-w-5xl mx-auto px-4">

        {{-- Logo --}}
        <div class="mb-12" data-aos="fade-up">
            <h2 class="text-2xl font-black text-navy-dark mb-6 flex items-center gap-3">
                <span class="w-8 h-8 bg-gold rounded-lg flex items-center justify-center text-sm">🎨</span>
                Logo & Identitas
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                @foreach([
                ['Logo Karang Taruna PNG', 'Format PNG transparan untuk penggunaan digital', 'PNG', '🖼️'],
                ['Logo Karang Taruna SVG', 'Format vektor untuk penggunaan cetak', 'SVG', '✏️'],
                ['Logo Desa Pilangsari', 'Logo resmi Desa Pilangsari', 'PNG', '🏘️'],
                ] as $item)
                <div class="bg-white rounded-2xl p-5 border border-gray-100 hover:shadow-md hover:border-gold/20 transition-all duration-300">
                    <div class="w-12 h-12 bg-navy-dark rounded-xl flex items-center justify-center text-2xl mb-4">{{ $item[3] }}</div>
                    <h3 class="font-bold text-navy-dark text-sm mb-1">{{ $item[0] }}</h3>
                    <p class="text-gray-400 text-xs mb-4">{{ $item[1] }}</p>
                    <div class="flex items-center justify-between">
                        <span class="bg-gold/10 text-gold text-xs font-bold px-2 py-1 rounded-lg">{{ $item[2] }}</span>
                        <a href="{{ asset('images/Logo.jpeg') }}" download
                            class="flex items-center gap-1 bg-navy-dark hover:bg-navy text-white text-xs font-semibold px-3 py-2 rounded-lg transition-all">
                            ⬇ Download
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Dokumen Organisasi --}}
        <div class="mb-12" data-aos="fade-up">
            <h2 class="text-2xl font-black text-navy-dark mb-6 flex items-center gap-3">
                <span class="w-8 h-8 bg-gold rounded-lg flex items-center justify-center text-sm">📄</span>
                Dokumen Organisasi
            </h2>
            <div class="space-y-3">
                @foreach([
                ['AD/ART Karang Taruna', 'Anggaran Dasar dan Anggaran Rumah Tangga Karang Taruna', 'PDF', '2024'],
                ['SK Pengurus Karang Taruna Desa Pilangsari', 'Surat Keputusan Kepala Desa tentang Pengurus Karang Taruna', 'PDF', '2024'],
                ['Program Kerja Tahunan', 'Rencana program kerja Karang Taruna Desa Pilangsari', 'PDF', '2025'],
                ['Laporan Kegiatan', 'Laporan kegiatan dan pertanggungjawaban pengurus', 'PDF', '2024'],
                ['Formulir Pendaftaran Anggota', 'Formulir untuk mendaftar menjadi anggota Karang Taruna', 'PDF', '2025'],
                ] as $doc)
                <div class="bg-white rounded-2xl p-5 border border-gray-100 hover:shadow-md hover:border-gold/20 transition-all duration-300 flex items-center gap-4">
                    <div class="w-12 h-12 bg-red-50 rounded-xl flex items-center justify-center text-2xl flex-shrink-0">📄</div>
                    <div class="flex-1 min-w-0">
                        <h3 class="font-bold text-navy-dark text-sm">{{ $doc[0] }}</h3>
                        <p class="text-gray-400 text-xs mt-1">{{ $doc[1] }}</p>
                    </div>
                    <div class="flex items-center gap-3 flex-shrink-0">
                        <span class="bg-red-50 text-red-500 text-xs font-bold px-2 py-1 rounded-lg">{{ $doc[2] }}</span>
                        <span class="text-gray-400 text-xs">{{ $doc[3] }}</span>
                        @if($doc[0] === 'Formulir Pendaftaran Anggota')
                        <a href="{{ route('daftar-anggota') }}"
                            class="flex items-center gap-1 bg-gold hover:bg-gold-light text-navy-dark text-xs font-semibold px-3 py-2 rounded-lg transition-all" style="background-color: #D4AF37; color: #07112B;">
                            📝 Daftar Online
                        </a>
                        @else
                        <a href="#" onclick="alert('Dokumen akan tersedia segera!')"
                            class="flex items-center gap-1 bg-navy-dark hover:bg-navy text-white text-xs font-semibold px-3 py-2 rounded-lg transition-all">
                            ⬇ Download
                        </a>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Atribut & Perlengkapan --}}
        <div class="mb-12" data-aos="fade-up">
            <h2 class="text-2xl font-black text-navy-dark mb-6 flex items-center gap-3">
                <span class="w-8 h-8 bg-gold rounded-lg flex items-center justify-center text-sm">🎭</span>
                Atribut & Lagu Resmi
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @foreach([
                ['Mars Karang Taruna', 'Lagu resmi Mars Karang Taruna Indonesia', 'MP3', '🎵'],
                ['Hymne Karang Taruna', 'Lagu Hymne Karang Taruna Indonesia', 'MP3', '🎶'],
                ['Panduan Atribut', 'Panduan penggunaan atribut dan seragam resmi', 'PDF', '👔'],
                ['Template Surat Resmi', 'Template surat resmi Karang Taruna Desa Pilangsari', 'DOCX', '📝'],
                ] as $item)
                <div class="bg-white rounded-2xl p-5 border border-gray-100 hover:shadow-md hover:border-gold/20 transition-all duration-300 flex items-center gap-4">
                    <div class="w-12 h-12 bg-navy-dark rounded-xl flex items-center justify-center text-2xl flex-shrink-0">{{ $item[3] }}</div>
                    <div class="flex-1 min-w-0">
                        <h3 class="font-bold text-navy-dark text-sm">{{ $item[0] }}</h3>
                        <p class="text-gray-400 text-xs mt-1">{{ $item[1] }}</p>
                    </div>
                    <div class="flex items-center gap-2 flex-shrink-0">
                        <span class="bg-blue-50 text-blue-500 text-xs font-bold px-2 py-1 rounded-lg">{{ $item[2] }}</span>
                        <a href="#" onclick="alert('File akan tersedia segera!')"
                            class="flex items-center gap-1 bg-navy-dark hover:bg-navy text-white text-xs font-semibold px-3 py-2 rounded-lg transition-all">
                            ⬇
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Info --}}
        <div class="bg-navy-dark rounded-3xl p-8 text-center" data-aos="fade-up">
            <div class="text-4xl mb-4">📬</div>
            <h3 class="text-xl font-black text-white mb-3">Butuh Dokumen Lain?</h3>
            <p class="text-white/60 text-sm leading-relaxed mb-6 max-w-xl mx-auto">
                Jika kamu membutuhkan dokumen atau file yang tidak tersedia di sini, silakan hubungi kami melalui halaman kontak.
            </p>
            <a href="{{ route('kontak') }}" class="btn-gold">Hubungi Kami →</a>
        </div>

        <div class="text-center mt-8">
            <a href="{{ route('beranda') }}" class="inline-flex items-center gap-2 text-navy-dark hover:text-gold font-semibold text-sm transition-colors">← Kembali ke Beranda</a>
        </div>
    </div>
</section>

@endsection