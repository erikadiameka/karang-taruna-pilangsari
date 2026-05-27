@extends('layouts.app')

@section('title', 'Detail Pesan Kontak — Admin')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Detail Pesan</h1>

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
