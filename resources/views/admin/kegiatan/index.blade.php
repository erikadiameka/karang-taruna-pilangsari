@extends('layouts.admin')
@section('title', 'Kelola Kegiatan')
@section('page-title', 'Kelola Kegiatan')
@section('content')
<div class="flex justify-between items-center mb-6">
    <p class="text-white/50 text-sm">Total {{ $kegiatan->total() }} kegiatan</p>
    <a href="{{ route('admin.kegiatan.create') }}" class="btn-gold">+ Tambah Kegiatan</a>
</div>
<div class="glass-card overflow-hidden">
    <table class="w-full">
        <thead>
            <tr class="border-b border-white/10">
                <th class="text-left text-white/50 text-xs uppercase tracking-wider px-6 py-4">Nama</th>
                <th class="text-left text-white/50 text-xs uppercase tracking-wider px-6 py-4">Tanggal</th>
                <th class="text-left text-white/50 text-xs uppercase tracking-wider px-6 py-4">Lokasi</th>
                <th class="text-left text-white/50 text-xs uppercase tracking-wider px-6 py-4">Status</th>
                <th class="text-left text-white/50 text-xs uppercase tracking-wider px-6 py-4">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($kegiatan as $k)
            <tr class="border-b border-white/5 hover:bg-white/5 transition-colors">
                <td class="px-6 py-4 text-white text-sm">{{ Str::limit($k->nama, 40) }}</td>
                <td class="px-6 py-4 text-white/50 text-xs">{{ $k->tanggal_mulai->format('d M Y') }}</td>
                <td class="px-6 py-4 text-white/50 text-xs">{{ $k->lokasi }}</td>
                <td class="px-6 py-4">
                    <span class="text-xs px-2 py-1 rounded-full
                        {{ $k->status === 'akan_datang' ? 'bg-yellow-500/10 text-yellow-400' :
                           ($k->status === 'berlangsung' ? 'bg-blue-500/10 text-blue-400' :
                           'bg-green-500/10 text-green-400') }}">
                        {{ str_replace('_', ' ', $k->status) }}
                    </span>
                </td>
                <td class="px-6 py-4">
                    <div class="flex gap-2">
                        <a href="{{ route('admin.kegiatan.edit', $k) }}"
                            class="text-gold text-xs border border-gold/30 px-3 py-1.5 rounded-lg">Edit</a>
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
                <td colspan="5" class="px-6 py-12 text-center text-white/40">Belum ada kegiatan.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <div class="px-6 py-4">{{ $kegiatan->links() }}</div>
</div>
@endsection