@extends('layouts.app')
@section('title', 'Klub & Komunitas Pemuda — Karang Taruna Desa Pilangsari')
@section('description', 'Wadah pengembangan bakat, minat, olahraga, seni budaya, dan hobi pemuda Desa Pilangsari.')

@section('content')

{{-- Hero Section --}}
<section style="background: linear-gradient(135deg, #07112B 0%, #081F5C 100%); padding: 8rem 0 4rem;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="section-badge mb-4 mx-auto" data-aos="fade-up" style="width: fit-content; display: flex; align-items: center; gap: 0.5rem; background: rgba(212, 175, 55, 0.1); color: #D4AF37; border: 1px solid rgba(212, 175, 55, 0.2); padding: 0.25rem 0.75rem; border-radius: 9999px; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; tracking-wider;">
            <span class="w-1.5 h-1.5 bg-gold rounded-full" style="width: 6px; height: 6px; background-color: #D4AF37; border-radius: 9999px;"></span>
            Minat & Bakat
        </div>
        <h1 class="text-4xl md:text-5xl font-black text-white mt-4" data-aos="fade-up" data-aos-delay="100">
            Klub & <span class="text-gold" style="color: #D4AF37;">Komunitas Pemuda</span>
        </h1>
        <p class="text-white/50 mt-4 text-sm max-w-xl mx-auto" data-aos="fade-up" data-aos-delay="200">
            Wadah resmi kepemudaan untuk menyalurkan kreativitas, menjaga kebugaran jasmani, melestarikan budaya, serta menyalurkan hobi positif.
        </p>
    </div>
</section>

<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Pengantar --}}
        <div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-sm mb-16" data-aos="fade-up">
            <div class="flex items-start gap-4">
                <div class="w-12 h-12 bg-navy-dark rounded-xl flex items-center justify-center text-2xl flex-shrink-0" style="background-color: #07112B;">🏆</div>
                <div>
                    <h3 class="text-xl font-bold text-navy-dark" style="color: #07112B;">Wadah Positif Pemuda Aktif</h3>
                    <p class="text-gray-500 text-xs mt-2 leading-relaxed">
                        Karang Taruna Desa Pilangsari menaungi berbagai kelompok minat bakat agar seluruh potensi pemuda dapat tersalurkan dengan baik. Setiap klub bersifat terbuka dan gratis bagi seluruh warga Desa Pilangsari yang ingin berpartisipasi dan belajar bersama.
                    </p>
                </div>
            </div>
        </div>

        {{-- Grid Klub & Komunitas --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-20" data-aos="fade-up">
            @foreach([
                [
                    'emoji' => '⚽',
                    'nama' => 'Pilangsari FC (Klub Sepak Bola)',
                    'koordinator' => 'Erik Adia Meka',
                    'jadwal' => 'Setiap Minggu Sore, Pukul 15.30 WIB',
                    'tempat' => 'Stadion Gelora Desa Pilangsari',
                    'deskripsi' => 'Wadah bagi pemuda penyuka olahraga sepak bola untuk berlatih fisik, teknik, dan taktik bermain bola secara disiplin, sekaligus mempersiapkan tim desa untuk turnamen eksternal.',
                    'wa' => '6281234567890'
                ],
                [
                    'emoji' => '🏐',
                    'nama' => 'Tunas Muda VC (Klub Bola Voli)',
                    'koordinator' => 'Gilang Ramadhan',
                    'jadwal' => 'Setiap Selasa & Jumat Sore, Pukul 16.00 WIB',
                    'tempat' => 'Lapangan Voli Balai Desa Pilangsari',
                    'deskripsi' => 'Komunitas aktif bola voli pemuda desa yang rutin berlatih fisik bersama, tanding persahabatan antar dusun, serta rutin mengikuti laga persahabatan tingkat kecamatan.',
                    'wa' => '6281234567890'
                ],
                [
                    'emoji' => '🎭',
                    'nama' => 'Sanggar Seni Raksa Budaya (Seni & Tari)',
                    'koordinator' => 'Gilang Ramadhan',
                    'jadwal' => 'Setiap Sabtu Malam, Pukul 19.30 WIB',
                    'tempat' => 'Pendopo Balai Desa Pilangsari',
                    'deskripsi' => 'Wadah pelestarian kebudayaan sunda seperti seni karawitan, musik angklung/calung, tari jaipongan, pencak silat, serta teater drama lokal pemuda desa.',
                    'wa' => '6281234567890'
                ],
                [
                    'emoji' => '🎮',
                    'nama' => 'Esports Community Pilangsari (Gaming)',
                    'koordinator' => 'Aditya Pratama',
                    'jadwal' => 'Setiap Malam Minggu, Pukul 20.00 WIB',
                    'tempat' => 'Basecamp Karang Taruna Desa Pilangsari',
                    'deskripsi' => 'Kelompok bagi penggemar game taktis (Mobile Legends, PUBG Mobile, Free Fire) untuk mabar mingguan, analisis gameplay, serta persiapan turnamen e-sports resmi regional.',
                    'wa' => '6281234567890'
                ]
            ] as $klub)
            <div class="bg-white border border-gray-100 rounded-3xl p-8 shadow-sm hover:shadow-md transition-all duration-300 flex flex-col justify-between group hover:border-gold/30">
                <div>
                    {{-- Header Klub --}}
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-14 h-14 bg-navy-dark/5 rounded-2xl flex items-center justify-center text-3xl group-hover:scale-110 transition-transform duration-300">
                            {{ $klub['emoji'] }}
                        </div>
                        <div>
                            <h4 class="font-black text-navy-dark text-base leading-snug" style="color: #07112B;">{{ $klub['nama'] }}</h4>
                            <div class="text-[11px] text-gold font-bold mt-0.5" style="color: #D4AF37;">Koordinator: {{ $klub['koordinator'] }}</div>
                        </div>
                    </div>
                    
                    {{-- Deskripsi --}}
                    <p class="text-gray-500 text-xs leading-relaxed mb-6">
                        {{ $klub['deskripsi'] }}
                    </p>

                    {{-- Informasi Rutin --}}
                    <div class="bg-gray-50 rounded-2xl p-4 space-y-2 border border-gray-150 mb-6">
                        <div class="flex items-start gap-2 text-xs">
                            <span class="text-navy-dark flex-shrink-0" style="color: #07112B;">📅</span>
                            <div>
                                <span class="font-bold text-navy-dark block" style="color: #07112B;">Jadwal Rutin:</span>
                                <span class="text-gray-500 text-[11px]">{{ $klub['jadwal'] }}</span>
                            </div>
                        </div>
                        <div class="flex items-start gap-2 text-xs">
                            <span class="text-navy-dark flex-shrink-0" style="color: #07112B;">📍</span>
                            <div>
                                <span class="font-bold text-navy-dark block" style="color: #07112B;">Tempat Latihan:</span>
                                <span class="text-gray-500 text-[11px]">{{ $klub['tempat'] }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Action button --}}
                <div>
                    <a href="https://wa.me/{{ $klub['wa'] }}?text=Halo%20{{ urlencode($klub['koordinator']) }}%2C%20saya%20pemuda%20Desa%20Pilangsari%20ingin%20bergabung%20dengan%20{{ urlencode($klub['nama']) }}" target="_blank" class="w-full bg-navy-dark hover:bg-gold text-white hover:text-navy-dark text-xs font-bold py-3 rounded-xl transition-all duration-300 flex items-center justify-center gap-1.5" style="background-color: #07112B;">
                        <span>👋</span> Hubungi & Gabung Klub
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Form / Ajakan Bikin Klub Baru --}}
        <div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-sm flex flex-col md:flex-row items-center justify-between gap-8" data-aos="fade-up">
            <div class="max-w-2xl">
                <span class="text-gold text-xs font-black uppercase tracking-wider" style="color: #D4AF37;">Pemberdayaan Bakat</span>
                <h3 class="text-xl font-bold text-navy-dark mt-1" style="color: #07112B;">Ingin Membentuk Klub atau Komunitas Baru?</h3>
                <p class="text-gray-500 text-xs mt-2 leading-relaxed">
                    Jika Anda dan minimal 5 pemuda Desa Pilangsari memiliki minat hobi yang sama (seperti klub robotik, fotografi, badminton, tenis meja, atau komunitas membaca) dan ingin membentuk wadah resmi, hubungi pengurus Karang Taruna. Kami siap memberikan dukungan sarana dan legalitas pembentukan unit kerja baru!
                </p>
            </div>
            <a href="https://wa.me/6281234567890?text=Halo%20Admin%20Karang%20Taruna%2C%20saya%20dan%20teman-teman%20ingin%20mengajukan%20pembentukan%20klub%20hobi%20baru" class="bg-navy-dark hover:bg-gold text-white hover:text-navy-dark text-xs font-bold px-6 py-4 rounded-xl transition-all duration-300 whitespace-nowrap" style="background-color: #07112B;">
                Hubungi Admin Karang Taruna →
            </a>
        </div>

        <div class="text-center mt-12">
            <a href="{{ route('beranda') }}" class="inline-flex items-center gap-2 bg-gold hover:bg-gold-light text-navy-dark font-semibold text-sm px-6 py-3 rounded-xl transition-all duration-300 hover:scale-105 shadow-md shadow-gold/20" style="background-color: #D4AF37;">
                ← Kembali ke Beranda
            </a>
        </div>
        
    </div>
</section>

@endsection
