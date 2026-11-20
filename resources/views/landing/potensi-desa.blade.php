@extends('layouts.app')
@section('title', 'Potensi Desa Pilangsari — Karang Taruna IKAPPI')
@section('description', 'Mengenal potensi pertanian dan kehidupan masyarakat Desa Pilangsari.')

@section('content')
<section class="relative overflow-hidden bg-navy-dark pt-32 pb-20">
    <div class="pointer-events-none absolute -right-24 -top-20 h-80 w-80 rounded-full bg-gold/10 blur-3xl"></div>
    @include('partials.padi-motif')
    <div class="relative mx-auto max-w-5xl px-4 text-center sm:px-6 lg:px-8">
        <div class="section-badge mx-auto mb-5 w-fit" data-aos="fade-up">
            <span class="h-1.5 w-1.5 rounded-full bg-gold"></span>
            Potensi Desa
        </div>
        <h1 class="text-4xl font-black text-white sm:text-5xl" data-aos="fade-up" data-aos-delay="100">
            Potensi <span class="text-gold">Pilangsari</span>
        </h1>
        <p class="mx-auto mt-5 max-w-2xl text-sm leading-relaxed text-white/65 sm:text-base" data-aos="fade-up" data-aos-delay="200">
            Mengenal potensi lokal dan mata pencaharian masyarakat yang menjadi bagian penting kehidupan Desa Pilangsari.
        </p>
    </div>
</section>

<section class="bg-gray-50 py-16 sm:py-20">
    <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
        <article class="overflow-hidden rounded-3xl border border-gray-100 bg-white shadow-sm" data-aos="fade-up">
            <div class="h-1.5 bg-gradient-to-r from-navy-dark via-gold to-navy-dark"></div>
            <div class="grid gap-8 p-6 sm:p-10 md:grid-cols-[auto_1fr] md:items-start">
                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-gold/10 text-gold">
                    <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.7" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 21V10m0 0c-3.5 0-6-2-6-5 3.5 0 6 2 6 5zm0 0c0-3.5 2-6 6-6 0 3.5-2 6-6 6zM5 21h14" />
                    </svg>
                </div>
                <div>
                    <p class="text-xs font-bold uppercase tracking-[0.2em] text-gold">Pertanian</p>
                    <h2 class="mt-2 text-2xl font-black text-navy-dark sm:text-3xl">Sawah, ruang hidup masyarakat Pilangsari</h2>
                    <p class="mt-5 text-sm leading-7 text-gray-600">
                        Pertanian padi menjadi mata pencaharian banyak warga Desa Pilangsari. Sawah tidak hanya menyediakan bahan pangan, tetapi juga menjadi bagian dari keseharian, keterampilan, dan kerja bersama masyarakat.
                    </p>
                    <p class="mt-4 text-sm leading-7 text-gray-600">
                        Dari menyiapkan lahan dan bibit, merawat tanaman, sampai memanen, setiap tahap membutuhkan ketekunan dan perhatian pada kondisi lahan serta ketersediaan air. Enam foto berikut memperlihatkan potongan proses pertanian yang ada di Pilangsari.
                    </p>
                </div>
            </div>
        </article>

        @php
        $riceFieldStories = [
            [
                'image' => 'sawah1.jpg',
                'title' => 'Menyiapkan dan menanam bibit',
                'description' => 'Petak bibit hijau terlihat berdampingan dengan lahan yang sedang dikerjakan. Tahap awal ini memerlukan bibit yang baik, pengaturan air, dan penanaman yang teratur agar tanaman dapat tumbuh merata.',
                'alt' => 'Petani bekerja di petak bibit padi dan sawah yang sedang disiapkan di Pilangsari',
            ],
            [
                'image' => 'sawah2.jpg',
                'title' => 'Panen dengan tenaga dan ketelitian',
                'description' => 'Padi yang telah dipotong dirapikan dan dikumpulkan sebelum dibawa keluar dari petak sawah. Proses panen membutuhkan ketelitian serta kerja bersama agar hasilnya tertangani dengan baik.',
                'alt' => 'Warga memanen dan mengumpulkan padi secara manual di sawah Pilangsari',
            ],
            [
                'image' => 'sawah3.jpg',
                'title' => 'Teknologi membantu masa panen',
                'description' => 'Mesin pemanen membantu memotong tanaman dan merontokkan gabah dalam satu rangkaian kerja. Pemanfaatan alat pertanian dapat membuat pekerjaan lebih efisien, dengan pengalaman petani tetap menjadi kunci dalam mengelola hasil.',
                'alt' => 'Mesin pemanen padi bekerja di tengah sawah Pilangsari',
            ],
            [
                'image' => 'sawah4.webp',
                'title' => 'Menjaga kondisi lahan dan air',
                'description' => 'Lahan yang tampak mengering mengingatkan pentingnya pengelolaan air dan saluran irigasi, terutama di antara masa tanam. Kondisi setiap petak dapat berbeda, sehingga pengamatan langsung membantu petani menentukan langkah berikutnya.',
                'alt' => 'Petak sawah kering di Pilangsari dengan warga melintas membawa hasil pertanian',
            ],
            [
                'image' => 'sawah5.webp',
                'title' => 'Hasil panen dan kebersamaan',
                'description' => 'Warga memperlihatkan ikatan padi setelah panen. Setelah dipotong, padi perlu dikumpulkan dan dirapikan sebelum masuk ke tahap pengolahan berikutnya. Kebersamaan menjadi bagian penting dari kegiatan pertanian desa.',
                'alt' => 'Warga Pilangsari menunjukkan ikatan padi hasil panen',
            ],
            [
                'image' => 'sawah6.jpg',
                'title' => 'Hamparan padi yang tumbuh',
                'description' => 'Tanaman padi yang menghijau menggambarkan salah satu fase pertumbuhan di sawah. Pemantauan air, perawatan tanaman, dan pengendalian gulma membantu menjaga pertumbuhan hingga masa panen.',
                'alt' => 'Hamparan tanaman padi hijau tumbuh di sawah Pilangsari',
            ],
        ];
        @endphp

        <section class="mt-10 space-y-5 sm:mt-12 sm:space-y-7" aria-label="Foto dan cerita pertanian Pilangsari">

            @foreach($riceFieldStories as $story)
            <article class="rice-field-card group overflow-hidden rounded-3xl border border-gray-100 bg-white shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-xl" data-aos="fade-up" data-aos-delay="{{ ($loop->iteration % 3) * 80 }}">
                <div class="grid md:grid-cols-2">
                    <figure class="rice-field-image relative min-h-56 overflow-hidden bg-gray-100 sm:min-h-64 {{ $loop->even ? 'md:order-2' : '' }}">
                        <img src="{{ asset('images/' . $story['image']) }}" alt="{{ $story['alt'] }}" loading="lazy" decoding="async"
                            class="absolute inset-0 h-full w-full object-cover transition duration-700 group-hover:scale-105">
                    </figure>
                    <div class="flex flex-col justify-center p-6 sm:p-8 lg:p-10">
                        <p class="text-xs font-bold uppercase tracking-[0.2em] text-gold">Potensi pertanian Pilangsari</p>
                        <h3 class="mt-3 text-xl font-black leading-snug text-navy-dark sm:text-2xl">{{ $story['title'] }}</h3>
                        <p class="mt-4 text-sm leading-7 text-gray-600">{{ $story['description'] }}</p>
                    </div>
                </div>
            </article>
            @endforeach
        </section>

        <div class="mx-auto mt-7 max-w-3xl rounded-2xl bg-navy-dark p-5 text-center sm:mt-9 sm:p-7" data-aos="fade-up">
            <h2 class="text-lg font-bold text-white sm:text-xl">Punya informasi atau ingin berkolaborasi?</h2>
            <p class="mx-auto mt-2 max-w-xl text-xs leading-relaxed text-white/60 sm:text-sm">
                Hubungi Karang Taruna IKAPPI untuk berbagi informasi tentang potensi dan kegiatan masyarakat Desa Pilangsari.
            </p>
            <a href="{{ route('kontak') }}" class="mt-4 inline-flex items-center gap-2 rounded-lg bg-gold px-4 py-2.5 text-xs font-bold text-navy-dark transition hover:bg-gold-light sm:text-sm">
                Hubungi Kami
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-7-7 7 7-7 7" />
                </svg>
            </a>
        </div>
    </div>
</section>
@endsection
