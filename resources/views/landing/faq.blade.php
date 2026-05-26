@extends('layouts.app')
@section('title', 'FAQ - Pertanyaan Umum — Karang Taruna Desa Pilangsari')

@section('content')

{{-- HEADER --}}
<section class="bg-navy-dark pt-32 pb-16 border-b border-gold/10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="inline-flex items-center gap-2 bg-gold/10 border border-gold/40 text-gold text-sm font-medium px-4 py-2 rounded-full mb-6">
            <span class="w-2 h-2 bg-gold rounded-full"></span>
            Bantuan & Dukungan
        </div>
        <h1 class="text-4xl md:text-5xl font-black text-white mb-3">Pertanyaan yang Sering Diajukan</h1>
        <p class="text-white/60 text-lg">Temukan jawaban atas pertanyaan umum tentang Karang Taruna Desa Pilangsari</p>
    </div>
</section>

{{-- CONTENT --}}
<section class="py-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Search --}}
        <div class="mb-12">
            <div class="relative">
                <input type="text" id="faqSearch" placeholder="Cari pertanyaan..."
                    class="w-full bg-navy/50 border border-gold/20 rounded-xl px-5 py-4 text-white placeholder-white/40 focus:outline-none focus:border-gold transition-colors">
                <svg class="absolute right-4 top-4 w-5 h-5 text-white/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
        </div>

        {{-- FAQ Items --}}
        <div class="space-y-4" id="faqContainer">
            @php
            $faqs = [
                [
                    'q' => 'Apa itu Karang Taruna?',
                    'a' => 'Karang Taruna adalah organisasi kemasyarakatan yang beranggotakan pemuda sebagai sarana pengembangan jiwa, kepribadian, dan kemampuan pemuda. Karang Taruna Desa Pilangsari berdedikasi untuk memberdayakan pemuda desa dalam berbagai bidang.'
                ],
                [
                    'q' => 'Bagaimana cara bergabung dengan Karang Taruna?',
                    'a' => 'Anda dapat bergabung dengan menghadiri pertemuan rutin Karang Taruna atau menghubungi langsung pengurus melalui kontak yang tersedia. Persyaratan umum adalah berusia 15-40 tahun dan memiliki semangat berkontribusi untuk masyarakat.'
                ],
                [
                    'q' => 'Apa saja program kerja Karang Taruna?',
                    'a' => 'Program kerja Karang Taruna mencakup berbagai bidang seperti Humas dan Keamanan, Seni Kreatif dan Medafor, Keagamaan, serta Kepemudaan dan Olahraga. Setiap bidang memiliki program dan kegiatan sesuai dengan fokusnya.'
                ],
                [
                    'q' => 'Bagaimana cara menghubungi Karang Taruna?',
                    'a' => 'Anda dapat menghubungi Karang Taruna melalui: Telepon: (0233) 123456, Email: karangtaruna.pilangsari@gmail.com, atau datang langsung ke kantor kami di Jl. Pilangsari No.01 pada jam operasional Senin – Sabtu pukul 08.00 – 17.00 WIB.'
                ],
                [
                    'q' => 'Apakah ada biaya untuk bergabung?',
                    'a' => 'Bergabung dengan Karang Taruna umumnya tidak ada biaya pendaftaran khusus. Namun untuk kegiatan tertentu mungkin ada iuran atau kontribusi sesuai kesepakatan anggota. Hubungi langsung untuk informasi lebih detail.'
                ],
                [
                    'q' => 'Bagaimana cara mengikuti kegiatan Karang Taruna?',
                    'a' => 'Anda dapat mengikuti kegiatan dengan menjadi anggota resmi atau menghadiri acara terbuka yang diselenggarakan oleh Karang Taruna. Informasi kegiatan dapat dilihat di website atau media sosial kami.'
                ],
            ];
            @endphp

            @foreach($faqs as $faq)
            <div class="faq-item bg-gradient-to-br from-navy/50 to-navy-dark border border-gold/10 rounded-xl overflow-hidden transition-all duration-300 hover:border-gold/30"
                data-question="{{ strtolower($faq['q']) }}">
                
                <button class="faq-toggle w-full px-6 md:px-8 py-5 md:py-6 flex items-start justify-between gap-4 text-left hover:bg-white/5 transition-colors"
                    onclick="toggleFaq(this)">
                    <span class="flex-1">
                        <h3 class="text-base md:text-lg font-bold text-white">{{ $faq['q'] }}</h3>
                    </span>
                    <div class="flex-shrink-0 mt-1">
                        <svg class="faq-icon w-5 h-5 text-gold transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                        </svg>
                    </div>
                </button>
                
                <div class="faq-content hidden border-t border-gold/10">
                    <p class="px-6 md:px-8 py-5 md:py-6 text-white/70 leading-relaxed">
                        {{ $faq['a'] }}
                    </p>
                </div>
            </div>
            @endforeach
        </div>

        {{-- No Results --}}
        <div id="noResults" class="hidden text-center py-12">
            <svg class="w-16 h-16 text-white/20 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <p class="text-white/60 text-lg">Tidak ada pertanyaan yang cocok dengan pencarian Anda.</p>
        </div>

        {{-- Contact --}}
        <div class="mt-16 bg-gradient-to-r from-gold/10 to-gold/5 border border-gold/20 rounded-2xl p-8 md:p-12 text-center">
            <h3 class="text-2xl font-bold text-white mb-3">Tidak menemukan jawaban?</h3>
            <p class="text-white/70 mb-6">Hubungi kami langsung untuk pertanyaan lebih lanjut.</p>
            <a href="{{ route('kontak') }}" class="inline-flex items-center gap-2 bg-gold hover:bg-gold-light text-navy-dark font-bold px-6 py-3 rounded-xl transition-all">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                Hubungi Kami
            </a>
        </div>
    </div>
</section>

<script>
function toggleFaq(button) {
    const content = button.nextElementSibling;
    const icon = button.querySelector('.faq-icon');
    
    content.classList.toggle('hidden');
    icon.style.transform = content.classList.contains('hidden') ? 'rotate(0deg)' : 'rotate(180deg)';
}

document.getElementById('faqSearch').addEventListener('input', function(e) {
    const query = e.target.value.toLowerCase();
    const items = document.querySelectorAll('.faq-item');
    let visibleCount = 0;
    
    items.forEach(item => {
        const matches = item.dataset.question.includes(query);
        item.style.display = matches ? '' : 'none';
        if (matches) visibleCount++;
        
        // Close all items when searching
        const content = item.querySelector('.faq-content');
        if (content) content.classList.add('hidden');
        const icon = item.querySelector('.faq-icon');
        if (icon) icon.style.transform = 'rotate(0deg)';
    });
    
    document.getElementById('noResults').classList.toggle('hidden', visibleCount > 0);
});
</script>

@endsection
