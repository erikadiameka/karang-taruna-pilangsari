<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Anggota;

class StrukturOrganisasiSeeder extends Seeder
{
    public function run(): void
    {
        // Data Anggota sesuai struktur organisasi baru
        // URUTAN PENTING: Posisi Inti dulu, kemudian Koordinator, kemudian Anggota biasa
        
        $anggotas = [
            // ===== POSISI INTI =====
            // Ketua
            ['nama_lengkap' => 'Erik', 'nik' => '1234567890123001', 'divisi' => 'Keagamaan', 'jabatan' => 'Ketua', 'posisi_inti' => 'Ketua'],
            
            // Wakil Ketua
            ['nama_lengkap' => 'Tamsil', 'nik' => '1234567890123002', 'divisi' => 'Kepemudaan dan Olahraga', 'jabatan' => 'Wakil Ketua', 'posisi_inti' => 'Wakil Ketua'],
            
            // Sekretaris 1 & 2
            ['nama_lengkap' => 'Tio', 'nik' => '1234567890123003', 'divisi' => 'Humas dan Keamanan', 'jabatan' => 'Sekretaris', 'posisi_inti' => 'Sekretaris 1'],
            ['nama_lengkap' => 'Tansah', 'nik' => '1234567890123004', 'divisi' => 'Seni Kreatif dan Medafor', 'jabatan' => 'Sekretaris', 'posisi_inti' => 'Sekretaris 2'],
            
            // Bendahara 1 & 2
            ['nama_lengkap' => 'Rio', 'nik' => '1234567890123005', 'divisi' => 'Kepemudaan dan Olahraga', 'jabatan' => 'Bendahara', 'posisi_inti' => 'Bendahara 1'],
            ['nama_lengkap' => 'Yoga', 'nik' => '1234567890123006', 'divisi' => 'Keagamaan', 'jabatan' => 'Bendahara', 'posisi_inti' => 'Bendahara 2'],
            
            // ===== HUMAS DAN KEAMANAN (7 anggota, Tio jadi Ketua) =====
            ['nama_lengkap' => 'Dian', 'nik' => '1234567890123407', 'divisi' => 'Humas dan Keamanan', 'jabatan' => 'Anggota'],
            ['nama_lengkap' => 'Randi', 'nik' => '1234567890123408', 'divisi' => 'Humas dan Keamanan', 'jabatan' => 'Anggota'],
            ['nama_lengkap' => 'Arif', 'nik' => '1234567890123409', 'divisi' => 'Humas dan Keamanan', 'jabatan' => 'Anggota'],
            ['nama_lengkap' => 'Agung', 'nik' => '1234567890123410', 'divisi' => 'Humas dan Keamanan', 'jabatan' => 'Anggota'],
            ['nama_lengkap' => 'Ogi', 'nik' => '1234567890123411', 'divisi' => 'Humas dan Keamanan', 'jabatan' => 'Anggota'],
            ['nama_lengkap' => 'Saeful', 'nik' => '1234567890123412', 'divisi' => 'Humas dan Keamanan', 'jabatan' => 'Anggota'],

            // ===== SENI KREATIF DAN MEDAFOR (13 anggota, Tansah jadi Koordinator) =====
            ['nama_lengkap' => 'Ponda', 'nik' => '1234567890123413', 'divisi' => 'Seni Kreatif dan Medafor', 'jabatan' => 'Anggota'],
            ['nama_lengkap' => 'Candra', 'nik' => '1234567890123414', 'divisi' => 'Seni Kreatif dan Medafor', 'jabatan' => 'Anggota'],
            ['nama_lengkap' => 'Aung', 'nik' => '1234567890123415', 'divisi' => 'Seni Kreatif dan Medafor', 'jabatan' => 'Anggota'],
            ['nama_lengkap' => 'Wulan', 'nik' => '1234567890123416', 'divisi' => 'Seni Kreatif dan Medafor', 'jabatan' => 'Anggota'],
            ['nama_lengkap' => 'Amel', 'nik' => '1234567890123417', 'divisi' => 'Seni Kreatif dan Medafor', 'jabatan' => 'Anggota'],
            ['nama_lengkap' => 'Bastian', 'nik' => '1234567890123418', 'divisi' => 'Seni Kreatif dan Medafor', 'jabatan' => 'Anggota'],
            ['nama_lengkap' => 'Igun', 'nik' => '1234567890123419', 'divisi' => 'Seni Kreatif dan Medafor', 'jabatan' => 'Anggota'],
            ['nama_lengkap' => 'Riski', 'nik' => '1234567890123420', 'divisi' => 'Seni Kreatif dan Medafor', 'jabatan' => 'Anggota'],
            ['nama_lengkap' => 'Saadah', 'nik' => '1234567890123421', 'divisi' => 'Seni Kreatif dan Medafor', 'jabatan' => 'Anggota'],
            ['nama_lengkap' => 'Destian', 'nik' => '1234567890123422', 'divisi' => 'Seni Kreatif dan Medafor', 'jabatan' => 'Anggota'],
            ['nama_lengkap' => 'Yayas', 'nik' => '1234567890123423', 'divisi' => 'Seni Kreatif dan Medafor', 'jabatan' => 'Anggota'],
            ['nama_lengkap' => 'Dika', 'nik' => '1234567890123424', 'divisi' => 'Seni Kreatif dan Medafor', 'jabatan' => 'Anggota'],

            // ===== KEAGAMAAN (9 anggota, Erik jadi Ketua) =====
            ['nama_lengkap' => 'Aena', 'nik' => '1234567890123425', 'divisi' => 'Keagamaan', 'jabatan' => 'Anggota'],
            ['nama_lengkap' => 'Ketrin', 'nik' => '1234567890123426', 'divisi' => 'Keagamaan', 'jabatan' => 'Anggota'],
            ['nama_lengkap' => 'Mukti', 'nik' => '1234567890123427', 'divisi' => 'Keagamaan', 'jabatan' => 'Anggota'],
            ['nama_lengkap' => 'Ima', 'nik' => '1234567890123428', 'divisi' => 'Keagamaan', 'jabatan' => 'Anggota'],
            ['nama_lengkap' => 'Enzy', 'nik' => '1234567890123429', 'divisi' => 'Keagamaan', 'jabatan' => 'Anggota'],
            ['nama_lengkap' => 'Pudin', 'nik' => '1234567890123430', 'divisi' => 'Keagamaan', 'jabatan' => 'Anggota'],
            ['nama_lengkap' => 'Adil', 'nik' => '1234567890123431', 'divisi' => 'Keagamaan', 'jabatan' => 'Anggota'],

            // ===== KEPEMUDAAN DAN OLAHRAGA (11 anggota, Tamsil jadi Wakil Ketua) =====
            ['nama_lengkap' => 'Kalista', 'nik' => '1234567890123432', 'divisi' => 'Kepemudaan dan Olahraga', 'jabatan' => 'Anggota'],
            ['nama_lengkap' => 'Aldi', 'nik' => '1234567890123433', 'divisi' => 'Kepemudaan dan Olahraga', 'jabatan' => 'Anggota'],
            ['nama_lengkap' => 'Guntur', 'nik' => '1234567890123434', 'divisi' => 'Kepemudaan dan Olahraga', 'jabatan' => 'Anggota'],
            ['nama_lengkap' => 'Riska', 'nik' => '1234567890123435', 'divisi' => 'Kepemudaan dan Olahraga', 'jabatan' => 'Anggota'],
            ['nama_lengkap' => 'Yayan', 'nik' => '1234567890123436', 'divisi' => 'Kepemudaan dan Olahraga', 'jabatan' => 'Anggota'],
            ['nama_lengkap' => 'Iis', 'nik' => '1234567890123437', 'divisi' => 'Kepemudaan dan Olahraga', 'jabatan' => 'Anggota'],
            ['nama_lengkap' => 'Maya', 'nik' => '1234567890123438', 'divisi' => 'Kepemudaan dan Olahraga', 'jabatan' => 'Anggota'],
            ['nama_lengkap' => 'Levi', 'nik' => '1234567890123439', 'divisi' => 'Kepemudaan dan Olahraga', 'jabatan' => 'Anggota'],
            ['nama_lengkap' => 'Lesa', 'nik' => '1234567890123440', 'divisi' => 'Kepemudaan dan Olahraga', 'jabatan' => 'Anggota'],
        ];

        foreach ($anggotas as $anggota) {
            Anggota::updateOrCreate(
                ['nik' => $anggota['nik']],
                array_merge($anggota, [
                    'jenis_kelamin' => 'L',
                    'status' => 'aktif',
                    'tahun_masuk' => 2024
                ])
            );
        }

        echo "✅ Struktur Organisasi berhasil di-seed!\n";
        echo "- Ketua: Erik\n";
        echo "- Wakil Ketua: Tamsil\n";
        echo "- Sekretaris 1: Tio | Sekretaris 2: Tansah\n";
        echo "- Bendahara 1: Rio | Bendahara 2: Yoga\n";
    }
}
