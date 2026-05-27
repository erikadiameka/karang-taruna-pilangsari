@extends('layouts.admin')

@section('title', 'Pesan Kontak — Admin')
@section('page-title', 'Pesan Kontak')

@section('content')
    <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center gap-1.5 text-xs font-semibold text-gray-500 hover:text-gray-900 transition mb-3">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
        Kembali ke Dashboard
    </a>

    <div class="grid grid-cols-2 gap-4 mb-6">
        <!-- Stat Card 1: Total Pesan -->
        <div class="glass-card p-4 bg-gradient-to-br from-blue-50 to-indigo-100/50 border border-blue-100/50 flex items-center justify-between shadow-sm">
            <div>
                <p class="text-xs font-bold text-blue-600 uppercase tracking-wider">Total Pesan</p>
                <p class="text-2xl font-black text-blue-900 mt-1 leading-none">{{ $messages->total() }}</p>
            </div>
            <div class="w-9 h-9 rounded-xl bg-blue-100 flex items-center justify-center text-lg flex-shrink-0">
                📩
            </div>
        </div>

        <!-- Stat Card 2: Pesan Terbaca -->
        <div class="glass-card p-4 bg-gradient-to-br from-emerald-50 to-teal-100/50 border border-emerald-100/50 flex items-center justify-between shadow-sm">
            <div>
                <p class="text-xs font-bold text-emerald-600 uppercase tracking-wider">Pesan Terbaca</p>
                <p class="text-2xl font-black text-emerald-900 mt-1 leading-none">{{ $readCount }}</p>
            </div>
            <div class="w-9 h-9 rounded-xl bg-emerald-100 flex items-center justify-center text-lg flex-shrink-0">
                📖
            </div>
        </div>
    </div>

    <form action="{{ route('admin.kontak.destroySelected') }}" method="POST" onsubmit="return confirm('Hapus pesan terpilih?');" class="glass-card overflow-hidden">
        @csrf
        @method('DELETE')

        <div class="px-4 py-3.5 border-b border-gray-200 bg-white/50 flex items-center justify-between flex-wrap gap-2">
            <span class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Daftar Pesan Masuk</span>
            <label class="inline-flex items-center gap-2 text-xs font-medium text-gray-600 cursor-pointer">
                <input type="checkbox" id="select-all" class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500" onclick="toggleSelectAll(this)">
                Pilih Semua
            </label>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="border-b border-gray-200 bg-gray-50">
                        <th class="px-2 py-3 w-10"><input type="checkbox" id="select-all-top" class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500" onclick="toggleSelectAll(this)"></th>
                        <th class="px-2 sm:px-4 py-3 text-xs uppercase tracking-wider text-gray-600">Nama / Pengirim</th>
                        <th class="px-4 py-3 text-xs uppercase tracking-wider text-gray-600 hidden md:table-cell">Email</th>
                        <th class="px-2 sm:px-4 py-3 text-xs uppercase tracking-wider text-gray-600">Status</th>
                        <th class="px-4 py-3 text-xs uppercase tracking-wider text-gray-600 hidden sm:table-cell">Diterima</th>
                        <th class="px-2 sm:px-4 py-3 text-xs uppercase tracking-wider text-gray-600">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($messages as $msg)
                        <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
                            <td class="px-2 py-3"><input type="checkbox" name="selected[]" value="{{ $msg->id }}" class="message-checkbox rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500" onchange="toggleDeleteButton()"></td>
                            <td class="px-2 sm:px-4 py-3">
                                <div class="font-medium text-sm text-gray-900 leading-tight">{{ $msg->nama }}</div>
                                <div class="text-xs text-gray-500 md:hidden break-all mt-0.5">{{ $msg->email }}</div>
                                <div class="text-[10px] text-gray-400 sm:hidden mt-1">{{ $msg->created_at->format('d M H:i') }}</div>
                            </td>
                            <td class="px-4 py-3 text-sm text-gray-600 break-all hidden md:table-cell">{{ $msg->email }}</td>
                            <td class="px-2 sm:px-4 py-3">
                                @if($msg->read_at)
                                    <span class="inline-flex rounded-full bg-green-100 px-2 py-0.5 text-xs font-semibold text-green-800">Terbaca</span>
                                @else
                                    <span class="inline-flex rounded-full bg-yellow-100 px-2 py-0.5 text-xs font-semibold text-yellow-800">Belum</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-sm text-gray-600 whitespace-nowrap hidden sm:table-cell">{{ $msg->created_at->format('d M Y H:i') }}</td>
                            <td class="px-2 sm:px-4 py-3">
                                <div class="flex gap-1 items-center flex-wrap">
                                    <a href="{{ route('admin.kontak.show', $msg->id) }}" class="text-blue-600 text-xs border border-blue-300 hover:bg-blue-50 px-2 py-1 rounded transition">Lihat</a>
                                    <form action="{{ route('admin.kontak.destroy', $msg->id) }}" method="POST" onsubmit="return confirm('Hapus pesan ini?');" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-400 text-xs border border-red-400/30 hover:bg-red-50 px-2 py-1 rounded transition">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="p-6 text-center text-gray-500" colspan="6">Belum ada pesan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Floating Action Bar for Bulk Delete -->
        <div id="bulk-delete-bar" class="fixed bottom-6 left-1/2 -translate-x-1/2 z-50 w-[90%] max-w-md bg-gray-900/95 backdrop-blur-md border border-gray-800 rounded-2xl shadow-2xl px-4 py-3 flex items-center justify-between transition-all duration-300 transform translate-y-24 opacity-0 pointer-events-none">
            <div class="flex items-center gap-2">
                <span class="text-sm font-semibold text-white" id="selected-count">0 pesan terpilih</span>
            </div>
            <div class="flex gap-2 items-center">
                <button type="button" onclick="cancelSelection()" class="text-xs font-medium text-gray-400 hover:text-white px-3 py-2 rounded-xl transition">Batal</button>
                <button type="submit" class="inline-flex items-center justify-center rounded-xl bg-red-600 hover:bg-red-700 active:scale-95 px-4 py-2 text-xs font-semibold text-white shadow-sm transition-all duration-200">
                    Hapus Terpilih
                </button>
            </div>
        </div>
    </form>

    <div class="mt-4">
        {{ $messages->links() }}
    </div>

    <script>
        function toggleDeleteButton() {
            updateBulkDeleteBar();
        }

        function toggleSelectAll(checkbox) {
            document.querySelectorAll('.message-checkbox').forEach(cb => cb.checked = checkbox.checked);
            const selectAll = document.getElementById('select-all');
            const selectAllTop = document.getElementById('select-all-top');
            if (selectAll) selectAll.checked = checkbox.checked;
            if (selectAllTop) selectAllTop.checked = checkbox.checked;
            updateBulkDeleteBar();
        }

        function cancelSelection() {
            document.querySelectorAll('.message-checkbox').forEach(cb => cb.checked = false);
            const selectAll = document.getElementById('select-all');
            const selectAllTop = document.getElementById('select-all-top');
            if (selectAll) selectAll.checked = false;
            if (selectAllTop) selectAllTop.checked = false;
            updateBulkDeleteBar();
        }

        function updateBulkDeleteBar() {
            const checkboxes = document.querySelectorAll('.message-checkbox');
            const checkedBoxes = Array.from(checkboxes).filter(cb => cb.checked);
            const count = checkedBoxes.length;
            
            const bar = document.getElementById('bulk-delete-bar');
            const countSpan = document.getElementById('selected-count');
            
            if (count > 0) {
                countSpan.textContent = `${count} pesan terpilih`;
                bar.classList.remove('translate-y-24', 'opacity-0', 'pointer-events-none');
                bar.classList.add('translate-y-0', 'opacity-100', 'pointer-events-auto');
            } else {
                bar.classList.remove('translate-y-0', 'opacity-100', 'pointer-events-auto');
                bar.classList.add('translate-y-24', 'opacity-0', 'pointer-events-none');
            }
        }
    </script>
@endsection

