@extends('layouts.app')
@section('title', 'Dasar Hukum — Karang Taruna Desa Pilangsari')
@section('description', 'Dasar hukum dan regulasi yang mendasari Karang Taruna Desa Pilangsari.')

@section('content')

{{-- Hero --}}
<section style="background: linear-gradient(135deg, #07112B 0%, #081F5C 100%); padding: 8rem 0 4rem;">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <div class="section-badge mb-4" data-aos="fade-up">
            <span class="w-1.5 h-1.5 bg-gold rounded-full"></span>
            Regulasi & Peraturan
        </div>
        <h1 class="text-4xl md:text-5xl font-black text-white mt-4" data-aos="fade-up" data-aos-delay="100">
            Dasar <span class="text-gold">Hukum</span>
        </h1>
        <p class="text-white/50 mt-4 text-sm max-w-xl mx-auto" data-aos="fade-up" data-aos-delay="200">
            Landasan hukum dan regulasi yang mendasari keberadaan dan kegiatan Karang Taruna
        </p>
    </div>
</section>

{{-- Konten --}}
<section class="py-20 bg-white">
    <div class="max-w-4xl mx-auto px-4">

        {{-- Intro --}}
        <div class="bg-gray-50 rounded-3xl p-8 mb-12" data-aos="fade-up">
            <div class="flex items-start gap-4">
                <div class="w-12 h-12 bg-gold rounded-xl flex items-center justify-center text-2xl flex-shrink-0">⚖️</div>
                <div>
                    <h2 class="text-xl font-black text-navy-dark mb-3">Landasan Hukum</h2>
                    <p class="text-gray-500 text-sm leading-relaxed">
                        Karang Taruna merupakan organisasi yang diakui secara hukum dan diatur dalam berbagai peraturan perundang-undangan. Berikut adalah dasar hukum yang mendasari keberadaan dan kegiatan Karang Taruna di Indonesia.
                    </p>
                </div>
            </div>
        </div>

        {{-- Daftar Dasar Hukum --}}
        <div class="space-y-4">
            @foreach([
            [
            'no' => '01',
            'judul' => 'Undang-Undang No. 11 Tahun 2009',
            'tentang' => 'Kesejahteraan Sosial',
            'isi' => 'Mengatur tentang kesejahteraan sosial dan peran serta organisasi sosial kemasyarakatan termasuk Karang Taruna dalam meningkatkan kesejahteraan masyarakat.',
            'icon' => '📜'
            ],
            [
            'no' => '02',
            'judul' => 'Undang-Undang No. 40 Tahun 2009',
            'tentang' => 'Kepemudaan',
            'isi' => 'Mengatur tentang kepemudaan yang menjadi landasan bagi organisasi kepemudaan termasuk Karang Taruna dalam melaksanakan kegiatan pemberdayaan pemuda.',
            'icon' => '👥'
            ],
            [
            'no' => '03',
            'judul' => 'Peraturan Menteri Sosial No. 25 Tahun 2019',
            'tentang' => 'Karang Taruna',
            'isi' => 'Mengatur secara khusus tentang Karang Taruna meliputi pengertian, kedudukan, tugas, fungsi, struktur organisasi, keanggotaan, dan mekanisme kerja Karang Taruna.',
            'icon' => '📋'
            ],
            [
            'no' => '04',
            'judul' => 'Peraturan Pemerintah No. 39 Tahun 2012',
            'tentang' => 'Penyelenggaraan Kesejahteraan Sosial',
            'isi' => 'Mengatur tentang penyelenggaraan kesejahteraan sosial yang melibatkan partisipasi masyarakat termasuk Karang Taruna sebagai mitra pemerintah.',
            'icon' => '🏛️'
            ],
            [
            'no' => '05',
            'judul' => 'Undang-Undang No. 6 Tahun 2014',
            'tentang' => 'Desa',
            'isi' => 'Mengatur tentang desa yang memberikan ruang bagi Karang Taruna sebagai lembaga kemasyarakatan desa yang berperan dalam pembangunan dan pemberdayaan masyarakat desa.',
            'icon' => '🏘️'
            ],
            [
            'no' => '06',
            'judul' => 'Peraturan Menteri Dalam Negeri No. 18 Tahun 2018',
            'tentang' => 'Lembaga Kemasyarakatan Desa',
            'isi' => 'Mengatur tentang lembaga kemasyarakatan desa dan lembaga adat desa yang menjadikan Karang Taruna sebagai salah satu lembaga resmi di tingkat desa.',
            'icon' => '📑'
            ],
            [
            'no' => '07',
            'judul' => 'AD/ART Karang Taruna Nasional',
            'tentang' => 'Anggaran Dasar & Anggaran Rumah Tangga',
            'isi' => 'Anggaran Dasar dan Anggaran Rumah Tangga Karang Taruna yang ditetapkan dalam Temu Karya Nasional sebagai pedoman organisasi di seluruh Indonesia.',
            'icon' => '📕'
            ],
            [
            'no' => '08',
            'judul' => 'SK Kepala Desa Pilangsari',
            'tentang' => 'Pengakuan & Penetapan Karang Taruna Desa Pilangsari',
            'isi' => 'Surat Keputusan Kepala Desa Pilangsari yang mengakui dan menetapkan keberadaan Karang Taruna Desa Pilangsari sebagai lembaga kemasyarakatan resmi di tingkat desa.',
            'icon' => '✅'
            ],
            ] as $i => $hukum)
            <div class="bg-white rounded-2xl p-6 border border-gray-100 hover:shadow-md hover:border-gold/20 transition-all duration-300"
                data-aos="fade-up" data-aos-delay="{{ ($i+1)*50 }}">
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 bg-navy-dark rounded-xl flex items-center justify-center text-xl flex-shrink-0">
                        {{ $hukum['icon'] }}
                    </div>
                    <div class="flex-1">
                        <div class="flex items-start justify-between gap-3 mb-2 flex-wrap">
                            <div>
                                <h3 class="font-black text-navy-dark text-base">{{ $hukum['judul'] }}</h3>
                                <span class="text-gold text-xs font-semibold">Tentang: {{ $hukum['tentang'] }}</span>
                            </div>
                            <span class="bg-gold/10 text-gold text-xs font-black px-3 py-1 rounded-full flex-shrink-0">
                                No. {{ $hukum['no'] }}
                            </span>
                        </div>
                        <p class="text-gray-500 text-sm leading-relaxed mt-2">{{ $hukum['isi'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Penutup --}}
        <div class="bg-navy-dark rounded-3xl p-8 mt-10 text-center" data-aos="fade-up">
            <div class="text-4xl mb-4">📚</div>
            <h3 class="text-xl font-black text-white mb-3">Berorganisasi Sesuai Hukum</h3>
            <p class="text-white/60 text-sm leading-relaxed max-w-2xl mx-auto">
                Karang Taruna Desa Pilangsari berkomitmen untuk menjalankan seluruh kegiatan dan program kerja sesuai dengan peraturan perundang-undangan yang berlaku demi terwujudnya organisasi yang profesional dan terpercaya.
            </p>
        </div>

        <div class="text-center mt-10">
            <a href="{{ route('sejarah') }}" class="btn-gold mr-3">← Sejarah Organisasi</a>
            <a href="{{ route('beranda') }}" class="inline-flex items-center gap-2 text-navy-dark hover:text-gold font-semibold text-sm transition-colors">🏠 Beranda</a>
        </div>
    </div>
</section>

@endsection