@extends('layouts.app')
@section('title', 'Transparansi Keuangan — Karang Taruna Desa Pilangsari')
@section('description', 'Bentuk akuntabilitas publik dan transparansi anggaran Karang Taruna Desa Pilangsari.')

@section('content')

{{-- Hero Section --}}
<section style="background: linear-gradient(135deg, #07112B 0%, #081F5C 100%); padding: 8rem 0 4rem;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="section-badge mb-4 mx-auto" data-aos="fade-up" style="width: fit-content; display: flex; align-items: center; gap: 0.5rem; background: rgba(212, 175, 55, 0.1); color: #D4AF37; border: 1px solid rgba(212, 175, 55, 0.2); padding: 0.25rem 0.75rem; border-radius: 9999px; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; tracking-wider;">
            <span class="w-1.5 h-1.5 bg-gold rounded-full" style="width: 6px; height: 6px; background-color: #D4AF37; border-radius: 9999px;"></span>
            Akuntabilitas Publik
        </div>
        <h1 class="text-4xl md:text-5xl font-black text-white mt-4" data-aos="fade-up" data-aos-delay="100">
            Transparansi <span class="text-gold" style="color: #D4AF37;">Keuangan</span>
        </h1>
        <p class="text-white/50 mt-4 text-sm max-w-xl mx-auto" data-aos="fade-up" data-aos-delay="200">
            Komitmen kami untuk menyajikan laporan anggaran yang jujur, terbuka, dan akuntabel demi kemajuan kepemudaan Desa Pilangsari.
        </p>
    </div>
</section>

<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Ringkasan Kas --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16" data-aos="fade-up">
            <div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-sm relative overflow-hidden group hover:shadow-md transition-all duration-300">
                <div class="absolute top-0 right-0 w-24 h-24 bg-green-500/5 rounded-bl-full flex items-center justify-center text-3xl group-hover:scale-110 transition-transform">💰</div>
                <p class="text-gray-400 text-xs font-semibold uppercase tracking-wider">Total Kas Masuk (2025/2026)</p>
                <h3 class="text-3xl font-black text-navy-dark mt-2" style="color: #07112B;">Rp 24.500.000</h3>
                <span class="text-green-500 text-xs font-semibold mt-2 inline-flex items-center gap-1">
                    ↑ Dana Desa & Donasi
                </span>
            </div>
            
            <div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-sm relative overflow-hidden group hover:shadow-md transition-all duration-300">
                <div class="absolute top-0 right-0 w-24 h-24 bg-red-500/5 rounded-bl-full flex items-center justify-center text-3xl group-hover:scale-110 transition-transform">💸</div>
                <p class="text-gray-400 text-xs font-semibold uppercase tracking-wider">Kas Terpakai (Realisasi)</p>
                <h3 class="text-3xl font-black text-navy-dark mt-2" style="color: #07112B;">Rp 18.250.000</h3>
                <span class="text-red-500 text-xs font-semibold mt-2 inline-flex items-center gap-1">
                    ↓ Pelaksanaan Program
                </span>
            </div>
            
            <div class="bg-white rounded-3xl p-8 border border-navy-dark/10 shadow-sm relative overflow-hidden group hover:shadow-md transition-all duration-300" style="background: linear-gradient(135deg, #07112B 0%, #0d1e4c 100%);">
                <div class="absolute top-0 right-0 w-24 h-24 bg-gold/5 rounded-bl-full flex items-center justify-center text-3xl group-hover:scale-110 transition-transform">✨</div>
                <p class="text-white/50 text-xs font-semibold uppercase tracking-wider">Sisa Saldo Kas Aktif</p>
                <h3 class="text-3xl font-black text-gold mt-2" style="color: #D4AF37;">Rp 6.250.000</h3>
                <span class="text-gold text-xs font-semibold mt-2 inline-flex items-center gap-1" style="color: #D4AF37;">
                    ★ Siap Dialokasikan
                </span>
            </div>
        </div>

        {{-- Visual Alokasi Anggaran --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-20 items-center">
            <div data-aos="fade-right">
                <div class="section-badge mb-4" style="width: fit-content; display: flex; align-items: center; gap: 0.5rem; background: rgba(212, 175, 55, 0.1); color: #D4AF37; border: 1px solid rgba(212, 175, 55, 0.2); padding: 0.25rem 0.75rem; border-radius: 9999px; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; tracking-wider;">
                    Presentase Distribusi
                </div>
                <h2 class="text-3xl font-black text-navy-dark" style="color: #07112B;">Alokasi Dana <span class="text-gold" style="color: #D4AF37;">Kegiatan</span></h2>
                <p class="text-gray-500 text-sm leading-relaxed mt-4">
                    Setiap dana yang masuk dialokasikan secara proporsional untuk kegiatan kepemudaan, sosial kemasyarakatan, serta pengembangan sumber daya manusia (SDM) di Desa Pilangsari.
                </p>
                <div class="mt-8 space-y-5">
                    @foreach([
                        ['label' => 'Sosial Kemasyarakatan & Bakti Sosial', 'perc' => '40%', 'val' => 'Rp 7.300.000', 'color' => 'bg-gold'],
                        ['label' => 'Olahraga & Seni Budaya', 'perc' => '30%', 'val' => 'Rp 5.475.000', 'color' => 'bg-blue-600'],
                        ['label' => 'Pelatihan & Kewirausahaan Pemuda', 'perc' => '20%', 'val' => 'Rp 3.650.000', 'color' => 'bg-green-600'],
                        ['label' => 'Operasional Organisasi & ATK', 'perc' => '10%', 'val' => 'Rp 1.825.000', 'color' => 'bg-purple-600'],
                    ] as $i => $item)
                    <div>
                        <div class="flex justify-between text-sm font-semibold text-navy-dark mb-1">
                            <span style="color: #07112B;">{{ $item['label'] }}</span>
                            <span class="text-gold" style="color: #D4AF37;">{{ $item['perc'] }} ({{ $item['val'] }})</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2.5 overflow-hidden">
                            <div class="{{ $item['color'] }} h-2.5 rounded-full" style="width: {{ $item['perc'] }}; background-color: {{ $item['color'] === 'bg-gold' ? '#D4AF37' : '' }};"></div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            
            <div data-aos="fade-left" class="bg-navy-dark rounded-3xl p-8 text-white relative overflow-hidden" style="background: #07112B;">
                <h3 class="text-xl font-bold text-white mb-6">Sumber Pendanaan</h3>
                <div class="space-y-6">
                    @foreach([
                        ['icon' => '🏛️', 'source' => 'Dana Hibah Pemerintah Desa', 'desc' => 'Dukungan resmi APBDES untuk operasional kelembagaan desa.', 'amount' => 'Rp 15.000.000'],
                        ['icon' => '🤝', 'source' => 'Sponsorship & Donatur', 'desc' => 'Kerjasama dengan usaha lokal dan donasi sukarela warga.', 'amount' => 'Rp 6.500.000'],
                        ['icon' => '🛍️', 'source' => 'Usaha Mandiri Karang Taruna', 'desc' => 'Hasil penjualan merchandise dan jasa kepemudaan.', 'amount' => 'Rp 3.000.000'],
                    ] as $source)
                    <div class="flex gap-4 items-start">
                        <div class="w-10 h-10 bg-white/5 rounded-lg flex items-center justify-center text-xl flex-shrink-0">
                            {{ $source['icon'] }}
                        </div>
                        <div class="flex-1">
                            <div class="flex justify-between items-start">
                                <h4 class="font-bold text-sm text-white">{{ $source['source'] }}</h4>
                                <span class="text-gold text-sm font-bold" style="color: #D4AF37;">{{ $source['amount'] }}</span>
                            </div>
                            <p class="text-white/50 text-xs mt-1 leading-relaxed">{{ $source['desc'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- Laporan Pertanggungjawaban (LPJ) --}}
        <div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-sm" data-aos="fade-up">
            <div class="flex justify-between items-center mb-8 flex-wrap gap-4">
                <div>
                    <h3 class="text-2xl font-black text-navy-dark" style="color: #07112B;">Dokumen <span class="text-gold" style="color: #D4AF37;">LPJ</span></h3>
                    <p class="text-gray-400 text-xs mt-1">Unduh Laporan Pertanggungjawaban Resmi secara transparan.</p>
                </div>
                <span class="bg-gold/10 text-gold text-xs font-black px-3 py-1 rounded-full" style="background-color: rgba(212, 175, 55, 0.1); color: #D4AF37;">
                    Update Terakhir: Juni 2026
                </span>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-gray-500">
                    <thead class="text-xs text-navy-dark uppercase bg-gray-50" style="color: #07112B;">
                        <tr>
                            <th scope="col" class="px-6 py-4 rounded-l-xl">No</th>
                            <th scope="col" class="px-6 py-4">Nama Laporan Kegiatan</th>
                            <th scope="col" class="px-6 py-4">Tahun</th>
                            <th scope="col" class="px-6 py-4">Ukuran</th>
                            <th scope="col" class="px-6 py-4 rounded-r-xl text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach([
                            ['no' => '01', 'nama' => 'Laporan Pertanggungjawaban (LPJ) Peringatan HUT RI Ke-80', 'tahun' => '2025', 'size' => '2.4 MB', 'link' => '#'],
                            ['no' => '02', 'nama' => 'Laporan Keuangan Bakti Sosial Ramadhan & Santunan Anak Yatim', 'tahun' => '2025', 'size' => '1.8 MB', 'link' => '#'],
                            ['no' => '03', 'nama' => 'Laporan Penyelenggaraan Turnamen Sepakbola Karang Taruna Cup II', 'tahun' => '2024', 'size' => '3.1 MB', 'link' => '#'],
                            ['no' => '04', 'nama' => 'Laporan Penggunaan Dana Hibah Operasional Karang Taruna', 'tahun' => '2024', 'size' => '1.5 MB', 'link' => '#'],
                        ] as $lpj)
                        <tr class="hover:bg-gray-50/50 transition-colors">
                            <td class="px-6 py-4 font-bold text-navy-dark" style="color: #07112B;">{{ $lpj['no'] }}</td>
                            <td class="px-6 py-4 font-semibold text-gray-800">{{ $lpj['nama'] }}</td>
                            <td class="px-6 py-4">{{ $lpj['tahun'] }}</td>
                            <td class="px-6 py-4 text-xs font-mono text-gray-400">{{ $lpj['size'] }}</td>
                            <td class="px-6 py-4 text-center">
                                <a href="{{ $lpj['link'] }}" class="inline-flex items-center gap-1.5 bg-navy-dark hover:bg-gold text-white hover:text-navy-dark text-xs font-bold px-4 py-2 rounded-xl transition-all duration-300" style="background-color: #07112B;">
                                    <span>📥</span> Unduh PDF
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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
