@extends('layouts.admin')
@section('title', 'Edit Anggota')
@section('page-title', 'Edit Anggota')
@section('content')
<div class="max-w-4xl">
    <form action="{{ route('admin.anggota.update', $anggota) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf @method('PUT')
        <div class="glass-card p-6 space-y-5">
            <div class="grid grid-cols-2 gap-5">
                <div>
                    <label class="text-white/70 text-sm mb-2 block">Nama Lengkap *</label>
                    <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap', $anggota->nama_lengkap) }}"
                        class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-gold/50">
                </div>
                <div>
                    <label class="text-white/70 text-sm mb-2 block">NIK *</label>
                    <input type="text" name="nik" value="{{ old('nik', $anggota->nik) }}" maxlength="16"
                        class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-gold/50">
                </div>
            </div>
            <div class="grid grid-cols-3 gap-5">
                <div>
                    <label class="text-white/70 text-sm mb-2 block">No. HP</label>
                    <input type="text" name="no_hp" value="{{ old('no_hp', $anggota->no_hp) }}"
                        class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-gold/50">
                </div>
                <div>
                    <label class="text-white/70 text-sm mb-2 block">Jenis Kelamin *</label>
                    <select name="jenis_kelamin" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-gold/50">
                        <option value="L" {{ $anggota->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="P" {{ $anggota->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>
                <div>
                    <label class="text-white/70 text-sm mb-2 block">Status *</label>
                    <select name="status" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-gold/50">
                        <option value="aktif" {{ $anggota->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="tidak_aktif" {{ $anggota->status == 'tidak_aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                        <option value="alumni" {{ $anggota->status == 'alumni' ? 'selected' : '' }}>Alumni</option>
                    </select>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-5">
                <div>
                    <label class="text-white/70 text-sm mb-2 block">Jabatan</label>
                    <input type="text" name="jabatan" value="{{ old('jabatan', $anggota->jabatan) }}"
                        class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-gold/50">
                </div>
                <div>
                    <label class="text-white/70 text-sm mb-2 block">Divisi</label>
                    <select name="divisi" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-gold/50">
                        <option value="">-- Pilih Divisi --</option>
                        @foreach(['Humas','Sosial','Ekonomi','Seni Budaya','Olahraga','Pendidikan'] as $div)
                        <option value="{{ $div }}" {{ $anggota->divisi == $div ? 'selected' : '' }}>{{ $div }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div>
                <label class="text-white/70 text-sm mb-2 block">Foto</label>
                @if($anggota->foto)
                <img src="{{ Storage::url($anggota->foto) }}" class="w-20 h-20 rounded-full object-cover mb-3">
                @endif
                <input type="file" name="foto" accept="image/*"
                    class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white/70 text-sm focus:outline-none focus:border-gold/50">
            </div>
        </div>
        <div class="flex gap-3">
            <button type="submit" class="btn-gold">Update Anggota</button>
            <a href="{{ route('admin.anggota.index') }}" class="btn-outline-white">Batal</a>
        </div>
    </form>
</div>
@endsection