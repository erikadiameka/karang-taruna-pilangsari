<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnggotaSeeder extends Seeder
{
    public function run(): void
    {
        $anggota = [
            // Leadership
            ['nama_lengkap' => 'Budi Santoso', 'nik' => '1234567890123456', 'no_hp' => '081234567890', 'alamat' => 'Desa Pilangsari, RT 01 RW 05', 'tanggal_lahir' => '1985-03-15', 'jenis_kelamin' => 'L', 'jabatan' => 'Ketua', 'divisi' => null, 'tahun_masuk' => 2015],
            ['nama_lengkap' => 'Ahmad Wijaya', 'nik' => '1234567890123457', 'no_hp' => '081234567891', 'alamat' => 'Desa Pilangsari, RT 02 RW 05', 'tanggal_lahir' => '1987-07-22', 'jenis_kelamin' => 'L', 'jabatan' => 'Wakil Ketua', 'divisi' => null, 'tahun_masuk' => 2017],
            ['nama_lengkap' => 'Siti Nurhaliza', 'nik' => '1234567890123458', 'no_hp' => '081234567892', 'alamat' => 'Desa Pilangsari, RT 03 RW 05', 'tanggal_lahir' => '1988-11-05', 'jenis_kelamin' => 'P', 'jabatan' => 'Sekretaris I', 'divisi' => null, 'tahun_masuk' => 2018],
            ['nama_lengkap' => 'Eka Putri', 'nik' => '1234567890123459', 'no_hp' => '081234567893', 'alamat' => 'Desa Pilangsari, RT 04 RW 05', 'tanggal_lahir' => '1990-01-18', 'jenis_kelamin' => 'P', 'jabatan' => 'Sekretaris II', 'divisi' => null, 'tahun_masuk' => 2019],
            ['nama_lengkap' => 'Rudi Hermawan', 'nik' => '1234567890123460', 'no_hp' => '081234567894', 'alamat' => 'Desa Pilangsari, RT 05 RW 05', 'tanggal_lahir' => '1986-05-12', 'jenis_kelamin' => 'L', 'jabatan' => 'Bendahara I', 'divisi' => null, 'tahun_masuk' => 2016],
            ['nama_lengkap' => 'Dina Marlina', 'nik' => '1234567890123461', 'no_hp' => '081234567895', 'alamat' => 'Desa Pilangsari, RT 06 RW 05', 'tanggal_lahir' => '1992-09-08', 'jenis_kelamin' => 'P', 'jabatan' => 'Bendahara II', 'divisi' => null, 'tahun_masuk' => 2020],

            // Divisi Humas
            ['nama_lengkap' => 'Yudi Pratama', 'nik' => '1234567890123462', 'no_hp' => '081234567896', 'alamat' => 'Desa Pilangsari, RT 07 RW 05', 'tanggal_lahir' => '1989-02-14', 'jenis_kelamin' => 'L', 'jabatan' => 'Koordinator Divisi Humas', 'divisi' => 'Humas', 'tahun_masuk' => 2018],
            ['nama_lengkap' => 'Indra Gunawan', 'nik' => '1234567890123463', 'no_hp' => '081234567897', 'alamat' => 'Desa Pilangsari, RT 08 RW 05', 'tanggal_lahir' => '1991-06-20', 'jenis_kelamin' => 'L', 'jabatan' => 'Anggota', 'divisi' => 'Humas', 'tahun_masuk' => 2019],
            ['nama_lengkap' => 'Lia Kusuma', 'nik' => '1234567890123464', 'no_hp' => '081234567898', 'alamat' => 'Desa Pilangsari, RT 09 RW 05', 'tanggal_lahir' => '1993-08-25', 'jenis_kelamin' => 'P', 'jabatan' => 'Anggota', 'divisi' => 'Humas', 'tahun_masuk' => 2020],
            ['nama_lengkap' => 'Bambang Irawan', 'nik' => '1234567890123465', 'no_hp' => '081234567899', 'alamat' => 'Desa Pilangsari, RT 10 RW 05', 'tanggal_lahir' => '1988-10-11', 'jenis_kelamin' => 'L', 'jabatan' => 'Anggota', 'divisi' => 'Humas', 'tahun_masuk' => 2021],

            // Divisi Sosial
            ['nama_lengkap' => 'Rina Susanti', 'nik' => '1234567890123466', 'no_hp' => '081234567900', 'alamat' => 'Desa Pilangsari, RT 11 RW 05', 'tanggal_lahir' => '1990-12-03', 'jenis_kelamin' => 'P', 'jabatan' => 'Koordinator Divisi Sosial', 'divisi' => 'Sosial', 'tahun_masuk' => 2017],
            ['nama_lengkap' => 'Hendra Wijaya', 'nik' => '1234567890123467', 'no_hp' => '081234567901', 'alamat' => 'Desa Pilangsari, RT 12 RW 05', 'tanggal_lahir' => '1992-04-17', 'jenis_kelamin' => 'L', 'jabatan' => 'Anggota', 'divisi' => 'Sosial', 'tahun_masuk' => 2019],
            ['nama_lengkap' => 'Dewi Lestari', 'nik' => '1234567890123468', 'no_hp' => '081234567902', 'alamat' => 'Desa Pilangsari, RT 13 RW 05', 'tanggal_lahir' => '1994-07-09', 'jenis_kelamin' => 'P', 'jabatan' => 'Anggota', 'divisi' => 'Sosial', 'tahun_masuk' => 2020],
            ['nama_lengkap' => 'Fajar Rahman', 'nik' => '1234567890123469', 'no_hp' => '081234567903', 'alamat' => 'Desa Pilangsari, RT 14 RW 05', 'tanggal_lahir' => '1989-09-21', 'jenis_kelamin' => 'L', 'jabatan' => 'Anggota', 'divisi' => 'Sosial', 'tahun_masuk' => 2021],

            // Divisi Ekonomi
            ['nama_lengkap' => 'Toni Suryanto', 'nik' => '1234567890123470', 'no_hp' => '081234567904', 'alamat' => 'Desa Pilangsari, RT 15 RW 05', 'tanggal_lahir' => '1986-11-27', 'jenis_kelamin' => 'L', 'jabatan' => 'Koordinator Divisi Ekonomi', 'divisi' => 'Ekonomi', 'tahun_masuk' => 2016],
            ['nama_lengkap' => 'Suhardi', 'nik' => '1234567890123471', 'no_hp' => '081234567905', 'alamat' => 'Desa Pilangsari, RT 16 RW 05', 'tanggal_lahir' => '1991-03-06', 'jenis_kelamin' => 'L', 'jabatan' => 'Anggota', 'divisi' => 'Ekonomi', 'tahun_masuk' => 2018],
            ['nama_lengkap' => 'Mina Handayani', 'nik' => '1234567890123472', 'no_hp' => '081234567906', 'alamat' => 'Desa Pilangsari, RT 17 RW 05', 'tanggal_lahir' => '1995-05-19', 'jenis_kelamin' => 'P', 'jabatan' => 'Anggota', 'divisi' => 'Ekonomi', 'tahun_masuk' => 2020],
            ['nama_lengkap' => 'Hendrik', 'nik' => '1234567890123473', 'no_hp' => '081234567907', 'alamat' => 'Desa Pilangsari, RT 18 RW 05', 'tanggal_lahir' => '1987-08-14', 'jenis_kelamin' => 'L', 'jabatan' => 'Anggota', 'divisi' => 'Ekonomi', 'tahun_masuk' => 2021],

            // Divisi Seni Budaya
            ['nama_lengkap' => 'Ari Gunawan', 'nik' => '1234567890123474', 'no_hp' => '081234567908', 'alamat' => 'Desa Pilangsari, RT 19 RW 05', 'tanggal_lahir' => '1993-01-08', 'jenis_kelamin' => 'L', 'jabatan' => 'Koordinator Divisi Seni Budaya', 'divisi' => 'Seni Budaya', 'tahun_masuk' => 2019],
            ['nama_lengkap' => 'Ratna Wijaya', 'nik' => '1234567890123475', 'no_hp' => '081234567909', 'alamat' => 'Desa Pilangsari, RT 20 RW 05', 'tanggal_lahir' => '1996-02-13', 'jenis_kelamin' => 'P', 'jabatan' => 'Anggota', 'divisi' => 'Seni Budaya', 'tahun_masuk' => 2020],
            ['nama_lengkap' => 'Doni Permana', 'nik' => '1234567890123476', 'no_hp' => '081234567910', 'alamat' => 'Desa Pilangsari, RT 21 RW 05', 'tanggal_lahir' => '1994-10-22', 'jenis_kelamin' => 'L', 'jabatan' => 'Anggota', 'divisi' => 'Seni Budaya', 'tahun_masuk' => 2020],
            ['nama_lengkap' => 'Silvi Andrian', 'nik' => '1234567890123477', 'no_hp' => '081234567911', 'alamat' => 'Desa Pilangsari, RT 22 RW 05', 'tanggal_lahir' => '1997-04-11', 'jenis_kelamin' => 'P', 'jabatan' => 'Anggota', 'divisi' => 'Seni Budaya', 'tahun_masuk' => 2021],

            // Divisi Olahraga
            ['nama_lengkap' => 'Surya Wijanto', 'nik' => '1234567890123478', 'no_hp' => '081234567912', 'alamat' => 'Desa Pilangsari, RT 23 RW 05', 'tanggal_lahir' => '1988-06-30', 'jenis_kelamin' => 'L', 'jabatan' => 'Koordinator Divisi Olahraga', 'divisi' => 'Olahraga', 'tahun_masuk' => 2018],
            ['nama_lengkap' => 'Eka Siregar', 'nik' => '1234567890123479', 'no_hp' => '081234567913', 'alamat' => 'Desa Pilangsari, RT 24 RW 05', 'tanggal_lahir' => '1992-09-12', 'jenis_kelamin' => 'L', 'jabatan' => 'Anggota', 'divisi' => 'Olahraga', 'tahun_masuk' => 2019],
            ['nama_lengkap' => 'Reny Cahyono', 'nik' => '1234567890123480', 'no_hp' => '081234567914', 'alamat' => 'Desa Pilangsari, RT 25 RW 05', 'tanggal_lahir' => '1995-11-28', 'jenis_kelamin' => 'P', 'jabatan' => 'Anggota', 'divisi' => 'Olahraga', 'tahun_masuk' => 2020],
            ['nama_lengkap' => 'Rifki Ardian', 'nik' => '1234567890123481', 'no_hp' => '081234567915', 'alamat' => 'Desa Pilangsari, RT 26 RW 05', 'tanggal_lahir' => '1993-12-05', 'jenis_kelamin' => 'L', 'jabatan' => 'Anggota', 'divisi' => 'Olahraga', 'tahun_masuk' => 2021],

            // Divisi Pendidikan
            ['nama_lengkap' => 'Nurul Hidayat', 'nik' => '1234567890123482', 'no_hp' => '081234567916', 'alamat' => 'Desa Pilangsari, RT 27 RW 05', 'tanggal_lahir' => '1990-07-16', 'jenis_kelamin' => 'L', 'jabatan' => 'Koordinator Divisi Pendidikan', 'divisi' => 'Pendidikan', 'tahun_masuk' => 2017],
            ['nama_lengkap' => 'Risa Wardani', 'nik' => '1234567890123483', 'no_hp' => '081234567917', 'alamat' => 'Desa Pilangsari, RT 28 RW 05', 'tanggal_lahir' => '1997-01-23', 'jenis_kelamin' => 'P', 'jabatan' => 'Anggota', 'divisi' => 'Pendidikan', 'tahun_masuk' => 2020],
            ['nama_lengkap' => 'Bagus Santoso', 'nik' => '1234567890123484', 'no_hp' => '081234567918', 'alamat' => 'Desa Pilangsari, RT 29 RW 05', 'tanggal_lahir' => '1991-05-14', 'jenis_kelamin' => 'L', 'jabatan' => 'Anggota', 'divisi' => 'Pendidikan', 'tahun_masuk' => 2020],
            ['nama_lengkap' => 'Dini Marliana', 'nik' => '1234567890123485', 'no_hp' => '081234567919', 'alamat' => 'Desa Pilangsari, RT 30 RW 05', 'tanggal_lahir' => '1998-08-07', 'jenis_kelamin' => 'P', 'jabatan' => 'Anggota', 'divisi' => 'Pendidikan', 'tahun_masuk' => 2021],
        ];

        foreach ($anggota as $data) {
            $data['user_id'] = null;
            $data['foto'] = null;
            $data['status'] = 'aktif';
            \App\Models\Anggota::create($data);
        }
    }
}
