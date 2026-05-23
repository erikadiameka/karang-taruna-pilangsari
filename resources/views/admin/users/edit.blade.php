@extends('layouts.admin')
@section('title', 'Edit User')
@section('page-title', 'Edit User')
@section('content')
<div class="max-w-2xl">
    <form action="{{ route('admin.users.update', $user) }}" method="POST" class="space-y-5">
        @csrf @method('PUT')
        <div class="glass-card p-6 space-y-5">
            <div>
                <label class="text-gray-700 text-sm mb-2 block font-medium">Nama *</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}"
                    class="w-full bg-white border border-gray-300 rounded-xl px-4 py-3 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
            <div>
                <label class="text-gray-700 text-sm mb-2 block font-medium">Email *</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}"
                    class="w-full bg-white border border-gray-300 rounded-xl px-4 py-3 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
            <div class="grid grid-cols-2 gap-5">
                <div>
                    <label class="text-gray-700 text-sm mb-2 block font-medium">Password Baru (kosongkan jika tidak diubah)</label>
                    <input type="password" name="password"
                        class="w-full bg-white border border-gray-300 rounded-xl px-4 py-3 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
                <div>
                    <label class="text-gray-700 text-sm mb-2 block font-medium">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation"
                        class="w-full bg-white border border-gray-300 rounded-xl px-4 py-3 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
            </div>
            <div>
                <label class="text-gray-700 text-sm mb-2 block font-medium">Role *</label>
                <select name="role" class="w-full bg-white border border-gray-300 rounded-xl px-4 py-3 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="anggota" {{ $user->role == 'anggota' ? 'selected' : '' }}>Anggota</option>
                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="super_admin" {{ $user->role == 'super_admin' ? 'selected' : '' }}>Super Admin</option>
                </select>
            </div>
            <div class="flex items-center gap-3">
                <input type="checkbox" name="is_active" id="is_active" {{ $user->is_active ? 'checked' : '' }} class="rounded">
                <label for="is_active" class="text-gray-700 text-sm font-medium">Aktifkan User</label>
            </div>
        </div>
        <div class="flex gap-3">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-xl transition-all duration-300 hover:scale-105 inline-flex items-center gap-2">Update User</button>
            <a href="{{ route('admin.users.index') }}" class="border border-gray-300 text-gray-700 hover:bg-gray-100 font-medium px-6 py-3 rounded-xl transition-all duration-300 inline-flex items-center gap-2">Batal</a>
        </div>
    </form>
</div>
@endsection