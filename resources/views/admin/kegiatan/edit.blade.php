@extends('layouts.admin')
@section('title', 'Edit Kegiatan')
@section('page-title', 'Edit Kegiatan')
@section('content')
<div class="max-w-4xl">
    <form action="{{ route('admin.kegiatan.update', $kegiatan) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf @method('PUT')
        <div class="glass-card p-6 space-y-5">
            <div>
                <label class="text-gray-700 text-sm mb-2 block font-medium">Nama Kegiatan *</label>
                <input type="text" name="nama" value="{{ old('nama', $kegiatan->nama) }}"
                    class="w-full bg-white border border-gray-300 rounded-xl px-4 py-3 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
            <div class="grid grid-cols-2 gap-5">
                <div>
                    <label class="text-gray-700 text-sm mb-2 block font-medium">Kategori *</label>
                    <select name="kategori" class="w-full bg-white border border-gray-300 rounded-xl px-4 py-3 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        @foreach(['Sosial','Pendidikan','Olahraga','Seni Budaya','Ekonomi','Lainnya'] as $kat)
                        <option value="{{ $kat }}" {{ $kegiatan->kategori == $kat ? 'selected' : '' }}>{{ $kat }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="text-gray-700 text-sm mb-2 block font-medium">Status *</label>
                    <select name="status" class="w-full bg-white border border-gray-300 rounded-xl px-4 py-3 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="akan_datang" {{ $kegiatan->status == 'akan_datang' ? 'selected' : '' }}>Akan Datang</option>
                        <option value="berlangsung" {{ $kegiatan->status == 'berlangsung' ? 'selected' : '' }}>Berlangsung</option>
                        <option value="selesai" {{ $kegiatan->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                    </select>
                </div>
            </div>
            <div>
                <label class="text-gray-700 text-sm mb-2 block font-medium">Deskripsi *</label>
                <textarea name="deskripsi" rows="5"
                    class="w-full bg-white border border-gray-300 rounded-xl px-4 py-3 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('deskripsi', $kegiatan->deskripsi) }}</textarea>
            </div>
            <div>
                <label class="text-gray-700 text-sm mb-2 block font-medium">Lokasi *</label>
                <input type="text" name="lokasi" value="{{ old('lokasi', $kegiatan->lokasi) }}"
                    class="w-full bg-white border border-gray-300 rounded-xl px-4 py-3 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
            <div class="grid grid-cols-2 gap-5">
                <div>
                    <label class="text-gray-700 text-sm mb-2 block font-medium">Tanggal Mulai *</label>
                    <input type="datetime-local" name="tanggal_mulai"
                        value="{{ old('tanggal_mulai', $kegiatan->tanggal_mulai->format('Y-m-d\TH:i')) }}"
                        class="w-full bg-white border border-gray-300 rounded-xl px-4 py-3 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
                <div>
                    <label class="text-gray-700 text-sm mb-2 block font-medium">Tanggal Selesai</label>
                    <input type="datetime-local" name="tanggal_selesai"
                        value="{{ old('tanggal_selesai', $kegiatan->tanggal_selesai?->format('Y-m-d\TH:i')) }}"
                        class="w-full bg-white border border-gray-300 rounded-xl px-4 py-3 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
            </div>
            <div class="grid grid-cols-2 gap-5">
                <div>
                    <label class="text-gray-700 text-sm mb-2 block font-medium">Jumlah Peserta</label>
                    <input type="number" name="peserta" value="{{ old('peserta', $kegiatan->peserta) }}"
                        class="w-full bg-white border border-gray-300 rounded-xl px-4 py-3 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
                <div>
                    <label class="text-gray-700 text-sm mb-2 block font-medium">Thumbnail</label>
                    @if($kegiatan->thumbnail)
                    <img src="{{ Storage::url($kegiatan->thumbnail) }}" class="w-32 h-20 object-cover rounded-xl mb-2">
                    @endif
                    <input type="file" name="thumbnail" accept="image/*"
                        class="w-full bg-white border border-gray-300 rounded-xl px-4 py-3 text-gray-700 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
            </div>
        </div>
        <div class="flex gap-3">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-xl transition-all duration-300 hover:scale-105 inline-flex items-center gap-2">Update Kegiatan</button>
            <a href="{{ route('admin.kegiatan.index') }}" class="border border-gray-300 text-gray-700 hover:bg-gray-100 font-medium px-6 py-3 rounded-xl transition-all duration-300 inline-flex items-center gap-2">Batal</a>
        </div>
    </form>
</div>
@endsection