@extends('layouts.app')
@section('title', 'Kegiatan — Karang Taruna Desa Pilangsari')

@section('content')
<div class="min-h-screen bg-gray-50 pt-32 pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="text-center mb-12" data-aos="fade-up">
            <div class="section-badge mb-4">
                <span class="w-1.5 h-1.5 bg-gold rounded-full"></span>
                Program Kami
            </div>
            <h1 class="text-4xl font-black text-navy-dark">
                Kegiatan <span class="text-gold">Karang Taruna</span>
            </h1>
            <p class="text-gray-500 mt-3 max-w-xl mx-auto text-sm">
                Berbagai kegiatan positif yang kami laksanakan untuk kemajuan masyarakat Desa Pilangsari.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($kegiatan as $k)
            <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 border border-gray-100"
                data-aos="fade-up">
                @if($k->thumbnail)
                <img src="{{ Storage::url($k->thumbnail) }}" alt="{{ $k->nama }}" class="w-full h-48 object-cover">
                @else
                <div class="w-full h-48 bg-navy-light flex items-center justify-center">
                    <span class="text-5xl">📅</span>
                </div>
                @endif
                <div class="p-5">
                    <div class="flex items-center justify-between mb-3">
                        <span class="text-xs font-semibold px-3 py-1 rounded-full bg-gold/10 text-gold">
                            {{ $k->kategori }}
                        </span>
                        <span class="text-xs px-2 py-1 rounded-full
                            {{ $k->status === 'akan_datang' ? 'bg-yellow-50 text-yellow-600' :
                               ($k->status === 'berlangsung' ? 'bg-blue-50 text-blue-600' :
                               'bg-green-50 text-green-600') }}">
                            {{ str_replace('_', ' ', $k->status) }}
                        </span>
                    </div>
                    <h3 class="font-bold text-navy-dark text-lg leading-snug">{{ $k->nama }}</h3>
                    <p class="text-gray-400 text-sm mt-2 line-clamp-2">{{ $k->deskripsi }}</p>
                    <div class="mt-4 pt-4 border-t border-gray-100 space-y-1.5">
                        <div class="flex items-center gap-2 text-gray-400 text-xs">
                            <span>📅</span>
                            <span>{{ $k->tanggal_mulai->format('d M Y, H.i') }} WIB</span>
                        </div>
                        <div class="flex items-center gap-2 text-gray-400 text-xs">
                            <span>📍</span>
                            <span>{{ $k->lokasi }}</span>
                        </div>
                    </div>
                    <a href="{{ route('kegiatan.show', $k->slug) }}"
                        class="mt-4 w-full flex items-center justify-center gap-2 bg-navy-dark hover:bg-navy text-white text-sm font-semibold py-2.5 rounded-xl transition-all duration-300">
                        Lihat Detail →
                    </a>
                </div>
            </div>
            @empty
            <div class="col-span-3 text-center py-20">
                <p class="text-5xl mb-4">📅</p>
                <p class="text-gray-400 text-lg">Belum ada kegiatan.</p>
            </div>
            @endforelse
        </div>

        <div class="mt-10">{{ $kegiatan->links() }}</div>

        <div class="text-center mt-8">
            <a href="{{ route('beranda') }}" class="btn-gold">← Kembali ke Beranda</a>
        </div>
    </div>
</div>
@endsection