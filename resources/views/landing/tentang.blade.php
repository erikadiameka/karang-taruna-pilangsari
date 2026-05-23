@extends('layouts.app')
@section('title', 'Tentang Kami — Karang Taruna Desa Pilangsari')

@section('content')

{{-- Hero --}}
<section class="relative py-32 overflow-hidden"
    style="background: linear-gradient(135deg, #07112B 0%, #081F5C 100%);">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="section-badge mb-4" data-aos="fade-up">
            <span class="w-1.5 h-1.5 bg-gold rounded-full"></span>
            Tentang Kami
        </div>
        <h1 class="text-4xl md:text-5xl font-black text-white mt-4" data-aos="fade-up" data-aos-delay="100">
            Karang Taruna <span class="text-gold">Desa Pilangsari</span>
        </h1>
        <p class="text-white/60 mt-4 max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="200">
            Organisasi sosial kepemudaan yang bergerak untuk kemajuan dan kesejahteraan masyarakat Desa Pilangsari.
        </p>
    </div>
</section>

{{-- Sejarah --}}
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div data-aos="fade-right">
                <div class="section-badge mb-4">
                    <span class="w-1.5 h-1.5 bg-gold rounded-full"></span>
                    Sejarah
                </div>
                <h2 class="text-3xl font-black text-navy-dark">
                    Berdiri Sejak <span class="text-gold">Tahun 2010</span>
                </h2>
                <p class="text-gray-500 text-sm leading-relaxed mt-4">
                    Karang Taruna Desa Pilangsari adalah organisasi sosial kepemudaan sebagai wadah pengembangan generasi muda nonpartisan, yang tumbuh dan berkembang atas dasar kesadaran dan tanggung jawab sosial dari, oleh dan untuk masyarakat terutama generasi muda di Desa Pilangsari.
                </p>
                <p class="text-gray-500 text-sm leading-relaxed mt-4">
                    Sejak berdiri, Karang Taruna Desa Pilangsari telah aktif melaksanakan berbagai program kegiatan sosial, pendidikan, ekonomi, seni budaya, dan olahraga untuk meningkatkan kualitas hidup masyarakat desa.
                </p>
                <div class="grid grid-cols-2 gap-4 mt-8">
                    @foreach([
                    ['value' => '120+', 'label' => 'Anggota Aktif'],
                    ['value' => '48+', 'label' => 'Kegiatan'],
                    ['value' => '14+', 'label' => 'Tahun Berdiri'],
                    ['value' => '6', 'label' => 'Divisi'],
                    ] as $s)
                    <div class="bg-navy-dark rounded-2xl p-5 text-center">
                        <div class="text-2xl font-black text-gold">{{ $s['value'] }}</div>
                        <div class="text-white/60 text-xs mt-1">{{ $s['label'] }}</div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div data-aos="fade-left">
                <img src="https://images.unsplash.com/photo-1529156069898-49953e39b3ac?w=600&q=80"
                    alt="Karang Taruna" class="w-full rounded-2xl shadow-xl">
            </div>
        </div>
    </div>
</section>

{{-- Visi Misi --}}
<section class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12" data-aos="fade-up">
            <div class="section-badge mb-4">
                <span class="w-1.5 h-1.5 bg-gold rounded-full"></span>
                Visi & Misi
            </div>
            <h2 class="text-3xl font-black text-navy-dark">Landasan <span class="text-gold">Organisasi</span></h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-navy-dark rounded-2xl p-8" data-aos="fade-right">
                <div class="w-12 h-12 bg-gold rounded-xl flex items-center justify-center text-2xl mb-4">🎯</div>
                <h3 class="text-xl font-bold text-white mb-4">Visi</h3>
                <p class="text-white/60 leading-relaxed">
                    Terwujudnya generasi muda Desa Pilangsari yang beriman, bertakwa, berkarakter, mandiri, berdaya saing, dan berkontribusi nyata bagi kemajuan desa dan bangsa.
                </p>
            </div>
            <div class="bg-navy-dark rounded-2xl p-8" data-aos="fade-left">
                <div class="w-12 h-12 bg-gold rounded-xl flex items-center justify-center text-2xl mb-4">🚀</div>
                <h3 class="text-xl font-bold text-white mb-4">Misi</h3>
                <ul class="text-white/60 space-y-2 text-sm">
                    @foreach([
                    'Meningkatkan kualitas SDM generasi muda melalui pendidikan dan pelatihan',
                    'Mengembangkan jiwa kewirausahaan dan kemandirian ekonomi pemuda',
                    'Melestarikan seni, budaya, dan kearifan lokal Desa Pilangsari',
                    'Menumbuhkan semangat gotong royong dan kepedulian sosial',
                    'Membangun kerjasama dengan berbagai pihak untuk kemajuan desa',
                    ] as $m)
                    <li class="flex items-start gap-2">
                        <span class="text-gold mt-0.5">✓</span>
                        {{ $m }}
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>

{{-- Struktur Divisi --}}
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12" data-aos="fade-up">
            <div class="section-badge mb-4">

                <span class="w-1.5 h-1.5 bg-gold rounded-full"></span>
                Struktur
            </div>
            <h2 class="text-3xl font-black text-navy-dark">Divisi <span class="text-gold">Organisasi</span></h2>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
            @foreach([
            ['emoji' => '📢', 'nama' => 'Humas'],
            ['emoji' => '❤️', 'nama' => 'Sosial'],
            ['emoji' => '💼', 'nama' => 'Ekonomi'],
            ['emoji' => '🎭', 'nama' => 'Seni Budaya'],
            ['emoji' => '⚽', 'nama' => 'Olahraga'],
            ['emoji' => '📚', 'nama' => 'Pendidikan'],
            ] as $i => $div)
            <div class="bg-gray-50 rounded-2xl p-5 text-center hover:bg-navy-dark transition-all duration-300 group cursor-pointer"
                data-aos="fade-up" data-aos-delay="{{ ($i+1) * 50 }}">
                <div class="text-3xl mb-3">{{ $div['emoji'] }}</div>
                <div class="font-bold text-navy-dark group-hover:text-white text-sm transition-colors">{{ $div['nama'] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Tombol Kembali --}}
<div class="bg-gray-50 py-10 text-center">
    <a href="{{ route('beranda') }}" class="btn-gold">
        ← Kembali ke Beranda
    </a>
</div>

@endsection