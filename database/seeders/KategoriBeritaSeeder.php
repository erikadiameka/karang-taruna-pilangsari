<?php

namespace Database\Seeders;

use App\Models\KategoriBerita;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class KategoriBeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategori = [
            ['nama' => 'Pengumuman', 'warna' => '#D4AF37'],
            ['nama' => 'Kegiatan', 'warna' => '#2563EB'],
            ['nama' => 'Prestasi', 'warna' => '#10B981'],
            ['nama' => 'Berita Umum', 'warna' => '#F59E0B'],
            ['nama' => 'Tips & Trik', 'warna' => '#8B5CF6'],
        ];

        foreach ($kategori as $kat) {
            KategoriBerita::create([
                'nama' => $kat['nama'],
                'slug' => Str::slug($kat['nama']),
                'warna' => $kat['warna'],
            ]);
        }
    }
}
