@extends('layouts.app')
@section('title', 'Berita — Karang Taruna Desa Pilangsari')

@section('content')
<div class="min-h-screen bg-gray-50 pt-28 pb-20">
    <a href="{{ route('beranda') }}" class="btn-gold md:hidden fixed top-4 left-4 z-50 px-3 py-2 rounded-full shadow">← Beranda</a>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Header --}}
        <div class="text-center mb-10" data-aos="fade-up">
            <div class="section-badge mb-4">
                <span class="w-1.5 h-1.5 bg-gold rounded-full"></span>
                Informasi Terkini
            </div>
            <h1 class="text-4xl font-black text-navy-dark">
                Berita <span class="text-gold">Terbaru</span>
            </h1>
        </div>

        {{-- Search & Filter --}}
        <form method="GET" action="{{ route('berita.index') }}"
            class="bg-white rounded-2xl p-4 shadow-sm border border-gray-100 mb-8 flex gap-3 flex-wrap"
            data-aos="fade-up">
            <div class="flex-1 min-w-[200px]">
                <input type="text" name="search" value="{{ request('search') }}"
                    placeholder="🔍 Cari berita..."
                    class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-gold/50 focus:ring-1 focus:ring-gold/20">
            </div>
            <div>
                <select name="kategori"
                    class="border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-gold/50 bg-white">
                    <option value="">Semua Kategori</option>
                    @foreach($kategori as $k)
                    <option value="{{ $k->id }}" {{ request('kategori') == $k->id ? 'selected' : '' }}>
                        {{ $k->nama }}
                    </option>
                    @endforeach
                </select>
            </div>
            <button type="submit"
                class="bg-navy-dark hover:bg-navy text-white font-semibold text-sm px-6 py-2.5 rounded-xl transition-all">
                Cari
            </button>
            @if(request('search') || request('kategori'))
            <a href="{{ route('berita.index') }}"
                class="bg-gray-100 hover:bg-gray-200 text-navy-dark font-semibold text-sm px-4 py-2.5 rounded-xl transition-all">
                Reset
            </a>
            @endif
        </form>

        {{-- Hasil Pencarian --}}
        @if(request('search'))
        <p class="text-gray-500 text-sm mb-6">
            Hasil pencarian untuk <span class="font-semibold text-navy-dark">"{{ request('search') }}"</span>
            — {{ $berita->total() }} berita ditemukan
        </p>
        @endif

        {{-- Grid Berita --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($berita as $b)
            <a href="{{ route('berita.show', $b->slug) }}"
                class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 border border-gray-100 block"
                data-aos="fade-up">
                @if($b->thumbnail)
                <img src="{{ Storage::url($b->thumbnail) }}" alt="{{ $b->judul }}" class="w-full h-48 object-cover">
                @else
                <div class="w-full h-48 bg-navy-light flex items-center justify-center">
                    <span class="text-5xl">📰</span>
                </div>
                @endif
                <div class="p-5">
                    <span class="text-xs font-semibold px-3 py-1 rounded-full bg-gold/10 text-gold">
                        {{ $b->kategori->nama ?? 'Umum' }}
                    </span>
                    <h3 class="font-bold text-navy-dark text-lg mt-3 leading-snug line-clamp-2">{{ $b->judul }}</h3>
                    <p class="text-gray-400 text-sm mt-2 line-clamp-2">{{ $b->ringkasan }}</p>
                    <div class="mt-4 pt-4 border-t border-gray-100 flex items-center justify-between">
                        <span class="text-gray-400 text-xs">{{ $b->published_at?->format('d M Y') }}</span>
                        <span class="text-gold text-xs font-semibold">Baca →</span>
                    </div>
                </div>
            </a>
            @empty
            <div class="col-span-3 text-center py-20">
                <p class="text-5xl mb-4">📰</p>
                <p class="text-gray-400 text-lg">
                    {{ request('search') ? 'Berita tidak ditemukan.' : 'Belum ada berita.' }}
                </p>
                @if(request('search'))
                <a href="{{ route('berita.index') }}" class="btn-gold mt-4 inline-flex">Reset Pencarian</a>
                @endif
            </div>
            @endforelse
        </div>

        <div class="mt-10">{{ $berita->links() }}</div>

        <div class="text-center mt-8">
            <a href="{{ route('beranda') }}" class="btn-gold hidden md:inline-flex">← Kembali ke Beranda</a>
        </div>
    </div>
</div>
@endsection