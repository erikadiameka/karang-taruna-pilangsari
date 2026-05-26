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
                    <label class="text-gray-700 text-sm font-medium mb-2 block">Nama Lengkap *</label>
                    <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap') }}"
                        class="w-full bg-white border border-gray-300 rounded-xl px-4 py-3 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    @error('nama_lengkap')<p class="text-red-600 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="text-gray-700 text-sm font-medium mb-2 block">NIK (16 digit) *</label>
                    <input type="text" name="nik" value="{{ old('nik') }}" maxlength="16"
                        class="w-full bg-white border border-gray-300 rounded-xl px-4 py-3 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    @error('nik')<p class="text-red-600 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
            </div>
            <div class="grid grid-cols-3 gap-5">
                <div>
                    <label class="text-gray-700 text-sm font-medium mb-2 block">No. HP</label>
                    <input type="text" name="no_hp" value="{{ old('no_hp') }}"
                        class="w-full bg-white border border-gray-300 rounded-xl px-4 py-3 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
                <div>
                    <label class="text-gray-700 text-sm font-medium mb-2 block">Jenis Kelamin *</label>
                    <select name="jenis_kelamin" class="w-full bg-white border border-gray-300 rounded-xl px-4 py-3 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
                <div>
                    <label class="text-gray-700 text-sm font-medium mb-2 block">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}"
                        class="w-full bg-white border border-gray-300 rounded-xl px-4 py-3 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
            </div>
            <div class="grid grid-cols-3 gap-5">
                <div>
                    <label class="text-gray-700 text-sm font-medium mb-2 block">Jabatan</label>
                    <input type="text" name="jabatan" value="{{ old('jabatan') }}"
                        class="w-full bg-white border border-gray-300 rounded-xl px-4 py-3 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
                <div>
                    <label class="text-gray-700 text-sm font-medium mb-2 block">Bidang</label>
                    <select name="divisi" class="w-full bg-white border border-gray-300 rounded-xl px-4 py-3 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="">-- Pilih Bidang --</option>
                        @foreach(['Humas dan Keamanan','Seni Kreatif dan Medafor','Keagamaan','Kepemudaan dan Olahraga'] as $div)
                        <option value="{{ $div }}" {{ old('divisi') == $div ? 'selected' : '' }}>{{ $div }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="text-gray-700 text-sm font-medium mb-2 block">Posisi Inti</label>
                    <select name="posisi_inti" class="w-full bg-white border border-gray-300 rounded-xl px-4 py-3 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="">-- Pilih Posisi --</option>
                        @foreach(['Ketua','Wakil Ketua','Sekretaris 1','Sekretaris 2','Bendahara 1','Bendahara 2'] as $pos)
                        <option value="{{ $pos }}" {{ old('posisi_inti') == $pos ? 'selected' : '' }}>{{ $pos }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div>
                <label class="text-gray-700 text-sm font-medium mb-2 block">Status *</label>
                <select name="status" class="w-full bg-white border border-gray-300 rounded-xl px-4 py-3 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="tidak_aktif" {{ old('status') == 'tidak_aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                    <option value="alumni" {{ old('status') == 'alumni' ? 'selected' : '' }}>Alumni</option>
                </select>
            </div>
            <div class="grid grid-cols-2 gap-5">
                <div>
                    <label class="text-gray-700 text-sm font-medium mb-2 block">Tahun Masuk</label>
                    <input type="number" name="tahun_masuk" value="{{ old('tahun_masuk') }}" min="2000" max="{{ date('Y') }}"
                        class="w-full bg-white border border-gray-300 rounded-xl px-4 py-3 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
                <div>
                    <label class="text-gray-700 text-sm font-medium mb-2 block">Foto</label>
                    <input type="file" name="foto" accept="image/*"
                        class="w-full bg-white border border-gray-300 rounded-xl px-4 py-3 text-gray-700 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
            </div>
            <div>
                <label class="text-gray-700 text-sm font-medium mb-2 block">Alamat</label>
                <textarea name="alamat" rows="3" class="w-full bg-white border border-gray-300 rounded-xl px-4 py-3 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('alamat') }}</textarea>
            </div>
        </div>
        <div class="flex gap-3">
            <button type="submit" onclick="this.disabled=true;this.form.submit();" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-xl transition-all duration-300 hover:scale-105 inline-flex items-center gap-2">Simpan Anggota</button>
            <a href="{{ route('admin.anggota.index') }}" class="border border-gray-300 text-gray-700 hover:bg-gray-100 font-medium px-6 py-3 rounded-xl transition-all duration-300 inline-flex items-center gap-2">Batal</a>
        </div>
    </form>
</div>
@endsection