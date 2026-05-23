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
                    ['emoji' => '📍', 'label' => 'Alamat', 'value' => 'Jl. Pilangsari No.01, Kec. Jatitujuh, Kab. Majalengka, Jawa Barat 45458'],
                    ['emoji' => '📞', 'label' => 'Telepon', 'value' => '(0233) 123456'],
                    ['emoji' => '✉️', 'label' => 'Email', 'value' => 'karangtaruna.pilangsari@gmail.com'],
                    ['emoji' => '🕐', 'label' => 'Jam Operasional', 'value' => 'Senin – Sabtu (08.00 – 17.00 WIB)'],
                    ] as $info)
                    <div class="flex gap-4 items-start">
                        <div class="w-12 h-12 bg-navy-dark rounded-xl flex items-center justify-center text-xl flex-shrink-0">
                            {{ $info['emoji'] }}
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
                    <div class="grid grid-cols-2 gap-5">
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
                        <label class="text-navy-dark text-sm font-medium mb-2 block">Subjek</label>
                        <input type="text" name="subjek" placeholder="Subjek pesan"
                            class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-gold/50 focus:ring-1 focus:ring-gold/20">
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

@endsection