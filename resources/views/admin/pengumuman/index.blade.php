@extends('layouts.admin')
@section('title', 'Kelola Pengumuman')
@section('page-title', 'Kelola Pengumuman')
@section('content')
<div class="flex justify-between items-center mb-6">
    <p class="text-white/50 text-sm">Total {{ $pengumuman->total() }} pengumuman</p>
    <a href="{{ route('admin.pengumuman.create') }}" class="btn-gold">+ Tambah Pengumuman</a>
</div>
<div class="glass-card overflow-hidden">
    <table class="w-full">
        <thead>
            <tr class="border-b border-white/10">
                <th class="text-left text-white/50 text-xs uppercase tracking-wider px-6 py-4">Judul</th>
                <th class="text-left text-white/50 text-xs uppercase tracking-wider px-6 py-4">Prioritas</th>
                <th class="text-left text-white/50 text-xs uppercase tracking-wider px-6 py-4">Status</th>
                <th class="text-left text-white/50 text-xs uppercase tracking-wider px-6 py-4">Expired</th>
                <th class="text-left text-white/50 text-xs uppercase tracking-wider px-6 py-4">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pengumuman as $p)
            <tr class="border-b border-white/5 hover:bg-white/5 transition-colors">
                <td class="px-6 py-4">
                    <p class="text-white text-sm font-medium">{{ Str::limit($p->judul, 50) }}</p>
                    <p class="text-white/40 text-xs mt-1">{{ $p->created_at->format('d M Y') }}</p>
                </td>
                <td class="px-6 py-4">
                    <span class="text-xs px-2 py-1 rounded-full
                        {{ $p->prioritas === 'tinggi' ? 'bg-red-500/10 text-red-400' :
                           ($p->prioritas === 'sedang' ? 'bg-yellow-500/10 text-yellow-400' :
                           'bg-green-500/10 text-green-400') }}">
                        {{ $p->prioritas }}
                    </span>
                </td>
                <td class="px-6 py-4">
                    <span class="text-xs px-2 py-1 rounded-full {{ $p->is_active ? 'bg-green-500/10 text-green-400' : 'bg-red-500/10 text-red-400' }}">
                        {{ $p->is_active ? 'Aktif' : 'Nonaktif' }}
                    </span>
                </td>
                <td class="px-6 py-4 text-white/50 text-xs">
                    {{ $p->expired_at ? $p->expired_at->format('d M Y') : 'Tidak ada' }}
                </td>
                <td class="px-6 py-4">
                    <div class="flex gap-2">
                        <a href="{{ route('admin.pengumuman.edit', $p) }}" class="text-gold text-xs border border-gold/30 px-3 py-1.5 rounded-lg">Edit</a>
                        <form action="{{ route('admin.pengumuman.destroy', $p) }}" method="POST" onsubmit="return confirm('Hapus pengumuman ini?')">
                            @csrf @method('DELETE')
                            <button class="text-red-400 text-xs border border-red-400/30 px-3 py-1.5 rounded-lg">Hapus</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="px-6 py-12 text-center text-white/40">Belum ada pengumuman.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <div class="px-6 py-4">{{ $pengumuman->links() }}</div>
</div>
@endsection