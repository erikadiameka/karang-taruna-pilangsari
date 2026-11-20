<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Landing\BerandaController;
use App\Http\Controllers\Landing\KegiatanController as LandingKegiatan;
use App\Http\Controllers\Landing\GaleriController as LandingGaleri;
use App\Http\Controllers\Landing\AnggotaController as LandingAnggota;
use App\Http\Controllers\Landing\KontakController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KegiatanController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\AnggotaController;
use App\Http\Controllers\Admin\PengumumanController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\KontakController as AdminKontakController;

// ===== LANDING =====
Route::get('/', [BerandaController::class, 'index'])->name('beranda');
Route::get('/tentang', fn() => view('landing.tentang'))->name('tentang');
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak');
Route::post('/kontak', [KontakController::class, 'kirim'])->name('kontak.kirim');
Route::get('/unduhan', fn() => view('landing.unduhan'))->name('unduhan');
Route::get('/potensi-desa', fn() => view('landing.potensi-desa'))->name('potensi-desa');
Route::redirect('/berita', 'https://www.instagram.com/ikappi_pilangsari');
Route::get('/berita/{slug}', fn() => redirect()->away('https://www.instagram.com/ikappi_pilangsari'));
Route::redirect('/pengumuman', 'https://www.instagram.com/ikappi_pilangsari');
Route::get('/pengumuman/{id}', fn() => redirect()->away('https://www.instagram.com/ikappi_pilangsari'))->whereNumber('id');

Route::prefix('kegiatan')->name('kegiatan.')->group(function () {
    Route::get('/', [LandingKegiatan::class, 'index'])->name('index');
    Route::get('/{slug}', [LandingKegiatan::class, 'show'])->name('show');
});

Route::get('/galeri', [LandingGaleri::class, 'index'])->name('galeri.index');
Route::get('/anggota', [LandingAnggota::class, 'index'])->name('anggota.index');

Route::get('/faq', fn() => view('landing.faq'))->name('faq');
Route::get('/aspirasi', fn() => view('landing.aspirasi'))->name('aspirasi');
Route::get('/daftar-anggota', fn() => view('landing.daftar'))->name('daftar-anggota');

// ===== ADMIN =====
Route::prefix('dashboard')->name('admin.')->middleware(['auth', 'role:super_admin,admin'])->group(function () {
    // Autocomplete route for anggota search (used by admin UI)
    Route::get('anggota/search', [\App\Http\Controllers\Admin\AnggotaController::class, 'autocomplete'])->name('anggota.search');
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('kegiatan', KegiatanController::class, ['parameters' => ['kegiatan' => 'kegiatan']]);
    Route::get('kegiatan-import/form', [KegiatanController::class, 'importForm'])->name('kegiatan.import-form');
    Route::post('kegiatan-import', [KegiatanController::class, 'import'])->name('kegiatan.import');
    Route::get('kegiatan-template', [KegiatanController::class, 'downloadTemplate'])->name('kegiatan.template');
    Route::resource('galeri', GaleriController::class, ['parameters' => ['galeri' => 'galeri']]);
    Route::resource('anggota', AnggotaController::class, ['parameters' => ['anggota' => 'anggota']]);
    Route::resource('pengumuman', PengumumanController::class, ['parameters' => ['pengumuman' => 'pengumuman']]);
    Route::resource('kontak', AdminKontakController::class)->only(['index', 'show', 'destroy']);
    Route::delete('kontak', [AdminKontakController::class, 'destroySelected'])->name('kontak.destroySelected');
    Route::delete('kontak/read', [AdminKontakController::class, 'destroyRead'])->name('kontak.destroyRead');
    Route::resource('users', UserController::class)->middleware('role:super_admin');
});

// ===== SEEDER ROUTE (LOCAL ONLY) =====
if (app()->environment('local')) {
    Route::get('/seed-anggota', [\App\Http\Controllers\SeederController::class, 'seed'])->name('seed.anggota');
}

require __DIR__ . '/auth.php';

// ===== JEMBATAN PAKSA STORAGE =====
Route::get('/storage/{path}', function ($path) {
    $filePath = storage_path('app/public/' . $path);
    if (!File::exists($filePath)) {
        abort(404);
    }
    return response()->file($filePath);
})->where('path', '.*');
