@extends('layouts.admin')
@section('title', 'Kelola Kegiatan')
@section('page-title', 'Kelola Kegiatan')
@section('content')
<div class="flex justify-between items-center mb-6">
    <p class="text-gray-600 text-sm">Total {{ $kegiatan->total() }} kegiatan</p>
    <a href="{{ route('admin.kegiatan.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-xl transition-all duration-300 hover:scale-105 inline-flex items-center gap-2">+ Tambah Kegiatan</a>
</div>
<div class="glass-card overflow-hidden">
    <table class="w-full">
        <thead>
            <tr class="border-b border-gray-200">
                <th class="text-left text-gray-600 text-xs uppercase tracking-wider px-6 py-4">Nama</th>
                <th class="text-left text-gray-600 text-xs uppercase tracking-wider px-6 py-4">Tanggal</th>
                <th class="text-left text-gray-600 text-xs uppercase tracking-wider px-6 py-4">Lokasi</th>
                <th class="text-left text-gray-600 text-xs uppercase tracking-wider px-6 py-4">Status</th>
                <th class="text-left text-gray-600 text-xs uppercase tracking-wider px-6 py-4">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($kegiatan as $k)
            <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
                <td class="px-6 py-4 text-gray-900 text-sm">{{ Str::limit($k->nama, 40) }}</td>
                <td class="px-6 py-4 text-gray-600 text-xs">{{ $k->tanggal_mulai->format('d M Y') }}</td>
                <td class="px-6 py-4 text-gray-600 text-xs">{{ $k->lokasi }}</td>
                <td class="px-6 py-4">
                    <span class="text-xs px-2 py-1 rounded-full
                        {{ $k->status === 'akan_datang' ? 'bg-yellow-100 text-yellow-700' :
                           ($k->status === 'berlangsung' ? 'bg-blue-100 text-blue-700' :
                           'bg-green-100 text-green-700') }}">
                        {{ str_replace('_', ' ', $k->status) }}
                    </span>
                </td>
                <td class="px-6 py-4">
                    <div class="flex gap-2">
                        <a href="{{ route('admin.kegiatan.edit', $k) }}"
                            class="text-blue-600 text-xs border border-blue-300 px-3 py-1.5 rounded-lg">Edit</a>
                        <form action="{{ route('admin.kegiatan.destroy', $k) }}" method="POST"
                            onsubmit="return confirm('Hapus kegiatan ini?')">
                            @csrf @method('DELETE')
                            <button class="text-red-400 text-xs border border-red-400/30 px-3 py-1.5 rounded-lg">Hapus</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="px-6 py-12 text-center text-gray-500">Belum ada kegiatan.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <div class="px-6 py-4">{{ $kegiatan->links() }}</div>
</div>
@endsection