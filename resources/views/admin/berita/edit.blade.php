@extends('layouts.admin')
@section('title', 'Edit Berita')
@section('page-title', 'Edit Berita')

@section('content')
<div class="max-w-4xl">
    <form action="{{ route('admin.berita.update', $berita) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf @method('PUT')

        <div class="glass-card p-6 space-y-5">
            <div>
                <label class="text-gray-700 text-sm mb-2 block font-medium">Judul Berita *</label>
                <input type="text" name="judul" value="{{ old('judul', $berita->judul) }}"
                    class="w-full bg-white border border-gray-300 rounded-xl px-4 py-3 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                @error('judul')<p class="text-red-600 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="grid grid-cols-2 gap-5">
                <div>
                    <label class="text-gray-700 text-sm mb-2 block font-medium">Kategori *</label>
                    <select name="kategori_berita_id"
                        class="w-full bg-white border border-gray-300 rounded-xl px-4 py-3 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        @foreach($kategori as $k)
                        <option value="{{ $k->id }}" {{ $berita->kategori_berita_id == $k->id ? 'selected' : '' }}>
                            {{ $k->nama }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="text-gray-700 text-sm mb-2 block font-medium">Status *</label>
                    <select name="status"
                        class="w-full bg-white border border-gray-300 rounded-xl px-4 py-3 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="draft" {{ $berita->status == 'draft' ? 'selected' : '' }}>Draft</option>
                        <option value="published" {{ $berita->status == 'published' ? 'selected' : '' }}>Published</option>
                        <option value="archived" {{ $berita->status == 'archived' ? 'selected' : '' }}>Archived</option>
                    </select>
                </div>
            </div>

            <div>
                <label class="text-gray-700 text-sm mb-2 block font-medium">Ringkasan</label>
                <textarea name="ringkasan" rows="3"
                    class="w-full bg-white border border-gray-300 rounded-xl px-4 py-3 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('ringkasan', $berita->ringkasan) }}</textarea>
            </div>

            <div>
                <label class="text-gray-700 text-sm mb-2 block font-medium">Konten *</label>
                <textarea name="konten" rows="10"
                    class="w-full bg-white border border-gray-300 rounded-xl px-4 py-3 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('konten', $berita->konten) }}</textarea>
            </div>

            <div>
                <label class="text-gray-700 text-sm mb-2 block font-medium">Thumbnail</label>
                @if($berita->thumbnail)
                <img src="{{ Storage::url($berita->thumbnail) }}" class="w-40 h-28 object-cover rounded-xl mb-3">
                @endif
                <input type="file" name="thumbnail" accept="image/*"
                    class="w-full bg-white border border-gray-300 rounded-xl px-4 py-3 text-gray-700 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
        </div>

        <div class="flex gap-3">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-xl transition-all duration-300 hover:scale-105 inline-flex items-center gap-2">Update Berita</button>
            <a href="{{ route('admin.berita.index') }}" class="border border-gray-300 text-gray-700 hover:bg-gray-100 font-medium px-6 py-3 rounded-xl transition-all duration-300 inline-flex items-center gap-2">Batal</a>
        </div>
    </form>
</div>
@endsection