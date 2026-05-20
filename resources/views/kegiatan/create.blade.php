@extends('layouts.admin')
@section('title', 'Tambah Kegiatan')
@section('page-title', 'Tambah Kegiatan')
@section('content')
<div class="max-w-4xl">
    <form action="{{ route('admin.kegiatan.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf
        <div class="glass-card p-6 space-y-5">
            <div>
                <label class="text-white/70 text-sm mb-2 block">Nama Kegiatan *</label>
                <input type="text" name="nama" value="{{ old('nama') }}"
                    class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-gold/50">
                @error('nama')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div class="grid grid-cols-2 gap-5">
                <div>
                    <label class="text-white/70 text-sm mb-2 block">Kategori *</label>
                    <select name="kategori" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-gold/50">
                        @foreach(['Sosial','Pendidikan','Olahraga','Seni Budaya','Ekonomi','Lainnya'] as $kat)
                        <option value="{{ $kat }}">{{ $kat }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="text-white/70 text-sm mb-2 block">Status *</label>
                    <select name="status" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-gold/50">
                        <option value="akan_datang">Akan Datang</option>
                        <option value="berlangsung">Berlangsung</option>
                        <option value="selesai">Selesai</option>
                    </select>
                </div>
            </div>
            <div>
                <label class="text-white/70 text-sm mb-2 block">Deskripsi *</label>
                <textarea name="deskripsi" rows="5" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-gold/50">{{ old('deskripsi') }}</textarea>
                @error('deskripsi')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="text-white/70 text-sm mb-2 block">Lokasi *</label>
                <input type="text" name="lokasi" value="{{ old('lokasi') }}"
                    class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-gold/50">
            </div>
            <div class="grid grid-cols-2 gap-5">
                <div>
                    <label class="text-white/70 text-sm mb-2 block">Tanggal Mulai *</label>
                    <input type="datetime-local" name="tanggal_mulai" value="{{ old('tanggal_mulai') }}"
                        class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-gold/50">
                </div>
                <div>
                    <label class="text-white/70 text-sm mb-2 block">Tanggal Selesai</label>
                    <input type="datetime-local" name="tanggal_selesai" value="{{ old('tanggal_selesai') }}"
                        class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-gold/50">
                </div>
            </div>
            <div class="grid grid-cols-2 gap-5">
                <div>
                    <label class="text-white/70 text-sm mb-2 block">Jumlah Peserta</label>
                    <input type="number" name="peserta" value="{{ old('peserta', 0) }}"
                        class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-gold/50">
                </div>
                <div>
                    <label class="text-white/70 text-sm mb-2 block">Thumbnail</label>
                    <input type="file" name="thumbnail" accept="image/*"
                        class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white/70 text-sm focus:outline-none focus:border-gold/50">
                </div>
            </div>
        </div>
        <div class="flex gap-3">
            <button type="submit" class="btn-gold">Simpan Kegiatan</button>
            <a href="{{ route('admin.kegiatan.index') }}" class="btn-outline-white">Batal</a>
        </div>
    </form>
</div>
@endsection