<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BeritaController;
use App\Http\Controllers\Api\KegiatanController;
use App\Http\Controllers\Api\AnggotaController;
use App\Http\Controllers\Api\GaleriController;

Route::prefix('v1')->group(function () {
    Route::get('/berita', [BeritaController::class, 'index']);
    Route::get('/berita/{slug}', [BeritaController::class, 'show']);
    Route::get('/kegiatan', [KegiatanController::class, 'index']);
    Route::get('/kegiatan/{slug}', [KegiatanController::class, 'show']);
    Route::get('/anggota', [AnggotaController::class, 'index']);
    Route::get('/galeri', [GaleriController::class, 'index']);
    Route::get('/stats', function () {
        return response()->json([
            'status' => 'success',
            'data' => [
                'anggota' => \App\Models\Anggota::where('status', 'aktif')->count(),
                'kegiatan' => \App\Models\Kegiatan::count(),
                'berita' => \App\Models\Berita::where('status', 'published')->count(),
                'tahun' => date('Y') - 2010,
            ]
        ]);
    });
});
    