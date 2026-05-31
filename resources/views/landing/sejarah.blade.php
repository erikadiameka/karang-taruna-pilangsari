@extends('layouts.app')
@section('title', 'Sejarah — Karang Taruna Desa Pilangsari')
@section('description', 'Sejarah berdiri dan perkembangan Karang Taruna Desa Pilangsari dari tahun ke tahun.')

@section('content')

{{-- Hero --}}
<section style="background: linear-gradient(135deg, #07112B 0%, #081F5C 100%); padding: 8rem 0 4rem;">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <div class="section-badge mb-4" data-aos="fade-up">
            <span class="w-1.5 h-1.5 bg-gold rounded-full"></span>
            Latar Belakang
        </div>
        <h1 class="text-4xl md:text-5xl font-black text-white mt-4" data-aos="fade-up" data-aos-delay="100">
            Sejarah <span class="text-gold">Organisasi</span>
        </h1>
        <p class="text-white/50 mt-4 text-sm max-w-xl mx-auto" data-aos="fade-up" data-aos-delay="200">
            Perjalanan panjang Karang Taruna Desa Pilangsari dalam mengabdi untuk masyarakat
        </p>
    </div>
</section>

{{-- Konten Sejarah --}}
<section class="py-20 bg-white">
    <div class="max-w-4xl mx-auto px-4">

        {{-- Intro --}}
        <div class="bg-gray-50 rounded-3xl p-8 mb-12" data-aos="fade-up">
            <div class="flex items-start gap-4">
                <div class="w-12 h-12 bg-gold rounded-xl flex items-center justify-center text-2xl flex-shrink-0">📜</div>
                <div>
                    <h2 class="text-xl font-black text-navy-dark mb-3">Awal Mula Berdiri</h2>
                    <p class="text-gray-500 text-sm leading-relaxed">
                        Karang Taruna Desa Pilangsari lahir dari semangat pemuda-pemudi desa yang ingin berkontribusi nyata bagi kemajuan masyarakat. Didirikan pada tahun <strong>2010</strong>, organisasi ini tumbuh dari kesadaran kolektif generasi muda akan pentingnya peran aktif dalam pembangunan desa.
                    </p>
                </div>
            </div>
        </div>

        {{-- Timeline --}}
        <div class="relative" data-aos="fade-up">
            <div class="absolute left-8 top-0 bottom-0 w-0.5 bg-gold/20"></div>

            @foreach([
            [
            'tahun' => '2010',
            'judul' => 'Pendirian Karang Taruna',
            'desc' => 'Karang Taruna Desa Pilangsari resmi didirikan dengan jumlah anggota awal sebanyak 30 orang pemuda-pemudi desa yang penuh semangat dan tekad untuk membangun desa.',
            'icon' => '🌱'
            ],
            [
            'tahun' => '2012',
            'judul' => 'Kegiatan Pertama',
            'desc' => 'Melaksanakan kegiatan bakti sosial perdana berupa pembersihan lingkungan dan santunan anak yatim yang melibatkan seluruh warga Desa Pilangsari.',
            'icon' => '❤️'
            ],
            [
            'tahun' => '2014',
            'judul' => 'Pembentukan Divisi',
            'desc' => 'Struktur organisasi diperkuat dengan pembentukan 6 divisi: Humas, Sosial, Ekonomi, Seni Budaya, Olahraga, dan Pendidikan untuk mengoptimalkan program kerja.',
            'icon' => '🏗️'
            ],
            [
            'tahun' => '2016',
            'judul' => 'Pengembangan Program',
            'desc' => 'Meluncurkan program unggulan kewirausahaan pemuda dan pelatihan digital untuk meningkatkan kapasitas anggota dalam menghadapi era modern.',
            'icon' => '💡'
            ],
            [
            'tahun' => '2018',
            'judul' => 'Prestasi & Penghargaan',
            'desc' => 'Meraih penghargaan sebagai Karang Taruna terbaik tingkat kecamatan atas dedikasi dalam program sosial kemasyarakatan dan pemberdayaan pemuda.',
            'icon' => '🏆'
            ],
            [
            'tahun' => '2020',
            'judul' => 'Respon COVID-19',
            'desc' => 'Di tengah pandemi, Karang Taruna Desa Pilangsari aktif membantu masyarakat dengan distribusi sembako, masker, dan desinfektan kepada warga yang membutuhkan.',
            'icon' => '🛡️'
            ],
            [
            'tahun' => '2022',
            'judul' => 'Transformasi Digital',
            'desc' => 'Memulai transformasi digital dengan membuat website resmi, media sosial aktif, dan program literasi digital bagi pemuda dan masyarakat desa.',
            'icon' => '💻'
            ],
            [
            'tahun' => '2024',
            'judul' => 'Generasi Baru',
            'desc' => 'Pergantian kepengurusan membawa semangat baru dengan program-program inovatif dan kolaborasi lintas sektor untuk mempercepat pembangunan Desa Pilangsari.',
            'icon' => '🚀'
            ],
            [
            'tahun' => '2025',
            'judul' => 'Saat Ini',
            'desc' => 'Dengan lebih dari 120 anggota aktif, Karang Taruna Desa Pilangsari terus berkomitmen untuk menjadi wadah pengembangan generasi muda yang berdaya saing dan berkontribusi nyata.',
            'icon' => '⭐'
            ],
            ] as $i => $item)
            <div class="relative flex gap-6 mb-10 pl-20" data-aos="fade-up" data-aos-delay="{{ ($i+1)*50 }}">
                {{-- Dot --}}
                <div class="absolute left-5 w-7 h-7 bg-gold rounded-full flex items-center justify-center text-sm border-4 border-white shadow-md" style="top: 4px;">
                    {{ $item['icon'] }}
                </div>
                {{-- Konten --}}
                <div class="bg-gray-50 hover:bg-white rounded-2xl p-6 flex-1 border border-gray-100 hover:shadow-md hover:border-gold/20 transition-all duration-300">
                    <div class="flex items-center gap-3 mb-2">
                        <span class="bg-navy-dark text-gold font-black text-sm px-3 py-1 rounded-lg">{{ $item['tahun'] }}</span>
                        <h3 class="font-black text-navy-dark text-base">{{ $item['judul'] }}</h3>
                    </div>
                    <p class="text-gray-500 text-sm leading-relaxed">{{ $item['desc'] }}</p>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Penutup --}}
        <div class="bg-navy-dark rounded-3xl p-8 mt-8 text-center" data-aos="fade-up">
            <div class="text-4xl mb-4">🌟</div>
            <h3 class="text-xl font-black text-white mb-3">Melanjutkan Warisan, Membangun Masa Depan</h3>
            <p class="text-white/60 text-sm leading-relaxed max-w-2xl mx-auto">
                Sejarah adalah cermin yang memantulkan perjuangan masa lalu untuk menerangi langkah masa depan. Karang Taruna Desa Pilangsari berkomitmen untuk terus berkarya, berinovasi, dan berkontribusi nyata bagi kemajuan desa dan masyarakat.
            </p>
        </div>

        <div class="text-center mt-10">
            <a href="{{ route('tentang') }}" class="btn-gold mr-3">Tentang Kami →</a>
            <a href="{{ route('beranda') }}" class="inline-flex items-center gap-2 text-navy-dark hover:text-gold font-semibold text-sm transition-colors">← Beranda</a>
        </div>
    </div>
</section>

@endsection