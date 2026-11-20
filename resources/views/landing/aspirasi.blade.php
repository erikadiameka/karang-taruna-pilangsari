@extends('layouts.app')
@section('title', 'Kotak Aspirasi Warga — Karang Taruna Desa Pilangsari')
@section('description', 'Salurkan aspirasi, ide, kritik, dan saran Anda secara langsung untuk kemajuan Desa Pilangsari.')

@section('content')

{{-- Hero Section --}}
<section style="background: linear-gradient(135deg, #07112B 0%, #081F5C 100%); padding: 8rem 0 4rem;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="inline-flex items-center gap-2 rounded-full border border-gold/20 bg-gold/10 px-4 py-2 text-[11px] font-bold uppercase tracking-[0.18em] text-gold mb-4" data-aos="fade-up">
            <span class="h-1.5 w-1.5 rounded-full bg-gold"></span>
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
                <div class="inline-flex items-center gap-2 rounded-full border border-gold/20 bg-gold/10 px-4 py-2 text-[11px] font-bold uppercase tracking-[0.18em] text-gold mb-4">
                    Suara Warga
                </div>
                <h2 class="text-3xl font-black text-navy-dark" style="color: #07112B;">Suara Anda, <br>Kemajuan <span class="text-gold" style="color: #D4AF37;">Bersama</span></h2>
                <p class="text-gray-500 text-sm leading-relaxed mt-4">
                    Kami percaya bahwa pembangunan kepemudaan dan desa yang berwibawa hanya dapat dicapai melalui keterbukaan mendengar. Setiap aspirasi yang masuk akan ditinjau langsung oleh Pengurus Karang Taruna Desa Pilangsari.
                </p>
                
                <div class="mt-8 space-y-6">
                    <div class="rounded-2xl border border-navy-dark/5 bg-white p-5 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">
                        <div class="flex items-center gap-3 mb-2">
                            <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-gold/10 text-gold">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8" aria-hidden="true">
                                    <rect x="4" y="10" width="16" height="11" rx="2" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 10V7a4 4 0 118 0v3m-4 4v3" />
                                </svg>
                            </span>
                            <h4 class="font-bold text-navy-dark text-sm" style="color: #07112B;">Opsi Pengiriman Anonim</h4>
                        </div>
                        <p class="pl-[52px] text-gray-500 text-xs leading-relaxed">
                            Jika memilih anonim, nama dan email akan diganti dengan identitas anonim. Hindari mencantumkan informasi pribadi dalam isi aspirasi.
                        </p>
                    </div>

                    <div class="rounded-2xl border border-navy-dark/5 bg-white p-5 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">
                        <div class="flex items-center gap-3 mb-2">
                            <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-gold/10 text-gold">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8" aria-hidden="true">
                                    <circle cx="12" cy="12" r="9" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 7v5l3 2" />
                                </svg>
                            </span>
                            <h4 class="font-bold text-navy-dark text-sm" style="color: #07112B;">Respons & Evaluasi Berkala</h4>
                        </div>
                        <p class="pl-[52px] text-gray-500 text-xs leading-relaxed">
                            Aspirasi yang diterima akan ditinjau oleh pengurus dan dapat menjadi bahan pertimbangan dalam penyusunan program.
                        </p>
                    </div>
                </div>
            </div>

            {{-- Formulir Aspirasi --}}
            <div class="lg:col-span-7" data-aos="fade-left">
                <div class="rounded-3xl border border-gray-100 bg-white p-6 shadow-lg shadow-navy-dark/5 sm:p-8">
                    <div class="mb-7 flex items-start gap-4 border-b border-gray-100 pb-5">
                        <span class="flex h-11 w-11 flex-shrink-0 items-center justify-center rounded-2xl bg-navy-dark text-gold">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 5.5A1.5 1.5 0 015.5 4h13A1.5 1.5 0 0120 5.5v13a1.5 1.5 0 01-1.5 1.5h-13A1.5 1.5 0 014 18.5v-13zM8 9h8M8 13h8m-8 4h4" />
                            </svg>
                        </span>
                        <div>
                            <h3 class="text-xl font-bold text-navy-dark" style="color: #07112B;">Formulir Aspirasi</h3>
                            <p class="mt-1 text-sm leading-relaxed text-gray-500">Sampaikan masukan Anda dengan jelas agar dapat ditindaklanjuti.</p>
                        </div>
                    </div>

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
                        <div class="flex items-center gap-3 rounded-xl border border-gray-200 bg-gray-50 p-4 mb-2">
                            <input type="checkbox" id="check-anonim" class="h-4 w-4 rounded border-gray-300 text-gold focus:ring-gold" onchange="toggleAnonim(this)">
                            <label for="check-anonim" class="cursor-pointer text-sm font-semibold text-navy-dark" style="color: #07112B;">Kirim sebagai anonim</label>
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

                        <button type="submit" class="flex w-full items-center justify-center gap-2 rounded-xl bg-navy-dark py-3.5 text-sm font-bold text-white shadow-md transition-all duration-300 hover:bg-gold hover:text-navy-dark hover:scale-[1.01]" style="background-color: #07112B;">
                            Kirim Aspirasi
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-6-6l6 6-6 6" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>

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
