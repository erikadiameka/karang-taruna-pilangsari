@extends('layouts.app')
@section('title', 'Struktur Organisasi & Anggota — Karang Taruna Desa Pilangsari')

@section('content')
<div class="min-h-screen bg-gray-50 pb-20">
    <section class="relative isolate overflow-hidden bg-navy-dark pt-24 pb-20 md:pt-28 md:pb-24">
        <div class="pointer-events-none absolute -right-20 -top-32 h-96 w-96 rounded-full border border-gold/10"></div>
        <div class="pointer-events-none absolute -right-8 -top-20 h-72 w-72 rounded-full border border-gold/10"></div>
        <div class="pointer-events-none absolute -left-24 bottom-0 h-56 w-56 rounded-full bg-gold/5 blur-3xl"></div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center" data-aos="fade-up">
                <div class="inline-flex items-center gap-2 rounded-full border border-gold/30 bg-gold/10 px-4 py-1.5 text-xs font-semibold tracking-wide text-gold mb-4 sm:mb-5">
                    <span class="h-1.5 w-1.5 rounded-full bg-gold"></span>
                    Struktur Keanggotaan
                </div>
                <h1 class="text-3xl sm:text-4xl md:text-5xl font-black tracking-tight text-white">
                    Struktur & <span class="text-gold">Anggota</span>
                </h1>
                <p class="text-white/65 mt-3 sm:mt-4 text-xs sm:text-sm md:text-base max-w-xl mx-auto leading-relaxed">
                    Mengenal lebih dekat kepengurusan dan anggota aktif Karang Taruna Desa Pilangsari.
                </p>
            </div>
        </div>
    </section>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Tab Controller via Alpine.js --}}
        <div x-data="{ activeTab: '{{ $search ? 'daftar' : 'bagan' }}' }" class="w-full">

            {{-- Tab Buttons --}}
            <div class="flex justify-center mb-12 -mt-8 relative z-20" data-aos="fade-up" data-aos-delay="100">
                <div class="inline-flex max-w-full gap-1 rounded-2xl border border-gray-100 bg-white p-1.5 shadow-xl shadow-navy-dark/10">
                <button @click="activeTab = 'bagan'"
                    :class="activeTab === 'bagan' ? 'bg-gold text-navy-dark shadow-lg scale-105' : 'bg-white text-navy-dark border border-gray-200 hover:bg-gray-100'"
                    class="px-3 sm:px-6 py-3 rounded-xl font-bold text-[11px] sm:text-sm transition-all duration-300 flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 7h7v5H3zM14 3h7v5h-7zM14 12h7v9h-7zM3 16h7v5H3zM6.5 12v4m11-8v4" />
                    </svg>
                    Bagan Struktur
                </button>
                <button @click="activeTab = 'daftar'"
                    :class="activeTab === 'daftar' ? 'bg-gold text-navy-dark shadow-lg scale-105' : 'bg-white text-navy-dark border border-gray-200 hover:bg-gray-100'"
                    class="px-3 sm:px-6 py-3 rounded-xl font-bold text-[11px] sm:text-sm transition-all duration-300 flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 19h6v-1a3 3 0 00-5.2-2M16 19H8m8 0v-1a4 4 0 00-8 0v1m0 0H2v-1a3 3 0 015.2-2M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 2a2 2 0 11-4 0 2 2 0 014 0zM7 9a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    Daftar Anggota
                </button>
                </div>
            </div>

            {{-- ================= TAB CONTENT 1: BAGAN STRUKTUR ================= --}}
            <div x-show="activeTab === 'bagan'"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform translate-y-4"
                x-transition:enter-end="opacity-100 transform translate-y-0"
                class="space-y-8 md:space-y-12">

                <div class="flex flex-col items-center">

                    {{-- 1. LEVEL KETUA --}}
                    @if($ketua)
                    <div class="flex flex-col items-center w-full" data-aos="zoom-in">
                        <div class="relative w-full max-w-md flex items-center gap-5 rounded-3xl border-2 border-gold bg-white p-5 sm:p-6 shadow-2xl shadow-navy-dark/15 transition-transform duration-300 hover:-translate-y-1">
                            @if($ketua->foto)
                            <img src="{{ Storage::url($ketua->foto) }}" alt="{{ $ketua->nama_lengkap }}" class="w-16 h-16 rounded-2xl object-cover ring-4 ring-gold/20 flex-shrink-0">
                            @else
                            <div class="w-16 h-16 rounded-2xl bg-navy-dark flex items-center justify-center ring-4 ring-gold/20 flex-shrink-0 text-gold font-black text-xl">
                                {{ strtoupper(substr($ketua->nama_lengkap, 0, 2)) }}
                            </div>
                            @endif
                            <div class="text-left min-w-0">
                                <span class="inline-flex items-center gap-1 text-[9px] font-black uppercase tracking-[0.18em] text-gold mb-1">
                                    <span class="h-1 w-1 rounded-full bg-gold"></span> Pengurus Inti
                                </span>
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
                        <div class="relative bg-white border border-gold/50 rounded-2xl p-4 sm:p-5 shadow-lg shadow-navy-dark/5 w-full max-w-md flex items-center gap-4 transition-transform duration-300 hover:-translate-y-1">
                            @if($wakilKetua->foto)
                            <img src="{{ Storage::url($wakilKetua->foto) }}" alt="{{ $wakilKetua->nama_lengkap }}" class="w-14 h-14 rounded-2xl object-cover ring-4 ring-gold/10 flex-shrink-0">
                            @else
                            <div class="w-14 h-14 rounded-2xl bg-navy-dark flex items-center justify-center ring-4 ring-gold/10 flex-shrink-0 text-gold font-bold text-lg">
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
                            <div class="flex flex-col items-center gap-4 bg-white p-5 sm:p-6 rounded-3xl border border-gray-200 shadow-sm">
                                <h4 class="text-xs font-black uppercase tracking-[0.2em] text-gold mb-1">Sekretariat</h4>
                                @forelse($sekretaris as $s)
                                <div class="bg-gray-50/80 border border-gray-100 rounded-2xl p-4 shadow-sm w-full flex items-center gap-3 transition-all duration-300 hover:border-gold/40 hover:shadow-md">
                                    @if($s->foto)
                                    <img src="{{ Storage::url($s->foto) }}" alt="{{ $s->nama_lengkap }}" class="w-11 h-11 rounded-xl object-cover ring-2 ring-gold/20 flex-shrink-0">
                                    @else
                                    <div class="w-11 h-11 rounded-xl bg-navy-dark flex items-center justify-center ring-2 ring-gold/20 flex-shrink-0 text-gold font-bold text-sm">
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
                            <div class="flex flex-col items-center gap-4 bg-white p-5 sm:p-6 rounded-3xl border border-gray-200 shadow-sm">
                                <h4 class="text-xs font-black uppercase tracking-[0.2em] text-gold mb-1">Keuangan</h4>
                                @forelse($bendahara as $b)
                                <div class="bg-gray-50/80 border border-gray-100 rounded-2xl p-4 shadow-sm w-full flex items-center gap-3 transition-all duration-300 hover:border-gold/40 hover:shadow-md">
                                    @if($b->foto)
                                    <img src="{{ Storage::url($b->foto) }}" alt="{{ $b->nama_lengkap }}" class="w-11 h-11 rounded-xl object-cover ring-2 ring-gold/20 flex-shrink-0">
                                    @else
                                    <div class="w-11 h-11 rounded-xl bg-navy-dark flex items-center justify-center ring-2 ring-gold/20 flex-shrink-0 text-gold font-bold text-sm">
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
                        <span class="text-[10px] font-bold uppercase tracking-[0.25em] text-gold">Ruang Kolaborasi</span>
                        <h3 class="text-xl md:text-2xl font-black uppercase tracking-widest text-navy-dark mt-2 mb-3">Bidang Organisasi</h3>
                        <div class="w-16 h-1 bg-gold mx-auto rounded-full"></div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 w-full mt-6" data-aos="fade-up" data-aos-delay="300">
                        @foreach($bidangMembers as $bidangName => $bidang)
                        <div x-data="{ open: false }" class="group relative overflow-hidden bg-white border border-gray-200/70 rounded-3xl p-5 sm:p-6 shadow-sm hover:shadow-xl hover:shadow-navy-dark/5 hover:-translate-y-1 transition-all duration-300 flex flex-col h-full">
                            <div class="absolute inset-x-0 top-0 h-1 bg-gradient-to-r from-gold/40 via-gold to-gold/40"></div>

                            {{-- Bidang Header (Tanpa Emoji) --}}
                            <div class="flex items-start justify-between gap-3 border-b border-gray-100 pb-4 mb-4">
                                <div class="text-left">
                                    <span class="text-[9px] font-bold uppercase tracking-[0.16em] text-gold">Divisi</span>
                                    <h5 class="font-black text-navy-dark text-base leading-snug mt-1">{{ $bidangName }}</h5>
                                    <p class="text-[10px] text-gray-400 mt-1">Bidang Operasional</p>
                                </div>
                                <div class="h-9 w-9 flex-shrink-0 rounded-xl bg-gold/10 text-gold flex items-center justify-center">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6m15 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                            </div>

                            {{-- Koordinator Bidang --}}
                            <div class="mb-4 text-left">
                                <span class="text-[9px] font-black uppercase tracking-wider text-gold block mb-2">Koordinator</span>
                                @if($bidang['koordinator'])
                                <div class="bg-gray-50 border border-gold/25 rounded-2xl p-3 flex items-center gap-2.5">
                                    @if($bidang['koordinator']->foto)
                                    <img src="{{ Storage::url($bidang['koordinator']->foto) }}" alt="{{ $bidang['koordinator']->nama_lengkap }}" class="w-9 h-9 rounded-xl object-cover ring-2 ring-gold/20 flex-shrink-0">
                                    @else
                                    <div class="w-9 h-9 rounded-xl bg-navy-dark flex items-center justify-center ring-2 ring-gold/20 flex-shrink-0 text-gold font-bold text-xs">
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
                            <button @click="open = !open" class="md:hidden w-full py-2.5 bg-gray-100 hover:bg-gold/10 text-navy-dark text-xs font-bold rounded-xl mb-2 flex items-center justify-center gap-2 transition-colors">
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
                                    <div class="bg-gray-50 border border-gray-100 rounded-xl p-2 flex items-center gap-2 transition-colors hover:border-gold/30">
                                        @if($member->foto)
                                        <img src="{{ Storage::url($member->foto) }}" alt="{{ $member->nama_lengkap }}" class="w-7 h-7 rounded-lg object-cover ring-1 ring-gold/20 flex-shrink-0">
                                        @else
                                        <div class="w-7 h-7 rounded-lg bg-navy-dark flex items-center justify-center ring-1 ring-gold/20 flex-shrink-0 text-gold font-bold text-[10px]">
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
                            <div class="group bg-white border border-gray-100 rounded-2xl p-3 flex items-center gap-3 shadow-sm hover:border-gold/40 hover:shadow-md transition-all duration-300">
                                @if($al->foto)
                                <img src="{{ Storage::url($al->foto) }}" alt="{{ $al->nama_lengkap }}" class="w-9 h-9 rounded-xl object-cover ring-2 ring-gold/20 flex-shrink-0">
                                @else
                                <div class="w-9 h-9 rounded-xl bg-navy-dark flex items-center justify-center ring-2 ring-gold/20 flex-shrink-0 text-gold font-bold text-xs">
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
                <div class="bg-white p-6 sm:p-7 rounded-3xl border border-gray-200/70 shadow-lg shadow-navy-dark/5 max-w-3xl mx-auto">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-5">
                        <div>
                            <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-gold">Temukan orangnya</span>
                            <h3 class="text-lg font-black text-navy-dark mt-1">Daftar Anggota Aktif</h3>
                        </div>
                        <span class="inline-flex items-center gap-2 self-start sm:self-auto rounded-full bg-gold/10 px-3 py-1.5 text-xs font-bold text-navy-dark">
                            <span class="h-2 w-2 rounded-full bg-gold"></span>
                            {{ $anggotaList->total() }} anggota
                        </span>
                    </div>
                    <form action="{{ route('anggota.index') }}" method="GET" class="relative">
                        <input type="text" name="search" value="{{ $search }}" placeholder="Cari berdasarkan nama lengkap..."
                            class="w-full bg-gray-50 border border-gray-200 rounded-2xl px-4 py-3.5 pl-12 pr-20 text-sm focus:outline-none focus:ring-2 focus:ring-gold focus:border-transparent text-gray-900 placeholder-gray-400">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        @if($search)
                        <a href="{{ route('anggota.index') }}" class="absolute inset-y-0 right-0 pr-4 flex items-center text-xs font-semibold text-navy-dark hover:text-gold transition-colors">
                            Hapus
                        </a>
                        @endif
                    </form>
                </div>

                {{-- Members Grid --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5">
                    @forelse($anggotaList as $a)
                    <div class="group relative overflow-hidden bg-white rounded-3xl text-center shadow-sm hover:shadow-xl hover:shadow-navy-dark/10 hover:-translate-y-1 transition-all duration-300 border border-gray-100">
                        <div class="h-1 bg-gradient-to-r from-navy-dark via-gold to-navy-dark"></div>
                        <div class="p-6">
                            <div class="relative inline-flex mb-4">
                                @if($a->foto)
                                <img src="{{ Storage::url($a->foto) }}" alt="{{ $a->nama_lengkap }}" class="w-24 h-24 rounded-2xl object-cover ring-4 ring-gold/15 group-hover:ring-gold/40 transition-all duration-300">
                                @else
                                <div class="w-24 h-24 rounded-2xl bg-navy-dark flex items-center justify-center ring-4 ring-gold/15 group-hover:ring-gold/40 transition-all duration-300 text-gold text-2xl font-black">
                                    {{ strtoupper(substr($a->nama_lengkap, 0, 2)) }}
                                </div>
                                @endif
                                <span class="absolute -bottom-1 -right-1 h-4 w-4 rounded-full border-[3px] border-white bg-green-500" aria-label="Aktif"></span>
                            </div>
                            <h3 class="font-bold text-navy-dark text-sm truncate">{{ $a->nama_lengkap }}</h3>
                            <p class="text-gold text-xs mt-1.5 font-semibold">{{ $a->jabatan ?? 'Anggota' }}</p>
                            <p class="min-h-5 text-gray-400 text-[11px] mt-1 truncate">{{ $a->divisi ? 'Divisi ' . $a->divisi : 'Anggota Karang Taruna' }}</p>
                            <span class="inline-flex items-center gap-1.5 mt-4 text-[10px] font-bold px-3 py-1.5 rounded-full bg-green-50 text-green-700 capitalize">
                                <span class="h-1.5 w-1.5 rounded-full bg-green-500"></span>
                                {{ $a->status }}
                            </span>
                        </div>
                    </div>
                    @empty
                    <div class="col-span-full text-center py-16 px-6 bg-white rounded-3xl border border-gray-100 shadow-sm">
                        <div class="w-14 h-14 mx-auto mb-4 rounded-2xl bg-gold/10 text-gold flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <h3 class="font-bold text-navy-dark">Anggota tidak ditemukan</h3>
                        <p class="text-gray-400 text-sm mt-1">Coba gunakan kata kunci nama yang berbeda.</p>
                    </div>
                    @endforelse
                </div>

                {{-- Pagination Links --}}
                <div class="mt-8">
                    {{ $anggotaList->links() }}
                </div>

            </div>

        </div>

    </div>
</div>
@endsection