<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Landing\BerandaController;
use App\Http\Controllers\Landing\BeritaController as LandingBerita;
use App\Http\Controllers\Landing\KegiatanController as LandingKegiatan;
use App\Http\Controllers\Landing\GaleriController as LandingGaleri;
use App\Http\Controllers\Landing\AnggotaController as LandingAnggota;
use App\Http\Controllers\Landing\PengumumanController as LandingPengumuman;
use App\Http\Controllers\Landing\KontakController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\KegiatanController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\AnggotaController;
use App\Http\Controllers\Admin\PengumumanController;
use App\Http\Controllers\Admin\UserController;

// ===== LANDING =====
Route::get('/', [BerandaController::class, 'index'])->name('beranda');
Route::get('/tentang', fn() => view('landing.tentang'))->name('tentang');
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak');
Route::post('/kontak', [KontakController::class, 'kirim'])->name('kontak.kirim');

Route::prefix('berita')->name('berita.')->group(function () {
    Route::get('/', [LandingBerita::class, 'index'])->name('index');
    Route::get('/{slug}', [LandingBerita::class, 'show'])->name('show');
});

Route::prefix('kegiatan')->name('kegiatan.')->group(function () {
    Route::get('/', [LandingKegiatan::class, 'index'])->name('index');
    Route::get('/{slug}', [LandingKegiatan::class, 'show'])->name('show');
});

Route::get('/galeri', [LandingGaleri::class, 'index'])->name('galeri.index');
Route::get('/anggota', [LandingAnggota::class, 'index'])->name('anggota.index');

Route::prefix('pengumuman')->name('pengumuman.')->group(function () {
    Route::get('/', [LandingPengumuman::class, 'index'])->name('index');
    Route::get('/{id}', [LandingPengumuman::class, 'show'])->name('show');
});

Route::get('/faq', fn() => view('landing.faq'))->name('faq');
Route::get('/dokumentasi', fn() => view('landing.dokumentasi'))->name('dokumentasi');

// ===== REDIRECT SETELAH LOGIN =====
Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth'])->name('dashboard');

// ===== ADMIN =====
Route::prefix('dashboard')->name('admin.')->middleware(['auth', 'role:super_admin,admin'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('berita', BeritaController::class);
    Route::resource('kegiatan', KegiatanController::class);
    Route::resource('galeri', GaleriController::class);
    Route::resource('anggota', AnggotaController::class);
    Route::resource('pengumuman', PengumumanController::class);
    Route::resource('users', UserController::class)->middleware('role:super_admin');
});

// ===== SEEDER ROUTE (LOCAL ONLY) =====
if (app()->environment('local')) {
    Route::get('/seed-anggota', [\App\Http\Controllers\SeederController::class, 'seed'])->name('seed.anggota');
}

require __DIR__ . '/auth.php';
