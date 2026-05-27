@extends('layouts.admin')

@section('title', 'Pesan Kontak — Admin')
@section('page-title', 'Pesan Kontak')

@section('content')
    <div class="p-4 lg:p-6">
        <div class="mb-4">
            <p class="text-sm text-gray-600">Total pesan: {{ $messages->total() }}</p>
            <p class="text-sm text-gray-600">Pesan terbaca: {{ $readCount }}</p>
        </div>

        <form action="{{ route('admin.kontak.destroySelected') }}" method="POST" onsubmit="return confirm('Hapus pesan terpilih?');" class="bg-white shadow rounded-lg overflow-hidden">
            @csrf
            @method('DELETE')

            <div class="px-4 py-4 border-b border-gray-200">
                <div class="flex items-center gap-2 mb-3">
                    <button type="submit" id="bulk-delete-btn" class="inline-flex items-center justify-center rounded-xl bg-red-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-700 transition hidden">Hapus pesan terpilih</button>
                    <span class="text-sm text-gray-500">Pilih pesan dengan checkbox.</span>
                </div>
                <label class="inline-flex items-center gap-2 text-sm text-gray-600">
                    <input type="checkbox" id="select-all" class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500" onclick="toggleSelectAll(this)">
                    Pilih semua
                </label>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="px-4 py-3 w-12"><input type="checkbox" id="select-all-top" class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500" onclick="toggleSelectAll(this)"></th>
                            <th class="px-4 py-3">Nama</th>
                            <th class="px-4 py-3">Email</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Diterima</th>
                            <th class="px-4 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($messages as $msg)
                            <tr class="border-t">
                                <td class="px-4 py-3"><input type="checkbox" name="selected[]" value="{{ $msg->id }}" class="message-checkbox rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500" onchange="toggleDeleteButton()"></td>
                                <td class="px-4 py-3 font-medium text-sm">{{ $msg->nama }}</td>
                                <td class="px-4 py-3 text-sm break-all">{{ $msg->email }}</td>
                                <td class="px-4 py-3">
                                    @if($msg->read_at)
                                        <span class="inline-flex rounded-full bg-green-100 px-2 py-1 text-xs font-semibold text-green-800">Terbaca</span>
                                    @else
                                        <span class="inline-flex rounded-full bg-yellow-100 px-2 py-1 text-xs font-semibold text-yellow-800">Belum</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 text-sm whitespace-nowrap">{{ $msg->created_at->format('m-d H:i') }}</td>
                                <td class="px-4 py-3">
                                    <div class="flex gap-2 items-center flex-wrap">
                                        <a href="{{ route('admin.kontak.show', $msg->id) }}" class="text-blue-600 text-sm">Lihat</a>
                                        <form action="{{ route('admin.kontak.destroy', $msg->id) }}" method="POST" onsubmit="return confirm('Hapus pesan ini?');" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800 text-sm">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="p-6" colspan="6" class="text-center text-gray-500">Belum ada pesan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </form>

        <div class="mt-4 flex flex-col gap-3">
            {{ $messages->links() }}
            
            <form action="{{ route('admin.kontak.destroyRead') }}" method="POST" onsubmit="return confirm('Hapus semua pesan yang sudah dibaca?');" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="inline-flex items-center justify-center rounded-xl bg-red-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-700 transition">Hapus semua pesan</button>
            </form>
        </div>
    </div>

    <script>
        function toggleDeleteButton() {
            const checkboxes = document.querySelectorAll('.message-checkbox');
            const checked = Array.from(checkboxes).some(cb => cb.checked);
            document.getElementById('bulk-delete-btn').classList.toggle('hidden', !checked);
        }

        function toggleSelectAll(checkbox) {
            document.querySelectorAll('.message-checkbox').forEach(cb => cb.checked = checkbox.checked);
            document.getElementById('select-all').checked = checkbox.checked;
            document.getElementById('select-all-top').checked = checkbox.checked;
            toggleDeleteButton();
        }
    </script>
@endsection

