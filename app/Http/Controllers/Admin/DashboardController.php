<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\Kegiatan;
use App\Models\Galeri;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'anggota' => Anggota::where('status', 'aktif')->count(),
            'kegiatan' => Kegiatan::count(),
            'galeri' => Galeri::count(),
        ];

        $kegiatanBulanan = [];
        for ($i = 1; $i <= 12; $i++) {
            $kegiatanBulanan[$i] = Kegiatan::whereYear('tanggal_mulai', date('Y'))
                ->whereMonth('tanggal_mulai', $i)->count();
        }

        $divisi = [
            'Humas dan Keamanan',
            'Seni Kreatif dan Medafor',
            'Keagamaan',
            'Kepemudaan dan Olahraga',
        ];

        $jumlahPerDivisi = Anggota::selectRaw('divisi, COUNT(*) as total')
            ->where('status', 'aktif')
            ->whereNotNull('divisi')
            ->groupBy('divisi')
            ->pluck('total', 'divisi')
            ->toArray();

        $anggotaPerDivisi = collect($divisi)
            ->mapWithKeys(fn ($nama) => [$nama => (int) ($jumlahPerDivisi[$nama] ?? 0)])
            ->all();

        foreach ($jumlahPerDivisi as $nama => $jumlah) {
            if (!array_key_exists($nama, $anggotaPerDivisi)) {
                $anggotaPerDivisi[$nama] = (int) $jumlah;
            }
        }

        $belumDitentukan = Anggota::where('status', 'aktif')->whereNull('divisi')->count();
        if ($belumDitentukan > 0) {
            $anggotaPerDivisi['Belum ditentukan'] = $belumDitentukan;
        }

        $kegiatanMendatang = Kegiatan::where('status', 'akan_datang')
            ->orderBy('tanggal_mulai')->take(5)->get();

        return view('admin.dashboard', compact(
            'stats',
            'kegiatanBulanan',
            'anggotaPerDivisi',
            'kegiatanMendatang'
        ));
    }
}
