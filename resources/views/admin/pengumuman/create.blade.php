@extends('layouts.admin')
@section('title', 'Tambah Pengumuman')
@section('page-title', 'Tambah Pengumuman')
@section('content')
<div class="max-w-2xl">
    <form action="{{ route('admin.pengumuman.store') }}" method="POST" class="space-y-5">
        @csrf
        <div class="glass-card p-6 space-y-5">
            <div>
                <label class="text-gray-700 text-sm mb-2 block font-medium">Judul *</label>
                <input type="text" name="judul" value="{{ old('judul') }}"
                    class="w-full bg-white border border-gray-300 rounded-xl px-4 py-3 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                @error('judul')<p class="text-red-600 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="text-gray-700 text-sm mb-2 block font-medium">Isi Pengumuman *</label>
                <textarea name="isi" rows="5"
                    class="w-full bg-white border border-gray-300 rounded-xl px-4 py-3 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('isi') }}</textarea>
                @error('isi')<p class="text-red-600 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div class="grid grid-cols-2 gap-5">
                <div>
                    <label class="text-gray-700 text-sm mb-2 block font-medium">Prioritas *</label>
                    <select name="prioritas" class="w-full bg-white border border-gray-300 rounded-xl px-4 py-3 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="rendah">Rendah</option>
                        <option value="sedang" selected>Sedang</option>
                        <option value="tinggi">Tinggi</option>
                    </select>
                </div>
                <div>
                    <label class="text-gray-700 text-sm mb-2 block font-medium">Expired (opsional)</label>
                    <input type="date" name="expired_at" value="{{ old('expired_at') }}"
                        class="w-full bg-white border border-gray-300 rounded-xl px-4 py-3 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
            </div>
            <div class="flex items-center gap-3">
                <input type="checkbox" name="is_active" id="is_active" checked class="rounded">
                <label for="is_active" class="text-gray-700 text-sm font-medium">Aktifkan Pengumuman</label>
            </div>
        </div>
        <div class="flex gap-3">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-xl transition-all duration-300 hover:scale-105 inline-flex items-center gap-2">Simpan Pengumuman</button>
            <a href="{{ route('admin.pengumuman.index') }}" class="border border-gray-300 text-gray-700 hover:bg-gray-100 font-medium px-6 py-3 rounded-xl transition-all duration-300 inline-flex items-center gap-2">Batal</a>
        </div>
    </form>
</div>
@endsection