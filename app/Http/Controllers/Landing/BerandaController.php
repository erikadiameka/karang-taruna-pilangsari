<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\Galeri;
use App\Models\Kegiatan;

class BerandaController extends Controller
{
    public function index()
    {
        $stats = [
            'anggota' => Anggota::where('status', 'aktif')->count() ?: 120,
            'kegiatan' => Kegiatan::where('status', 'selesai')->count() ?: 48,
            'tahun' => date('Y') - 2010,
        ];

        $kegiatanTerbaru = Kegiatan::latest('tanggal_mulai')->take(3)->get();
        $galeriTerbaru = Galeri::where('tipe', 'foto')->latest()->take(6)->get();

        $programUnggulan = [
            ['nama' => 'Pengembangan Pemuda', 'deskripsi' => 'Meningkatkan kapasitas pemuda melalui pelatihan dan workshop.'],
            ['nama' => 'Bakti Sosial', 'deskripsi' => 'Kegiatan sosial untuk membantu masyarakat yang membutuhkan.'],
            ['nama' => 'Kewirausahaan', 'deskripsi' => 'Mendorong pemuda untuk mandiri melalui bidang kewirausahaan.'],
            ['nama' => 'Seni & Budaya', 'deskripsi' => 'Melestarikan seni dan budaya lokal Desa Pilangsari.'],
        ];

        return view('landing.beranda', compact(
            'stats',
            'kegiatanTerbaru',
            'galeriTerbaru',
            'programUnggulan'
        ));
    }
}
