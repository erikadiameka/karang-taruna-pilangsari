@extends('layouts.admin')
@section('title', 'Import Berita')
@section('page-title', 'Import Berita')

@php
    $kategori = App\Models\KategoriBerita::all();
@endphp

@section('content')
<div class="max-w-4xl">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 mb-6">
        <a href="{{ route('admin.berita.template') }}" class="glass-card p-6 hover:shadow-lg transition-all text-center">
            <div class="text-3xl mb-2">📥</div>
            <h3 class="font-semibold text-gray-900 mb-1">Download Template CSV</h3>
            <p class="text-xs text-gray-600">Download template untuk memudahkan format data</p>
        </a>
        <a href="{{ route('admin.berita.create') }}" class="glass-card p-6 hover:shadow-lg transition-all text-center">
            <div class="text-3xl mb-2">➕</div>
            <h3 class="font-semibold text-gray-900 mb-1">Tambah Manual</h3>
            <p class="text-xs text-gray-600">Tambah berita satu per satu</p>
        </a>
        <a href="{{ route('admin.berita.index') }}" class="glass-card p-6 hover:shadow-lg transition-all text-center">
            <div class="text-3xl mb-2">📋</div>
            <h3 class="font-semibold text-gray-900 mb-1">Daftar Berita</h3>
            <p class="text-xs text-gray-600">Lihat semua berita yang sudah ada</p>
        </a>
    </div>

    <form action="{{ route('admin.berita.import') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf
        <div class="glass-card p-6 space-y-5">
            <h2 class="text-lg font-bold text-gray-900">Import Berita dari CSV</h2>
            
            <div class="bg-blue-50 border border-blue-200 rounded-xl p-4">
                <p class="text-sm text-blue-800"><strong>Informasi:</strong></p>
                <ul class="text-sm text-blue-700 mt-2 space-y-1 list-disc list-inside">
                    <li>File harus dalam format CSV atau TXT (dapat dibuat dari Excel)</li>
                    <li>Ukuran maksimal file 5 MB</li>
                    <li>Kolom yang diperlukan: <strong>judul, kategori_berita_id, ringkasan, konten, status</strong></li>
                    <li>Status: <code class="bg-white px-2 py-1 rounded">draft</code>, <code class="bg-white px-2 py-1 rounded">published</code>, atau <code class="bg-white px-2 py-1 rounded">archived</code></li>
                    <li>Kategori ID yang tersedia:
                        @foreach($kategori as $k)
                            <code class="bg-white px-2 py-1 rounded">{{ $k->id }} = {{ $k->nama }}</code>{{ !$loop->last ? ',' : '' }}
                        @endforeach
                    </li>
                </ul>
            </div>

            <div>
                <label class="text-gray-700 text-sm mb-2 block font-medium">Pilih File CSV / XLSX / TXT *</label>
                <input type="file" name="file" accept=".csv,.xlsx,.xls,.txt" required
                    class="w-full bg-white border border-gray-300 rounded-xl px-4 py-3 text-gray-700 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                @error('file')<p class="text-red-600 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="bg-gray-50 border border-gray-200 rounded-xl p-4">
                <p class="text-sm font-medium text-gray-900 mb-2">Contoh Format CSV:</p>
                <div class="bg-white border border-gray-200 rounded-lg p-3 text-xs font-mono overflow-x-auto">
                    <div>judul,kategori_berita_id,ringkasan,konten,status</div>
                    <div class="text-gray-500 mt-1">"Berita Penting 1",1,"Ringkasan singkat","Isi konten lengkap...",published</div>
                    <div class="text-gray-500">"Berita Penting 2",2,"Ringkasan singkat","Isi konten lengkap...",draft</div>
                </div>
                <p class="text-xs text-gray-600 mt-2">
                    ✓ Gunakan tanda kutip untuk teks yang panjang atau mengandung koma<br>
                    ✓ Download template Excel di atas untuk lebih memudahkan
                </p>
            </div>
        </div>

        <div class="flex gap-3">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-xl transition-all duration-300 hover:scale-105 inline-flex items-center gap-2">
                ⬆️ Import Berita Sekarang
            </button>
            <a href="{{ route('admin.berita.index') }}" class="border border-gray-300 text-gray-700 hover:bg-gray-100 font-medium px-6 py-3 rounded-xl transition-all duration-300 inline-flex items-center gap-2">Batal</a>
        </div>
    </form>
</div>
@endsection
