@extends('layouts.admin')
@section('title', 'Tambah Berita')
@section('page-title', 'Tambah Berita')

@section('content')
<div class="max-w-4xl">
    <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf

        <div class="glass-card p-6 space-y-5">
            <div>
                <label class="text-white/70 text-sm mb-2 block">Judul Berita *</label>
                <input type="text" name="judul" value="{{ old('judul') }}"
                    class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-gold/50"
                    placeholder="Masukkan judul berita">
                @error('judul')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="grid grid-cols-2 gap-5">
                <div>
                    <label class="text-white/70 text-sm mb-2 block">Kategori *</label>
                    <select name="kategori_berita_id"
                        class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-gold/50">
                        <option value="">Pilih Kategori</option>
                        @foreach($kategori as $k)
                        <option value="{{ $k->id }}" {{ old('kategori_berita_id') == $k->id ? 'selected' : '' }}>
                            {{ $k->nama }}
                        </option>
                        @endforeach
                    </select>
                    @error('kategori_berita_id')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="text-white/70 text-sm mb-2 block">Status *</label>
                    <select name="status"
                        class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-gold/50">
                        <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                        <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
                        <option value="archived" {{ old('status') == 'archived' ? 'selected' : '' }}>Archived</option>
                    </select>
                </div>
            </div>

            <div>
                <label class="text-white/70 text-sm mb-2 block">Ringkasan</label>
                <textarea name="ringkasan" rows="3"
                    class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-gold/50"
                    placeholder="Ringkasan singkat berita">{{ old('ringkasan') }}</textarea>
            </div>

            <div>
                <label class="text-white/70 text-sm mb-2 block">Konten *</label>
                <textarea name="konten" rows="10"
                    class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-gold/50"
                    placeholder="Tulis konten berita di sini">{{ old('konten') }}</textarea>
                @error('konten')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="text-white/70 text-sm mb-2 block">Thumbnail</label>
                <input type="file" name="thumbnail" accept="image/*"
                    class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white/70 text-sm focus:outline-none focus:border-gold/50">
                @error('thumbnail')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
        </div>

        <div class="flex gap-3">
            <button type="submit" class="btn-gold">Simpan Berita</button>
            <a href="{{ route('admin.berita.index') }}" class="btn-outline-white">Batal</a>
        </div>
    </form>
</div>
@endsection