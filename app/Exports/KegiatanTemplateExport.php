<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\PatternFill;

class KegiatanTemplateExport implements FromArray, WithHeadings, WithStyles
{
    public function array(): array
    {
        return [
            ['Acara Sosial 1', 'Sosial', 'Deskripsi kegiatan sosial yang menarik', 'Lokasi Acara', '2026-06-05 09:00', '2026-06-05 17:00', 'akan_datang', 50],
            ['Kegiatan Olahraga', 'Olahraga', 'Kegiatan olahraga untuk semua kalangan', 'Lapangan Umum', '2026-06-10 15:00', '2026-06-10 18:00', 'berlangsung', 30],
            ['Acara Selesai', 'Pendidikan', 'Acara pendidikan yang sudah dilaksanakan', 'Aula Utama', '2026-05-20 10:00', '2026-05-20 14:00', 'selesai', 100],
        ];
    }

    public function headings(): array
    {
        return [
            'Nama Kegiatan',
            'Kategori (Sosial/Pendidikan/Olahraga/Seni Budaya/Ekonomi/Lainnya)',
            'Deskripsi',
            'Lokasi',
            'Tanggal Mulai (YYYY-MM-DD HH:MM)',
            'Tanggal Selesai (YYYY-MM-DD HH:MM)',
            'Status (akan_datang/berlangsung/selesai)',
            'Jumlah Peserta',
        ];
    }

    public function styles($sheet)
    {
        return [
            1 => [
                'font' => ['bold' => true, 'color' => ['rgb' => 'FFFFFF']],
                'fill' => ['fillType' => PatternFill::FILL_SOLID, 'startColor' => ['rgb' => '10B981']],
            ],
        ];
    }
}
