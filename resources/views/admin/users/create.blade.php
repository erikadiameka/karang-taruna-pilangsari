@extends('layouts.admin')
@section('title', 'Tambah User')
@section('page-title', 'Tambah User')
@section('content')
<div class="max-w-2xl">
    <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-5">
        @csrf
        <div class="glass-card p-6 space-y-5">
            <div>
                <label class="text-white/70 text-sm mb-2 block">Nama *</label>
                <input type="text" name="name" value="{{ old('name') }}"
                    class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-gold/50">
                @error('name')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="text-white/70 text-sm mb-2 block">Email *</label>
                <input type="email" name="email" value="{{ old('email') }}"
                    class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-gold/50">
                @error('email')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div class="grid grid-cols-2 gap-5">
                <div>
                    <label class="text-white/70 text-sm mb-2 block">Password *</label>
                    <input type="password" name="password"
                        class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-gold/50">
                    @error('password')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="text-white/70 text-sm mb-2 block">Konfirmasi Password *</label>
                    <input type="password" name="password_confirmation"
                        class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-gold/50">
                </div>
            </div>
            <div>
                <label class="text-white/70 text-sm mb-2 block">Role *</label>
                <select name="role" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-gold/50">
                    <option value="anggota">Anggota</option>
                    <option value="admin">Admin</option>
                    <option value="super_admin">Super Admin</option>
                </select>
            </div>
            <div class="flex items-center gap-3">
                <input type="checkbox" name="is_active" id="is_active" checked class="rounded">
                <label for="is_active" class="text-white/70 text-sm">Aktifkan User</label>
            </div>
        </div>
        <div class="flex gap-3">
            <button type="submit" class="btn-gold">Simpan User</button>
            <a href="{{ route('admin.users.index') }}" class="btn-outline-white">Batal</a>
        </div>
    </form>
</div>
@endsection