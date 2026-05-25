@extends('layouts.app')
@section('title', 'Struktur Organisasi & Anggota — Karang Taruna Desa Pilangsari')

@section('content')
<div class="min-h-screen bg-gray-50 dark:bg-navy-dark pt-32 pb-20 transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Header Section --}}
        <div class="text-center mb-12" data-aos="fade-up">
            <div class="section-badge mb-4">
                <span class="w-1.5 h-1.5 bg-gold rounded-full"></span>
                Struktur Keanggotaan
            </div>
            <h1 class="text-4xl md:text-5xl font-black text-navy-dark dark:text-white">
                Struktur & <span class="text-gold">Anggota</span>
            </h1>
            <p class="text-gray-500 dark:text-gray-400 mt-3 text-sm max-w-md mx-auto">
                Mengenal lebih dekat kepengurusan dan anggota aktif Karang Taruna Desa Pilangsari.
            </p>
        </div>

        {{-- Tab Controller via Alpine.js --}}
        <div x-data="{ activeTab: '{{ $search ? 'daftar' : 'bagan' }}' }" class="w-full">
            
            {{-- Tab Buttons --}}
            <div class="flex justify-center gap-4 mb-12" data-aos="fade-up" data-aos-delay="100">
                <button @click="activeTab = 'bagan'" 
                    :class="activeTab === 'bagan' ? 'bg-gold text-navy-dark shadow-lg shadow-gold/25 scale-105' : 'bg-white dark:bg-navy-light/40 text-navy-dark dark:text-white border border-gray-200 dark:border-white/10 hover:bg-gray-100 dark:hover:bg-navy-light/60'"
                    class="px-6 py-3 rounded-xl font-bold text-sm transition-all duration-300 flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                        <path d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Bagan Struktur
                </button>
                <button @click="activeTab = 'daftar'" 
                    :class="activeTab === 'daftar' ? 'bg-gold text-navy-dark shadow-lg shadow-gold/25 scale-105' : 'bg-white dark:bg-navy-light/40 text-navy-dark dark:text-white border border-gray-200 dark:border-white/10 hover:bg-gray-100 dark:hover:bg-navy-light/60'"
                    class="px-6 py-3 rounded-xl font-bold text-sm transition-all duration-300 flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                        <path d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
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
                        <div class="relative bg-white dark:bg-navy-light border-2 border-gold rounded-2xl p-5 shadow-lg hover:shadow-2xl hover:scale-[1.03] transition-all duration-300 w-full max-w-sm flex items-center gap-4">
                            <span class="absolute -top-3 right-4 bg-gold text-navy-dark text-[9px] font-black uppercase px-2.5 py-1 rounded-full tracking-wider">Top Leader</span>
                            @if($ketua->foto)
                            <img src="{{ Storage::url($ketua->foto) }}" alt="{{ $ketua->nama_lengkap }}" class="w-16 h-16 rounded-full object-cover border-2 border-gold flex-shrink-0">
                            @else
                            <div class="w-16 h-16 rounded-full bg-navy dark:bg-navy-dark flex items-center justify-center border-2 border-gold flex-shrink-0 text-white font-black text-xl">
                                {{ strtoupper(substr($ketua->nama_lengkap, 0, 2)) }}
                            </div>
                            @endif
                            <div class="text-left min-w-0">
                                <h4 class="font-extrabold text-navy-dark dark:text-white text-base md:text-lg truncate">{{ $ketua->nama_lengkap }}</h4>
                                <p class="text-gold text-xs font-bold uppercase tracking-wider mt-0.5">{{ $ketua->jabatan }}</p>
                                <p class="text-gray-400 text-[10px] mt-1">Masuk: {{ $ketua->tahun_masuk ?? '-' }}</p>
                            </div>
                        </div>
                        <div class="h-10 w-0.5 bg-gradient-to-b from-gold to-gold/50"></div>
                    </div>
                    @endif

                    {{-- 2. LEVEL WAKIL KETUA --}}
                    @if($wakilKetua)
                    <div class="flex flex-col items-center w-full" data-aos="zoom-in" data-aos-delay="100">
                        <div class="relative bg-white dark:bg-navy-light border border-gold/60 rounded-2xl p-5 shadow-md hover:shadow-xl hover:scale-[1.03] transition-all duration-300 w-full max-w-sm flex items-center gap-4">
                            @if($wakilKetua->foto)
                            <img src="{{ Storage::url($wakilKetua->foto) }}" alt="{{ $wakilKetua->nama_lengkap }}" class="w-14 h-14 rounded-full object-cover border-2 border-gold/40 flex-shrink-0">
                            @else
                            <div class="w-14 h-14 rounded-full bg-navy dark:bg-navy-dark flex items-center justify-center border-2 border-gold/40 flex-shrink-0 text-white font-bold text-lg">
                                {{ strtoupper(substr($wakilKetua->nama_lengkap, 0, 2)) }}
                            </div>
                            @endif
                            <div class="text-left min-w-0">
                                <h4 class="font-bold text-navy-dark dark:text-white text-sm md:text-base truncate">{{ $wakilKetua->nama_lengkap }}</h4>
                                <p class="text-gold text-xs font-semibold uppercase tracking-wider mt-0.5">{{ $wakilKetua->jabatan }}</p>
                                <p class="text-gray-400 text-[10px] mt-1">Masuk: {{ $wakilKetua->tahun_masuk ?? '-' }}</p>
                            </div>
                        </div>
                        <div class="h-10 w-0.5 bg-gradient-to-b from-gold/50 to-gold/20"></div>
                    </div>
                    @endif

                    {{-- 3. LEVEL SEKRETARIS & BENDAHARA --}}
                    <div class="w-full max-w-4xl mx-auto" data-aos="fade-up" data-aos-delay="200">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 relative">
                            
                            {{-- Kolom Sekretaris --}}
                            <div class="flex flex-col items-center gap-4 bg-gray-100/50 dark:bg-navy-light/10 p-5 rounded-2xl border border-gray-200/50 dark:border-white/5">
                                <h4 class="text-xs font-black uppercase tracking-widest text-gold mb-1">Sekretariat</h4>
                                @forelse($sekretaris as $s)
                                <div class="bg-white dark:bg-navy-light border border-gray-100 dark:border-white/10 rounded-xl p-4 shadow-sm hover:shadow-md transition-all duration-300 w-full flex items-center gap-3">
                                    @if($s->foto)
                                    <img src="{{ Storage::url($s->foto) }}" alt="{{ $s->nama_lengkap }}" class="w-11 h-11 rounded-full object-cover border border-gold/30 flex-shrink-0">
                                    @else
                                    <div class="w-11 h-11 rounded-full bg-navy/10 dark:bg-navy-dark flex items-center justify-center border border-gold/30 flex-shrink-0 text-navy dark:text-white font-bold text-sm">
                                        {{ strtoupper(substr($s->nama_lengkap, 0, 2)) }}
                                    </div>
                                    @endif
                                    <div class="text-left min-w-0">
                                        <h5 class="font-bold text-navy-dark dark:text-white text-sm truncate">{{ $s->nama_lengkap }}</h5>
                                        <p class="text-gold text-[10px] font-semibold uppercase mt-0.5">{{ $s->jabatan }}</p>
                                    </div>
                                </div>
                                @empty
                                <p class="text-xs text-gray-400 italic">Belum ditentukan</p>
                                @endforelse
                            </div>

                            {{-- Kolom Bendahara --}}
                            <div class="flex flex-col items-center gap-4 bg-gray-100/50 dark:bg-navy-light/10 p-5 rounded-2xl border border-gray-200/50 dark:border-white/5">
                                <h4 class="text-xs font-black uppercase tracking-widest text-gold mb-1">Keuangan</h4>
                                @forelse($bendahara as $b)
                                <div class="bg-white dark:bg-navy-light border border-gray-100 dark:border-white/10 rounded-xl p-4 shadow-sm hover:shadow-md transition-all duration-300 w-full flex items-center gap-3">
                                    @if($b->foto)
                                    <img src="{{ Storage::url($b->foto) }}" alt="{{ $b->nama_lengkap }}" class="w-11 h-11 rounded-full object-cover border border-gold/30 flex-shrink-0">
                                    @else
                                    <div class="w-11 h-11 rounded-full bg-navy/10 dark:bg-navy-dark flex items-center justify-center border border-gold/30 flex-shrink-0 text-navy dark:text-white font-bold text-sm">
                                        {{ strtoupper(substr($b->nama_lengkap, 0, 2)) }}
                                    </div>
                                    @endif
                                    <div class="text-left min-w-0">
                                        <h5 class="font-bold text-navy-dark dark:text-white text-sm truncate">{{ $b->nama_lengkap }}</h5>
                                        <p class="text-gold text-[10px] font-semibold uppercase mt-0.5">{{ $b->jabatan }}</p>
                                    </div>
                                </div>
                                @empty
                                <p class="text-xs text-gray-400 italic">Belum ditentukan</p>
                                @endforelse
                            </div>

                        </div>
                    </div>

                    {{-- Line Connector down to Divisions --}}
                    <div class="h-12 w-0.5 bg-gradient-to-b from-gold/20 to-gold/50 my-4"></div>
                    
                    {{-- 4. LEVEL DIVISI-DIVISI --}}
                    <div class="w-full text-center mb-6">
                        <h3 class="text-lg font-black uppercase tracking-widest text-navy-dark dark:text-white mb-2">Divisi Operasional</h3>
                        <div class="w-16 h-1 bg-gold mx-auto rounded-full"></div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 w-full mt-6" data-aos="fade-up" data-aos-delay="300">
                        @php
                            $emojis = [
                                'Humas' => '📢',
                                'Sosial' => '❤️',
                                'Ekonomi' => '💼',
                                'Seni Budaya' => '🎭',
                                'Olahraga' => '⚽',
                                'Pendidikan' => '📚'
                            ];
                        @endphp

                        @foreach($divisiMembers as $divName => $div)
                        <div class="bg-white dark:bg-navy-light border border-gray-200/60 dark:border-white/5 rounded-2xl p-6 shadow-sm hover:shadow-lg transition-all duration-300 flex flex-col h-full">
                            
                            {{-- Divisi Header --}}
                            <div class="flex items-center gap-3 border-b border-gray-100 dark:border-white/5 pb-4 mb-4">
                                <div class="w-10 h-10 bg-gold/10 dark:bg-gold/5 rounded-xl flex items-center justify-center text-xl">
                                    {{ $emojis[$divName] ?? '👥' }}
                                </div>
                                <div class="text-left">
                                    <h5 class="font-black text-navy-dark dark:text-white text-sm">Divisi {{ $divName }}</h5>
                                    <p class="text-[10px] text-gray-400">Bidang Operasional</p>
                                </div>
                            </div>

                            {{-- Koordinator Divisi --}}
                            <div class="mb-4 text-left">
                                <span class="text-[9px] font-black uppercase tracking-wider text-gold block mb-2">Koordinator</span>
                                @if($div['koordinator'])
                                <div class="bg-gray-50 dark:bg-navy-dark/40 border border-gold/20 rounded-xl p-3 flex items-center gap-2.5">
                                    @if($div['koordinator']->foto)
                                    <img src="{{ Storage::url($div['koordinator']->foto) }}" alt="{{ $div['koordinator']->nama_lengkap }}" class="w-9 h-9 rounded-full object-cover border border-gold/30 flex-shrink-0">
                                    @else
                                    <div class="w-9 h-9 rounded-full bg-navy/10 dark:bg-navy-dark flex items-center justify-center border border-gold/30 flex-shrink-0 text-navy dark:text-white font-bold text-xs">
                                        {{ strtoupper(substr($div['koordinator']->nama_lengkap, 0, 2)) }}
                                    </div>
                                    @endif
                                    <div class="min-w-0">
                                        <h6 class="font-bold text-navy-dark dark:text-white text-xs truncate">{{ $div['koordinator']->nama_lengkap }}</h6>
                                        <p class="text-gray-400 text-[9px] mt-0.5">{{ $div['koordinator']->jabatan }}</p>
                                    </div>
                                </div>
                                @else
                                <div class="border border-dashed border-gray-200 dark:border-white/10 rounded-xl p-3 text-center">
                                    <p class="text-[10px] text-gray-400 italic">Belum ditentukan</p>
                                </div>
                                @endif
                            </div>

                            {{-- Anggota Divisi --}}
                            <div class="text-left flex-1">
                                <span class="text-[9px] font-black uppercase tracking-wider text-gray-400 block mb-2">Anggota</span>
                                @if($div['anggota']->count() > 0)
                                <div class="space-y-2 max-h-48 overflow-y-auto pr-1">
                                    @foreach($div['anggota'] as $a)
                                    <div class="bg-gray-50/50 dark:bg-navy-dark/20 rounded-xl p-2.5 flex items-center gap-2.5 border border-transparent hover:border-gray-100 dark:hover:border-white/5 transition-all">
                                        @if($a->foto)
                                        <img src="{{ Storage::url($a->foto) }}" alt="{{ $a->nama_lengkap }}" class="w-8 h-8 rounded-full object-cover flex-shrink-0">
                                        @else
                                        <div class="w-8 h-8 rounded-full bg-navy/5 dark:bg-navy-dark flex items-center justify-center flex-shrink-0 text-navy dark:text-white font-bold text-xs">
                                            {{ strtoupper(substr($a->nama_lengkap, 0, 2)) }}
                                        </div>
                                        @endif
                                        <div class="min-w-0">
                                            <h6 class="font-semibold text-navy-dark dark:text-white text-[11px] truncate">{{ $a->nama_lengkap }}</h6>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                @else
                                <p class="text-[10px] text-gray-400 italic text-center py-2 bg-gray-50/30 dark:bg-navy-dark/10 rounded-xl">Belum ada anggota</p>
                                @endif
                            </div>

                        </div>
                        @endforeach
                    </div>

                    {{-- 5. ANGGOTA LAIN / ANGGOTA KHUSUS --}}
                    @if($anggotaLain->count() > 0)
                    <div class="w-full mt-16 max-w-4xl mx-auto" data-aos="fade-up">
                        <div class="text-center mb-8">
                            <h3 class="text-md font-black uppercase tracking-widest text-navy-dark dark:text-white">Anggota Lainnya</h3>
                            <div class="w-12 h-0.5 bg-gold mx-auto rounded-full mt-2"></div>
                        </div>
                        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                            @foreach($anggotaLain as $al)
                            <div class="bg-white dark:bg-navy-light/60 border border-gray-100 dark:border-white/5 rounded-xl p-3 flex items-center gap-3">
                                @if($al->foto)
                                <img src="{{ Storage::url($al->foto) }}" alt="{{ $al->nama_lengkap }}" class="w-9 h-9 rounded-full object-cover flex-shrink-0">
                                @else
                                <div class="w-9 h-9 rounded-full bg-navy/10 dark:bg-navy-dark flex items-center justify-center flex-shrink-0 text-navy dark:text-white font-bold text-xs">
                                    {{ strtoupper(substr($al->nama_lengkap, 0, 2)) }}
                                </div>
                                @endif
                                <div class="min-w-0 text-left">
                                    <h6 class="font-bold text-navy-dark dark:text-white text-xs truncate">{{ $al->nama_lengkap }}</h6>
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
                <div class="bg-white dark:bg-navy-light p-6 rounded-2xl border border-gray-200/60 dark:border-white/5 shadow-sm max-w-xl mx-auto">
                    <form action="{{ route('anggota.index') }}" method="GET" class="relative">
                        <input type="text" name="search" value="{{ $search }}" placeholder="Cari berdasarkan nama lengkap..."
                            class="w-full bg-gray-50 dark:bg-navy-dark border border-gray-300 dark:border-white/10 rounded-xl px-4 py-3 pl-11 text-sm focus:outline-none focus:ring-2 focus:ring-gold focus:border-transparent text-gray-900 dark:text-white placeholder-gray-400">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
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
                    <div class="bg-white dark:bg-navy-light rounded-2xl p-5 text-center shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 border border-gray-100 dark:border-white/5">
                        @if($a->foto)
                        <img src="{{ Storage::url($a->foto) }}" alt="{{ $a->nama_lengkap }}" class="w-20 h-20 rounded-full object-cover mx-auto mb-3 border-4 border-gold/20">
                        @else
                        <div class="w-20 h-20 rounded-full bg-navy dark:bg-navy-dark flex items-center justify-center mx-auto mb-3 border-4 border-gold/20 text-white text-2xl font-black">
                            {{ strtoupper(substr($a->nama_lengkap, 0, 2)) }}
                        </div>
                        @endif
                        <h3 class="font-bold text-navy-dark dark:text-white text-sm truncate">{{ $a->nama_lengkap }}</h3>
                        <p class="text-gold text-xs mt-1 font-medium">{{ $a->jabatan ?? 'Anggota' }}</p>
                        <p class="text-gray-400 text-xs mt-0.5">{{ $a->divisi ? 'Divisi ' . $a->divisi : '-' }}</p>
                        <span class="inline-block mt-3 text-[10px] font-bold px-3 py-1 rounded-full bg-green-50 dark:bg-green-500/10 text-green-600 dark:text-green-400 capitalize">
                            {{ $a->status }}
                        </span>
                    </div>
                    @empty
                    <div class="col-span-full text-center py-20 bg-white dark:bg-navy-light rounded-2xl border border-gray-100 dark:border-white/5">
                        <span class="text-5xl block mb-4">👥</span>
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

        {{-- Bottom Back Button --}}
        <div class="text-center mt-16" data-aos="fade-up">
            <a href="{{ route('beranda') }}" class="btn-gold">
                ← Kembali ke Beranda
            </a>
        </div>

    </div>
</div>
@endsection