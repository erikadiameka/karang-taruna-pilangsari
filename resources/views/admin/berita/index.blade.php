@extends('layouts.admin')
@section('title', 'Kelola Berita')
@section('page-title', 'Kelola Berita')

@section('content')
<div class="flex justify-between items-center mb-6">
    <p class="text-white/50 text-sm">Total {{ $berita->total() }} berita</p>
    <a href="{{ route('admin.berita.create') }}" class="btn-gold">
        + Tambah Berita
    </a>
</div>

<div class="glass-card overflow-hidden">
    <table class="w-full">
        <thead>
            <tr class="border-b border-white/10">
                <th class="text-left text-white/50 text-xs uppercase tracking-wider px-6 py-4">Judul</th>
                <th class="text-left text-white/50 text-xs uppercase tracking-wider px-6 py-4">Kategori</th>
                <th class="text-left text-white/50 text-xs uppercase tracking-wider px-6 py-4">Status</th>
                <th class="text-left text-white/50 text-xs uppercase tracking-wider px-6 py-4">Tanggal</th>
                <th class="text-left text-white/50 text-xs uppercase tracking-wider px-6 py-4">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($berita as $b)
            <tr class="border-b border-white/5 hover:bg-white/5 transition-colors">
                <td class="px-6 py-4">
                    <p class="text-white text-sm font-medium">{{ Str::limit($b->judul, 50) }}</p>
                    <p class="text-white/40 text-xs mt-1">{{ $b->penulis->name ?? '-' }}</p>
                </td>
                <td class="px-6 py-4">
                    <span class="text-gold text-xs bg-gold/10 px-2 py-1 rounded-full">
                        {{ $b->kategori->nama ?? '-' }}
                    </span>
                </td>
                <td class="px-6 py-4">
                    <span class="text-xs px-2 py-1 rounded-full
                        {{ $b->status === 'published' ? 'bg-green-500/10 text-green-400' :
                           ($b->status === 'draft' ? 'bg-yellow-500/10 text-yellow-400' :
                           'bg-red-500/10 text-red-400') }}">
                        {{ $b->status }}
                    </span>
                </td>
                <td class="px-6 py-4 text-white/50 text-xs">
                    {{ $b->created_at->format('d M Y') }}
                </td>
                <td class="px-6 py-4">
                    <div class="flex items-center gap-2">
                        <a href="{{ route('admin.berita.edit', $b) }}"
                            class="text-gold hover:text-gold-light text-xs border border-gold/30 px-3 py-1.5 rounded-lg transition-all">
                            Edit
                        </a>
                        <form action="{{ route('admin.berita.destroy', $b) }}" method="POST"
                            onsubmit="return confirm('Hapus berita ini?')">
                            @csrf @method('DELETE')
                            <button class="text-red-400 hover:text-red-300 text-xs border border-red-400/30 px-3 py-1.5 rounded-lg transition-all">
                                Hapus
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="px-6 py-12 text-center text-white/40">Belum ada berita.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <div class="px-6 py-4">
        {{ $berita->links() }}
    </div>
</div>
@endsection