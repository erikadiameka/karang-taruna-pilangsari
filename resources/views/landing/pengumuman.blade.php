@extends('layouts.app')
@section('title', 'Pengumuman — Karang Taruna Desa Pilangsari')

@section('content')

{{-- HEADER --}}
<section class="bg-navy-dark pt-32 pb-16 border-b border-gold/10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="inline-flex items-center gap-2 bg-gold/10 border border-gold/40 text-gold text-sm font-medium px-4 py-2 rounded-full mb-6">
            <span class="w-2 h-2 bg-gold rounded-full"></span>
            Informasi Penting
        </div>
        <h1 class="text-4xl md:text-5xl font-black text-white mb-3">Pengumuman Terbaru</h1>
        <p class="text-white/60 text-lg">Ikuti informasi dan pengumuman penting dari Karang Taruna Desa Pilangsari</p>
    </div>
</section>

{{-- CONTENT --}}
<section class="py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($pengumumans->count() > 0)
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                {{-- Main Content --}}
                <div class="lg:col-span-2 space-y-6">
                    @foreach($pengumumans as $item)
                    <div class="bg-gradient-to-br from-navy/50 to-navy-dark border border-gold/10 rounded-2xl p-8 hover:border-gold/30 transition-all duration-300">
                        {{-- Header --}}
                        <div class="flex items-start justify-between gap-4 mb-4">
                            <div>
                                <div class="flex items-center gap-3 mb-2">
                                    @if($item->prioritas === 'tinggi')
                                        <span class="inline-block bg-red-500/20 text-red-400 text-xs font-bold px-3 py-1 rounded-full">⚠️ PENTING</span>
                                    @elseif($item->prioritas === 'sedang')
                                        <span class="inline-block bg-yellow-500/20 text-yellow-400 text-xs font-bold px-3 py-1 rounded-full">📢 PENTING</span>
                                    @else
                                        <span class="inline-block bg-blue-500/20 text-blue-400 text-xs font-bold px-3 py-1 rounded-full">ℹ️ INFO</span>
                                    @endif
                                </div>
                                <h3 class="text-xl md:text-2xl font-bold text-white">{{ $item->judul }}</h3>
                            </div>
                        </div>

                        {{-- Meta Info --}}
                        <div class="flex items-center gap-4 text-sm text-white/60 mb-5">
                            <span>📅 {{ $item->created_at->format('d M Y') }}</span>
                            <span>🕐 {{ $item->created_at->format('H:i') }} WIB</span>
                        </div>

                        {{-- Content --}}
                        <p class="text-white/80 leading-relaxed mb-6">
                            {{ Str::limit($item->isi, 300) }}
                        </p>

                        {{-- Action --}}
                        @if(strlen($item->isi) > 300)
                        <a href="{{ route('pengumuman.show', $item->id) }}" class="inline-flex items-center gap-2 text-gold hover:text-gold-light transition-colors font-semibold">
                            Baca Selengkapnya
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M12 5l7 7-7 7" />
                            </svg>
                        </a>
                        @endif
                    </div>
                    @endforeach

                    {{-- Pagination --}}
                    <div class="mt-8">
                        {{ $pengumumans->links() }}
                    </div>
                </div>

                {{-- Sidebar --}}
                <div class="lg:col-span-1">
                    {{-- Info Box --}}
                    <div class="bg-gradient-to-br from-gold/10 to-gold/5 border border-gold/20 rounded-2xl p-6 sticky top-20">
                        <h4 class="text-lg font-bold text-white mb-4">📌 Panduan</h4>
                        <ul class="space-y-3 text-sm text-white/70">
                            <li class="flex items-start gap-2">
                                <span class="text-gold flex-shrink-0">✓</span>
                                <span>Baca semua pengumuman dengan cermat</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-gold flex-shrink-0">✓</span>
                                <span>Pengumuman berlaku hingga tanggal yang ditentukan</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-gold flex-shrink-0">✓</span>
                                <span>Follow sosial media kami untuk update terbaru</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        @else
            <div class="text-center py-16">
                <div class="w-20 h-20 bg-gold/10 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-4xl">📭</span>
                </div>
                <h3 class="text-2xl font-bold text-white mb-2">Tidak Ada Pengumuman</h3>
                <p class="text-white/60 mb-8">Saat ini belum ada pengumuman. Silakan cek kembali nanti.</p>
                <a href="{{ route('beranda') }}" class="inline-flex items-center gap-2 bg-gold hover:bg-gold-light text-navy-dark font-bold px-6 py-3 rounded-xl transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali ke Beranda
                </a>
            </div>
        @endif
    </div>
</section>

@endsection
