@extends('layouts.app')
@section('title', $berita->judul)

@section('content')
<div class="min-h-screen bg-gray-50 pt-28 pb-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Breadcrumb --}}
        <div class="flex items-center gap-2 text-sm text-gray-400 mb-8" data-aos="fade-up">
            <a href="{{ route('beranda') }}" class="hover:text-gold transition-colors">Beranda</a>
            <span>/</span>
            <a href="{{ route('berita.index') }}" class="hover:text-gold transition-colors">Berita</a>
            <span>/</span>
            <span class="text-navy-dark font-medium truncate">{{ Str::limit($berita->judul, 40) }}</span>
        </div>

        <div class="bg-white rounded-3xl overflow-hidden shadow-sm" data-aos="fade-up">

            {{-- Thumbnail --}}
            @if($berita->thumbnail)
            <div class="aspect-video overflow-hidden">
                <img src="{{ Storage::url($berita->thumbnail) }}" alt="{{ $berita->judul }}"
                    class="w-full h-full object-cover">
            </div>
            @endif

            <div class="p-8 md:p-12">

                {{-- Kategori & Meta --}}
                <div class="flex items-center gap-3 mb-5 flex-wrap">
                    <span class="bg-gold/10 text-gold text-xs font-semibold px-3 py-1.5 rounded-full">
                        {{ $berita->kategori->nama ?? 'Umum' }}
                    </span>
                    <span class="text-gray-400 text-xs flex items-center gap-1">
                        📅 {{ $berita->published_at?->format('d F Y') }}
                    </span>
                    <span class="text-gray-400 text-xs flex items-center gap-1">
                        ✍️ {{ $berita->penulis->name ?? 'Admin' }}
                    </span>
                    <span class="text-gray-400 text-xs flex items-center gap-1">
                        👁️ {{ $berita->views }} kali dilihat
                    </span>
                </div>

                {{-- Judul --}}
                <h1 class="text-3xl md:text-4xl font-black text-navy-dark leading-tight mb-6">
                    {{ $berita->judul }}
                </h1>

                {{-- Ringkasan --}}
                @if($berita->ringkasan)
                <div class="bg-navy-dark/5 border-l-4 border-gold rounded-r-xl p-5 mb-8">
                    <p class="text-gray-600 text-sm leading-relaxed italic">{{ $berita->ringkasan }}</p>
                </div>
                @endif

                {{-- Konten --}}
                <div class="prose prose-lg max-w-none text-gray-600 leading-relaxed">
                    {!! nl2br(e($berita->konten)) !!}
                </div>

                {{-- Share --}}
                <div class="mt-12 pt-8 border-t border-gray-100">
                    <p class="text-sm font-semibold text-navy-dark mb-4">Bagikan artikel ini:</p>
                    <div class="flex gap-3 flex-wrap">
                        <a href="https://wa.me/?text={{ urlencode($berita->judul . ' - ' . request()->url()) }}"
                            target="_blank"
                            class="flex items-center gap-2 bg-green-500 hover:bg-green-600 text-white text-sm font-semibold px-4 py-2.5 rounded-xl transition-all duration-300 hover:scale-105">
                            📱 WhatsApp
                        </a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}"
                            target="_blank"
                            class="flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold px-4 py-2.5 rounded-xl transition-all duration-300 hover:scale-105">
                            📘 Facebook
                        </a>
                        <a href="https://twitter.com/intent/tweet?text={{ urlencode($berita->judul) }}&url={{ urlencode(request()->url()) }}"
                            target="_blank"
                            class="flex items-center gap-2 bg-sky-500 hover:bg-sky-600 text-white text-sm font-semibold px-4 py-2.5 rounded-xl transition-all duration-300 hover:scale-105">
                            🐦 Twitter
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
            <a href="{{ route('berita.index') }}"
                class="flex items-center gap-2 text-navy-dark hover:text-gold font-semibold text-sm transition-colors">
                ← Kembali ke Berita
            </a>
            <a href="{{ route('beranda') }}"
                class="flex items-center gap-2 text-navy-dark hover:text-gold font-semibold text-sm transition-colors">
                🏠 Beranda
            </a>
        </div>

    </div>
</div>
@endsection