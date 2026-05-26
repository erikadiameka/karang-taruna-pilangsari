@extends('layouts.app')
@section('title', 'Dokumentasi — Karang Taruna Desa Pilangsari')

@section('content')

{{-- HEADER --}}
<section class="bg-navy-dark pt-32 pb-16 border-b border-gold/10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="inline-flex items-center gap-2 bg-gold/10 border border-gold/40 text-gold text-sm font-medium px-4 py-2 rounded-full mb-6">
            <span class="w-2 h-2 bg-gold rounded-full"></span>
            Informasi & Referensi
        </div>
        <h1 class="text-4xl md:text-5xl font-black text-white mb-3">Dokumentasi</h1>
        <p class="text-white/60 text-lg">Referensi dan dokumentasi resmi Karang Taruna Desa Pilangsari</p>
    </div>
</section>

{{-- CONTENT --}}
<section class="py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Main Docs --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            {{-- Left Content --}}
            <div class="lg:col-span-2 space-y-8">

                {{-- Section 1: AD/ART --}}
                <div class="bg-gradient-to-br from-navy/50 to-navy-dark border border-gold/10 rounded-2xl p-8">
                    <div class="flex items-start gap-4 mb-6">
                        <div class="w-12 h-12 bg-gold/20 rounded-xl flex items-center justify-center flex-shrink-0">
                            <span class="text-2xl">📋</span>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-white mb-2">Anggaran Dasar & Anggaran Rumah Tangga</h3>
                            <p class="text-white/60">Dokumen dasar yang mengatur organisasi Karang Taruna</p>
                        </div>
                    </div>
                    
                    <div class="space-y-3 mb-6">
                        <p class="text-white/80 leading-relaxed">
                            AD/ART (Anggaran Dasar dan Anggaran Rumah Tangga) adalah dokumen resmi yang mengatur struktur organisasi, hak dan kewajiban anggota, serta tata cara pengambilan keputusan di Karang Taruna Desa Pilangsari.
                        </p>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <a href="#" class="inline-flex items-center gap-2 bg-gold/20 hover:bg-gold/30 text-gold px-4 py-3 rounded-lg transition-colors font-semibold">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            Unduh PDF
                        </a>
                        <a href="#" class="inline-flex items-center gap-2 text-gold hover:text-gold-light transition-colors font-semibold">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                            </svg>
                            Baca Online
                        </a>
                    </div>
                </div>

                {{-- Section 2: Program Kerja --}}
                <div class="bg-gradient-to-br from-navy/50 to-navy-dark border border-gold/10 rounded-2xl p-8">
                    <div class="flex items-start gap-4 mb-6">
                        <div class="w-12 h-12 bg-gold/20 rounded-xl flex items-center justify-center flex-shrink-0">
                            <span class="text-2xl">📅</span>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-white mb-2">Program Kerja Tahunan</h3>
                            <p class="text-white/60">Rencana kerja dan kegiatan sepanjang tahun</p>
                        </div>
                    </div>
                    
                    <div class="space-y-3 mb-6">
                        <p class="text-white/80 leading-relaxed">
                            Program kerja tahunan berisi rencana kegiatan, target, dan timeline pelaksanaan berbagai program yang akan dilakukan oleh Karang Taruna dalam satu tahun berjalan.
                        </p>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <a href="{{ route('kegiatan.index') }}" class="inline-flex items-center gap-2 bg-gold/20 hover:bg-gold/30 text-gold px-4 py-3 rounded-lg transition-colors font-semibold">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Lihat Kegiatan
                        </a>
                        <a href="#" class="inline-flex items-center gap-2 text-gold hover:text-gold-light transition-colors font-semibold">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                            </svg>
                            Unduh
                        </a>
                    </div>
                </div>

                {{-- Section 3: Struktur Organisasi --}}
                <div class="bg-gradient-to-br from-navy/50 to-navy-dark border border-gold/10 rounded-2xl p-8">
                    <div class="flex items-start gap-4 mb-6">
                        <div class="w-12 h-12 bg-gold/20 rounded-xl flex items-center justify-center flex-shrink-0">
                            <span class="text-2xl">👥</span>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-white mb-2">Struktur Organisasi</h3>
                            <p class="text-white/60">Susunan pengurus dan pembagian bidang</p>
                        </div>
                    </div>
                    
                    <div class="space-y-3 mb-6">
                        <p class="text-white/80 leading-relaxed">
                            Struktur organisasi Karang Taruna terdiri atas pengurus inti dan 4 bidang utama dengan masing-masing koordinator dan anggota aktif.
                        </p>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <a href="{{ route('anggota.index') }}" class="inline-flex items-center gap-2 bg-gold/20 hover:bg-gold/30 text-gold px-4 py-3 rounded-lg transition-colors font-semibold">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Lihat Struktur
                        </a>
                        <a href="#" class="inline-flex items-center gap-2 text-gold hover:text-gold-light transition-colors font-semibold">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                            </svg>
                            Unduh Bagan
                        </a>
                    </div>
                </div>

                {{-- Section 4: Panduan & Prosedur --}}
                <div class="bg-gradient-to-br from-navy/50 to-navy-dark border border-gold/10 rounded-2xl p-8">
                    <div class="flex items-start gap-4 mb-6">
                        <div class="w-12 h-12 bg-gold/20 rounded-xl flex items-center justify-center flex-shrink-0">
                            <span class="text-2xl">📖</span>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-white mb-2">Panduan & Prosedur</h3>
                            <p class="text-white/60">Panduan teknis dan prosedur kegiatan</p>
                        </div>
                    </div>
                    
                    <ul class="space-y-3">
                        <li class="flex items-start gap-3">
                            <span class="text-gold flex-shrink-0 mt-1">→</span>
                            <span class="text-white/80">Panduan Pendaftaran Anggota Baru</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="text-gold flex-shrink-0 mt-1">→</span>
                            <span class="text-white/80">Prosedur Rapat Rutin</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="text-gold flex-shrink-0 mt-1">→</span>
                            <span class="text-white/80">Tata Tertib Kegiatan</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="text-gold flex-shrink-0 mt-1">→</span>
                            <span class="text-white/80">Panduan Penggunaan Sarana & Prasarana</span>
                        </li>
                    </ul>
                </div>

            </div>

            {{-- Right Sidebar --}}
            <div class="lg:col-span-1">
                {{-- Quick Links --}}
                <div class="bg-gradient-to-br from-gold/10 to-gold/5 border border-gold/20 rounded-2xl p-6 sticky top-20">
                    <h4 class="text-lg font-bold text-white mb-4">📚 Akses Cepat</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ route('tentang') }}" class="block text-gold hover:text-gold-light transition-colors text-sm font-semibold">Tentang Kami</a></li>
                        <li><a href="{{ route('anggota.index') }}" class="block text-gold hover:text-gold-light transition-colors text-sm font-semibold">Struktur Organisasi</a></li>
                        <li><a href="{{ route('kegiatan.index') }}" class="block text-gold hover:text-gold-light transition-colors text-sm font-semibold">Kegiatan</a></li>
                        <li><a href="{{ route('pengumuman.index') }}" class="block text-gold hover:text-gold-light transition-colors text-sm font-semibold">Pengumuman</a></li>
                        <li><a href="{{ route('faq') }}" class="block text-gold hover:text-gold-light transition-colors text-sm font-semibold">FAQ</a></li>
                        <li><a href="{{ route('kontak') }}" class="block text-gold hover:text-gold-light transition-colors text-sm font-semibold">Hubungi Kami</a></li>
                    </ul>
                </div>

                {{-- Info Box --}}
                <div class="mt-6 bg-gradient-to-br from-navy/50 to-navy-dark border border-gold/10 rounded-2xl p-6">
                    <h4 class="text-lg font-bold text-white mb-4">💬 Pertanyaan?</h4>
                    <p class="text-white/70 text-sm mb-4">
                        Jika tidak menemukan dokumen yang Anda cari, silakan hubungi kami.
                    </p>
                    <a href="{{ route('kontak') }}" class="block w-full text-center bg-gold/20 hover:bg-gold/30 text-gold font-semibold py-2 rounded-lg transition-colors text-sm">
                        Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
