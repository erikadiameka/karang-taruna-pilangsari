@extends('layouts.admin')

@section('title', 'Detail Pesan Kontak — Admin')
@section('page-title', 'Detail Pesan Kontak')

@section('content')
    <div class="max-w-4xl">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Detail Pesan</h1>
                <p class="text-sm text-gray-500">Pesan dari {{ $message->nama }}</p>
            </div>
            <div class="flex gap-2">
                <a href="{{ route('admin.kontak.index') }}" class="inline-flex items-center justify-center rounded-xl border border-gray-300 bg-white px-4 py-2 text-sm font-semibold text-gray-700 shadow-sm hover:bg-gray-50 transition">Kembali</a>
                <form action="{{ route('admin.kontak.destroy', $message->id) }}" method="POST" onsubmit="return confirm('Hapus pesan ini?');" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="inline-flex items-center justify-center rounded-xl bg-red-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-700 transition">Hapus</button>
                </form>
            </div>
        </div>

        <div class="glass-card p-6 space-y-4">
            <div>
                <p class="font-semibold text-xs text-gray-500 uppercase tracking-wider">Nama</p>
                <p class="text-gray-950 font-medium mt-1">{{ $message->nama }}</p>
            </div>

            <div>
                <p class="font-semibold text-xs text-gray-500 uppercase tracking-wider">Email</p>
                <p class="text-gray-950 mt-1 break-all">{{ $message->email }}</p>
            </div>

            <div>
                <p class="font-semibold text-xs text-gray-500 uppercase tracking-wider">Subjek</p>
                <p class="text-gray-950 mt-1">{{ $message->subjek }}</p>
            </div>

            <div>
                <p class="font-semibold text-xs text-gray-500 uppercase tracking-wider">Pesan</p>
                <p class="text-gray-950 mt-1 whitespace-pre-wrap leading-relaxed">{{ $message->pesan }}</p>
            </div>

            <div class="pt-4 border-t border-gray-100 flex justify-between items-center text-xs text-gray-400">
                <span>Diterima: {{ $message->created_at->format('d M Y H:i') }}</span>
                @if($message->read_at)
                    <span class="inline-flex rounded-full bg-green-100 px-2.5 py-0.5 text-xs font-semibold text-green-800">Terbaca</span>
                @else
                    <span class="inline-flex rounded-full bg-yellow-100 px-2.5 py-0.5 text-xs font-semibold text-yellow-800">Belum Dibaca</span>
                @endif
            </div>
        </div>
    </div>
@endsection
