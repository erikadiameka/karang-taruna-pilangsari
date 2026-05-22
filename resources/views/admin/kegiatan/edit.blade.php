@extends('layouts.admin')
@section('title', 'Edit Kegiatan')
@section('page-title', 'Edit Kegiatan')
@section('content')
<div class="max-w-4xl">
    <form action="{{ route('admin.kegiatan.update', $kegiatan) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf @method('PUT')
        <div class="glass-card p-6 space-y-5">
            <div>
                <label class="text-white/70 text-sm mb-2 block">Nama Kegiatan *</label>
                <input type="text" name="nama" value="{{ old('nama', $kegiatan->nama) }}"
                    class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-gold/50">
            </div>
            <div class="grid grid-cols-2 gap-5">
                <div>
                    <label class="text-white/70 text-sm mb-2 block">Kategori *</label>
                    <select name="kategori" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-gold/50">
                        @foreach(['Sosial','Pendidikan','Olahraga','Seni Budaya','Ekonomi','Lainnya'] as $kat)
                        <option value="{{ $kat }}" {{ $kegiatan->kategori == $kat ? 'selected' : '' }}>{{ $kat }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="text-white/70 text-sm mb-2 block">Status *</label>
                    <select name="status" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-gold/50">
                        <option value="akan_datang" {{ $kegiatan->status == 'akan_datang' ? 'selected' : '' }}>Akan Datang</option>
                        <option value="berlangsung" {{ $kegiatan->status == 'berlangsung' ? 'selected' : '' }}>Berlangsung</option>
                        <option value="selesai" {{ $kegiatan->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                    </select>
                </div>
            </div>
            <div>
                <label class="text-white/70 text-sm mb-2 block">Deskripsi *</label>
                <textarea name="deskripsi" rows="5"
                    class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-gold/50">{{ old('deskripsi', $kegiatan->deskripsi) }}</textarea>
            </div>
            <div>
                <label class="text-white/70 text-sm mb-2 block">Lokasi *</label>
                <input type="text" name="lokasi" value="{{ old('lokasi', $kegiatan->lokasi) }}"
                    class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-gold/50">
            </div>
            <div class="grid grid-cols-2 gap-5">
                <div>
                    <label class="text-white/70 text-sm mb-2 block">Tanggal Mulai *</label>
                    <input type="datetime-local" name="tanggal_mulai"
                        value="{{ old('tanggal_mulai', $kegiatan->tanggal_mulai->format('Y-m-d\TH:i')) }}"
                        class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-gold/50">
                </div>
                <div>
                    <label class="text-white/70 text-sm mb-2 block">Tanggal Selesai</label>
                    <input type="datetime-local" name="tanggal_selesai"
                        value="{{ old('tanggal_selesai', $kegiatan->tanggal_selesai?->format('Y-m-d\TH:i')) }}"
                        class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-gold/50">
                </div>
            </div>
            <div class="grid grid-cols-2 gap-5">
                <div>
                    <label class="text-white/70 text-sm mb-2 block">Jumlah Peserta</label>
                    <input type="number" name="peserta" value="{{ old('peserta', $kegiatan->peserta) }}"
                        class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-gold/50">
                </div>
                <div>
                    <label class="text-white/70 text-sm mb-2 block">Thumbnail</label>
                    @if($kegiatan->thumbnail)
                    <img src="{{ Storage::url($kegiatan->thumbnail) }}" class="w-32 h-20 object-cover rounded-xl mb-2">
                    @endif
                    <input type="file" name="thumbnail" accept="image/*"
                        class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white/70 text-sm focus:outline-none focus:border-gold/50">
                </div>
            </div>
        </div>
        <div class="flex gap-3">
            <button type="submit" class="btn-gold">Update Kegiatan</button>
            <a href="{{ route('admin.kegiatan.index') }}" class="btn-outline-white">Batal</a>
        </div>
    </form>
</div>
@endsection