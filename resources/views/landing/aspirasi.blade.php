@extends('layouts.app')
@section('title', 'Kotak Aspirasi Warga — Karang Taruna Desa Pilangsari')
@section('description', 'Salurkan aspirasi, ide, kritik, dan saran Anda secara langsung untuk kemajuan Desa Pilangsari.')

@section('content')

{{-- Hero Section --}}
<section style="background: linear-gradient(135deg, #07112B 0%, #081F5C 100%); padding: 8rem 0 4rem;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="section-badge mb-4 mx-auto" data-aos="fade-up" style="width: fit-content; display: flex; align-items: center; gap: 0.5rem; background: rgba(212, 175, 55, 0.1); color: #D4AF37; border: 1px solid rgba(212, 175, 55, 0.2); padding: 0.25rem 0.75rem; border-radius: 9999px; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; tracking-wider;">
            <span class="w-1.5 h-1.5 bg-gold rounded-full" style="width: 6px; height: 6px; background-color: #D4AF37; border-radius: 9999px;"></span>
            Partisipasi Publik
        </div>
        <h1 class="text-4xl md:text-5xl font-black text-white mt-4" data-aos="fade-up" data-aos-delay="100">
            Kotak <span class="text-gold" style="color: #D4AF37;">Aspirasi Warga</span>
        </h1>
        <p class="text-white/50 mt-4 text-sm max-w-xl mx-auto" data-aos="fade-up" data-aos-delay="200">
            Wadah penyaluran ide, saran, kritik konstruktif, serta aspirasi dari dan untuk warga masyarakat Desa Pilangsari.
        </p>
    </div>
</section>

<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-16">
            
            {{-- Panduan & Info --}}
            <div class="lg:col-span-5" data-aos="fade-right">
                <div class="section-badge mb-4" style="width: fit-content; display: flex; align-items: center; gap: 0.5rem; background: rgba(212, 175, 55, 0.1); color: #D4AF37; border: 1px solid rgba(212, 175, 55, 0.2); padding: 0.25rem 0.75rem; border-radius: 9999px; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; tracking-wider;">
                    Suara Warga
                </div>
                <h2 class="text-3xl font-black text-navy-dark" style="color: #07112B;">Suara Anda, <br>Kemajuan <span class="text-gold" style="color: #D4AF37;">Bersama</span></h2>
                <p class="text-gray-500 text-sm leading-relaxed mt-4">
                    Kami percaya bahwa pembangunan kepemudaan dan desa yang berwibawa hanya dapat dicapai melalui keterbukaan mendengar. Setiap aspirasi yang masuk akan ditinjau langsung oleh Pengurus Karang Taruna Desa Pilangsari.
                </p>
                
                <div class="mt-8 space-y-6">
                    <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm">
                        <div class="flex items-center gap-3 mb-2">
                            <span class="text-lg">🔒</span>
                            <h4 class="font-bold text-navy-dark text-sm" style="color: #07112B;">Opsi Pengiriman Anonim</h4>
                        </div>
                        <p class="text-gray-500 text-xs leading-relaxed">
                            Anda dapat memilih untuk menyembunyikan identitas Anda (Anonim) jika merasa lebih nyaman. Privasi Anda terjamin.
                        </p>
                    </div>

                    <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm">
                        <div class="flex items-center gap-3 mb-2">
                            <span class="text-lg">⚡</span>
                            <h4 class="font-bold text-navy-dark text-sm" style="color: #07112B;">Respons & Evaluasi Berkala</h4>
                        </div>
                        <p class="text-gray-500 text-xs leading-relaxed">
                            Kompilasi aspirasi warga akan dibahas dalam rapat koordinasi bulanan pengurus untuk dicarikan solusi atau diwujudkan dalam program kerja baru.
                        </p>
                    </div>
                </div>
            </div>

            {{-- Formulir Aspirasi --}}
            <div class="lg:col-span-7" data-aos="fade-left">
                <div class="bg-white border border-gray-100 rounded-3xl p-8 shadow-sm">
                    <h3 class="text-xl font-bold text-navy-dark mb-6" style="color: #07112B;">Formulir Aspirasi</h3>

                    @if(session('success'))
                    <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl mb-6 text-sm">
                        {{ session('success') }}
                    </div>
                    @endif

                    <form id="aspirasi-form" action="{{ route('kontak.kirim') }}" method="POST" class="space-y-5" onsubmit="prepareSubmission(event)">
                        @csrf
                        
                        {{-- Hidden inputs required by KontakController --}}
                        <input type="hidden" name="nama" id="real-nama">
                        <input type="hidden" name="email" id="real-email">
                        <input type="hidden" name="subjek" id="real-subjek">
                        <input type="hidden" name="pesan" id="real-pesan">

                        {{-- Anonim Checkbox --}}
                        <div class="flex items-center gap-2 bg-gray-50 p-4 rounded-xl border border-gray-150 mb-2">
                            <input type="checkbox" id="check-anonim" class="w-4 h-4 text-gold border-gray-300 rounded focus:ring-gold" onchange="toggleAnonim(this)">
                            <label for="check-anonim" class="text-navy-dark text-xs font-semibold cursor-pointer" style="color: #07112B;">Kirim sebagai Anonim (Sembunyikan Identitas)</label>
                        </div>

                        {{-- Nama & Email Inputs --}}
                        <div id="identitas-fields" class="grid grid-cols-1 md:grid-cols-2 gap-5 transition-all duration-300">
                            <div>
                                <label class="text-navy-dark text-xs font-semibold mb-2 block" style="color: #07112B;">Nama Lengkap <span class="text-red-500">*</span></label>
                                <input type="text" id="display-nama" placeholder="Nama Anda" required
                                    class="w-full border border-gray-200 rounded-xl px-4 py-3 text-xs focus:outline-none focus:border-gold/50 focus:ring-1 focus:ring-gold/20">
                            </div>
                            <div>
                                <label class="text-navy-dark text-xs font-semibold mb-2 block" style="color: #07112B;">Alamat Email <span class="text-red-500">*</span></label>
                                <input type="email" id="display-email" placeholder="Email Anda" required
                                    class="w-full border border-gray-200 rounded-xl px-4 py-3 text-xs focus:outline-none focus:border-gold/50 focus:ring-1 focus:ring-gold/20">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            {{-- Dusun/RT/RW --}}
                            <div>
                                <label class="text-navy-dark text-xs font-semibold mb-2 block" style="color: #07112B;">Asal Dusun / Blok <span class="text-gray-400 font-normal">(Opsional)</span></label>
                                <input type="text" id="display-dusun" placeholder="Contoh: Dusun Pilangsari RT 01/RW 02"
                                    class="w-full border border-gray-200 rounded-xl px-4 py-3 text-xs focus:outline-none focus:border-gold/50 focus:ring-1 focus:ring-gold/20">
                            </div>
                            {{-- Kategori / Subjek --}}
                            <div>
                                <label class="text-navy-dark text-xs font-semibold mb-2 block" style="color: #07112B;">Kategori Aspirasi <span class="text-red-500">*</span></label>
                                <select id="display-subjek" required
                                    class="w-full border border-gray-200 rounded-xl px-4 py-3 text-xs focus:outline-none focus:border-gold/50 focus:ring-1 focus:ring-gold/20 bg-white">
                                    <option value="Kritik & Saran">Kritik & Saran</option>
                                    <option value="Ide Program Kerja">Ide Program Kerja</option>
                                    <option value="Olahraga & Kepemudaan">Olahraga & Kepemudaan</option>
                                    <option value="Sosial & Keagamaan">Sosial & Keagamaan</option>
                                    <option value="Fasilitas & Lingkungan Desa">Fasilitas & Lingkungan Desa</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                        </div>

                        {{-- Isi Aspirasi --}}
                        <div>
                            <label class="text-navy-dark text-xs font-semibold mb-2 block" style="color: #07112B;">Pesan / Detail Aspirasi <span class="text-red-500">*</span></label>
                            <textarea id="display-pesan" rows="5" required placeholder="Tuliskan aspirasi, kritik, atau saran Anda secara detail..."
                                class="w-full border border-gray-200 rounded-xl px-4 py-3 text-xs focus:outline-none focus:border-gold/50 focus:ring-1 focus:ring-gold/20 resize-none"></textarea>
                        </div>

                        <button type="submit" class="w-full bg-navy-dark hover:bg-gold text-white hover:text-navy-dark font-semibold text-xs py-3.5 rounded-xl transition-all duration-300 flex items-center justify-center gap-2 shadow-md hover:scale-[1.01]" style="background-color: #07112B;">
                            🚀 Kirim Aspirasi Anda →
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
    function toggleAnonim(checkbox) {
        const fields = document.getElementById('identitas-fields');
        const inputNama = document.getElementById('display-nama');
        const inputEmail = document.getElementById('display-email');
        
        if (checkbox.checked) {
            fields.style.opacity = '0.4';
            inputNama.value = 'Warga Anonim';
            inputEmail.value = 'anonim@pilangsari.desa.id';
            inputNama.disabled = true;
            inputEmail.disabled = true;
            inputNama.required = false;
            inputEmail.required = false;
        } else {
            fields.style.opacity = '1';
            inputNama.value = '';
            inputEmail.value = '';
            inputNama.disabled = false;
            inputEmail.disabled = false;
            inputNama.required = true;
            inputEmail.required = true;
        }
    }

    function prepareSubmission(event) {
        // Prevent default submission to let us build the hidden fields
        event.preventDefault();
        
        const checkAnonim = document.getElementById('check-anonim').checked;
        const realNama = document.getElementById('real-nama');
        const realEmail = document.getElementById('real-email');
        const realSubjek = document.getElementById('real-subjek');
        const realPesan = document.getElementById('real-pesan');
        
        const displayNama = document.getElementById('display-nama').value;
        const displayEmail = document.getElementById('display-email').value;
        const displayDusun = document.getElementById('display-dusun').value || 'Tidak disebutkan';
        const displaySubjek = document.getElementById('display-subjek').value;
        const displayPesan = document.getElementById('display-pesan').value;
        
        // Fill the real hidden inputs
        realNama.value = checkAnonim ? 'Warga Anonim' : displayNama;
        realEmail.value = checkAnonim ? 'anonim@pilangsari.desa.id' : displayEmail;
        realSubjek.value = '[ASPIRASI] - ' + displaySubjek;
        
        // Build the structured message
        realPesan.value = `Dusun / RT / RW: ${displayDusun}\nKategori: ${displaySubjek}\nPengiriman: ${checkAnonim ? 'Anonim' : 'Dengan Nama'}\n\nIsi Aspirasi:\n${displayPesan}`;
        
        // Submit the form
        document.getElementById('aspirasi-form').submit();
    }
</script>

@endsection
