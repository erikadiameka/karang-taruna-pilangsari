@extends('layouts.app')
@section('title', 'Pendaftaran Anggota Baru — Karang Taruna Desa Pilangsari')
@section('description', 'Formulir online pendaftaran pengurus dan relawan Karang Taruna Desa Pilangsari.')

@section('content')

{{-- Hero Section --}}
<section style="background: linear-gradient(135deg, #07112B 0%, #081F5C 100%); padding: 8rem 0 4rem;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="section-badge mb-4 mx-auto" data-aos="fade-up" style="width: fit-content; display: flex; align-items: center; gap: 0.5rem; background: rgba(212, 175, 55, 0.1); color: #D4AF37; border: 1px solid rgba(212, 175, 55, 0.2); padding: 0.25rem 0.75rem; border-radius: 9999px; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; tracking-wider;">
            <span class="w-1.5 h-1.5 bg-gold rounded-full" style="width: 6px; height: 6px; background-color: #D4AF37; border-radius: 9999px;"></span>
            Open Recruitment
        </div>
        <h1 class="text-4xl md:text-5xl font-black text-white mt-4" data-aos="fade-up" data-aos-delay="100">
            Pendaftaran <span class="text-gold" style="color: #D4AF37;">Anggota Baru</span>
        </h1>
        <p class="text-white/50 mt-4 text-sm max-w-xl mx-auto" data-aos="fade-up" data-aos-delay="200">
            Mari bergabung bersama keluarga besar Karang Taruna Desa Pilangsari untuk belajar, berkontribusi, dan memajukan kepemudaan desa kita!
        </p>
    </div>
</section>

<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-16">
            
            {{-- Mengapa Bergabung & Syarat --}}
            <div class="lg:col-span-5" data-aos="fade-right">
                <div class="section-badge mb-4" style="width: fit-content; display: flex; align-items: center; gap: 0.5rem; background: rgba(212, 175, 55, 0.1); color: #D4AF37; border: 1px solid rgba(212, 175, 55, 0.2); padding: 0.25rem 0.75rem; border-radius: 9999px; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; tracking-wider;">
                    Keuntungan & Syarat
                </div>
                <h2 class="text-3xl font-black text-navy-dark" style="color: #07112B;">Mari Tumbuh dan <br>Berkarya <span class="text-gold" style="color: #D4AF37;">Bersama</span></h2>
                <p class="text-gray-500 text-sm leading-relaxed mt-4">
                    Bergabung dengan Karang Taruna memberikan kesempatan unik untuk melatih kepemimpinan, mengasah keterampilan sosial, serta berkontribusi langsung pada kesejahteraan warga desa.
                </p>
                
                <div class="mt-8 space-y-5">
                    @foreach([
                        ['title' => 'Syarat Utama Pendaftaran', 'points' => [
                            'Pemuda-pemudi berusia 15 – 45 tahun.',
                            'Berdomisili atau asli warga Desa Pilangsari.',
                            'Memiliki komitmen tinggi untuk kemajuan kepemudaan desa.'
                        ], 'emoji' => '📌'],
                        ['title' => 'Apa yang Akan Kamu Dapatkan?', 'points' => [
                            'Pelatihan kepemimpinan dan manajemen organisasi.',
                            'Relasi yang luas dengan tokoh masyarakat & instansi.',
                            'Sertifikat pengurus dan pengalaman pengabdian sosial.'
                        ], 'emoji' => '🌟']
                    ] as $box)
                    <div class="bg-white rounded-2xl p-6 border border-gray-150 shadow-sm">
                        <h4 class="font-bold text-navy-dark text-sm flex items-center gap-2 mb-3" style="color: #07112B;">
                            <span>{{ $box['emoji'] }}</span> {{ $box['title'] }}
                        </h4>
                        <ul class="space-y-2 text-xs text-gray-500 list-disc list-inside">
                            @foreach($box['points'] as $pt)
                            <li>{{ $pt }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Formulir Online --}}
            <div class="lg:col-span-7" data-aos="fade-left">
                <div class="bg-white border border-gray-150 rounded-3xl p-8 shadow-sm">
                    <h3 class="text-xl font-bold text-navy-dark mb-6" style="color: #07112B;">Formulir Pendaftaran</h3>

                    @if(session('success'))
                    <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl mb-6 text-sm">
                        {{ session('success') }}
                    </div>
                    @endif

                    <form id="daftar-form" action="{{ route('kontak.kirim') }}" method="POST" class="space-y-5" onsubmit="prepareRegistration(event)">
                        @csrf
                        
                        {{-- Hidden inputs required by KontakController --}}
                        <input type="hidden" name="nama" id="real-nama">
                        <input type="hidden" name="email" id="real-email">
                        <input type="hidden" name="subjek" id="real-subjek">
                        <input type="hidden" name="pesan" id="real-pesan">

                        {{-- Identitas Utama --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div>
                                <label class="text-navy-dark text-xs font-semibold mb-2 block" style="color: #07112B;">Nama Lengkap <span class="text-red-500">*</span></label>
                                <input type="text" id="display-nama" placeholder="Nama Lengkap Anda" required
                                    class="w-full border border-gray-200 rounded-xl px-4 py-3 text-xs focus:outline-none focus:border-gold/50 focus:ring-1 focus:ring-gold/20">
                            </div>
                            <div>
                                <label class="text-navy-dark text-xs font-semibold mb-2 block" style="color: #07112B;">Alamat Email <span class="text-red-500">*</span></label>
                                <input type="email" id="display-email" placeholder="Email Aktif Anda" required
                                    class="w-full border border-gray-200 rounded-xl px-4 py-3 text-xs focus:outline-none focus:border-gold/50 focus:ring-1 focus:ring-gold/20">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            {{-- WhatsApp --}}
                            <div>
                                <label class="text-navy-dark text-xs font-semibold mb-2 block" style="color: #07112B;">Nomor WhatsApp/HP <span class="text-red-500">*</span></label>
                                <input type="tel" id="display-telepon" placeholder="Contoh: 081234567890" required
                                    class="w-full border border-gray-200 rounded-xl px-4 py-3 text-xs focus:outline-none focus:border-gold/50 focus:ring-1 focus:ring-gold/20">
                            </div>
                            {{-- TTL --}}
                            <div>
                                <label class="text-navy-dark text-xs font-semibold mb-2 block" style="color: #07112B;">Tempat, Tanggal Lahir <span class="text-red-500">*</span></label>
                                <input type="text" id="display-ttl" placeholder="Contoh: Majalengka, 17 Agustus 2000" required
                                    class="w-full border border-gray-200 rounded-xl px-4 py-3 text-xs focus:outline-none focus:border-gold/50 focus:ring-1 focus:ring-gold/20">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            {{-- Dusun/RT/RW --}}
                            <div>
                                <label class="text-navy-dark text-xs font-semibold mb-2 block" style="color: #07112B;">Alamat Dusun / Blok <span class="text-red-500">*</span></label>
                                <input type="text" id="display-dusun" placeholder="Contoh: Dusun Pilangsari 2, RT 02/RW 03" required
                                    class="w-full border border-gray-200 rounded-xl px-4 py-3 text-xs focus:outline-none focus:border-gold/50 focus:ring-1 focus:ring-gold/20">
                            </div>
                            {{-- Divisi Minat --}}
                            <div>
                                <label class="text-navy-dark text-xs font-semibold mb-2 block" style="color: #07112B;">Minat Bidang / Divisi <span class="text-red-500">*</span></label>
                                <select id="display-divisi" required
                                    class="w-full border border-gray-200 rounded-xl px-4 py-3 text-xs focus:outline-none focus:border-gold/50 focus:ring-1 focus:ring-gold/20 bg-white">
                                    <option value="Humas & Keamanan">Humas & Keamanan</option>
                                    <option value="Seni Kreatif & Medafor">Seni Kreatif & Medafor (Media)</option>
                                    <option value="Keagamaan">Keagamaan</option>
                                    <option value="Kepemudaan & Olahraga">Kepemudaan & Olahraga</option>
                                    <option value="Relawan Sosial & Siaga Bencana">Relawan Sosial & Siaga Bencana</option>
                                </select>
                            </div>
                        </div>

                        {{-- Alasan --}}
                        <div>
                            <label class="text-navy-dark text-xs font-semibold mb-2 block" style="color: #07112B;">Alasan Ingin Bergabung <span class="text-red-500">*</span></label>
                            <textarea id="display-alasan" rows="4" required placeholder="Tuliskan motivasi atau alasan singkat mengapa Anda ingin bergabung..."
                                class="w-full border border-gray-200 rounded-xl px-4 py-3 text-xs focus:outline-none focus:border-gold/50 focus:ring-1 focus:ring-gold/20 resize-none"></textarea>
                        </div>

                        <button type="submit" class="w-full bg-navy-dark hover:bg-gold text-white hover:text-navy-dark font-semibold text-xs py-3.5 rounded-xl transition-all duration-300 flex items-center justify-center gap-2 shadow-md hover:scale-[1.01]" style="background-color: #07112B;">
                            📝 Kirim Formulir Pendaftaran →
                        </button>
                    </form>
                </div>
            </div>

        </div>

        <div class="text-center mt-16">
            <a href="{{ route('beranda') }}" class="inline-flex items-center gap-2 bg-gold hover:bg-gold-light text-navy-dark font-semibold text-sm px-6 py-3 rounded-xl transition-all duration-300 hover:scale-105 shadow-md shadow-gold/20" style="background-color: #D4AF37;">
                ← Kembali ke Beranda
            </a>
        </div>
    </div>
</section>

<script>
    function prepareRegistration(event) {
        event.preventDefault();
        
        const realNama = document.getElementById('real-nama');
        const realEmail = document.getElementById('real-email');
        const realSubjek = document.getElementById('real-subjek');
        const realPesan = document.getElementById('real-pesan');
        
        const displayNama = document.getElementById('display-nama').value;
        const displayEmail = document.getElementById('display-email').value;
        const displayTelepon = document.getElementById('display-telepon').value;
        const displayTtl = document.getElementById('display-ttl').value;
        const displayDusun = document.getElementById('display-dusun').value;
        const displayDivisi = document.getElementById('display-divisi').value;
        const displayAlasan = document.getElementById('display-alasan').value;
        
        // Populate hidden inputs
        realNama.value = displayNama;
        realEmail.value = displayEmail;
        realSubjek.value = '[PENDAFTARAN ANGGOTA] - ' + displayNama;
        
        // Format structured message
        realPesan.value = `PENDAFTARAN ANGGOTA BARU ONLINE\n----------------------------------\nNama Lengkap: ${displayNama}\nEmail: ${displayEmail}\nWhatsApp: ${displayTelepon}\nTempat, Tanggal Lahir: ${displayTtl}\nDusun/Blok: ${displayDusun}\nMinat Divisi: ${displayDivisi}\n\nAlasan Bergabung:\n${displayAlasan}`;
        
        // Submit
        document.getElementById('daftar-form').submit();
    }
</script>

@endsection
