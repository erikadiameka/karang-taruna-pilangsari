@extends('layouts.admin')
@section('title', 'Kelola Anggota')
@section('page-title', 'Kelola Anggota')
@section('content')
<div class="mb-6">
    {{-- Header Stats --}}
    <div class="bg-gradient-to-br from-blue-50 to-blue-100 border border-blue-200 rounded-xl p-6 shadow-sm mb-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm font-medium mb-1">Total Anggota</p>
                <p class="text-4xl font-bold text-blue-600">{{ $anggota->total() }}</p>
            </div>
            <div class="bg-blue-500 text-white rounded-full p-4">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path d="M12 4.354a4 4 0 110 5.292M15 12H9m6 0a6 6 0 11-12 0 6 6 0 0112 0z" />
                </svg>
            </div>
        </div>
    </div>

    {{-- Filter Section --}}
    <div class="bg-gradient-to-r from-white to-gray-50 rounded-xl border border-gray-200 p-6 mb-6 shadow-sm">
        <div class="mb-4 flex items-center gap-2">
            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                <path d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
            </svg>
            <h3 class="text-lg font-bold text-gray-800">Filter & Cari Anggota</h3>
        </div>

        <form method="GET" action="{{ route('admin.anggota.index') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4">
            {{-- Search by Name --}}
            <div>
                <label class="block text-xs font-semibold text-gray-700 mb-2 uppercase tracking-wide">Cari Nama</label>
                <div class="relative">
                    <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <input type="text" name="search" value="{{ request('search') }}" 
                        placeholder="Nama anggota..." 
                        class="w-full pl-10 pr-3 py-2.5 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                </div>
            </div>

            {{-- Filter by Divisi/Bidang --}}
            <div>
                <label class="block text-xs font-semibold text-gray-700 mb-2 uppercase tracking-wide">Bidang</label>
                <div class="relative">
                    <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                    </svg>
                    <select name="divisi" class="w-full pl-10 pr-3 py-2.5 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all appearance-none bg-white cursor-pointer">
                        <option value="">-- Semua Bidang --</option>
                        @foreach($divisiList as $d)
                            <option value="{{ $d }}" {{ request('divisi') === $d ? 'selected' : '' }}>{{ $d }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            {{-- Filter by Status --}}
            <div>
                <label class="block text-xs font-semibold text-gray-700 mb-2 uppercase tracking-wide">Status</label>
                <div class="relative">
                    <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <select name="status" class="w-full pl-10 pr-3 py-2.5 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all appearance-none bg-white cursor-pointer">
                        <option value="">-- Semua Status --</option>
                        <option value="aktif" {{ request('status') === 'aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="tidak_aktif" {{ request('status') === 'tidak_aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                        <option value="alumni" {{ request('status') === 'alumni' ? 'selected' : '' }}>Alumni</option>
                    </select>
                </div>
            </div>

            {{-- Action Buttons --}}
            <div class="flex gap-2 items-end">
                <button type="submit" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2.5 rounded-lg transition-all text-sm inline-flex items-center justify-center gap-2 shadow-sm hover:shadow-md">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    Cari
                </button>
                <a href="{{ route('admin.anggota.index') }}" class="flex-1 bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold px-4 py-2.5 rounded-lg transition-all text-sm inline-flex items-center justify-center gap-2 shadow-sm hover:shadow-md">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                    Reset
                </a>
            </div>
        </form>
    </div>
</div>
<div class="glass-card overflow-hidden">
    <table class="w-full">
        <thead>
            <tr class="border-b border-gray-200 bg-gray-50">
                <th class="text-left text-gray-600 text-xs uppercase tracking-wider px-4 py-3">Nama</th>
                <th class="text-left text-gray-600 text-xs uppercase tracking-wider px-4 py-3 hidden md:table-cell">NIK</th>
                <th class="text-left text-gray-600 text-xs uppercase tracking-wider px-4 py-3 hidden sm:table-cell">Bidang</th>
                <th class="text-left text-gray-600 text-xs uppercase tracking-wider px-4 py-3 hidden lg:table-cell">Posisi</th>
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
                <td class="px-4 py-3 text-gray-600 text-xs hidden lg:table-cell">{{ Str::limit($a->posisi_inti ?? '-', 12) }}</td>
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
                        <a href="{{ route('admin.anggota.edit', $a->id) }}" class="text-gold text-xs border border-gold/30 px-2 py-1 rounded">Edit</a>
                        <form action="{{ route('admin.anggota.destroy', $a->id) }}" method="POST" onsubmit="return confirm('Hapus anggota ini?')">
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