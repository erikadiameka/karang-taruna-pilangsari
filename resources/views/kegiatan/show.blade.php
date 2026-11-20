@extends('layouts.app')
@section('title', $kegiatan->nama . ' — Karang Taruna IKAPPI Desa Pilangsari')

@section('content')
<div class="min-h-screen bg-gray-50 pt-28 pb-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Breadcrumb --}}
        <div class="flex items-center gap-2 text-sm text-gray-400 mb-8" data-aos="fade-up">
            <a href="{{ route('beranda') }}" class="hover:text-gold transition-colors">Beranda</a>
            <span>/</span>
            <a href="{{ route('kegiatan.index') }}" class="hover:text-gold transition-colors">Kegiatan</a>
            <span>/</span>
            <span class="text-navy-dark font-medium truncate">{{ Str::limit($kegiatan->nama, 40) }}</span>
        </div>

        <div class="bg-white rounded-3xl overflow-hidden shadow-sm border border-gray-100" data-aos="fade-up">

            {{-- Thumbnail --}}
            @if($kegiatan->thumbnail)
            <div class="aspect-video overflow-hidden">
                <img src="{{ Storage::url($kegiatan->thumbnail) }}" alt="{{ $kegiatan->nama }}"
                    class="w-full h-full object-cover">
            </div>
            @else
            <div class="aspect-video bg-gradient-to-br from-navy-dark to-navy flex items-center justify-center">
                <svg class="w-24 h-24 text-white/20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
            </div>
            @endif

            <div class="p-8 md:p-12">

                {{-- Badge Status & Kategori --}}
                <div class="flex items-center gap-3 mb-5 flex-wrap">
                    <span class="bg-gold/10 text-gold text-xs font-semibold px-3 py-1.5 rounded-full uppercase tracking-wider">
                        {{ $kegiatan->kategori }}
                    </span>
                    <span class="text-xs px-3 py-1.5 rounded-full font-semibold uppercase tracking-wider
                        {{ $kegiatan->status === 'akan_datang' ? 'bg-yellow-50 text-yellow-600' :
                           ($kegiatan->status === 'berlangsung' ? 'bg-blue-50 text-blue-600' :
                           'bg-green-50 text-green-600') }}">
                        {{ str_replace('_', ' ', $kegiatan->status) }}
                    </span>
                </div>

                {{-- Judul --}}
                <h1 class="text-3xl md:text-4xl font-black text-navy-dark leading-tight mb-8">
                    {{ $kegiatan->nama }}
                </h1>

                {{-- Info Cards (Ikon SVG) --}}
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-10">

                    {{-- Tanggal Mulai --}}
                    <div class="bg-gray-50 rounded-2xl p-4 text-center border border-gray-100">
                        <div class="flex justify-center mb-2">
                            <svg class="w-6 h-6 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <div class="text-[10px] text-gray-400 uppercase tracking-wider font-bold mb-1">Tanggal Mulai</div>
                        <div class="font-bold text-navy-dark text-sm">{{ $kegiatan->tanggal_mulai->format('d M Y') }}</div>
                        <div class="text-xs text-gray-500">{{ $kegiatan->tanggal_mulai->format('H:i') }} WIB</div>
                    </div>

                    {{-- Tanggal Selesai --}}
                    @if($kegiatan->tanggal_selesai)
                    <div class="bg-gray-50 rounded-2xl p-4 text-center border border-gray-100">
                        <div class="flex justify-center mb-2">
                            <svg class="w-6 h-6 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div class="text-[10px] text-gray-400 uppercase tracking-wider font-bold mb-1">Selesai</div>
                        <div class="font-bold text-navy-dark text-sm">{{ $kegiatan->tanggal_selesai->format('d M Y') }}</div>
                        <div class="text-xs text-gray-500">{{ $kegiatan->tanggal_selesai->format('H:i') }} WIB</div>
                    </div>
                    @endif

                    {{-- Lokasi --}}
                    <div class="bg-gray-50 rounded-2xl p-4 text-center border border-gray-100">
                        <div class="flex justify-center mb-2">
                            <svg class="w-6 h-6 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <div class="text-[10px] text-gray-400 uppercase tracking-wider font-bold mb-1">Lokasi</div>
                        <div class="font-bold text-navy-dark text-sm leading-tight">{{ $kegiatan->lokasi }}</div>
                    </div>

                    {{-- Peserta --}}
                    <div class="bg-gray-50 rounded-2xl p-4 text-center border border-gray-100">
                        <div class="flex justify-center mb-2">
                            <svg class="w-6 h-6 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <div class="text-[10px] text-gray-400 uppercase tracking-wider font-bold mb-1">Peserta</div>
                        <div class="font-bold text-navy-dark text-sm">{{ $kegiatan->peserta ?? '0' }} Orang</div>
                    </div>
                </div>

                {{-- Deskripsi --}}
                <div class="prose prose-lg max-w-none text-gray-600 leading-relaxed">
                    {!! nl2br(e($kegiatan->deskripsi)) !!}
                </div>

                {{-- Share --}}
                <div class="mt-12 pt-8 border-t border-gray-100">
                    <p class="text-sm font-bold text-navy-dark mb-4">Bagikan kegiatan ini:</p>
                    <div class="flex gap-3 flex-wrap">
                        <a href="https://wa.me/?text={{ urlencode($kegiatan->nama . ' - ' . request()->url()) }}"
                            target="_blank"
                            class="flex items-center gap-2 bg-[#25D366] hover:bg-[#20bd5a] text-white text-sm font-bold px-5 py-2.5 rounded-xl transition-all duration-300 hover:scale-105">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
                            </svg>
                            WhatsApp
                        </a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}"
                            target="_blank"
                            class="flex items-center gap-2 bg-[#1877F2] hover:bg-[#166fe5] text-white text-sm font-bold px-5 py-2.5 rounded-xl transition-all duration-300 hover:scale-105">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.469h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.469h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                            </svg>
                            Facebook
                        </a>
                        <button onclick="navigator.clipboard.writeText('{{ request()->url() }}'); alert('Link berhasil disalin!')"
                            class="flex items-center gap-2 bg-gray-100 hover:bg-gray-200 text-navy-dark text-sm font-bold px-5 py-2.5 rounded-xl transition-all duration-300">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"></path>
                            </svg>
                            Salin Link
                        </button>
                    </div>
                </div>

            </div>
        </div>

        {{-- Tombol Kembali --}}
        <div class="mt-8 flex justify-between items-center">
            <a href="{{ route('kegiatan.index') }}"
                class="flex items-center gap-2 text-navy-dark hover:text-gold font-bold text-sm transition-colors">
                ← Kembali ke Kegiatan
            </a>
            <a href="{{ route('beranda') }}"
                class="flex items-center gap-2 text-navy-dark hover:text-gold font-bold text-sm transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
                Beranda
            </a>
        </div>

    </div>
</div>
@endsection