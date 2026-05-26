#!/usr/bin/env php
<?php
require_once __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);

// Update posisi inti
use App\Models\Anggota;
use Illuminate\Database\QueryException;

echo "📝 Updating struktur organisasi dengan posisi inti...\n\n";

// 1. Ketua - Assign to first available
$ketua = Anggota::where('nama_lengkap', 'like', '%Ketua%')->first();
if (!$ketua) {
    // Cari yang paling senior atau ambil yang pertama
    $ketua = Anggota::where('status', 'aktif')->orderBy('tahun_masuk')->first();
}
if ($ketua) {
    $ketua->update(['posisi_inti' => 'Ketua']);
    echo "✅ Ketua: {$ketua->nama_lengkap}\n";
}

// 2. Wakil Ketua
$wakilKetua = Anggota::where('nama_lengkap', 'like', '%Randi%')->first() ?? 
              Anggota::where('status', 'aktif')
                     ->where('id', '!=', $ketua->id ?? null)
                     ->orderBy('tahun_masuk')
                     ->first();
if ($wakilKetua) {
    $wakilKetua->update(['posisi_inti' => 'Wakil Ketua']);
    echo "✅ Wakil Ketua: {$wakilKetua->nama_lengkap}\n";
}

// 3. Sekretaris 1 & 2
$sek1 = Anggota::where('nama_lengkap', 'like', '%Tio%')->first() ?? 
        Anggota::where('status', 'aktif')
               ->whereNotIn('id', [$ketua->id ?? 0, $wakilKetua->id ?? 0])
               ->orderBy('tahun_masuk')
               ->skip(0)->take(1)->first();
if ($sek1) {
    $sek1->update(['posisi_inti' => 'Sekretaris 1']);
    echo "✅ Sekretaris 1: {$sek1->nama_lengkap}\n";
}

$sek2 = Anggota::where('nama_lengkap', 'like', '%Tansah%')->first() ?? 
        Anggota::where('status', 'aktif')
               ->whereNotIn('id', [$ketua->id ?? 0, $wakilKetua->id ?? 0, $sek1->id ?? 0])
               ->orderBy('tahun_masuk')
               ->skip(0)->take(1)->first();
if ($sek2) {
    $sek2->update(['posisi_inti' => 'Sekretaris 2']);
    echo "✅ Sekretaris 2: {$sek2->nama_lengkap}\n";
}

// 4. Bendahara 1 & 2
$ben1 = Anggota::where('nama_lengkap', 'like', '%Erik%')->first() ?? 
        Anggota::where('status', 'aktif')
               ->whereNotIn('id', [$ketua->id ?? 0, $wakilKetua->id ?? 0, $sek1->id ?? 0, $sek2->id ?? 0])
               ->orderBy('tahun_masuk')
               ->skip(0)->take(1)->first();
if ($ben1) {
    $ben1->update(['posisi_inti' => 'Bendahara 1']);
    echo "✅ Bendahara 1: {$ben1->nama_lengkap}\n";
}

$ben2 = Anggota::where('nama_lengkap', 'like', '%Tamsil%')->first() ?? 
        Anggota::where('status', 'aktif')
               ->whereNotIn('id', [$ketua->id ?? 0, $wakilKetua->id ?? 0, $sek1->id ?? 0, $sek2->id ?? 0, $ben1->id ?? 0])
               ->orderBy('tahun_masuk')
               ->skip(0)->take(1)->first();
if ($ben2) {
    $ben2->update(['posisi_inti' => 'Bendahara 2']);
    echo "✅ Bendahara 2: {$ben2->nama_lengkap}\n";
}

echo "\n✅ Struktur organisasi inti sudah di-update!\n";
exit(0);
