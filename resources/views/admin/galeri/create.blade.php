@extends('layouts.admin')
@section('title', 'Upload Foto')
@section('page-title', 'Upload Foto')
@section('content')
<div class="max-w-2xl">
    <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf
        <div class="glass-card p-6 space-y-5">
            <div>
                <label class="text-white/70 text-sm mb-2 block">Judul Foto *</label>
                <input type="text" name="judul" value="{{ old('judul') }}"
                    class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-gold/50">
                @error('judul')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div class="grid grid-cols-2 gap-5">
                <div>
                    <label class="text-white/70 text-sm mb-2 block">Tipe</label>
                    <select name="tipe" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-gold/50">
                        <option value="foto">Foto</option>
                        <option value="video">Video</option>
                    </select>
                </div>
                <div>
                    <label class="text-white/70 text-sm mb-2 block">Kegiatan (opsional)</label>
                    <select name="kegiatan_id" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-gold/50">
                        <option value="">-- Pilih Kegiatan --</option>
                        @foreach($kegiatan as $k)
                        <option value="{{ $k->id }}">{{ $k->nama }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div>
                <label class="text-white/70 text-sm mb-2 block">File Foto *</label>
                <input type="file" name="file_path" accept="image/*"
                    class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white/70 text-sm focus:outline-none focus:border-gold/50">
                @error('file_path')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="text-white/70 text-sm mb-2 block">Deskripsi</label>
                <textarea name="deskripsi" rows="3"
                    class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-gold/50">{{ old('deskripsi') }}</textarea>
            </div>
            <div class="flex items-center gap-3">
                <input type="checkbox" name="is_featured" id="is_featured" class="rounded">
                <label for="is_featured" class="text-white/70 text-sm">Jadikan Featured</label>
            </div>
        </div>
        <div class="flex gap-3">
            <button type="submit" class="btn-gold">Upload Foto</button>
            <a href="{{ route('admin.galeri.index') }}" class="btn-outline-white">Batal</a>
        </div>
    </form>
</div>
@endsection