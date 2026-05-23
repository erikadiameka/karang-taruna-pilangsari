@extends('layouts.admin')
@section('title', 'Upload Foto')
@section('page-title', 'Upload Foto')
@section('content')
<div class="max-w-2xl">
    <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf
        <div class="glass-card p-6 space-y-5">
            <div>
                <label class="text-gray-700 text-sm mb-2 block font-medium">Judul Foto *</label>
                <input type="text" name="judul" value="{{ old('judul') }}"
                    class="w-full bg-white border border-gray-300 rounded-xl px-4 py-3 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                @error('judul')<p class="text-red-600 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div class="grid grid-cols-2 gap-5">
                <div>
                    <label class="text-gray-700 text-sm mb-2 block font-medium">Tipe</label>
                    <select name="tipe" class="w-full bg-white border border-gray-300 rounded-xl px-4 py-3 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="foto">Foto</option>
                        <option value="video">Video</option>
                    </select>
                </div>
                <div>
                    <label class="text-gray-700 text-sm mb-2 block font-medium">Kegiatan (opsional)</label>
                    <select name="kegiatan_id" class="w-full bg-white border border-gray-300 rounded-xl px-4 py-3 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="">-- Pilih Kegiatan --</option>
                        @foreach($kegiatan as $k)
                        <option value="{{ $k->id }}">{{ $k->nama }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div>
                <label class="text-gray-700 text-sm mb-2 block font-medium">File Foto *</label>
                <input type="file" name="file_path" accept="image/*"
                    class="w-full bg-white border border-gray-300 rounded-xl px-4 py-3 text-gray-700 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                @error('file_path')<p class="text-red-600 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="text-gray-700 text-sm mb-2 block font-medium">Deskripsi</label>
                <textarea name="deskripsi" rows="3"
                    class="w-full bg-white border border-gray-300 rounded-xl px-4 py-3 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('deskripsi') }}</textarea>
            </div>
            <div class="flex items-center gap-3">
                <input type="checkbox" name="is_featured" id="is_featured" class="rounded">
                <label for="is_featured" class="text-gray-700 text-sm font-medium">Jadikan Featured</label>
            </div>
        </div>
        <div class="flex gap-3">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-xl transition-all duration-300 hover:scale-105 inline-flex items-center gap-2">Upload Foto</button>
            <a href="{{ route('admin.galeri.index') }}" class="border border-gray-300 text-gray-700 hover:bg-gray-100 font-medium px-6 py-3 rounded-xl transition-all duration-300 inline-flex items-center gap-2">Batal</a>
        </div>
    </form>
</div>
@endsection