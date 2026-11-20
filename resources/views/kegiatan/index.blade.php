@extends('layouts.app')
@section('title', 'Kegiatan — Karang Taruna IKAPPI Desa Pilangsari')

@section('content')

{{-- Header Section --}}
<section class="bg-navy-dark pt-32 pb-16 border-b border-gold/10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="inline-flex items-center gap-2 bg-gold/10 border border-gold/40 text-gold text-sm font-medium px-4 py-2 rounded-full mb-6">
            <span class="w-2 h-2 bg-gold rounded-full animate-pulse"></span>
            Agenda & Aktivitas
        </div>
        <h1 class="text-4xl md:text-5xl font-black text-white mb-3">Kegiatan <span class="text-gold">Kami</span></h1>
        <p class="text-white/60 text-lg max-w-2xl mx-auto">Dokumentasi dan rencana kegiatan Karang Taruna IKAPPI Desa Pilangsari.</p>
    </div>
</section>

{{-- Konten Kegiatan --}}
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($kegiatan as $k)
            <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 border border-gray-100 group">
                @if($k->thumbnail)
                <div class="relative h-48 overflow-hidden">
                    <img src="{{ Storage::url($k->thumbnail) }}" alt="{{ $k->nama }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute top-3 right-3 bg-gold text-navy-dark text-[10px] font-black uppercase px-3 py-1.5 rounded-lg tracking-widest shadow-lg">
                        {{ str_replace('_', ' ', $k->status) }}
                    </div>
                </div>
                @else
                <div class="h-48 bg-navy-light flex items-center justify-center text-white/50">
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
                @endif

                <div class="p-6">
                    <div class="text-gray-500 text-xs font-bold mb-2 flex items-center gap-2">
                        <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        {{ $k->tanggal_mulai->format('d M Y') }}
                    </div>
                    <h3 class="font-bold text-navy-dark text-lg mb-2">{{ $k->nama }}</h3>
                    <p class="text-gray-500 text-sm leading-relaxed line-clamp-3 mb-4">
                        {{ $k->deskripsi }}
                    </p>
                    <div class="flex items-center justify-between mt-4 border-t border-gray-100 pt-4">
                        <div class="text-gray-400 text-xs flex items-center gap-1">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            </svg>
                            {{ $k->lokasi }}
                        </div>
                        <a href="{{ route('kegiatan.show', $k->slug) }}" class="text-gold text-sm font-bold hover:text-gold-light transition-colors flex items-center gap-1">
                            Detail <span aria-hidden="true">→</span>
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full py-20 text-center bg-white rounded-2xl border border-gray-100">
                <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                <p class="text-gray-500">Belum ada agenda kegiatan yang dipublikasikan.</p>
            </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        <div class="mt-12">
            {{ $kegiatan->links() }}
        </div>

        <div class="mt-10 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-5 rounded-2xl border border-gray-200 bg-white p-5 sm:p-6 shadow-sm" data-aos="fade-up">
            <div class="flex items-start gap-4">
                <div class="flex h-11 w-11 flex-shrink-0 items-center justify-center rounded-xl bg-gold/10 text-gold">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8">
                        <rect x="3" y="3" width="18" height="18" rx="5" />
                        <circle cx="12" cy="12" r="4" />
                        <circle cx="17.5" cy="6.5" r="1" fill="currentColor" stroke="none" />
                    </svg>
                </div>
                <div>
                    <h2 class="font-bold text-navy-dark">Ikuti kegiatan IKAPPI</h2>
                    <p class="mt-1 text-sm leading-relaxed text-gray-500">Lihat dokumentasi kegiatan lainnya dan informasi terbaru di Instagram resmi kami.</p>
                </div>
            </div>
            <a href="https://www.instagram.com/ikappi_pilangsari" target="_blank" rel="noopener noreferrer"
                class="inline-flex flex-shrink-0 items-center justify-center gap-2 rounded-xl bg-navy-dark px-4 py-2.5 text-sm font-semibold text-white transition-colors hover:bg-navy">
                Kunjungi Instagram
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M7 17L17 7M7 7h10v10" />
                </svg>
            </a>
        </div>

        {{-- 👇 TOMBOL KEMBALI KE BERANDA 👇 --}}
        <div class="mt-16 text-center hidden">
            <a href="{{ route('beranda') }}" class="inline-flex items-center gap-2 bg-navy-dark hover:bg-navy text-white font-bold py-3 px-8 rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl hover:-translate-y-1">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
                Kembali ke Beranda
            </a>
        </div>

    </div>
</section>

@endsection