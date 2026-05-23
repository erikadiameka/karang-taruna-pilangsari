@extends('layouts.admin')
@section('title', 'Kelola Galeri')
@section('page-title', 'Kelola Galeri')
@section('content')
<div class="flex justify-between items-center mb-6">
    <p class="text-gray-600 text-sm">Total {{ $galeri->total() }} foto</p>
    <a href="{{ route('admin.galeri.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-xl transition-all duration-300 hover:scale-105 inline-flex items-center gap-2">+ Upload Foto</a>
</div>
<div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
    @forelse($galeri as $g)
    <div class="glass-card overflow-hidden group">
        <div class="aspect-square relative">
            <img src="{{ Storage::url($g->file_path) }}" alt="{{ $g->judul }}"
                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
            <div class="absolute inset-0 bg-navy-dark/70 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                <form action="{{ route('admin.galeri.destroy', $g) }}" method="POST"
                    onsubmit="return confirm('Hapus foto ini?')">
                    @csrf @method('DELETE')
                    <button class="bg-red-500 text-white text-xs px-4 py-2 rounded-lg">Hapus</button>
                </form>
            </div>
        </div>
        <div class="p-3">
            <p class="text-gray-900 text-sm font-medium truncate">{{ $g->judul }}</p>
            <p class="text-gray-500 text-xs mt-1">{{ $g->created_at->format('d M Y') }}</p>
        </div>
    </div>
    @empty
    <div class="col-span-4 text-center py-16 text-gray-500">Belum ada foto.</div>
    @endforelse
</div>
<div class="mt-6">{{ $galeri->links() }}</div>
@endsection