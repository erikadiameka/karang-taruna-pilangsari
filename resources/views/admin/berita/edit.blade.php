@extends('layouts.admin')
@section('title', 'Edit Berita')
@section('page-title', 'Edit Berita')

@section('content')
<div class="max-w-4xl">
    <form action="{{ route('admin.berita.update', $berita) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf @method('PUT')

        <div class="glass-card p-6 space-y-5">
            <div>
                <label class="text-white/70 text-sm mb-2 block">Judul Berita *</label>
                <input type="text" name="judul" value="{{ old('judul', $berita->judul) }}"
                    class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-gold/50">
                @error('judul')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="grid grid-cols-2 gap-5">
                <div>
                    <label class="text-white/70 text-sm mb-2 block">Kategori *</label>
                    <select name="kategori_berita_id"
                        class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-gold/50">
                        @foreach($kategori as $k)
                        <option value="{{ $k->id }}" {{ $berita->kategori_berita_id == $k->id ? 'selected' : '' }}>
                            {{ $k->nama }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="text-white/70 text-sm mb-2 block">Status *</label>
                    <select name="status"
                        class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-gold/50">
                        <option value="draft" {{ $berita->status == 'draft' ? 'selected' : '' }}>Draft</option>
                        <option value="published" {{ $berita->status == 'published' ? 'selected' : '' }}>Published</option>
                        <option value="archived" {{ $berita->status == 'archived' ? 'selected' : '' }}>Archived</option>
                    </select>
                </div>
            </div>

            <div>
                <label class="text-white/70 text-sm mb-2 block">Ringkasan</label>
                <textarea name="ringkasan" rows="3"
                    class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-gold/50">{{ old('ringkasan', $berita->ringkasan) }}</textarea>
            </div>

            <div>
                <label class="text-white/70 text-sm mb-2 block">Konten *</label>
                <textarea name="konten" rows="10"
                    class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-gold/50">{{ old('konten', $berita->konten) }}</textarea>
            </div>

            <div>
                <label class="text-white/70 text-sm mb-2 block">Thumbnail</label>
                @if($berita->thumbnail)
                <img src="{{ Storage::url($berita->thumbnail) }}" class="w-40 h-28 object-cover rounded-xl mb-3">
                @endif
                <input type="file" name="thumbnail" accept="image/*"
                    class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white/70 text-sm focus:outline-none focus:border-gold/50">
            </div>
        </div>

        <div class="flex gap-3">
            <button type="submit" class="btn-gold">Update Berita</button>
            <a href="{{ route('admin.berita.index') }}" class="btn-outline-white">Batal</a>
        </div>
    </form>
</div>
@endsection