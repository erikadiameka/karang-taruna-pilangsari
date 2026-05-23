@extends('layouts.admin')
@section('title', 'Kelola Users')
@section('page-title', 'Kelola Users')
@section('content')
<div class="flex justify-between items-center mb-6">
    <p class="text-gray-600 text-sm">Total {{ $users->total() }} users</p>
    <a href="{{ route('admin.users.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-xl transition-all duration-300 hover:scale-105 inline-flex items-center gap-2">+ Tambah User</a>
</div>
<div class="glass-card overflow-hidden">
    <table class="w-full">
        <thead>
            <tr class="border-b border-gray-200">
                <th class="text-left text-gray-600 text-xs uppercase tracking-wider px-6 py-4">Nama</th>
                <th class="text-left text-gray-600 text-xs uppercase tracking-wider px-6 py-4">Email</th>
                <th class="text-left text-gray-600 text-xs uppercase tracking-wider px-6 py-4">Role</th>
                <th class="text-left text-gray-600 text-xs uppercase tracking-wider px-6 py-4">Status</th>
                <th class="text-left text-gray-600 text-xs uppercase tracking-wider px-6 py-4">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $u)
            <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
                <td class="px-6 py-4">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-gold/20 flex items-center justify-center text-gold text-xs font-bold">
                            {{ strtoupper(substr($u->name, 0, 1)) }}
                        </div>
                        <p class="text-gray-900 text-sm font-medium">{{ $u->name }}</p>
                    </div>
                </td>
                <td class="px-6 py-4 text-gray-600 text-sm">{{ $u->email }}</td>
                <td class="px-6 py-4">
                    <span class="text-xs px-2 py-1 rounded-full
                        {{ $u->role === 'super_admin' ? 'bg-purple-100 text-purple-700' :
                           ($u->role === 'admin' ? 'bg-blue-100 text-blue-700' :
                           'bg-green-100 text-green-700') }}">
                        {{ str_replace('_', ' ', $u->role) }}
                    </span>
                </td>
                <td class="px-6 py-4">
                    <span class="text-xs px-2 py-1 rounded-full {{ $u->is_active ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                        {{ $u->is_active ? 'Aktif' : 'Nonaktif' }}
                    </span>
                </td>
                <td class="px-6 py-4">
                    <div class="flex gap-2">
                        <a href="{{ route('admin.users.edit', $u) }}" class="text-blue-600 text-xs border border-blue-300 px-3 py-1.5 rounded-lg">Edit</a>
                        @if($u->id !== auth()->id())
                        <form action="{{ route('admin.users.destroy', $u) }}" method="POST" onsubmit="return confirm('Hapus user ini?')">
                            @csrf @method('DELETE')
                            <button class="text-red-400 text-xs border border-red-400/30 px-3 py-1.5 rounded-lg">Hapus</button>
                        </form>
                        @endif
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="px-6 py-12 text-center text-gray-500">Belum ada user.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <div class="px-6 py-4">{{ $users->links() }}</div>
</div>
@endsection