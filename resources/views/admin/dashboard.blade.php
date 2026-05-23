@extends('layouts.admin')
@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div class="space-y-6">

    {{-- Stat Cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        @foreach([
        ['label' => 'Anggota Aktif', 'value' => $stats['anggota'], 'emoji' => '👥', 'color' => 'text-blue-600', 'bg' => 'from-blue-100 to-blue-50'],
        ['label' => 'Berita Published', 'value' => $stats['berita'], 'emoji' => '📰', 'color' => 'text-cyan-600', 'bg' => 'from-cyan-100 to-cyan-50'],
        ['label' => 'Total Kegiatan', 'value' => $stats['kegiatan'], 'emoji' => '📅', 'color' => 'text-emerald-600', 'bg' => 'from-emerald-100 to-emerald-50'],
        ['label' => 'Total Galeri', 'value' => $stats['galeri'], 'emoji' => '🖼️', 'color' => 'text-purple-600', 'bg' => 'from-purple-100 to-purple-50'],
        ] as $stat)
        <div class="glass-card p-5 hover:-translate-y-1 transition-transform duration-300 bg-gradient-to-br {{ $stat['bg'] }}" data-aos="fade-up">
            <div class="flex items-center justify-between mb-3">
                <span class="text-gray-600 text-sm font-medium">{{ $stat['label'] }}</span>
                <span class="text-2xl">{{ $stat['emoji'] }}</span>
            </div>
            <p class="text-3xl font-black {{ $stat['color'] }}">{{ $stat['value'] }}</p>
        </div>
        @endforeach
    </div>

    {{-- Charts --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
        <div class="glass-card p-5" data-aos="fade-right">
            <h3 class="text-gray-800 font-semibold mb-4">Kegiatan per Bulan {{ date('Y') }}</h3>
            <canvas id="kegiatanChart" height="200"></canvas>
        </div>
        <div class="glass-card p-5" data-aos="fade-left">
            <h3 class="text-gray-800 font-semibold mb-4">Anggota per Divisi</h3>
            <canvas id="anggotaChart" height="200"></canvas>
        </div>
    </div>

    {{-- Tables --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">

        {{-- Berita Terbaru --}}
        <div class="glass-card p-5" data-aos="fade-up">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-gray-800 font-semibold">Berita Terbaru</h3>
                <a href="{{ route('admin.berita.index') }}" class="text-blue-600 text-xs hover:underline font-medium">Lihat Semua</a>
            </div>
            <div class="space-y-3">
                @forelse($beritaTerbaru as $b)
                <div class="flex items-center gap-3 py-2 border-b border-gray-200">
                    <div class="flex-1 min-w-0">
                        <p class="text-gray-800 text-sm font-medium truncate">{{ $b->judul }}</p>
                        <p class="text-gray-400 text-xs">{{ $b->created_at->format('d M Y') }}</p>
                    </div>
                    <span class="text-xs px-2 py-1 rounded-full
                        {{ $b->status === 'published' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                        {{ $b->status }}
                    </span>
                </div>
                @empty
                <p class="text-gray-400 text-sm">Belum ada berita.</p>
                @endforelse
            </div>
        </div>

        {{-- Kegiatan Mendatang --}}
        <div class="glass-card p-5" data-aos="fade-up">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-gray-800 font-semibold">Kegiatan Mendatang</h3>
                <a href="{{ route('admin.kegiatan.index') }}" class="text-blue-600 text-xs hover:underline font-medium">Lihat Semua</a>
            </div>
            <div class="space-y-3">
                @forelse($kegiatanMendatang as $k)
                <div class="flex items-center gap-3 py-2 border-b border-gray-200">
                    <div class="bg-blue-100 text-blue-600 rounded-lg p-2 text-center min-w-[48px] flex-shrink-0">
                        <p class="text-lg font-black leading-none">{{ $k->tanggal_mulai->format('d') }}</p>
                        <p class="text-xs opacity-70">{{ $k->tanggal_mulai->format('M') }}</p>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-gray-800 text-sm font-medium truncate">{{ $k->nama }}</p>
                        <p class="text-gray-400 text-xs">{{ $k->lokasi }}</p>
                    </div>
                </div>
                @empty
                <p class="text-gray-400 text-sm">Tidak ada kegiatan mendatang.</p>
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