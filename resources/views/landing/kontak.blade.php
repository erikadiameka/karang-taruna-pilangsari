@extends('layouts.app')
@section('title', 'Kontak — Karang Taruna Desa Pilangsari')

@section('content')

<section class="relative py-32"
    style="background: linear-gradient(135deg, #07112B 0%, #081F5C 100%);">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <div class="section-badge mb-4" data-aos="fade-up">
            <span class="w-1.5 h-1.5 bg-gold rounded-full"></span>
            Hubungi Kami
        </div>
        <h1 class="text-4xl font-black text-white mt-4" data-aos="fade-up" data-aos-delay="100">
            Kontak <span class="text-gold">Kami</span>
        </h1>
    </div>
</section>

<section class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">

            {{-- Info Kontak --}}
            <div data-aos="fade-right">
                <h2 class="text-2xl font-black text-navy-dark mb-8">Informasi <span class="text-gold">Kontak</span></h2>
                <div class="space-y-6">
                    @foreach([
                    ['icon' => 'location', 'label' => 'Alamat', 'value' => 'Jl. Pilangsari No.01, Kec. Jatitujuh, Kab. Majalengka, Jawa Barat 45458'],
                    ['icon' => 'phone', 'label' => 'Telepon', 'value' => '(0233) 123456'],
                    ['icon' => 'email', 'label' => 'Email', 'value' => 'karangtaruna.pilangsari@gmail.com'],
                    ['icon' => 'clock', 'label' => 'Jam Operasional', 'value' => 'Senin – Sabtu (08.00 – 17.00 WIB)'],
                    ] as $info)
                    <div class="flex gap-4 items-start">
                        <div class="w-12 h-12 bg-navy-dark rounded-xl flex items-center justify-center text-gold flex-shrink-0">
                            @switch($info['icon'])
                                @case('location')
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 21s7-5.2 7-11a7 7 0 10-14 0c0 5.8 7 11 7 11z" />
                                    <circle cx="12" cy="10" r="2.25" />
                                </svg>
                                @break
                                @case('phone')
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 5.5A2.5 2.5 0 015.5 3h1.2a1 1 0 01.95.68l1.2 3.6a1 1 0 01-.5 1.2l-1.6.8a11 11 0 005.17 5.17l.8-1.6a1 1 0 011.2-.5l3.6 1.2a1 1 0 01.68.95v1.2a2.5 2.5 0 01-2.5 2.5A13.7 13.7 0 013 5.5z" />
                                </svg>
                                @break
                                @case('email')
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8">
                                    <rect x="3" y="5" width="18" height="14" rx="2" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 7l9 6 9-6" />
                                </svg>
                                @break
                                @case('clock')
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8">
                                    <circle cx="12" cy="12" r="9" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 7v5l3 2" />
                                </svg>
                                @break
                            @endswitch
                        </div>
                        <div>
                            <p class="font-semibold text-navy-dark text-sm">{{ $info['label'] }}</p>
                            <p class="text-gray-500 text-sm mt-1">{{ $info['value'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Form Kontak --}}
            <div data-aos="fade-left">
                <h2 class="text-2xl font-black text-navy-dark mb-8">Kirim <span class="text-gold">Pesan</span></h2>

                @if(session('success'))
                <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl mb-6 text-sm">
                    {{ session('success') }}
                </div>
                @endif

                <form action="{{ route('kontak.kirim') }}" method="POST" class="space-y-5">
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <div>
                            <label class="text-navy-dark text-sm font-medium mb-2 block">Nama</label>
                            <input type="text" name="nama" placeholder="Nama lengkap"
                                class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-gold/50 focus:ring-1 focus:ring-gold/20">
                        </div>
                        <div>
                            <label class="text-navy-dark text-sm font-medium mb-2 block">Email</label>
                            <input type="email" name="email" placeholder="Email anda"
                                class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-gold/50 focus:ring-1 focus:ring-gold/20">
                        </div>
                    </div>
                    <div>
                        <label class="text-navy-dark text-sm font-medium mb-2 block">Pesan</label>
                        <textarea name="pesan" rows="5" placeholder="Tulis pesan anda..."
                            class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-gold/50 focus:ring-1 focus:ring-gold/20 resize-none"></textarea>
                    </div>
                    <button type="submit" class="btn-gold w-full justify-center">
                        Kirim Pesan →
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

{{-- Google Maps Section --}}
<section class="pb-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" data-aos="fade-up">
        <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4 mb-5 px-1">
            <div>
                <span class="text-gold text-xs font-bold uppercase tracking-widest">Kunjungi Kami</span>
                <h2 class="text-2xl font-black text-navy-dark mt-1">Balai Desa Pilangsari</h2>
                <p class="text-gray-500 text-sm mt-1">Kec. Jatitujuh, Kab. Majalengka</p>
            </div>
            <a href="https://maps.app.goo.gl/LYdkZLc46u3Gp3my7" target="_blank" rel="noopener noreferrer" class="btn-gold self-start sm:self-auto">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H5v14h14v-4M14 5h5v5M19 5l-9 9" />
                </svg>
                Buka di Google Maps
            </a>
        </div>
        <div class="bg-white rounded-3xl p-4 border border-gray-150 shadow-sm overflow-hidden">
            <div class="w-full h-[400px] rounded-2xl overflow-hidden shadow-inner">
                <iframe
                    src="https://maps.google.com/maps?q=-6.6186665%2C108.2126231&z=17&output=embed"
                    title="Peta lokasi Balai Desa Pilangsari"
                    width="100%"
                    height="100%"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </div>
</section>

@endsection