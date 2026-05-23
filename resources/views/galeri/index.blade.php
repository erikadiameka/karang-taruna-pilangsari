@extends('layouts.app')
@section('title', 'Galeri — Karang Taruna Desa Pilangsari')

@section('content')
<div class="min-h-screen bg-gray-50 pt-32 pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="text-center mb-12" data-aos="fade-up">
            <div class="section-badge mb-4">
                <span class="w-1.5 h-1.5 bg-gold rounded-full"></span>
                Dokumentasi
            </div>
            <h1 class="text-4xl font-black text-navy-dark">
                Galeri <span class="text-gold">Kegiatan</span>
            </h1>
            <p class="text-gray-500 mt-3 text-sm">Dokumentasi foto kegiatan Karang Taruna Desa Pilangsari.</p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @forelse($galeri as $g)
            <div class="rounded-2xl overflow-hidden group cursor-pointer aspect-square shadow-sm hover:shadow-xl transition-all duration-300"
                data-aos="fade-up">
                <img src="{{ Storage::url($g->file_path) }}" alt="{{ $g->judul }}"
                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-400">
            </div>
            @empty
            <div class="col-span-4 text-center py-20">
                <p class="text-5xl mb-4">🖼️</p>
                <p class="text-gray-400 text-lg">Belum ada foto.</p>
            </div>
            @endforelse
        </div>

        <div class="mt-10">{{ $galeri->links() }}</div>

        <div class="text-center mt-8">
            <a href="{{ route('beranda') }}" class="btn-gold">← Kembali ke Beranda</a>
        </div>
    </div>
</div>
@endsection