@extends('layouts.app')
@section('title', 'Berita — Karang Taruna Desa Pilangsari')

@section('content')
<div class="min-h-screen bg-gray-50 pt-32 pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="text-center mb-12" data-aos="fade-up">
            <div class="section-badge mb-4">
                <span class="w-1.5 h-1.5 bg-gold rounded-full"></span>
                Informasi Terkini
            </div>
            <h1 class="text-4xl font-black text-navy-dark">
                Berita <span class="text-gold">Terbaru</span>
            </h1>
            <p class="text-gray-500 mt-3 max-w-xl mx-auto text-sm">
                Informasi terkini seputar kegiatan dan program Karang Taruna Desa Pilangsari.
            </p>
        </div>

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
                <p class="text-gray-400 text-lg">Belum ada berita.</p>
            </div>
            @endforelse
        </div>

        <div class="mt-10">{{ $berita->links() }}</div>

        <div class="text-center mt-8">
            <a href="{{ route('beranda') }}" class="btn-gold">← Kembali ke Beranda</a>
        </div>
    </div>
</div>
@endsection