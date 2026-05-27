@extends('layouts.admin')
@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div class="space-y-6">

    {{-- Stat Cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        @foreach([
            [
                'label' => 'Anggota Aktif', 
                'value' => $stats['anggota'], 
                'gradient' => 'from-blue-500 to-indigo-600', 
                'glow' => 'from-blue-400 to-indigo-400',
                'color' => 'text-indigo-600 hover:text-indigo-800', 
                'route' => route('admin.anggota.index'),
                'icon' => '<svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>'
            ],
            [
                'label' => 'Berita Published', 
                'value' => $stats['berita'], 
                'gradient' => 'from-pink-500 to-rose-600', 
                'glow' => 'from-pink-400 to-rose-400',
                'color' => 'text-rose-600 hover:text-rose-800', 
                'route' => route('admin.berita.index'),
                'icon' => '<svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l4 4v10a2 2 0 01-2 2z"/><path stroke-linecap="round" stroke-linejoin="round" d="M14 2v4a2 2 0 002 2h4"/><path stroke-linecap="round" stroke-linejoin="round" d="M9 9h1M9 13h6m-6 4h6"/></svg>'
            ],
            [
                'label' => 'Total Kegiatan', 
                'value' => $stats['kegiatan'], 
                'gradient' => 'from-amber-500 to-orange-600', 
                'glow' => 'from-amber-400 to-orange-400',
                'color' => 'text-orange-600 hover:text-orange-800', 
                'route' => route('admin.kegiatan.index'),
                'icon' => '<svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>'
            ],
            [
                'label' => 'Total Galeri', 
                'value' => $stats['galeri'], 
                'gradient' => 'from-purple-500 to-violet-600', 
                'glow' => 'from-purple-400 to-violet-400',
                'color' => 'text-violet-600 hover:text-violet-800', 
                'route' => route('admin.galeri.index'),
                'icon' => '<svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>'
            ],
        ] as $stat)
        <a href="{{ $stat['route'] }}" class="glass-card p-5 hover:-translate-y-1.5 hover:shadow-xl transition-all duration-300 flex flex-col justify-between bg-white border border-gray-200/50 relative overflow-hidden group" data-aos="fade-up">
            <!-- Glowing accent color on hover -->
            <div class="absolute -right-10 -bottom-10 w-28 h-28 bg-gradient-to-br {{ $stat['glow'] }} rounded-full blur-2xl opacity-0 group-hover:opacity-20 transition-opacity duration-500"></div>

            <div class="flex items-center justify-between mb-4 relative z-10">
                <div>
                    <span class="text-gray-500 text-xs font-semibold uppercase tracking-wider block">{{ $stat['label'] }}</span>
                    <p class="text-3xl font-black text-gray-900 mt-1 leading-none">{{ $stat['value'] }}</p>
                </div>
                <div class="w-11 h-11 rounded-2xl bg-gradient-to-br {{ $stat['gradient'] }} flex items-center justify-center shadow-md shadow-gray-200 group-hover:scale-110 transition-transform duration-300">
                    {!! $stat['icon'] !!}
                </div>
            </div>
            
            <div class="flex items-center text-xs font-semibold {{ $stat['color'] }} group-hover:translate-x-1 transition-transform duration-300 mt-2 relative z-10">
                <span>Kelola Data</span>
                <svg class="w-3.5 h-3.5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                </svg>
            </div>
        </a>
        @endforeach
    </div>

    {{-- Charts --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
        <div class="glass-card p-5 bg-white border border-gray-200/50 hover:shadow-md transition-shadow duration-300" data-aos="fade-right">
            <h3 class="text-gray-800 font-semibold mb-4 flex items-center gap-2">
                <span class="w-1.5 h-4 rounded-full bg-blue-500"></span>
                Kegiatan per Bulan {{ date('Y') }}
            </h3>
            <canvas id="kegiatanChart" height="200"></canvas>
        </div>
        <div class="glass-card p-5 bg-white border border-gray-200/50 hover:shadow-md transition-shadow duration-300" data-aos="fade-left">
            <h3 class="text-gray-800 font-semibold mb-4 flex items-center gap-2">
                <span class="w-1.5 h-4 rounded-full bg-indigo-500"></span>
                Anggota per Divisi
            </h3>
            <canvas id="anggotaChart" height="200"></canvas>
        </div>
    </div>

    {{-- Tables --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">

        {{-- Berita Terbaru --}}
        <div class="glass-card p-5 bg-white border border-gray-200/50 hover:shadow-md transition-shadow duration-300" data-aos="fade-up">
            <div class="flex items-center justify-between mb-4 pb-2 border-b border-gray-100">
                <h3 class="text-gray-800 font-semibold flex items-center gap-2">
                    <span class="w-1.5 h-4 rounded-full bg-pink-500"></span>
                    Berita Terbaru
                </h3>
                <a href="{{ route('admin.berita.index') }}" class="text-blue-600 text-xs hover:underline font-semibold flex items-center gap-0.5">
                    Lihat Semua
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg>
                </a>
            </div>
            <div class="space-y-2">
                @forelse($beritaTerbaru as $b)
                <div class="flex items-center gap-3 py-2.5 px-2 hover:bg-gray-50/70 rounded-xl transition-all duration-200 border border-transparent hover:border-gray-100">
                    <div class="flex-1 min-w-0">
                        <p class="text-gray-800 text-sm font-medium truncate">{{ $b->judul }}</p>
                        <p class="text-gray-400 text-[10px] mt-0.5">{{ $b->created_at->format('d M Y') }}</p>
                    </div>
                    <span class="text-[10px] px-2 py-0.5 rounded-full font-semibold uppercase tracking-wider
                        {{ $b->status === 'published' ? 'bg-green-100 text-green-700' : 'bg-amber-100 text-amber-700' }}">
                        {{ $b->status }}
                    </span>
                </div>
                @empty
                <p class="text-gray-400 text-sm py-4 text-center">Belum ada berita.</p>
                @endforelse
            </div>
        </div>

        {{-- Kegiatan Mendatang --}}
        <div class="glass-card p-5 bg-white border border-gray-200/50 hover:shadow-md transition-shadow duration-300" data-aos="fade-up">
            <div class="flex items-center justify-between mb-4 pb-2 border-b border-gray-100">
                <h3 class="text-gray-800 font-semibold flex items-center gap-2">
                    <span class="w-1.5 h-4 rounded-full bg-amber-500"></span>
                    Kegiatan Mendatang
                </h3>
                <a href="{{ route('admin.kegiatan.index') }}" class="text-blue-600 text-xs hover:underline font-semibold flex items-center gap-0.5">
                    Lihat Semua
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg>
                </a>
            </div>
            <div class="space-y-2">
                @forelse($kegiatanMendatang as $k)
                <div class="flex items-center gap-3 py-2.5 px-2 hover:bg-gray-50/70 rounded-xl transition-all duration-200 border border-transparent hover:border-gray-100">
                    <div class="bg-gradient-to-br from-blue-500 to-indigo-600 text-white rounded-xl p-1.5 text-center min-w-[42px] flex-shrink-0 shadow-sm shadow-blue-500/10">
                        <p class="text-sm font-black leading-none">{{ $k->tanggal_mulai->format('d') }}</p>
                        <p class="text-[9px] uppercase font-bold opacity-90 mt-0.5 leading-none">{{ $k->tanggal_mulai->format('M') }}</p>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-gray-800 text-sm font-medium truncate">{{ $k->nama }}</p>
                        <p class="text-gray-400 text-xs mt-0.5 truncate">{{ $k->lokasi }}</p>
                    </div>
                </div>
                @empty
                <p class="text-gray-400 text-sm py-4 text-center">Tidak ada kegiatan mendatang.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Chart Kegiatan
    new Chart(document.getElementById('kegiatanChart'), {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
            datasets: [{
                label: 'Kegiatan',
                data: @json(array_values($kegiatanBulanan)),
                backgroundColor: 'rgba(59, 130, 246, 0.2)',
                borderColor: '#3b82f6',
                borderWidth: 2,
                borderRadius: 8,
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    labels: {
                        color: '#666666',
                        font: {
                            family: 'Poppins'
                        }
                    }
                }
            },
            scales: {
                x: {
                    ticks: {
                        color: '#999999'
                    },
                    grid: {
                        color: 'rgba(0,0,0,0.05)'
                    }
                },
                y: {
                    ticks: {
                        color: '#999999'
                    },
                    grid: {
                        color: 'rgba(0,0,0,0.05)'
                    }
                }
            }
        }
    });

    // Chart Anggota
    new Chart(document.getElementById('anggotaChart'), {
        type: 'doughnut',
        data: {
            labels: @json(array_keys($anggotaPerDivisi)),
            datasets: [{
                data: @json(array_values($anggotaPerDivisi)),
                backgroundColor: ['#3b82f6', '#06b6d4', '#10b981', '#f59e0b', '#8b5cf6', '#ec4899'],
                borderWidth: 0,
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    labels: {
                        color: '#666666',
                        font: {
                            family: 'Poppins',
                            size: 12
                        }
                    }
                }
            }
        }
    });
</script>
@endpush
@endsection