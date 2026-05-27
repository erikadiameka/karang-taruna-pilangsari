@extends('layouts.admin')

@section('title', 'Pesan Kontak — Admin')
@section('page-title', 'Pesan Kontak')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Pesan Kontak</h1>

        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between mb-4">
            <div>
                <p class="text-sm text-gray-600">Total pesan: {{ $messages->total() }}</p>
                <p class="text-sm text-gray-600">Pesan terbaca: {{ $readCount }}</p>
            </div>
            <div class="flex flex-col gap-2 sm:flex-row sm:items-center">
                <form action="{{ route('admin.kontak.destroyRead') }}" method="POST" onsubmit="return confirm('Hapus semua pesan terbaca?');" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="inline-flex items-center justify-center rounded-xl bg-red-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-700 transition">Hapus semua pesan terbaca</button>
                </form>
            </div>
        </div>

        <form action="{{ route('admin.kontak.destroySelected') }}" method="POST" onsubmit="return confirm('Hapus pesan terpilih?');" class="bg-white shadow rounded-lg overflow-hidden">
            @csrf
            @method('DELETE')

            <div class="px-4 py-4 border-b border-gray-200 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                <div class="flex items-center gap-2">
                    <button type="submit" class="inline-flex items-center justify-center rounded-xl bg-red-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-700 transition">Hapus pesan terpilih</button>
                    <span class="text-sm text-gray-500">Pilih pesan lalu klik tombol di atas.</span>
                </div>
                <label class="inline-flex items-center gap-2 text-sm text-gray-600">
                    <input type="checkbox" id="select-all" class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500" onclick="document.querySelectorAll('.message-checkbox').forEach(cb => cb.checked = this.checked)">
                    Pilih semua
                </label>
            </div>

            <table class="w-full text-left">
                <thead>
                    <tr class="bg-gray-50">
                        <th class="px-4 py-3"><input type="checkbox" id="select-all-top" class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500" onclick="document.querySelectorAll('.message-checkbox').forEach(cb => cb.checked = this.checked)"></th>
                        <th class="px-4 py-3">Nama</th>
                        <th class="px-4 py-3">Email</th>
                        <th class="px-4 py-3">Subjek</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Diterima</th>
                        <th class="px-4 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($messages as $msg)
                        <tr class="border-t">
                            <td class="px-4 py-3"><input type="checkbox" name="selected[]" value="{{ $msg->id }}" class="message-checkbox rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500"></td>
                            <td class="px-4 py-3">{{ $msg->nama }}</td>
                            <td class="px-4 py-3">{{ $msg->email }}</td>
                            <td class="px-4 py-3">{{ $msg->subjek }}</td>
                            <td class="px-4 py-3">
                                @if($msg->read_at)
                                    <span class="inline-flex rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-800">Terbaca</span>
                                @else
                                    <span class="inline-flex rounded-full bg-yellow-100 px-3 py-1 text-xs font-semibold text-yellow-800">Belum dibaca</span>
                                @endif
                            </td>
                            <td class="px-4 py-3">{{ $msg->created_at->format('Y-m-d H:i') }}</td>
                            <td class="px-4 py-3 flex gap-2 items-center">
                                <a href="{{ route('admin.kontak.show', $msg->id) }}" class="text-blue-600">Lihat</a>
                                <form action="{{ route('admin.kontak.destroy', $msg->id) }}" method="POST" onsubmit="return confirm('Hapus pesan ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="p-6" colspan="7">Belum ada pesan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </form>
        <div class="mt-4">
            {{ $messages->links() }}
        </div>
    </div>
@endsection
