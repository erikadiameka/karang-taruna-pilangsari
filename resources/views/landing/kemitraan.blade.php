@extends('layouts.app')
@section('title', 'Kemitraan & Kolaborasi — Karang Taruna Desa Pilangsari')
@section('description', 'Kolaborasi bersama Karang Taruna Desa Pilangsari untuk kemajuan sosial, ekonomi, dan pemuda desa.')

@section('content')

{{-- Hero Section --}}
<section style="background: linear-gradient(135deg, #07112B 0%, #081F5C 100%); padding: 8rem 0 4rem;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="section-badge mb-4 mx-auto" data-aos="fade-up" style="width: fit-content; display: flex; align-items: center; gap: 0.5rem; background: rgba(212, 175, 55, 0.1); color: #D4AF37; border: 1px solid rgba(212, 175, 55, 0.2); padding: 0.25rem 0.75rem; border-radius: 9999px; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; tracking-wider;">
            <span class="w-1.5 h-1.5 bg-gold rounded-full" style="width: 6px; height: 6px; background-color: #D4AF37; border-radius: 9999px;"></span>
            Sinergi & Kolaborasi
        </div>
        <h1 class="text-4xl md:text-5xl font-black text-white mt-4" data-aos="fade-up" data-aos-delay="100">
            Kemitraan & <span class="text-gold" style="color: #D4AF37;">Kolaborasi</span>
        </h1>
        <p class="text-white/50 mt-4 text-sm max-w-xl mx-auto" data-aos="fade-up" data-aos-delay="200">
            Membangun kemitraan strategis dengan pelaku usaha, instansi pemerintah, dan komunitas untuk menciptakan dampak positif bagi Desa Pilangsari.
        </p>
    </div>
</section>

<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Mengapa Bermitra --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center mb-24">
            <div data-aos="fade-right">
                <div class="section-badge mb-4" style="width: fit-content; display: flex; align-items: center; gap: 0.5rem; background: rgba(212, 175, 55, 0.1); color: #D4AF37; border: 1px solid rgba(212, 175, 55, 0.2); padding: 0.25rem 0.75rem; border-radius: 9999px; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; tracking-wider;">
                    Kolaborasi Bernilai
                </div>
                <h2 class="text-3xl font-black text-navy-dark" style="color: #07112B;">Mengapa Bermitra <br>Dengan <span class="text-gold" style="color: #D4AF37;">Kami?</span></h2>
                <p class="text-gray-500 text-sm leading-relaxed mt-4">
                    Karang Taruna Desa Pilangsari memiliki jaringan kepemudaan yang kuat, struktur organisasi yang dinamis, serta kepercayaan penuh dari masyarakat. Kolaborasi bersama kami akan membantu mitra mencapai jangkauan sosial yang tulus dan berkelanjutan.
                </p>
                <div class="mt-8 space-y-6">
                    @foreach([
                        ['emoji' => '📈', 'title' => 'Jangkauan Audiens Luas', 'desc' => 'Akses langsung ke ratusan pemuda aktif desa, ribuan kepala keluarga, serta audiens media digital kami.'],
                        ['emoji' => '🎯', 'title' => 'Target Tepat Sasaran', 'desc' => 'Program kami mencakup bidang sosial, UMKM, olahraga, keagamaan, dan seni kreatif.'],
                        ['emoji' => '🛡️', 'title' => 'Reputasi & Kepercayaan Resmi', 'desc' => 'Kami adalah organisasi kemasyarakatan resmi di bawah naungan Pemerintah Desa Pilangsari.'],
                    ] as $reason)
                    <div class="flex gap-4 items-start">
                        <div class="w-10 h-10 bg-navy-dark rounded-xl flex items-center justify-center text-xl flex-shrink-0" style="background-color: #07112B;">
                            {{ $reason['emoji'] }}
                        </div>
                        <div>
                            <h4 class="font-bold text-navy-dark text-sm" style="color: #07112B;">{{ $reason['title'] }}</h4>
                            <p class="text-gray-500 text-xs mt-1 leading-relaxed">{{ $reason['desc'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            
            <div data-aos="fade-left" class="grid grid-cols-2 gap-6">
                @foreach([
                    ['value' => '120+', 'label' => 'Anggota Aktif', 'color' => 'from-navy-dark to-navy-light'],
                    ['value' => '48+', 'label' => 'Kegiatan Sosial & Olahraga', 'color' => 'from-gold/20 to-gold/10'],
                    ['value' => '5.000+', 'label' => 'Masyarakat Desa Terjangkau', 'color' => 'from-navy-dark to-navy-light'],
                    ['value' => '10+', 'label' => 'Mitra Bisnis & UMKM', 'color' => 'from-gold/20 to-gold/10'],
                ] as $stat)
                <div class="bg-gray-50 border border-gray-100 rounded-3xl p-8 text-center hover:border-gold/30 hover:shadow-md transition-all duration-300">
                    <div class="text-3xl font-black text-navy-dark" style="color: #07112B;">{{ $stat['value'] }}</div>
                    <div class="text-gray-500 text-xs mt-2 font-medium leading-relaxed">{{ $stat['label'] }}</div>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Paket Kemitraan --}}
        <div class="mb-24">
            <div class="text-center mb-12" data-aos="fade-up">
                <div class="section-badge mb-4 mx-auto" style="width: fit-content; display: flex; align-items: center; gap: 0.5rem; background: rgba(212, 175, 55, 0.1); color: #D4AF37; border: 1px solid rgba(212, 175, 55, 0.2); padding: 0.25rem 0.75rem; border-radius: 9999px; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; tracking-wider;">
                    Pilihan Paket Sponsor
                </div>
                <h2 class="text-3xl font-black text-navy-dark" style="color: #07112B;">Paket Dukungan & <span class="text-gold" style="color: #D4AF37;">Sponsorship</span></h2>
                <p class="text-gray-400 text-xs mt-2 max-w-xl mx-auto">Tersedia berbagai pilihan paket kolaborasi untuk mendukung program-program kepemudaan kami.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8" data-aos="fade-up">
                {{-- Paket Silver --}}
                <div class="bg-white border border-gray-150 rounded-3xl p-8 shadow-sm hover:shadow-md transition-all duration-300 relative overflow-hidden flex flex-col justify-between">
                    <div>
                        <div class="text-xs font-bold text-gray-400 uppercase tracking-widest">Sponsorship</div>
                        <h3 class="text-2xl font-black text-navy-dark mt-2" style="color: #07112B;">Paket Silver</h3>
                        <p class="text-gray-500 text-xs mt-3 leading-relaxed">Sangat cocok untuk UMKM lokal yang ingin mempromosikan produk secara terjangkau.</p>
                        <div class="border-t border-gray-100 my-6"></div>
                        <ul class="space-y-3 text-xs text-gray-600">
                            <li class="flex items-center gap-2">✔ Logo pada Spanduk Kegiatan</li>
                            <li class="flex items-center gap-2">✔ Penyebutan Nama Sponsor (Ad-lib)</li>
                            <li class="flex items-center gap-2">✔ Postingan Bersama di Sosial Media</li>
                            <li class="text-gray-300 flex items-center gap-2">✘ Logo Utama pada Kaos Panitia</li>
                            <li class="text-gray-300 flex items-center gap-2">✘ Space Stand Pameran/Event</li>
                        </ul>
                    </div>
                    <div class="mt-8">
                        <a href="https://wa.me/6281234567890?text=Halo%20Admin%2C%20saya%20tertarik%20dengan%20Paket%20Silver%20Kemitraan" class="block text-center bg-gray-50 hover:bg-navy-dark text-navy-dark hover:text-white text-xs font-bold py-3 rounded-xl transition-all duration-300" style="border: 1px solid rgba(7, 17, 43, 0.1);">
                            Pilih Paket Silver
                        </a>
                    </div>
                </div>

                {{-- Paket Gold --}}
                <div class="bg-navy-dark text-white rounded-3xl p-8 shadow-lg relative overflow-hidden flex flex-col justify-between" style="background: linear-gradient(135deg, #07112B 0%, #0c2052 100%);">
                    <div class="absolute top-4 right-4 bg-gold text-navy-dark text-[10px] font-black px-2.5 py-1 rounded-full uppercase tracking-wider" style="background-color: #D4AF37;">Terpopuler</div>
                    <div>
                        <div class="text-xs font-bold text-gold uppercase tracking-widest" style="color: #D4AF37;">Sponsorship</div>
                        <h3 class="text-2xl font-black text-white mt-2">Paket Gold</h3>
                        <p class="text-white/60 text-xs mt-3 leading-relaxed">Pilihan ideal bagi perusahaan atau bisnis berkembang untuk jangkauan branding yang luas.</p>
                        <div class="border-t border-white/10 my-6"></div>
                        <ul class="space-y-3 text-xs text-white/80">
                            <li class="flex items-center gap-2">✔ Logo Sedang pada Spanduk Utama</li>
                            <li class="flex items-center gap-2">✔ Penyebutan Nama Sponsor di Event</li>
                            <li class="flex items-center gap-2">✔ Postingan Khusus & Review Produk</li>
                            <li class="flex items-center gap-2">✔ Logo pada Brosur & Flyer Digital</li>
                            <li class="flex items-center gap-2">✔ Space Stand Pameran 2x2 meter</li>
                        </ul>
                    </div>
                    <div class="mt-8">
                        <a href="https://wa.me/6281234567890?text=Halo%20Admin%2C%20saya%20tertarik%20dengan%20Paket%20Gold%20Kemitraan" class="block text-center bg-gold text-navy-dark hover:bg-gold-light text-xs font-bold py-3 rounded-xl transition-all duration-300 hover:scale-105" style="background-color: #D4AF37;">
                            Pilih Paket Gold
                        </a>
                    </div>
                </div>

                {{-- Paket Platinum --}}
                <div class="bg-white border border-gray-150 rounded-3xl p-8 shadow-sm hover:shadow-md transition-all duration-300 relative overflow-hidden flex flex-col justify-between">
                    <div>
                        <div class="text-xs font-bold text-gray-400 uppercase tracking-widest">Sponsorship</div>
                        <h3 class="text-2xl font-black text-navy-dark mt-2" style="color: #07112B;">Paket Platinum</h3>
                        <p class="text-gray-500 text-xs mt-3 leading-relaxed">Kemitraan eksklusif sebagai Sponsor Utama dengan penempatan logo paling prestisius.</p>
                        <div class="border-t border-gray-100 my-6"></div>
                        <ul class="space-y-3 text-xs text-gray-600">
                            <li class="flex items-center gap-2">✔ Logo Eksklusif (Besar) di Spanduk Utama</li>
                            <li class="flex items-center gap-2">✔ Branding Eksklusif di Media Sosial Web</li>
                            <li class="flex items-center gap-2">✔ Penempatan Logo pada Kaos Panitia</li>
                            <li class="flex items-center gap-2">✔ Ad-libs Khusus MC di Setiap Sesi Acara</li>
                            <li class="flex items-center gap-2">✔ Space Stand Pameran Utama (VIP)</li>
                        </ul>
                    </div>
                    <div class="mt-8">
                        <a href="https://wa.me/6281234567890?text=Halo%20Admin%2C%20saya%20tertarik%20dengan%20Paket%20Platinum%20Kemitraan" class="block text-center bg-gray-50 hover:bg-navy-dark text-navy-dark hover:text-white text-xs font-bold py-3 rounded-xl transition-all duration-300" style="border: 1px solid rgba(7, 17, 43, 0.1);">
                            Hubungi Tim Platinum
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Alur Kemitraan --}}
        <div class="bg-gray-50 rounded-3xl p-8 border border-gray-100 mb-16" data-aos="fade-up">
            <h3 class="text-xl font-bold text-navy-dark text-center mb-10" style="color: #07112B;">Alur Kerja Sama Kemitraan</h3>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 relative">
                @foreach([
                    ['step' => '01', 'title' => 'Hubungi Kontak', 'desc' => 'Hubungi admin kemitraan kami melalui WhatsApp / Email resmi.'],
                    ['step' => '02', 'title' => 'Diskusi & Proposal', 'desc' => 'Diskusikan konsep kolaborasi dan dapatkan dokumen proposal resmi.'],
                    ['step' => '03', 'title' => 'Penandatanganan MoU', 'desc' => 'Penyusunan kesepakatan tertulis hak & kewajiban kerja sama.'],
                    ['step' => '04', 'title' => 'Eksekusi & Laporan', 'desc' => 'Pelaksanaan program kerja sama diikuti dengan penyerahan LPJ.'],
                ] as $step)
                <div class="text-center relative">
                    <div class="w-12 h-12 bg-white border border-gray-100 rounded-full flex items-center justify-center text-navy-dark font-black text-sm mx-auto shadow-sm" style="color: #07112B;">
                        {{ $step['step'] }}
                    </div>
                    <h4 class="font-bold text-sm text-navy-dark mt-4" style="color: #07112B;">{{ $step['title'] }}</h4>
                    <p class="text-gray-400 text-xs mt-2 leading-relaxed px-4">{{ $step['desc'] }}</p>
                </div>
                @endforeach
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
