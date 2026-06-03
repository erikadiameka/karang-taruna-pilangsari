<?php

namespace App\Exports;

use App\Models\KategoriBerita;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\PatternFill;

class BeritaTemplateExport implements FromArray, WithHeadings, WithStyles
{
    public function array(): array
    {
        return [
            ['Judul Berita 1', 1, 'Ringkasan singkat berita', 'Isi konten berita yang lengkap dan detail', 'published'],
            ['Judul Berita 2', 2, 'Ringkasan singkat berita', 'Isi konten berita yang lengkap dan detail', 'draft'],
            ['Judul Berita 3', 1, 'Ringkasan singkat berita', 'Isi konten berita yang lengkap dan detail', 'archived'],
        ];
    }

    public function headings(): array
    {
        return [
            'Judul',
            'Kategori ID',
            'Ringkasan',
            'Konten',
            'Status (draft/published/archived)',
        ];
    }

    public function styles($sheet)
    {
        return [
            1 => [
                'font' => ['bold' => true, 'color' => ['rgb' => 'FFFFFF']],
                'fill' => ['fillType' => PatternFill::FILL_SOLID, 'startColor' => ['rgb' => '4F46E5']],
            ],
        ];
    }
}
