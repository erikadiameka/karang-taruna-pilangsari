@extends('layouts.app')
@section('title', 'UMKM & Karya Pemuda — Karang Taruna Desa Pilangsari')
@section('description', 'Katalog usaha kreatif, produk, dan jasa yang dikelola oleh pemuda-pemudi kreatif Desa Pilangsari.')

@section('content')

{{-- Hero Section --}}
<section style="background: linear-gradient(135deg, #07112B 0%, #081F5C 100%); padding: 8rem 0 4rem;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="section-badge mb-4 mx-auto" data-aos="fade-up" style="width: fit-content; display: flex; align-items: center; gap: 0.5rem; background: rgba(212, 175, 55, 0.1); color: #D4AF37; border: 1px solid rgba(212, 175, 55, 0.2); padding: 0.25rem 0.75rem; border-radius: 9999px; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; tracking-wider;">
            <span class="w-1.5 h-1.5 bg-gold rounded-full" style="width: 6px; height: 6px; background-color: #D4AF37; border-radius: 9999px;"></span>
            Kemandirian Ekonomi
        </div>
        <h1 class="text-4xl md:text-5xl font-black text-white mt-4" data-aos="fade-up" data-aos-delay="100">
            UMKM & <span class="text-gold" style="color: #D4AF37;">Karya Pemuda</span>
        </h1>
        <p class="text-white/50 mt-4 text-sm max-w-xl mx-auto" data-aos="fade-up" data-aos-delay="200">
            Mendukung perekonomian lokal dengan mempromosikan produk kreatif, kuliner, kerajinan, dan jasa terbaik dari pemuda-pemudi Desa Pilangsari.
        </p>
    </div>
</section>

<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Pengantar & Ajakan --}}
        <div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-sm mb-16 flex flex-col md:flex-row items-center justify-between gap-6" data-aos="fade-up">
            <div class="flex items-start gap-4">
                <div class="w-12 h-12 bg-gold/10 text-gold rounded-xl flex items-center justify-center text-2xl flex-shrink-0" style="background-color: rgba(212, 175, 55, 0.1); color: #D4AF37;">🛍️</div>
                <div>
                    <h3 class="text-xl font-bold text-navy-dark" style="color: #07112B;">Beli Kreativitas Lokal, Dukung Pemuda Desa</h3>
                    <p class="text-gray-500 text-xs mt-1 leading-relaxed max-w-2xl">
                        Katalog ini adalah bentuk apresiasi dan sarana promosi gratis bagi wirausaha muda di Desa Pilangsari. Hubungi kontak masing-masing pemilik usaha untuk melakukan pemesanan.
                    </p>
                </div>
            </div>
            <a href="https://wa.me/6281234567890?text=Halo%20Admin%20Karang%20Taruna%2C%20saya%20ingin%20mendaftarkan%20usaha%20UMKM%20pemuda%20saya%20ke%20website" class="bg-navy-dark hover:bg-gold text-white hover:text-navy-dark text-xs font-bold px-6 py-3.5 rounded-xl transition-all duration-300 flex-shrink-0 flex items-center gap-2" style="background-color: #07112B;">
                <span>＋</span> Daftarkan Usaha Anda
            </a>
        </div>

        {{-- Grid Katalog UMKM --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-20" data-aos="fade-up">
            @foreach([
                [
                    'tag' => 'Makanan & Minuman',
                    'nama' => 'Kopi Robusta Pilangsari',
                    'pemilik' => 'Gilang Ramadhan',
                    'deskripsi' => 'Kopi robusta premium hasil olahan pemuda tani Pilangsari dengan cita rasa yang mantap dan khas.',
                    'harga' => 'Rp 15.000 / pack',
                    'wa' => '6281234567890',
                    'img' => 'https://images.unsplash.com/photo-1514432324607-a09d9b4aefdd?w=400&q=80',
                    'icon' => '☕'
                ],
                [
                    'tag' => 'Kerajinan Tangan',
                    'nama' => 'Pilangsari Craft & Bamboo',
                    'pemilik' => 'Erik Adia Meka',
                    'deskripsi' => 'Kerajinan bambu kreatif, perabotan rumah tangga hias, dan wadah anyaman ramah lingkungan.',
                    'harga' => 'Mulai Rp 20.000',
                    'wa' => '6281234567890',
                    'img' => 'https://images.unsplash.com/photo-1513519245088-0e12902e5a38?w=400&q=80',
                    'icon' => '🎍'
                ],
                [
                    'tag' => 'Jasa Digital & Cetak',
                    'nama' => 'Pilar Media & Grafis',
                    'pemilik' => 'Gilang Ramadhan',
                    'deskripsi' => 'Jasa pembuatan logo, desain undangan pernikahan, sablon kaos kustom, dan spanduk instan cepat.',
                    'harga' => 'Harga Bersahabat',
                    'wa' => '6281234567890',
                    'img' => 'https://images.unsplash.com/photo-1542744094-3a31f103e35f?w=400&q=80',
                    'icon' => '💻'
                ],
                [
                    'tag' => 'Pakaian & Merchandise',
                    'nama' => 'Kartar Wear & Sablon',
                    'pemilik' => 'Aditya Pratama',
                    'deskripsi' => 'Produksi kaos, jaket angkatan, kemeja PDL, topi kustom, dan merchandise resmi Karang Taruna.',
                    'harga' => 'Mulai Rp 65.000',
                    'wa' => '6281234567890',
                    'img' => 'https://images.unsplash.com/photo-1521572267360-ee0c2909d518?w=400&q=80',
                    'icon' => '👕'
                ]
            ] as $umkm)
            <div class="bg-white border border-gray-100 rounded-3xl overflow-hidden shadow-sm hover:shadow-md transition-all duration-300 flex flex-col justify-between group">
                <div>
                    {{-- Image Header --}}
                    <div class="h-44 overflow-hidden relative bg-navy-dark">
                        <img src="{{ $umkm['img'] }}" alt="{{ $umkm['nama'] }}" class="w-full h-full object-cover opacity-80 group-hover:scale-105 transition-transform duration-500">
                        <span class="absolute top-3 left-3 bg-white/90 backdrop-blur text-navy-dark text-[10px] font-black px-2.5 py-1 rounded-full uppercase tracking-wider shadow" style="color: #07112B;">
                            {{ $umkm['tag'] }}
                        </span>
                        <div class="absolute bottom-3 right-3 w-8 h-8 bg-gold rounded-full flex items-center justify-center text-base shadow" style="background-color: #D4AF37;">
                            {{ $umkm['icon'] }}
                        </div>
                    </div>
                    
                    {{-- Detail Text --}}
                    <div class="p-6">
                        <h4 class="font-black text-navy-dark text-base" style="color: #07112B;">{{ $umkm['nama'] }}</h4>
                        <div class="text-[11px] text-gold font-bold mt-1" style="color: #D4AF37;">Pemilik: {{ $umkm['pemilik'] }}</div>
                        <p class="text-gray-500 text-xs mt-3 leading-relaxed">
                            {{ $umkm['deskripsi'] }}
                        </p>
                    </div>
                </div>

                {{-- Footer Action --}}
                <div class="p-6 pt-0">
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Estimasi Harga</span>
                        <span class="text-xs font-extrabold text-navy-dark" style="color: #07112B;">{{ $umkm['harga'] }}</span>
                    </div>
                    <a href="https://wa.me/{{ $umkm['wa'] }}?text=Halo%20{{ urlencode($umkm['pemilik']) }}%2C%20saya%20melihat%20usaha%20Anda%20di%20website%20Karang%20Taruna%20dan%20tertarik%20dengan%20{{ urlencode($umkm['nama']) }}" target="_blank" class="w-full bg-navy-dark hover:bg-gold text-white hover:text-navy-dark text-xs font-bold py-3 rounded-xl transition-all duration-300 flex items-center justify-center gap-1.5" style="background-color: #07112B;">
                        <span>💬</span> Tanya Pemilik Usaha
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Banner Call To Action --}}
        <div class="bg-navy-dark rounded-3xl p-8 md:p-12 text-white relative overflow-hidden" data-aos="fade-up" style="background: linear-gradient(135deg, #07112B 0%, #0d2157 100%);">
            <div class="absolute -right-10 -bottom-10 w-44 h-44 bg-gold/5 rounded-full"></div>
            <div class="max-w-3xl relative">
                <span class="text-gold text-xs font-black uppercase tracking-wider" style="color: #D4AF37;">Pemasaran UMKM Gratis</span>
                <h3 class="text-2xl md:text-3xl font-black text-white mt-2">Usaha Pemuda Desa Belum Ada di Sini?</h3>
                <p class="text-white/60 text-xs mt-3 leading-relaxed">
                    Bagi Anda pemuda-pemudi Desa Pilangsari yang memiliki produk barang, kuliner, kerajinan, maupun jasa komersial, mari bergabung di katalog ini secara gratis. Kirimkan foto produk, deskripsi singkat, nama pemilik, dan nomor kontak aktif Anda.
                </p>
                <div class="mt-8 flex flex-wrap gap-4">
                    <a href="https://wa.me/6281234567890?text=Halo%20Admin%20Karang%20Taruna%2C%20saya%20ingin%20mendaftarkan%20usaha%20UMKM%20pemuda%20saya%20ke%20website" class="bg-gold hover:bg-gold-light text-navy-dark font-semibold text-xs px-5 py-3 rounded-xl transition-all duration-300 hover:scale-105" style="background-color: #D4AF37;">
                        Daftar Lewat WhatsApp →
                    </a>
                    <a href="{{ route('kontak') }}" class="bg-white/5 hover:bg-white/10 text-white font-semibold text-xs px-5 py-3 rounded-xl transition-all duration-300">
                        Hubungi Lewat Web
                    </a>
                </div>
            </div>
        </div>

        <div class="text-center mt-12">
            <a href="{{ route('beranda') }}" class="inline-flex items-center gap-2 bg-gold hover:bg-gold-light text-navy-dark font-semibold text-sm px-6 py-3 rounded-xl transition-all duration-300 hover:scale-105 shadow-md shadow-gold/20" style="background-color: #D4AF37;">
                ← Kembali ke Beranda
            </a>
        </div>
        
    </div>
</section>

@endsection
