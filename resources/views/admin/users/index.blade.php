@extends('layouts.admin')
@section('title', 'Kelola Users')
@section('page-title', 'Kelola Users')
@section('content')
<div class="flex justify-between items-center mb-6">
    <p class="text-white/50 text-sm">Total {{ $users->total() }} users</p>
    <a href="{{ route('admin.users.create') }}" class="btn-gold">+ Tambah User</a>
</div>
<div class="glass-card overflow-hidden">
    <table class="w-full">
        <thead>
            <tr class="border-b border-white/10">
                <th class="text-left text-white/50 text-xs uppercase tracking-wider px-6 py-4">Nama</th>
                <th class="text-left text-white/50 text-xs uppercase tracking-wider px-6 py-4">Email</th>
                <th class="text-left text-white/50 text-xs uppercase tracking-wider px-6 py-4">Role</th>
                <th class="text-left text-white/50 text-xs uppercase tracking-wider px-6 py-4">Status</th>
                <th class="text-left text-white/50 text-xs uppercase tracking-wider px-6 py-4">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $u)
            <tr class="border-b border-white/5 hover:bg-white/5 transition-colors">
                <td class="px-6 py-4">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-gold/20 flex items-center justify-center text-gold text-xs font-bold">
                            {{ strtoupper(substr($u->name, 0, 1)) }}
                        </div>
                        <p class="text-white text-sm font-medium">{{ $u->name }}</p>
                    </div>
                </td>
                <td class="px-6 py-4 text-white/50 text-sm">{{ $u->email }}</td>
                <td class="px-6 py-4">
                    <span class="text-xs px-2 py-1 rounded-full
                        {{ $u->role === 'super_admin' ? 'bg-gold/10 text-gold' :
                           ($u->role === 'admin' ? 'bg-blue-500/10 text-blue-400' :
                           'bg-green-500/10 text-green-400') }}">
                        {{ str_replace('_', ' ', $u->role) }}
                    </span>
                </td>
                <td class="px-6 py-4">
                    <span class="text-xs px-2 py-1 rounded-full {{ $u->is_active ? 'bg-green-500/10 text-green-400' : 'bg-red-500/10 text-red-400' }}">
                        {{ $u->is_active ? 'Aktif' : 'Nonaktif' }}
                    </span>
                </td>
                <td class="px-6 py-4">
                    <div class="flex gap-2">
                        <a href="{{ route('admin.users.edit', $u) }}" class="text-gold text-xs border border-gold/30 px-3 py-1.5 rounded-lg">Edit</a>
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
                <td colspan="5" class="px-6 py-12 text-center text-white/40">Belum ada user.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <div class="px-6 py-4">{{ $users->links() }}</div>
</div>
@endsection