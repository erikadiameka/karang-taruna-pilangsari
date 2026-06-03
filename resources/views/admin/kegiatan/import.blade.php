@extends('layouts.admin')
@section('title', 'Import Kegiatan')
@section('page-title', 'Import Kegiatan')

@section('content')
<div class="max-w-4xl">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 mb-6">
        <a href="{{ route('admin.kegiatan.template') }}" class="glass-card p-6 hover:shadow-lg transition-all text-center">
            <div class="text-3xl mb-2">📥</div>
            <h3 class="font-semibold text-gray-900 mb-1">Download Template CSV</h3>
            <p class="text-xs text-gray-600">Download template untuk memudahkan format data</p>
        </a>
        <a href="{{ route('admin.kegiatan.create') }}" class="glass-card p-6 hover:shadow-lg transition-all text-center">
            <div class="text-3xl mb-2">➕</div>
            <h3 class="font-semibold text-gray-900 mb-1">Tambah Manual</h3>
            <p class="text-xs text-gray-600">Tambah kegiatan satu per satu</p>
        </a>
        <a href="{{ route('admin.kegiatan.index') }}" class="glass-card p-6 hover:shadow-lg transition-all text-center">
            <div class="text-3xl mb-2">📋</div>
            <h3 class="font-semibold text-gray-900 mb-1">Daftar Kegiatan</h3>
            <p class="text-xs text-gray-600">Lihat semua kegiatan yang sudah ada</p>
        </a>
    </div>

    <form action="{{ route('admin.kegiatan.import') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf
        <div class="glass-card p-6 space-y-5">
            <h2 class="text-lg font-bold text-gray-900">Import Kegiatan dari CSV</h2>
            
            <div class="bg-blue-50 border border-blue-200 rounded-xl p-4">
                <p class="text-sm text-blue-800"><strong>Informasi:</strong></p>
                <ul class="text-sm text-blue-700 mt-2 space-y-1 list-disc list-inside">
                    <li>File harus dalam format CSV, XLSX, atau TXT (dapat dibuat dari Excel)</li>
                    <li>Ukuran maksimal file 5 MB</li>
                    <li>Kolom yang diperlukan: <strong>nama, kategori, deskripsi, lokasi, tanggal_mulai, tanggal_selesai, status, peserta</strong></li>
                    <li>Format tanggal: <code class="bg-white px-2 py-1 rounded">YYYY-MM-DD HH:MM</code> (contoh: 2026-06-05 09:00)</li>
                    <li>Status: <code class="bg-white px-2 py-1 rounded">akan_datang</code>, <code class="bg-white px-2 py-1 rounded">berlangsung</code>, atau <code class="bg-white px-2 py-1 rounded">selesai</code></li>
                    <li>Kategori yang tersedia: <code class="bg-white px-2 py-1 rounded">Sosial</code>, <code class="bg-white px-2 py-1 rounded">Pendidikan</code>, <code class="bg-white px-2 py-1 rounded">Olahraga</code>, <code class="bg-white px-2 py-1 rounded">Seni Budaya</code>, <code class="bg-white px-2 py-1 rounded">Ekonomi</code>, <code class="bg-white px-2 py-1 rounded">Lainnya</code></li>
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
                    <div>nama,kategori,deskripsi,lokasi,tanggal_mulai,tanggal_selesai,status,peserta</div>
                    <div class="text-gray-500 mt-1">"Acara Sosial 1",Sosial,"Deskripsi kegiatan","Lokasi Acara","2026-06-05 09:00","2026-06-05 17:00",akan_datang,50</div>
                    <div class="text-gray-500">"Kegiatan Olahraga",Olahraga,"Deskripsi kegiatan","Lapangan Umum","2026-06-10 15:00","2026-06-10 18:00",berlangsung,30</div>
                </div>
                <p class="text-xs text-gray-600 mt-2">
                    ✓ Gunakan tanda kutip untuk teks yang panjang atau mengandung koma<br>
                    ✓ Download template Excel di atas untuk lebih memudahkan
                </p>
            </div>
        </div>

        <div class="flex gap-3">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-xl transition-all duration-300 hover:scale-105 inline-flex items-center gap-2">
                ⬆️ Import Kegiatan Sekarang
            </button>
            <a href="{{ route('admin.kegiatan.index') }}" class="border border-gray-300 text-gray-700 hover:bg-gray-100 font-medium px-6 py-3 rounded-xl transition-all duration-300 inline-flex items-center gap-2">Batal</a>
        </div>
    </form>
</div>
@endsection
