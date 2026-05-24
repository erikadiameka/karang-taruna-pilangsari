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
            <tr class="border-b border-gray-200 bg-gray-50">
                <th class="text-left text-gray-600 text-xs uppercase tracking-wider px-4 py-3">Nama</th>
                <th class="text-left text-gray-600 text-xs uppercase tracking-wider px-4 py-3 hidden sm:table-cell">Email</th>
                <th class="text-left text-gray-600 text-xs uppercase tracking-wider px-4 py-3 hidden md:table-cell">Role</th>
                <th class="text-left text-gray-600 text-xs uppercase tracking-wider px-4 py-3">Status</th>
                <th class="text-left text-gray-600 text-xs uppercase tracking-wider px-4 py-3">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $u)
            <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
                <td class="px-4 py-3">
                    <div class="flex items-center gap-2">
                        <div class="w-7 h-7 rounded-full bg-gold/20 flex items-center justify-center text-gold text-xs font-bold flex-shrink-0">
                            {{ strtoupper(substr($u->name, 0, 1)) }}
                        </div>
                        <p class="text-gray-900 text-sm font-medium truncate">{{ Str::limit($u->name, 20) }}</p>
                    </div>
                </td>
                <td class="px-4 py-3 text-gray-600 text-sm hidden sm:table-cell truncate">{{ Str::limit($u->email, 20) }}</td>
                <td class="px-4 py-3 hidden md:table-cell">
                    <span class="text-xs px-2 py-1 rounded-full whitespace-nowrap
                        {{ $u->role === 'super_admin' ? 'bg-purple-100 text-purple-700' :
                           ($u->role === 'admin' ? 'bg-blue-100 text-blue-700' :
                           'bg-green-100 text-green-700') }}">
                        {{ str_replace('_', ' ', $u->role) }}
                    </span>
                </td>
                <td class="px-4 py-3">
                    <span class="text-xs px-2 py-1 rounded-full whitespace-nowrap {{ $u->is_active ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                        {{ $u->is_active ? 'Aktif' : 'Nonaktif' }}
                    </span>
                </td>
                <td class="px-4 py-3">
                    <div class="flex gap-1 flex-wrap">
                        <a href="{{ route('admin.users.edit', $u) }}" class="text-blue-600 text-xs border border-blue-300 px-2 py-1 rounded">Edit</a>
                        @if($u->id !== auth()->id())
                        <form action="{{ route('admin.users.destroy', $u) }}" method="POST" onsubmit="return confirm('Hapus user ini?')">
                            @csrf @method('DELETE')
                            <button class="text-red-400 text-xs border border-red-400/30 px-2 py-1 rounded">Hapus</button>
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
    <div class="px-4 py-3">{{ $users->links() }}</div>
</div>
@endsection