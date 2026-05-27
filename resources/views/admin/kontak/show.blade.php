@extends('layouts.admin')

@section('title', 'Detail Pesan Kontak — Admin')
@section('page-title', 'Detail Pesan Kontak')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Detail Pesan</h1>

        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between mb-4">
            <div>
                <h1 class="text-2xl font-bold">Detail Pesan</h1>
                <p class="text-sm text-gray-500">Pesan dari {{ $message->nama }}</p>
            </div>
            <div class="flex gap-2">
                <a href="{{ route('admin.kontak.index') }}" class="inline-flex items-center justify-center rounded-xl border border-gray-300 bg-white px-4 py-2 text-sm font-semibold text-gray-700 shadow-sm hover:bg-gray-50 transition">Kembali</a>
                <form action="{{ route('admin.kontak.destroy', $message->id) }}" method="POST" onsubmit="return confirm('Hapus pesan ini?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="inline-flex items-center justify-center rounded-xl bg-red-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-700 transition">Hapus</button>
                </form>
            </div>
        </div>

        <div class="bg-white shadow rounded-lg p-6">
            <p class="font-bold">Nama</p>
            <p class="mb-4">{{ $message->nama }}</p>

            <p class="font-bold">Email</p>
            <p class="mb-4">{{ $message->email }}</p>

            <p class="font-bold">Subjek</p>
            <p class="mb-4">{{ $message->subjek }}</p>

            <p class="font-bold">Pesan</p>
            <p class="mb-4">{{ $message->pesan }}</p>

            <p class="text-sm text-gray-500">Diterima: {{ $message->created_at->format('Y-m-d H:i') }}</p>
        </div>
    </div>
@endsection
