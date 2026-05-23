@extends('layouts.app')
@section('title', 'Anggota — Karang Taruna Desa Pilangsari')

@section('content')
<div class="min-h-screen bg-gray-50 pt-32 pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="text-center mb-12" data-aos="fade-up">
            <div class="section-badge mb-4">
                <span class="w-1.5 h-1.5 bg-gold rounded-full"></span>
                Struktur Organisasi
            </div>
            <h1 class="text-4xl font-black text-navy-dark">
                Daftar <span class="text-gold">Anggota</span>
            </h1>
            <p class="text-gray-500 mt-3 text-sm">Anggota aktif Karang Taruna Desa Pilangsari</p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse($anggota as $a)
            <div class="bg-white rounded-2xl p-5 text-center shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 border border-gray-100"
                data-aos="fade-up">
                @if($a->foto)
                <img src="{{ Storage::url($a->foto) }}" alt="{{ $a->nama_lengkap }}"
                    class="w-20 h-20 rounded-full object-cover mx-auto mb-3 border-4 border-gold/20">
                @else
                <div class="w-20 h-20 rounded-full bg-navy-dark flex items-center justify-center mx-auto mb-3">
                    <span class="text-white text-2xl font-black">
                        {{ strtoupper(substr($a->nama_lengkap, 0, 1)) }}
                    </span>
                </div>
                @endif
                <h3 class="font-bold text-navy-dark text-sm">{{ $a->nama_lengkap }}</h3>
                <p class="text-gold text-xs mt-1 font-medium">{{ $a->jabatan ?? '-' }}</p>
                <p class="text-gray-400 text-xs mt-1">{{ $a->divisi ?? '-' }}</p>
                <span class="inline-block mt-2 text-xs px-2 py-1 rounded-full
                    {{ $a->status === 'aktif' ? 'bg-green-50 text-green-600' :
                       ($a->status === 'alumni' ? 'bg-blue-50 text-blue-600' :
                       'bg-red-50 text-red-600') }}">
                    {{ $a->status }}
                </span>
            </div>
            @empty
            <div class="col-span-4 text-center py-20">
                <p class="text-5xl mb-4">👥</p>
                <p class="text-gray-400 text-lg">Belum ada anggota.</p>
            </div>
            @endforelse
        </div>

        <div class="mt-10">{{ $anggota->links() }}</div>

        <div class="text-center mt-8">
            <a href="{{ route('beranda') }}" class="btn-gold">← Kembali ke Beranda</a>
        </div>
    </div>
</div>
@endsection