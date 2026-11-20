@extends('layouts.admin')
@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div class="space-y-6">

    <div class="flex flex-col gap-3 border-b border-slate-200 pb-5 sm:flex-row sm:items-end sm:justify-between" data-aos="fade-up">
        <div>
            <p class="text-xs font-semibold uppercase tracking-[0.16em] text-gold-dark">Panel pengelolaan</p>
            <h2 class="mt-1 text-xl font-bold text-navy-dark sm:text-2xl">Ringkasan organisasi</h2>
            <p class="mt-1 text-sm text-slate-500">Pantau kegiatan dan data Karang Taruna Pilangsari.</p>
        </div>
        <span class="inline-flex w-fit items-center gap-2 rounded-full border border-slate-200 bg-white px-3 py-1.5 text-xs font-medium text-slate-500">
            <span class="h-1.5 w-1.5 rounded-full bg-gold"></span>
            Tahun {{ date('Y') }}
        </span>
    </div>

    {{-- Stat Cards (Diubah jadi 3 kolom agar seimbang) --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
        @foreach([
        [
        'label' => 'Anggota Aktif',
        'value' => $stats['anggota'],
        'color' => 'text-navy-dark hover:text-gold-dark',
        'route' => route('admin.anggota.index'),
        'icon' => '<svg class="w-5 h-5 text-gold-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
        </svg>'
        ],
        [
        'label' => 'Total Kegiatan',
        'value' => $stats['kegiatan'],
        'color' => 'text-navy-dark hover:text-gold-dark',
        'route' => route('admin.kegiatan.index'),
        'icon' => '<svg class="w-5 h-5 text-gold-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
        </svg>'
        ],
        [
        'label' => 'Total Galeri',
        'value' => $stats['galeri'],
        'color' => 'text-navy-dark hover:text-gold-dark',
        'route' => route('admin.galeri.index'),
        'icon' => '<svg class="w-5 h-5 text-gold-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
        </svg>'
        ],
        ] as $stat)
        <a href="{{ $stat['route'] }}" class="glass-card p-5 hover:-translate-y-1 hover:shadow-lg transition-all duration-300 flex flex-col justify-between bg-white border border-slate-200/80 group" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 80 }}">
            <div class="flex items-center justify-between mb-4 relative z-10">
                <div>
                    <span class="text-slate-500 text-xs font-semibold uppercase tracking-wider block">{{ $stat['label'] }}</span>
                    <p class="text-3xl font-bold text-navy-dark mt-1 leading-none">{{ $stat['value'] }}</p>
                </div>
                <div class="w-11 h-11 rounded-xl bg-gold/10 flex items-center justify-center group-hover:scale-105 transition-transform duration-300">
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
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
        <div class="glass-card p-4 bg-white border border-gray-200/50 hover:shadow-md transition-shadow duration-300" data-aos="fade-right">
            <h3 class="text-gray-800 text-sm font-semibold mb-3 flex items-center gap-2">
                <span class="w-1.5 h-4 rounded-full bg-gold"></span>
                Kegiatan per Bulan {{ date('Y') }}
            </h3>
            <div class="relative h-48 sm:h-52">
                <canvas id="kegiatanChart"></canvas>
            </div>
        </div>
        <div class="glass-card p-4 bg-white border border-gray-200/50 hover:shadow-md transition-shadow duration-300" data-aos="fade-left">
            <h3 class="text-gray-800 text-sm font-semibold mb-3 flex items-center gap-2">
                <span class="w-1.5 h-4 rounded-full bg-navy"></span>
                Anggota per Divisi
            </h3>
            <div class="grid grid-cols-1 sm:grid-cols-[minmax(0,1fr)_170px] items-center gap-3">
                <div class="relative h-48">
                    <canvas id="anggotaChart"></canvas>
                </div>
                <div class="space-y-2">
                    @php($divisionColors = ['#07112B', '#0B2A78', '#D4AF37', '#B8961E', '#64748B'])
                    @foreach($anggotaPerDivisi as $divisi => $jumlah)
                    <div class="flex items-start gap-2 text-xs">
                        <span class="mt-1 h-2.5 w-2.5 flex-shrink-0 rounded-full" style="background-color: {{ $divisionColors[$loop->index % count($divisionColors)] }}"></span>
                        <span class="min-w-0 flex-1 leading-4 text-slate-600">{{ $divisi }}</span>
                        <span class="font-semibold tabular-nums text-navy-dark" aria-label="{{ $jumlah }} anggota">{{ $jumlah }}</span>
                    </div>
                    @endforeach
                    @if(array_sum($anggotaPerDivisi) === 0)
                    <p class="text-[11px] leading-4 text-slate-400">Belum ada data anggota aktif.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- Tables (Sisa Kegiatan Mendatang dibuat full-width) --}}
    <div class="grid grid-cols-1 gap-5">
        {{-- Kegiatan Mendatang --}}
        <div class="glass-card p-5 bg-white border border-gray-200/50 hover:shadow-md transition-shadow duration-300" data-aos="fade-up">
            <div class="flex items-center justify-between mb-4 pb-2 border-b border-gray-100">
                <h3 class="text-gray-800 font-semibold flex items-center gap-2">
                    <span class="w-1.5 h-4 rounded-full bg-amber-500"></span>
                    Kegiatan Mendatang
                </h3>
                <a href="{{ route('admin.kegiatan.index') }}" class="text-blue-600 text-xs hover:underline font-semibold flex items-center gap-0.5">
                    Lihat Semua
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
            <div class="space-y-2">
                @forelse($kegiatanMendatang as $k)
                <div class="flex items-center gap-3 py-2.5 px-2 hover:bg-gray-50/70 rounded-xl transition-all duration-200 border border-transparent hover:border-gray-100">
                    <div class="bg-gold/10 text-navy-dark border border-gold/20 rounded-xl p-1.5 text-center min-w-[42px] flex-shrink-0">
                        <p class="text-sm font-bold leading-none">{{ $k->tanggal_mulai->format('d') }}</p>
                        <p class="text-[9px] uppercase font-semibold mt-0.5 leading-none">{{ $k->tanggal_mulai->format('M') }}</p>
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
                backgroundColor: 'rgba(212, 175, 55, 0.2)',
                borderColor: '#B8961E',
                borderWidth: 2,
                borderRadius: 8,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
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
                backgroundColor: ['#07112B', '#0B2A78', '#D4AF37', '#B8961E', '#64748B', '#94A3B8'],
                borderWidth: 0,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });
</script>
@endpush
@endsection