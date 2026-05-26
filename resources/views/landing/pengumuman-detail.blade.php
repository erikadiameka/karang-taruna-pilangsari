@extends('layouts.app')
@section('title', $pengumuman->judul . ' — Karang Taruna Desa Pilangsari')

@section('content')

{{-- BREADCRUMB --}}
<section class="bg-navy-dark pt-24 pb-8 border-b border-gold/10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center gap-2 text-white/60 text-sm">
            <a href="{{ route('beranda') }}" class="hover:text-gold transition-colors">Beranda</a>
            <span>/</span>
            <a href="{{ route('pengumuman.index') }}" class="hover:text-gold transition-colors">Pengumuman</a>
            <span>/</span>
            <span class="text-white">{{ Str::limit($pengumuman->judul, 50) }}</span>
        </div>
    </div>
</section>

{{-- CONTENT --}}
<section class="py-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-gradient-to-br from-navy/50 to-navy-dark border border-gold/10 rounded-2xl p-8 md:p-12">
            {{-- Header --}}
            <div class="mb-8">
                <div class="flex items-center gap-3 mb-4">
                    @if($pengumuman->prioritas === 'tinggi')
                        <span class="inline-block bg-red-500/20 text-red-400 text-sm font-bold px-4 py-2 rounded-full">⚠️ PENTING</span>
                    @elseif($pengumuman->prioritas === 'sedang')
                        <span class="inline-block bg-yellow-500/20 text-yellow-400 text-sm font-bold px-4 py-2 rounded-full">📢 PENTING</span>
                    @else
                        <span class="inline-block bg-blue-500/20 text-blue-400 text-sm font-bold px-4 py-2 rounded-full">ℹ️ INFO</span>
                    @endif
                </div>
                
                <h1 class="text-3xl md:text-4xl lg:text-5xl font-black text-white mb-6 leading-tight">
                    {{ $pengumuman->judul }}
                </h1>

                {{-- Meta Info --}}
                <div class="flex flex-wrap items-center gap-6 text-sm text-white/60 pb-6 border-b border-white/10">
                    <div class="flex items-center gap-2">
                        <span class="text-lg">📅</span>
                        <span>{{ $pengumuman->created_at->format('d MMMM Y', locale: 'id') }}</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="text-lg">🕐</span>
                        <span>{{ $pengumuman->created_at->format('H:i') }} WIB</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="text-lg">✍️</span>
                        <span>{{ $pengumuman->user->name ?? 'Admin' }}</span>
                    </div>
                    @if($pengumuman->expired_at)
                    <div class="flex items-center gap-2">
                        <span class="text-lg">⏰</span>
                        <span>Berlaku hingga {{ $pengumuman->expired_at->format('d M Y') }}</span>
                    </div>
                    @endif
                </div>
            </div>

            {{-- Body --}}
            <div class="prose prose-invert max-w-none mb-8">
                <div class="text-white/80 leading-relaxed whitespace-pre-line">
                    {!! nl2br(e($pengumuman->isi)) !!}
                </div>
            </div>

            {{-- Footer --}}
            <div class="border-t border-white/10 pt-6 flex items-center justify-between">
                <div>
                    <p class="text-white/60 text-sm">Terakhir diperbarui: {{ $pengumuman->updated_at->format('d M Y H:i') }} WIB</p>
                </div>
                <a href="{{ route('pengumuman.index') }}" class="inline-flex items-center gap-2 text-gold hover:text-gold-light transition-colors font-semibold">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Kembali ke Pengumuman
                </a>
            </div>
        </div>

        {{-- Related --}}
        <div class="mt-16">
            <h3 class="text-2xl font-bold text-white mb-6">Pengumuman Lainnya</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @php
                    $related = \App\Models\Pengumuman::where('is_active', true)
                        ->where('id', '!=', $pengumuman->id)
                        ->orderBy('created_at', 'desc')
                        ->limit(2)
                        ->get();
                @endphp
                
                @forelse($related as $item)
                <a href="{{ route('pengumuman.show', $item->id) }}" class="bg-gradient-to-br from-navy/50 to-navy-dark border border-gold/10 rounded-xl p-6 hover:border-gold/30 transition-all duration-300">
                    <h4 class="text-lg font-bold text-white mb-2">{{ $item->judul }}</h4>
                    <p class="text-white/60 text-sm mb-4">{{ Str::limit($item->isi, 100) }}</p>
                    <span class="inline-flex items-center gap-1 text-gold text-sm font-semibold">
                        Baca Selengkapnya
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M12 5l7 7-7 7" />
                        </svg>
                    </span>
                </a>
                @empty
                <p class="text-white/60 col-span-2">Tidak ada pengumuman lainnya.</p>
                @endforelse
            </div>
        </div>
    </div>
</section>

@endsection
