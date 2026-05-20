@extends('layouts.admin')
@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div class="space-y-6">

    {{-- Stat Cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        @foreach([
        ['label' => 'Anggota Aktif', 'value' => $stats['anggota'], 'emoji' => '👥', 'color' => 'text-gold'],
        ['label' => 'Berita Published', 'value' => $stats['berita'], 'emoji' => '📰', 'color' => 'text-blue-400'],
        ['label' => 'Total Kegiatan', 'value' => $stats['kegiatan'], 'emoji' => '📅', 'color' => 'text-green-400'],
        ['label' => 'Total Galeri', 'value' => $stats['galeri'], 'emoji' => '🖼️', 'color' => 'text-purple-400'],
        ] as $stat)
        <div class="glass-card p-5 hover:-translate-y-1 transition-transform duration-300" data-aos="fade-up">
            <div class="flex items-center justify-between mb-3">
                <span class="text-white/50 text-sm">{{ $stat['label'] }}</span>
                <span class="text-2xl">{{ $stat['emoji'] }}</span>
            </div>
            <p class="text-3xl font-black {{ $stat['color'] }}">{{ $stat['value'] }}</p>
        </div>
        @endforeach
    </div>

    {{-- Charts --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
        <div class="glass-card p-5" data-aos="fade-right">
            <h3 class="text-white font-semibold mb-4">Kegiatan per Bulan {{ date('Y') }}</h3>
            <canvas id="kegiatanChart" height="200"></canvas>
        </div>
        <div class="glass-card p-5" data-aos="fade-left">
            <h3 class="text-white font-semibold mb-4">Anggota per Divisi</h3>
            <canvas id="anggotaChart" height="200"></canvas>
        </div>
    </div>

    {{-- Tables --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">

        {{-- Berita Terbaru --}}
        <div class="glass-card p-5" data-aos="fade-up">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-white font-semibold">Berita Terbaru</h3>
                <a href="{{ route('admin.berita.index') }}" class="text-gold text-xs hover:underline">Lihat Semua</a>
            </div>
            <div class="space-y-3">
                @forelse($beritaTerbaru as $b)
                <div class="flex items-center gap-3 py-2 border-b border-white/5">
                    <div class="flex-1 min-w-0">
                        <p class="text-white text-sm font-medium truncate">{{ $b->judul }}</p>
                        <p class="text-white/40 text-xs">{{ $b->created_at->format('d M Y') }}</p>
                    </div>
                    <span class="text-xs px-2 py-1 rounded-full
                        {{ $b->status === 'published' ? 'bg-green-500/10 text-green-400' : 'bg-yellow-500/10 text-yellow-400' }}">
                        {{ $b->status }}
                    </span>
                </div>
                @empty
                <p class="text-white/40 text-sm">Belum ada berita.</p>
                @endforelse
            </div>
        </div>

        {{-- Kegiatan Mendatang --}}
        <div class="glass-card p-5" data-aos="fade-up">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-white font-semibold">Kegiatan Mendatang</h3>
                <a href="{{ route('admin.kegiatan.index') }}" class="text-gold text-xs hover:underline">Lihat Semua</a>
            </div>
            <div class="space-y-3">
                @forelse($kegiatanMendatang as $k)
                <div class="flex items-center gap-3 py-2 border-b border-white/5">
                    <div class="bg-gold/10 text-gold rounded-lg p-2 text-center min-w-[48px] flex-shrink-0">
                        <p class="text-lg font-black leading-none">{{ $k->tanggal_mulai->format('d') }}</p>
                        <p class="text-xs opacity-70">{{ $k->tanggal_mulai->format('M') }}</p>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-white text-sm font-medium truncate">{{ $k->nama }}</p>
                        <p class="text-white/40 text-xs">{{ $k->lokasi }}</p>
                    </div>
                </div>
                @empty
                <p class="text-white/40 text-sm">Tidak ada kegiatan mendatang.</p>
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
                backgroundColor: 'rgba(212,175,55,0.3)',
                borderColor: '#D4AF37',
                borderWidth: 2,
                borderRadius: 8,
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    labels: {
                        color: 'rgba(255,255,255,0.6)',
                        font: {
                            family: 'Poppins'
                        }
                    }
                }
            },
            scales: {
                x: {
                    ticks: {
                        color: 'rgba(255,255,255,0.4)'
                    },
                    grid: {
                        color: 'rgba(255,255,255,0.05)'
                    }
                },
                y: {
                    ticks: {
                        color: 'rgba(255,255,255,0.4)'
                    },
                    grid: {
                        color: 'rgba(255,255,255,0.05)'
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
                backgroundColor: ['#D4AF37', '#0B2A78', '#10B981', '#EF4444', '#6366F1', '#F59E0B'],
                borderWidth: 0,
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    labels: {
                        color: 'rgba(255,255,255,0.6)',
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