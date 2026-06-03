@extends('layouts.admin')
@section('title', 'Kelola Kegiatan')
@section('page-title', 'Kelola Kegiatan')
@section('content')
<div class="flex justify-between items-center mb-6">
    <p class="text-gray-600 text-sm">Total {{ $kegiatan->total() }} kegiatan</p>
    <div class="flex gap-2">
        <a href="{{ route('admin.kegiatan.import-form') }}" class="bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-3 rounded-xl transition-all duration-300 hover:scale-105 inline-flex items-center gap-2">📥 Import CSV</a>
        <a href="{{ route('admin.kegiatan.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-xl transition-all duration-300 hover:scale-105 inline-flex items-center gap-2">+ Tambah Kegiatan</a>
    </div>
</div>
<div class="glass-card overflow-hidden">
    <table class="w-full">
        <thead>
            <tr class="border-b border-gray-200 bg-gray-50">
                <th class="text-left text-gray-600 text-xs uppercase tracking-wider px-4 py-3">Nama</th>
                <th class="text-left text-gray-600 text-xs uppercase tracking-wider px-4 py-3 hidden sm:table-cell">Tanggal</th>
                <th class="text-left text-gray-600 text-xs uppercase tracking-wider px-4 py-3 hidden md:table-cell">Lokasi</th>
                <th class="text-left text-gray-600 text-xs uppercase tracking-wider px-4 py-3">Status</th>
                <th class="text-left text-gray-600 text-xs uppercase tracking-wider px-4 py-3">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($kegiatan as $k)
            <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
                <td class="px-4 py-3 text-gray-900 text-sm"><span class="block">{{ Str::limit($k->nama, 30) }}</span><span class="text-gray-500 text-xs sm:hidden">{{ $k->tanggal_mulai->format('d M Y') }}</span></td>
                <td class="px-4 py-3 text-gray-600 text-xs hidden sm:table-cell">{{ $k->tanggal_mulai->format('d M Y') }}</td>
                <td class="px-4 py-3 text-gray-600 text-xs hidden md:table-cell">{{ Str::limit($k->lokasi, 20) }}</td>
                <td class="px-4 py-3">
                    <span class="text-xs px-2 py-1 rounded-full whitespace-nowrap
                        {{ $k->status === 'akan_datang' ? 'bg-yellow-100 text-yellow-700' :
                           ($k->status === 'berlangsung' ? 'bg-blue-100 text-blue-700' :
                           'bg-green-100 text-green-700') }}">
                        {{ str_replace('_', ' ', $k->status) }}
                    </span>
                </td>
                <td class="px-4 py-3">
                    <div class="flex gap-1 flex-wrap">
                        <a href="{{ route('admin.kegiatan.edit', $k) }}"
                            class="text-blue-600 text-xs border border-blue-300 px-2 py-1 rounded">Edit</a>
                        <form action="{{ route('admin.kegiatan.destroy', $k) }}" method="POST"
                            onsubmit="return confirm('Hapus kegiatan ini?')">
                            @csrf @method('DELETE')
                            <button class="text-red-400 text-xs border border-red-400/30 px-2 py-1 rounded">Hapus</button>
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
    <div class="px-4 py-3">{{ $kegiatan->links() }}</div>
</div>
@endsection