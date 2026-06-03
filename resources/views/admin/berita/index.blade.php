@extends('layouts.admin')
@section('title', 'Kelola Berita')
@section('page-title', 'Kelola Berita')

@section('content')
<div class="flex justify-between items-center mb-6">
    <p class="text-gray-600 text-sm">Total {{ $berita->total() }} berita</p>
    <div class="flex gap-2">
        <a href="{{ route('admin.berita.import-form') }}" class="bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-3 rounded-xl transition-all duration-300 hover:scale-105 inline-flex items-center gap-2">
            📥 Import CSV
        </a>
        <a href="{{ route('admin.berita.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-xl transition-all duration-300 hover:scale-105 inline-flex items-center gap-2">
            + Tambah Berita
        </a>
    </div>
</div>

<div class="glass-card overflow-hidden">
    <table class="w-full">
        <thead>
            <tr class="border-b border-gray-200 bg-gray-50">
                <th class="text-left text-gray-600 text-xs uppercase tracking-wider px-4 py-3">Judul</th>
                <th class="text-left text-gray-600 text-xs uppercase tracking-wider px-4 py-3 hidden sm:table-cell">Kategori</th>
                <th class="text-left text-gray-600 text-xs uppercase tracking-wider px-4 py-3">Status</th>
                <th class="text-left text-gray-600 text-xs uppercase tracking-wider px-4 py-3 hidden md:table-cell">Tanggal</th>
                <th class="text-left text-gray-600 text-xs uppercase tracking-wider px-4 py-3">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($berita as $b)
            <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
                <td class="px-4 py-3">
                    <p class="text-gray-900 text-sm font-medium">{{ Str::limit($b->judul, 35) }}</p>
                    <p class="text-gray-500 text-xs mt-1">{{ $b->penulis->name ?? '-' }}</p>
                </td>
                <td class="px-4 py-3 hidden sm:table-cell">
                    <span class="text-gray-700 text-xs bg-gray-200 px-2 py-1 rounded-full whitespace-nowrap">
                        {{ Str::limit($b->kategori->nama ?? '-', 15) }}
                    </span>
                </td>
                <td class="px-4 py-3">
                    <span class="text-xs px-2 py-1 rounded-full whitespace-nowrap
                        {{ $b->status === 'published' ? 'bg-green-100 text-green-700' :
                           ($b->status === 'draft' ? 'bg-yellow-100 text-yellow-700' :
                           'bg-red-100 text-red-700') }}">
                        {{ $b->status }}
                    </span>
                </td>
                <td class="px-4 py-3 text-gray-600 text-xs hidden md:table-cell">
                    {{ $b->created_at->format('d M Y') }}
                </td>
                <td class="px-4 py-3">
                    <div class="flex gap-1 flex-wrap">
                        <a href="{{ route('admin.berita.edit', $b) }}"
                            class="text-blue-600 hover:text-blue-700 text-xs border border-blue-300 px-2 py-1 rounded transition-all">
                            Edit
                        </a>
                        <form action="{{ route('admin.berita.destroy', $b) }}" method="POST"
                            onsubmit="return confirm('Hapus berita ini?')">
                            @csrf @method('DELETE')
                            <button class="text-red-400 hover:text-red-300 text-xs border border-red-400/30 px-2 py-1 rounded transition-all">
                                Hapus
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="px-6 py-12 text-center text-gray-500">Belum ada berita.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <div class="px-4 py-3">
        {{ $berita->links() }}
    </div>
</div>
@endsection