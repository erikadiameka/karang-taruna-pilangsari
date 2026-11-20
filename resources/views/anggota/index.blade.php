@extends('layouts.app')
@section('title', 'Struktur Organisasi & Anggota — Karang Taruna Desa Pilangsari')

@section('content')
<div class="min-h-screen bg-gray-50 pt-32 pb-20">
    {{-- TOMBOL MOBILE DIUBAH KE TENTANG --}}
    <a href="{{ route('tentang') }}" class="btn-gold md:hidden fixed top-4 left-4 z-50 px-3 py-2 rounded-full shadow">← Kembali ke Tentang</a>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Header Section --}}
        <div class="text-center mb-12" data-aos="fade-up">
            <div class="section-badge mb-4">
                <span class="w-1.5 h-1.5 bg-gold rounded-full"></span>
                Struktur Keanggotaan
            </div>
            <h1 class="text-4xl md:text-5xl font-black text-navy-dark">
                Struktur & <span class="text-gold">Anggota</span>
            </h1>
            <p class="text-gray-500 mt-3 text-sm max-w-md mx-auto">
                Mengenal lebih dekat kepengurusan dan anggota aktif Karang Taruna Desa Pilangsari.
            </p>
        </div>

        {{-- Tab Controller via Alpine.js --}}
        <div x-data="{ activeTab: '{{ $search ? 'daftar' : 'bagan' }}' }" class="w-full">

            {{-- Tab Buttons --}}
            <div class="flex justify-center gap-4 mb-12" data-aos="fade-up" data-aos-delay="100">
                <button @click="activeTab = 'bagan'"
                    :class="activeTab === 'bagan' ? 'bg-gold text-navy-dark shadow-lg scale-105' : 'bg-white text-navy-dark border border-gray-200 hover:bg-gray-100'"
                    class="px-6 py-3 rounded-xl font-bold text-sm transition-all duration-300 flex items-center gap-2">
                    Bagan Struktur
                </button>
                <button @click="activeTab = 'daftar'"
                    :class="activeTab === 'daftar' ? 'bg-gold text-navy-dark shadow-lg scale-105' : 'bg-white text-navy-dark border border-gray-200 hover:bg-gray-100'"
                    class="px-6 py-3 rounded-xl font-bold text-sm transition-all duration-300 flex items-center gap-2">
                    Daftar Anggota
                </button>
            </div>

            {{-- ================= TAB CONTENT 1: BAGAN STRUKTUR ================= --}}
            <div x-show="activeTab === 'bagan'"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform translate-y-4"
                x-transition:enter-end="opacity-100 transform translate-y-0"
                class="space-y-12">

                <div class="flex flex-col items-center">

                    {{-- 1. LEVEL KETUA --}}
                    @if($ketua)
                    <div class="flex flex-col items-center w-full" data-aos="zoom-in">
                        <div class="relative bg-white border-2 border-gold rounded-2xl p-5 shadow-lg w-full max-w-sm flex items-center gap-4">
                            @if($ketua->foto)
                            <img src="{{ Storage::url($ketua->foto) }}" alt="{{ $ketua->nama_lengkap }}" class="w-16 h-16 rounded-full object-cover border-2 border-gold flex-shrink-0">
                            @else
                            <div class="w-16 h-16 rounded-full bg-navy-dark flex items-center justify-center border-2 border-gold flex-shrink-0 text-white font-black text-xl">
                                {{ strtoupper(substr($ketua->nama_lengkap, 0, 2)) }}
                            </div>
                            @endif
                            <div class="text-left min-w-0">
                                <h4 class="font-extrabold text-navy-dark text-base md:text-lg truncate">{{ $ketua->nama_lengkap }}</h4>
                                <p class="text-gold text-xs font-bold uppercase tracking-wider mt-0.5">{{ $ketua->jabatan }}</p>
                            </div>
                        </div>
                        <div class="h-10 w-0.5 bg-gold/50"></div>
                    </div>
                    @endif

                    {{-- 2. LEVEL WAKIL KETUA --}}
                    @if($wakilKetua)
                    <div class="flex flex-col items-center w-full" data-aos="zoom-in" data-aos-delay="100">
                        <div class="relative bg-white border border-gold/60 rounded-2xl p-5 shadow-md w-full max-w-sm flex items-center gap-4">
                            @if($wakilKetua->foto)
                            <img src="{{ Storage::url($wakilKetua->foto) }}" alt="{{ $wakilKetua->nama_lengkap }}" class="w-14 h-14 rounded-full object-cover border-2 border-gold/40 flex-shrink-0">
                            @else
                            <div class="w-14 h-14 rounded-full bg-navy-dark flex items-center justify-center border-2 border-gold/40 flex-shrink-0 text-white font-bold text-lg">
                                {{ strtoupper(substr($wakilKetua->nama_lengkap, 0, 2)) }}
                            </div>
                            @endif
                            <div class="text-left min-w-0">
                                <h4 class="font-bold text-navy-dark text-sm md:text-base truncate">{{ $wakilKetua->nama_lengkap }}</h4>
                                <p class="text-gold text-xs font-semibold uppercase tracking-wider mt-0.5">{{ $wakilKetua->jabatan }}</p>
                            </div>
                        </div>
                        <div class="h-10 w-0.5 bg-gold/30"></div>
                    </div>
                    @endif

                    {{-- 3. LEVEL SEKRETARIS & BENDAHARA --}}
                    <div class="w-full max-w-4xl mx-auto" data-aos="fade-up" data-aos-delay="200">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 relative">
                            {{-- Kolom Sekretaris --}}
                            <div class="flex flex-col items-center gap-4 bg-gray-100/50 p-5 rounded-2xl border border-gray-200/50">
                                <h4 class="text-xs font-black uppercase tracking-widest text-gold mb-1">Sekretariat</h4>
                                @forelse($sekretaris as $s)
                                <div class="bg-white border border-gray-100 rounded-xl p-4 shadow-sm w-full flex items-center gap-3">
                                    @if($s->foto)
                                    <img src="{{ Storage::url($s->foto) }}" alt="{{ $s->nama_lengkap }}" class="w-11 h-11 rounded-full object-cover border border-gold/30 flex-shrink-0">
                                    @else
                                    <div class="w-11 h-11 rounded-full bg-navy/10 flex items-center justify-center border border-gold/30 flex-shrink-0 text-navy font-bold text-sm">
                                        {{ strtoupper(substr($s->nama_lengkap, 0, 2)) }}
                                    </div>
                                    @endif
                                    <div class="text-left min-w-0">
                                        <h5 class="font-bold text-navy-dark text-sm truncate">{{ $s->nama_lengkap }}</h5>
                                        <p class="text-gold text-[10px] font-semibold uppercase mt-0.5">{{ $s->jabatan }}</p>
                                    </div>
                                </div>
                                @empty
                                <p class="text-xs text-gray-400 italic">Belum ditentukan</p>
                                @endforelse
                            </div>

                            {{-- Kolom Bendahara --}}
                            <div class="flex flex-col items-center gap-4 bg-gray-100/50 p-5 rounded-2xl border border-gray-200/50">
                                <h4 class="text-xs font-black uppercase tracking-widest text-gold mb-1">Keuangan</h4>
                                @forelse($bendahara as $b)
                                <div class="bg-white border border-gray-100 rounded-xl p-4 shadow-sm w-full flex items-center gap-3">
                                    @if($b->foto)
                                    <img src="{{ Storage::url($b->foto) }}" alt="{{ $b->nama_lengkap }}" class="w-11 h-11 rounded-full object-cover border border-gold/30 flex-shrink-0">
                                    @else
                                    <div class="w-11 h-11 rounded-full bg-navy/10 flex items-center justify-center border border-gold/30 flex-shrink-0 text-navy font-bold text-sm">
                                        {{ strtoupper(substr($b->nama_lengkap, 0, 2)) }}
                                    </div>
                                    @endif
                                    <div class="text-left min-w-0">
                                        <h5 class="font-bold text-navy-dark text-sm truncate">{{ $b->nama_lengkap }}</h5>
                                        <p class="text-gold text-[10px] font-semibold uppercase mt-0.5">{{ $b->jabatan }}</p>
                                    </div>
                                </div>
                                @empty
                                <p class="text-xs text-gray-400 italic">Belum ditentukan</p>
                                @endforelse
                            </div>
                        </div>
                    </div>

                    {{-- Line Connector --}}
                    <div class="h-12 w-0.5 bg-gold/30 my-4"></div>

                    {{-- 4. LEVEL BIDANG OPERASIONAL --}}
                    <div class="w-full text-center mb-6">
                        <h3 class="text-lg font-black uppercase tracking-widest text-navy-dark mb-2">Bidang Organisasi</h3>
                        <div class="w-16 h-1 bg-gold mx-auto rounded-full"></div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 w-full mt-6" data-aos="fade-up" data-aos-delay="300">
                        @foreach($bidangMembers as $bidangName => $bidang)
                        <div x-data="{ open: false }" class="bg-white border border-gray-200/60 rounded-2xl p-6 shadow-sm flex flex-col h-full">

                            {{-- Bidang Header (Tanpa Emoji) --}}
                            <div class="flex items-center border-b border-gray-100 pb-4 mb-4">
                                <div class="text-left">
                                    <h5 class="font-black text-navy-dark text-base">{{ $bidangName }}</h5>
                                    <p class="text-[10px] text-gray-400">Bidang Operasional</p>
                                </div>
                            </div>

                            {{-- Koordinator Bidang --}}
                            <div class="mb-4 text-left">
                                <span class="text-[9px] font-black uppercase tracking-wider text-gold block mb-2">Koordinator</span>
                                @if($bidang['koordinator'])
                                <div class="bg-gray-50 border border-gold/20 rounded-xl p-3 flex items-center gap-2.5">
                                    @if($bidang['koordinator']->foto)
                                    <img src="{{ Storage::url($bidang['koordinator']->foto) }}" alt="{{ $bidang['koordinator']->nama_lengkap }}" class="w-9 h-9 rounded-full object-cover border border-gold/30 flex-shrink-0">
                                    @else
                                    <div class="w-9 h-9 rounded-full bg-navy/10 flex items-center justify-center border border-gold/30 flex-shrink-0 text-navy font-bold text-xs">
                                        {{ strtoupper(substr($bidang['koordinator']->nama_lengkap, 0, 2)) }}
                                    </div>
                                    @endif
                                    <div class="min-w-0">
                                        <h6 class="font-bold text-navy-dark text-xs truncate">{{ $bidang['koordinator']->nama_lengkap }}</h6>
                                        <p class="text-gray-400 text-[9px] mt-0.5">{{ $bidang['koordinator']->jabatan }}</p>
                                    </div>
                                </div>
                                @else
                                <p class="text-xs text-gray-400 italic">Belum ditentukan</p>
                                @endif
                            </div>

                            {{-- Tombol Toggle Mobile --}}
                            <button @click="open = !open" class="md:hidden w-full py-2 bg-gray-100 hover:bg-gray-200 text-navy-dark text-xs font-bold rounded-lg mb-2 flex items-center justify-center gap-2 transition-colors">
                                <span x-text="open ? 'Tutup Anggota' : 'Lihat Semua Anggota ({{ $bidang['anggota']->count() }})'"></span>
                                <svg class="w-4 h-4 transform transition-transform" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>

                            {{-- Anggota Bidang (Disembunyikan di mobile, muncul di desktop) --}}
                            <div x-show="open || window.innerWidth >= 768" x-collapse class="flex-grow">
                                <span class="text-[9px] font-black uppercase tracking-wider text-gold block mb-2">Anggota ({{ $bidang['anggota']->count() }})</span>
                                <div class="flex flex-col gap-2">
                                    @forelse($bidang['anggota'] as $member)
                                    <div class="bg-gray-50 border border-gray-100/50 rounded-lg p-2 flex items-center gap-2">
                                        @if($member->foto)
                                        <img src="{{ Storage::url($member->foto) }}" alt="{{ $member->nama_lengkap }}" class="w-7 h-7 rounded-full object-cover border border-gold/20 flex-shrink-0">
                                        @else
                                        <div class="w-7 h-7 rounded-full bg-navy/10 flex items-center justify-center border border-gold/20 flex-shrink-0 text-navy font-bold text-[10px]">
                                            {{ strtoupper(substr($member->nama_lengkap, 0, 1)) }}
                                        </div>
                                        @endif
                                        <div class="min-w-0 flex-grow">
                                            <p class="text-navy-dark text-xs font-semibold truncate">{{ $member->nama_lengkap }}</p>
                                        </div>
                                    </div>
                                    @empty
                                    <p class="text-xs text-gray-400 italic">Belum ada anggota</p>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    {{-- 5. ANGGOTA LAIN / ANGGOTA KHUSUS --}}
                    @if($anggotaLain->count() > 0)
                    <div class="w-full mt-16 max-w-4xl mx-auto" data-aos="fade-up">
                        <div class="text-center mb-8">
                            <h3 class="text-md font-black uppercase tracking-widest text-navy-dark">Anggota Lainnya</h3>
                            <div class="w-12 h-0.5 bg-gold mx-auto rounded-full mt-2"></div>
                        </div>
                        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                            @foreach($anggotaLain as $al)
                            <div class="bg-white border border-gray-100 rounded-xl p-3 flex items-center gap-3">
                                @if($al->foto)
                                <img src="{{ Storage::url($al->foto) }}" alt="{{ $al->nama_lengkap }}" class="w-9 h-9 rounded-full object-cover flex-shrink-0">
                                @else
                                <div class="w-9 h-9 rounded-full bg-navy/10 flex items-center justify-center flex-shrink-0 text-navy font-bold text-xs">
                                    {{ strtoupper(substr($al->nama_lengkap, 0, 2)) }}
                                </div>
                                @endif
                                <div class="min-w-0 text-left">
                                    <h6 class="font-bold text-navy-dark text-xs truncate">{{ $al->nama_lengkap }}</h6>
                                    <p class="text-gold text-[9px] truncate">{{ $al->jabatan ?? 'Anggota' }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                </div>
            </div>

            {{-- ================= TAB CONTENT 2: DAFTAR ANGGOTA GRID LIST ================= --}}
            <div x-show="activeTab === 'daftar'"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform translate-y-4"
                x-transition:enter-end="opacity-100 transform translate-y-0"
                class="space-y-8">

                {{-- Search Box --}}
                <div class="bg-white p-6 rounded-2xl border border-gray-200/60 shadow-sm max-w-xl mx-auto">
                    <form action="{{ route('anggota.index') }}" method="GET" class="relative">
                        <input type="text" name="search" value="{{ $search }}" placeholder="Cari berdasarkan nama lengkap..."
                            class="w-full bg-gray-50 border border-gray-300 rounded-xl px-4 py-3 pl-11 text-sm focus:outline-none focus:ring-2 focus:ring-gold focus:border-transparent text-gray-900 placeholder-gray-400">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        @if($search)
                        <a href="{{ route('anggota.index') }}" class="absolute inset-y-0 right-0 pr-3 flex items-center text-xs text-red-500 hover:text-red-700">
                            Clear
                        </a>
                        @endif
                    </form>
                </div>

                {{-- Members Grid --}}
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @forelse($anggotaList as $a)
                    <div class="bg-white rounded-2xl p-5 text-center shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 border border-gray-100">
                        @if($a->foto)
                        <img src="{{ Storage::url($a->foto) }}" alt="{{ $a->nama_lengkap }}" class="w-20 h-20 rounded-full object-cover mx-auto mb-3 border-4 border-gold/20">
                        @else
                        <div class="w-20 h-20 rounded-full bg-navy-dark flex items-center justify-center mx-auto mb-3 border-4 border-gold/20 text-white text-2xl font-black">
                            {{ strtoupper(substr($a->nama_lengkap, 0, 2)) }}
                        </div>
                        @endif
                        <h3 class="font-bold text-navy-dark text-sm truncate">{{ $a->nama_lengkap }}</h3>
                        <p class="text-gold text-xs mt-1 font-medium">{{ $a->jabatan ?? 'Anggota' }}</p>
                        <p class="text-gray-400 text-xs mt-0.5">{{ $a->divisi ? 'Divisi ' . $a->divisi : '-' }}</p>
                        <span class="inline-block mt-3 text-[10px] font-bold px-3 py-1 rounded-full bg-green-50 text-green-600 capitalize">
                            {{ $a->status }}
                        </span>
                    </div>
                    @empty
                    <div class="col-span-full text-center py-20 bg-white rounded-2xl border border-gray-100">
                        <p class="text-gray-400 text-sm">Tidak ada anggota yang cocok dengan pencarian Anda.</p>
                    </div>
                    @endforelse
                </div>

                {{-- Pagination Links --}}
                <div class="mt-8">
                    {{ $anggotaList->links() }}
                </div>

            </div>

        </div>

        {{-- TOMBOL BAWAH (DESKTOP) DIUBAH KE TENTANG --}}
        <div class="text-center mt-16" data-aos="fade-up">
            <a href="{{ route('tentang') }}" class="btn-gold hidden md:inline-flex">
                ← Kembali ke Tentang
            </a>
        </div>

    </div>
</div>
@endsection