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
            <tr class="border-b border-gray-200">
                <th class="text-left text-gray-600 text-xs uppercase tracking-wider px-6 py-4">Nama</th>
                <th class="text-left text-gray-600 text-xs uppercase tracking-wider px-6 py-4">NIK</th>
                <th class="text-left text-gray-600 text-xs uppercase tracking-wider px-6 py-4">Divisi</th>
                <th class="text-left text-gray-600 text-xs uppercase tracking-wider px-6 py-4">Status</th>
                <th class="text-left text-gray-600 text-xs uppercase tracking-wider px-6 py-4">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($anggota as $a)
            <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
                <td class="px-6 py-4">
                    <div class="flex items-center gap-3">
                        @if($a->foto)
                        <img src="{{ Storage::url($a->foto) }}" class="w-8 h-8 rounded-full object-cover">
                        @else
                        <div class="w-8 h-8 rounded-full bg-gold/20 flex items-center justify-center text-gold text-xs font-bold">
                            {{ strtoupper(substr($a->nama_lengkap, 0, 1)) }}
                        </div>
                        @endif
                        <div>
                            <p class="text-gray-900 text-sm font-medium">{{ $a->nama_lengkap }}</p>
                            <p class="text-gray-500 text-xs">{{ $a->jabatan ?? '-' }}</p>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4 text-gray-600 text-xs">{{ $a->nik }}</td>
                <td class="px-6 py-4 text-gray-600 text-xs">{{ $a->divisi ?? '-' }}</td>
                <td class="px-6 py-4">
                    <span class="text-xs px-2 py-1 rounded-full
                        {{ $a->status === 'aktif' ? 'bg-green-100 text-green-700' :
                           ($a->status === 'alumni' ? 'bg-blue-100 text-blue-700' :
                           'bg-red-100 text-red-700') }}">
                        {{ $a->status }}
                    </span>
                </td>
                <td class="px-6 py-4">
                    <div class="flex gap-2">
                        <a href="{{ route('admin.anggota.edit', $a) }}" class="text-blue-600 text-xs border border-blue-300 px-3 py-1.5 rounded-lg">Edit</a>
                        <form action="{{ route('admin.anggota.destroy', $a) }}" method="POST" onsubmit="return confirm('Hapus anggota ini?')">
                            @csrf @method('DELETE')
                            <button class="text-red-400 text-xs border border-red-400/30 px-3 py-1.5 rounded-lg">Hapus</button>
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
    <div class="px-6 py-4">{{ $anggota->links() }}</div>
</div>
@endsection