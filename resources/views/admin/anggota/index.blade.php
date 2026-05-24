@extends('layouts.admin')
@section('title', 'Kelola Anggota')
@section('page-title', 'Kelola Anggota')
@section('content')
<div class="flex justify-between items-center mb-6">
    <p class="text-gray-600 text-sm">Total {{ $anggota->total() }} anggota</p>
    <a href="{{ route('admin.anggota.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-xl transition-all duration-300 hover:scale-105 inline-flex items-center gap-2">+ Tambah Anggota</a>
</div>
<div class="glass-card overflow-hidden">
    <table class="w-full">
        <thead>
            <tr class="border-b border-gray-200 bg-gray-50">
                <th class="text-left text-gray-600 text-xs uppercase tracking-wider px-4 py-3">Nama</th>
                <th class="text-left text-gray-600 text-xs uppercase tracking-wider px-4 py-3 hidden md:table-cell">NIK</th>
                <th class="text-left text-gray-600 text-xs uppercase tracking-wider px-4 py-3 hidden sm:table-cell">Divisi</th>
                <th class="text-left text-gray-600 text-xs uppercase tracking-wider px-4 py-3">Status</th>
                <th class="text-left text-gray-600 text-xs uppercase tracking-wider px-4 py-3">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($anggota as $a)
            <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
                <td class="px-4 py-3">
                    <div class="flex items-center gap-2">
                        @if($a->foto)
                        <img src="{{ Storage::url($a->foto) }}" class="w-7 h-7 rounded-full object-cover flex-shrink-0">
                        @else
                        <div class="w-7 h-7 rounded-full bg-gold/20 flex items-center justify-center text-gold text-xs font-bold flex-shrink-0">
                            {{ strtoupper(substr($a->nama_lengkap, 0, 1)) }}
                        </div>
                        @endif
                        <div class="min-w-0">
                            <p class="text-gray-900 text-sm font-medium truncate">{{ Str::limit($a->nama_lengkap, 20) }}</p>
                            <p class="text-gray-500 text-xs truncate">{{ Str::limit($a->jabatan ?? '-', 15) }}</p>
                        </div>
                    </div>
                </td>
                <td class="px-4 py-3 text-gray-600 text-xs hidden md:table-cell">{{ Str::limit($a->nik, 10) }}</td>
                <td class="px-4 py-3 text-gray-600 text-xs hidden sm:table-cell">{{ Str::limit($a->divisi ?? '-', 12) }}</td>
                <td class="px-4 py-3">
                    <span class="text-xs px-2 py-1 rounded-full whitespace-nowrap
                        {{ $a->status === 'aktif' ? 'bg-green-100 text-green-700' :
                           ($a->status === 'alumni' ? 'bg-blue-100 text-blue-700' :
                           'bg-red-100 text-red-700') }}">
                        {{ $a->status }}
                    </span>
                </td>
                <td class="px-4 py-3">
                    <div class="flex gap-1 flex-wrap">
                        <a href="{{ route('admin.anggota.edit', $a) }}" class="text-blue-600 text-xs border border-blue-300 px-2 py-1 rounded">Edit</a>
                        <form action="{{ route('admin.anggota.destroy', $a) }}" method="POST" onsubmit="return confirm('Hapus anggota ini?')">
                            @csrf @method('DELETE')
                            <button class="text-red-400 text-xs border border-red-400/30 px-2 py-1 rounded">Hapus</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="px-6 py-12 text-center text-gray-500">Belum ada anggota.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <div class="px-4 py-3">{{ $anggota->links() }}</div>
</div>
@endsection