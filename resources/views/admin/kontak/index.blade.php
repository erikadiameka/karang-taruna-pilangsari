@extends('layouts.app')

@section('title', 'Pesan Kontak — Admin')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Pesan Kontak</h1>

        <div class="bg-white shadow rounded-lg overflow-hidden">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-gray-50">
                        <th class="px-4 py-3">Nama</th>
                        <th class="px-4 py-3">Email</th>
                        <th class="px-4 py-3">Subjek</th>
                        <th class="px-4 py-3">Diterima</th>
                        <th class="px-4 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($messages as $msg)
                        <tr class="border-t">
                            <td class="px-4 py-3">{{ $msg->nama }}</td>
                            <td class="px-4 py-3">{{ $msg->email }}</td>
                            <td class="px-4 py-3">{{ $msg->subjek }}</td>
                            <td class="px-4 py-3">{{ $msg->created_at->format('Y-m-d H:i') }}</td>
                            <td class="px-4 py-3">
                                <a href="{{ route('admin.kontak.show', $msg->id) }}" class="text-blue-600">Lihat</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="p-6" colspan="5">Belum ada pesan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $messages->links() }}
        </div>
    </div>
@endsection
