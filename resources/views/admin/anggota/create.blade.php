@extends('layouts.admin')
@section('title', 'Tambah Anggota')
@section('page-title', 'Tambah Anggota')
@section('content')
<div class="max-w-4xl">
    <form action="{{ route('admin.anggota.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf
        <div class="glass-card p-6 space-y-5">
            <div class="grid grid-cols-2 gap-5">
                <div>
                    <label class="text-white/70 text-sm mb-2 block">Nama Lengkap *</label>
                    <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap') }}"
                        class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-gold/50">
                    @error('nama_lengkap')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="text-white/70 text-sm mb-2 block">NIK (16 digit) *</label>
                    <input type="text" name="nik" value="{{ old('nik') }}" maxlength="16"
                        class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-gold/50">
                    @error('nik')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
            </div>
            <div class="grid grid-cols-3 gap-5">
                <div>
                    <label class="text-white/70 text-sm mb-2 block">No. HP</label>
                    <input type="text" name="no_hp" value="{{ old('no_hp') }}"
                        class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-gold/50">
                </div>
                <div>
                    <label class="text-white/70 text-sm mb-2 block">Jenis Kelamin *</label>
                    <select name="jenis_kelamin" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-gold/50">
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
                <div>
                    <label class="text-white/70 text-sm mb-2 block">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}"
                        class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-gold/50">
                </div>
            </div>
            <div class="grid grid-cols-3 gap-5">
                <div>
                    <label class="text-white/70 text-sm mb-2 block">Jabatan</label>
                    <input type="text" name="jabatan" value="{{ old('jabatan') }}"
                        class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-gold/50">
                </div>
                <div>
                    <label class="text-white/70 text-sm mb-2 block">Divisi</label>
                    <select name="divisi" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-gold/50">
                        <option value="">-- Pilih Divisi --</option>
                        @foreach(['Humas','Sosial','Ekonomi','Seni Budaya','Olahraga','Pendidikan'] as $div)
                        <option value="{{ $div }}">{{ $div }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="text-white/70 text-sm mb-2 block">Status *</label>
                    <select name="status" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-gold/50">
                        <option value="aktif">Aktif</option>
                        <option value="tidak_aktif">Tidak Aktif</option>
                        <option value="alumni">Alumni</option>
                    </select>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-5">
                <div>
                    <label class="text-white/70 text-sm mb-2 block">Tahun Masuk</label>
                    <input type="number" name="tahun_masuk" value="{{ old('tahun_masuk') }}" min="2000" max="{{ date('Y') }}"
                        class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-gold/50">
                </div>
                <div>
                    <label class="text-white/70 text-sm mb-2 block">Foto</label>
                    <input type="file" name="foto" accept="image/*"
                        class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white/70 text-sm focus:outline-none focus:border-gold/50">
                </div>
            </div>
            <div>
                <label class="text-white/70 text-sm mb-2 block">Alamat</label>
                <textarea name="alamat" rows="3" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-gold/50">{{ old('alamat') }}</textarea>
            </div>
        </div>
        <div class="flex gap-3">
            <button type="submit" class="btn-gold">Simpan Anggota</button>
            <a href="{{ route('admin.anggota.index') }}" class="btn-outline-white">Batal</a>
        </div>
    </form>
</div>
@endsection