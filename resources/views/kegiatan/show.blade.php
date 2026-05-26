@extends('layouts.app')
@section('title', $kegiatan->nama)

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

        <div class="bg-white rounded-3xl overflow-hidden shadow-sm" data-aos="fade-up">

            {{-- Thumbnail --}}
            @if($kegiatan->thumbnail)
            <div class="aspect-video overflow-hidden">
                <img src="{{ Storage::url($kegiatan->thumbnail) }}" alt="{{ $kegiatan->nama }}"
                     class="w-full h-full object-cover">
            </div>
            @else
            <div class="aspect-video bg-gradient-to-br from-navy-dark to-navy flex items-center justify-center">
                <span class="text-8xl">📅</span>
            </div>
            @endif

            <div class="p-8 md:p-12">

                {{-- Badge Status & Kategori --}}
                <div class="flex items-center gap-3 mb-5 flex-wrap">
                    <span class="bg-gold/10 text-gold text-xs font-semibold px-3 py-1.5 rounded-full">
                        {{ $kegiatan->kategori }}
                    </span>
                    <span class="text-xs px-3 py-1.5 rounded-full font-semibold
                        {{ $kegiatan->status === 'akan_datang' ? 'bg-yellow-50 text-yellow-600' :
                           ($kegiatan->status === 'berlangsung' ? 'bg-blue-50 text-blue-600' :
                           'bg-green-50 text-green-600') }}">
                        {{ str_replace('_', ' ', $kegiatan->status) }}
                    </span>
                </div>

                {{-- Judul --}}
                <h1 class="text-3xl md:text-4xl font-black text-navy-dark leading-tight mb-6">
                    {{ $kegiatan->nama }}
                </h1>

                {{-- Info Cards --}}
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
                    <div class="bg-gray-50 rounded-2xl p-4 text-center">
                        <div class="text-2xl mb-2">📅</div>
                        <div class="text-xs text-gray-400 mb-1">Tanggal Mulai</div>
                        <div class="font-bold text-navy-dark text-sm">{{ $kegiatan->tanggal_mulai->format('d M Y') }}</div>
                        <div class="text-xs text-gray-400">{{ $kegiatan->tanggal_mulai->format('H:i') }} WIB</div>
                    </div>
                    @if($kegiatan->tanggal_selesai)
                    <div class="bg-gray-50 rounded-2xl p-4 text-center">
                        <div class="text-2xl mb-2">🏁</div>
                        <div class="text-xs text-gray-400 mb-1">Tanggal Selesai</div>
                        <div class="font-bold text-navy-dark text-sm">{{ $kegiatan->tanggal_selesai->format('d M Y') }}</div>
                        <div class="text-xs text-gray-400">{{ $kegiatan->tanggal_selesai->format('H:i') }} WIB</div>
                    </div>
                    @endif
                    <div class="bg-gray-50 rounded-2xl p-4 text-center">
                        <div class="text-2xl mb-2">📍</div>
                        <div class="text-xs text-gray-400 mb-1">Lokasi</div>
                        <div class="font-bold text-navy-dark text-sm">{{ $kegiatan->lokasi }}</div>
                    </div>
                    <div class="bg-gray-50 rounded-2xl p-4 text-center">
                        <div class="text-2xl mb-2">👥</div>
                        <div class="text-xs text-gray-400 mb-1">Peserta</div>
                        <div class="font-bold text-navy-dark text-sm">{{ $kegiatan->peserta }} Orang</div>
                    </div>
                </div>

                {{-- Deskripsi --}}
                <div class="prose prose-lg max-w-none text-gray-600 leading-relaxed">
                    {!! nl2br(e($kegiatan->deskripsi)) !!}
                </div>

                {{-- Share --}}
                <div class="mt-12 pt-8 border-t border-gray-100">
                    <p class="text-sm font-semibold text-navy-dark mb-4">Bagikan kegiatan ini:</p>
                    <div class="flex gap-3 flex-wrap">
                        <a href="https://wa.me/?text={{ urlencode($kegiatan->nama . ' - ' . request()->url()) }}"
                           target="_blank"
                           class="flex items-center gap-2 bg-green-500 hover:bg-green-600 text-white text-sm font-semibold px-4 py-2.5 rounded-xl transition-all duration-300 hover:scale-105">
                            📱 WhatsApp
                        </a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}"
                           target="_blank"
                           class="flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold px-4 py-2.5 rounded-xl transition-all duration-300 hover:scale-105">
                            📘 Facebook
                        </a>
                        <button onclick="navigator.clipboard.writeText('{{ request()->url() }}'); alert('Link berhasil disalin!')"
                                class="flex items-center gap-2 bg-gray-100 hover:bg-gray-200 text-navy-dark text-sm font-semibold px-4 py-2.5 rounded-xl transition-all duration-300">
                            🔗 Salin Link
                        </button>
                    </div>
                </div>

            </div>
        </div>

        {{-- Tombol Kembali --}}
        <div class="mt-8 flex justify-between items-center">
            <a href="{{ route('kegiatan.index') }}"
               class="flex items-center gap-2 text-navy-dark hover:text-gold font-semibold text-sm transition-colors">
                ← Kembali ke Kegiatan
            </a>
            <a href="{{ route('beranda') }}"
               class="flex items-center gap-2 text-navy-dark hover:text-gold font-semibold text-sm transition-colors">
                🏠 Beranda
            </a>
        </div>

    </div>
</div>
@endsection