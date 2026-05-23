@extends('layouts.admin')
@section('title', 'Tambah User')
@section('page-title', 'Tambah User')
@section('content')
<div class="max-w-2xl">
    <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-5">
        @csrf
        <div class="glass-card p-6 space-y-5">
            <div>
                <label class="text-gray-700 text-sm mb-2 block font-medium">Nama *</label>
                <input type="text" name="name" value="{{ old('name') }}"
                    class="w-full bg-white border border-gray-300 rounded-xl px-4 py-3 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                @error('name')<p class="text-red-600 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="text-gray-700 text-sm mb-2 block font-medium">Email *</label>
                <input type="email" name="email" value="{{ old('email') }}"
                    class="w-full bg-white border border-gray-300 rounded-xl px-4 py-3 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                @error('email')<p class="text-red-600 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div class="grid grid-cols-2 gap-5">
                <div>
                    <label class="text-gray-700 text-sm mb-2 block font-medium">Password *</label>
                    <input type="password" name="password"
                        class="w-full bg-white border border-gray-300 rounded-xl px-4 py-3 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    @error('password')<p class="text-red-600 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="text-gray-700 text-sm mb-2 block font-medium">Konfirmasi Password *</label>
                    <input type="password" name="password_confirmation"
                        class="w-full bg-white border border-gray-300 rounded-xl px-4 py-3 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
            </div>
            <div>
                <label class="text-gray-700 text-sm mb-2 block font-medium">Role *</label>
                <select name="role" class="w-full bg-white border border-gray-300 rounded-xl px-4 py-3 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="anggota">Anggota</option>
                    <option value="admin">Admin</option>
                    <option value="super_admin">Super Admin</option>
                </select>
            </div>
            <div class="flex items-center gap-3">
                <input type="checkbox" name="is_active" id="is_active" checked class="rounded">
                <label for="is_active" class="text-gray-700 text-sm font-medium">Aktifkan User</label>
            </div>
        </div>
        <div class="flex gap-3">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-xl transition-all duration-300 hover:scale-105 inline-flex items-center gap-2">Simpan User</button>
            <a href="{{ route('admin.users.index') }}" class="border border-gray-300 text-gray-700 hover:bg-gray-100 font-medium px-6 py-3 rounded-xl transition-all duration-300 inline-flex items-center gap-2">Batal</a>
        </div>
    </form>
</div>
@endsection