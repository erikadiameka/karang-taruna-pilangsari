@extends('layouts.admin')
@section('title', 'Kelola Pengumuman')
@section('page-title', 'Kelola Pengumuman')
@section('content')
<div class="flex justify-between items-center mb-6">
    <p class="text-gray-600 text-sm">Total {{ $pengumuman->total() }} pengumuman</p>
    <a href="{{ route('admin.pengumuman.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-xl transition-all duration-300 hover:scale-105 inline-flex items-center gap-2">+ Tambah Pengumuman</a>
</div>
<div class="glass-card overflow-hidden">
    <table class="w-full">
        <thead>
            <tr class="border-b border-gray-200 bg-gray-50">
                <th class="text-left text-gray-600 text-xs uppercase tracking-wider px-4 py-3">Judul</th>
                <th class="text-left text-gray-600 text-xs uppercase tracking-wider px-4 py-3 hidden sm:table-cell">Prioritas</th>
                <th class="text-left text-gray-600 text-xs uppercase tracking-wider px-4 py-3">Status</th>
                <th class="text-left text-gray-600 text-xs uppercase tracking-wider px-4 py-3 hidden md:table-cell">Expired</th>
                <th class="text-left text-gray-600 text-xs uppercase tracking-wider px-4 py-3">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pengumuman as $p)
            <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
                <td class="px-4 py-3">
                    <p class="text-gray-900 text-sm font-medium">{{ Str::limit($p->judul, 35) }}</p>
                    <p class="text-gray-500 text-xs mt-1">{{ $p->created_at->format('d M Y') }}</p>
                </td>
                <td class="px-4 py-3 hidden sm:table-cell">
                    <span class="text-xs px-2 py-1 rounded-full whitespace-nowrap
                        {{ $p->prioritas === 'tinggi' ? 'bg-red-100 text-red-700' :
                           ($p->prioritas === 'sedang' ? 'bg-yellow-100 text-yellow-700' :
                           'bg-green-100 text-green-700') }}">
                        {{ $p->prioritas }}
                    </span>
                </td>
                <td class="px-4 py-3">
                    <span class="text-xs px-2 py-1 rounded-full whitespace-nowrap {{ $p->is_active ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                        {{ $p->is_active ? 'Aktif' : 'Nonaktif' }}
                    </span>
                </td>
                <td class="px-4 py-3 text-gray-600 text-xs hidden md:table-cell">
                    {{ $p->expired_at ? $p->expired_at->format('d M Y') : 'Tidak ada' }}
                </td>
                <td class="px-4 py-3">
                    <div class="flex gap-1 flex-wrap">
                        <a href="{{ route('admin.pengumuman.edit', $p) }}" class="text-blue-600 text-xs border border-blue-300 px-2 py-1 rounded">Edit</a>
                        <form action="{{ route('admin.pengumuman.destroy', $p) }}" method="POST" onsubmit="return confirm('Hapus pengumuman ini?')">
                            @csrf @method('DELETE')
                            <button class="text-red-400 text-xs border border-red-400/30 px-2 py-1 rounded">Hapus</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="px-6 py-12 text-center text-gray-500">Belum ada pengumuman.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <div class="px-4 py-3">{{ $pengumuman->links() }}</div>
</div>
@endsection