@extends('layouts.admin')
@section('title', 'Edit Pengumuman')
@section('page-title', 'Edit Pengumuman')
@section('content')
<div class="max-w-2xl">
    <form action="{{ route('admin.pengumuman.update', $pengumuman) }}" method="POST" class="space-y-5">
        @csrf @method('PUT')
        <div class="glass-card p-6 space-y-5">
            <div>
                <label class="text-white/70 text-sm mb-2 block">Judul *</label>
                <input type="text" name="judul" value="{{ old('judul', $pengumuman->judul) }}"
                    class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-gold/50">
            </div>
            <div>
                <label class="text-white/70 text-sm mb-2 block">Isi Pengumuman *</label>
                <textarea name="isi" rows="5"
                    class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-gold/50">{{ old('isi', $pengumuman->isi) }}</textarea>
            </div>
            <div class="grid grid-cols-2 gap-5">
                <div>
                    <label class="text-white/70 text-sm mb-2 block">Prioritas *</label>
                    <select name="prioritas" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-gold/50">
                        <option value="rendah" {{ $pengumuman->prioritas == 'rendah' ? 'selected' : '' }}>Rendah</option>
                        <option value="sedang" {{ $pengumuman->prioritas == 'sedang' ? 'selected' : '' }}>Sedang</option>
                        <option value="tinggi" {{ $pengumuman->prioritas == 'tinggi' ? 'selected' : '' }}>Tinggi</option>
                    </select>
                </div>
                <div>
                    <label class="text-white/70 text-sm mb-2 block">Expired</label>
                    <input type="date" name="expired_at" value="{{ old('expired_at', $pengumuman->expired_at?->format('Y-m-d')) }}"
                        class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-gold/50">
                </div>
            </div>
            <div class="flex items-center gap-3">
                <input type="checkbox" name="is_active" id="is_active" {{ $pengumuman->is_active ? 'checked' : '' }} class="rounded">
                <label for="is_active" class="text-white/70 text-sm">Aktifkan Pengumuman</label>
            </div>
        </div>
        <div class="flex gap-3">
            <button type="submit" class="btn-gold">Update Pengumuman</button>
            <a href="{{ route('admin.pengumuman.index') }}" class="btn-outline-white">Batal</a>
        </div>
    </form>
</div>
@endsection