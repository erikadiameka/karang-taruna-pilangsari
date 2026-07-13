<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KegiatanController extends Controller
{
    public function index()
    {
        $kegiatan = Kegiatan::latest()->paginate(10);
        return view('admin.kegiatan.index', compact('kegiatan'));
    }
    public function create()
    {
        return view('admin.kegiatan.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'lokasi' => 'required|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date',
            'status' => 'required|in:akan_datang,berlangsung,selesai',
            'kategori' => 'required|string',
            'peserta' => 'nullable|integer',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);
        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('kegiatan', 'public');
        }
        $validated['user_id'] = auth()->id();
        $validated['slug'] = Str::slug($validated['nama']) . '-' . time();
        Kegiatan::create($validated);
        return redirect()->route('admin.kegiatan.index')->with('success', 'Kegiatan berhasil ditambahkan!');
    }
    public function edit(Kegiatan $kegiatan)
    {
        return view('admin.kegiatan.edit', compact('kegiatan'));
    }
    public function update(Request $request, Kegiatan $kegiatan)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'lokasi' => 'required|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date',
            'status' => 'required|in:akan_datang,berlangsung,selesai',
            'kategori' => 'required|string',
            'peserta' => 'nullable|integer',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);
        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('kegiatan', 'public');
        }
        $kegiatan->update($validated);
        return redirect()->route('admin.kegiatan.index')->with('success', 'Kegiatan berhasil diperbarui!');
    }
    public function destroy(Kegiatan $kegiatan)
    {
        $kegiatan->delete();
        return back()->with('success', 'Kegiatan berhasil dihapus!');
    }

    public function importForm()
    {
        return view('admin.kegiatan.import');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:csv,txt,xlsx,xls|max:5120',
        ]);

        $file = $request->file('file');
        $filePath = $file->getRealPath();
        
        // Detect file type
        $ext = strtolower($file->getClientOriginalExtension());
        
        // If Excel file, convert to array first
        if ($ext === 'xlsx' || $ext === 'xls') {
            $rows = $this->readExcelFile($filePath);
        } else {
            // Read CSV file
            $rows = $this->readCsvFile($filePath);
        }

        $errors = [];
        $successCount = 0;
        $rowNum = 1;

        foreach ($rows as $row) {
            $rowNum++;
            
            try {
                // Skip empty rows - need at least 8 columns
                if (empty($row) || count($row) < 8 || empty($row[0])) {
                    continue;
                }

                $data = [
                    'nama' => trim($row[0]),
                    'kategori' => trim($row[1]),
                    'deskripsi' => trim($row[2]),
                    'lokasi' => trim($row[3]),
                    'tanggal_mulai' => trim($row[4]),
                    'tanggal_selesai' => trim($row[5]),
                    'status' => trim($row[6]),
                    'peserta' => intval($row[7]),
                ];

                $validator = \Validator::make($data, [
                    'nama' => 'required|string|max:255',
                    'kategori' => 'required|string',
                    'deskripsi' => 'required|string',
                    'lokasi' => 'required|string',
                    'tanggal_mulai' => 'required|date',
                    'tanggal_selesai' => 'nullable|date',
                    'status' => 'required|in:akan_datang,berlangsung,selesai',
                    'peserta' => 'nullable|integer',
                ]);

                if ($validator->fails()) {
                    $errors[] = "Baris $rowNum: " . implode(', ', $validator->errors()->all());
                    continue;
                }

                $data['user_id'] = auth()->id();
                $data['slug'] = Str::slug($data['nama']) . '-' . time();

                Kegiatan::create($data);
                $successCount++;
            } catch (\Exception $e) {
                $errors[] = "Baris $rowNum: " . $e->getMessage();
            }
        }

        if ($errors) {
            return back()->with('warning', "Berhasil import $successCount kegiatan. Ada " . count($errors) . " error: " . implode(' | ', array_slice($errors, 0, 5)));
        }

        return redirect()->route('admin.kegiatan.index')->with('success', "Berhasil import $successCount kegiatan!");
    }

    private function readCsvFile($filePath)
    {
        $rows = [];
        $handle = fopen($filePath, 'r');
        $isFirstRow = true;
        
        while (($row = fgetcsv($handle)) !== false) {
            // Skip header row
            if ($isFirstRow) {
                $isFirstRow = false;
                continue;
            }
            $rows[] = $row;
        }
        
        fclose($handle);
        return $rows;
    }

    private function readExcelFile($filePath)
    {
        $rows = [];
        
        try {
            // Try using PHPOffice if available
            if (class_exists('\PhpOffice\PhpSpreadsheet\IOFactory')) {
                $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($filePath);
                $worksheet = $spreadsheet->getActiveSheet();
                
                foreach ($worksheet->getRowIterator(2) as $row) {
                    $cellIterator = $row->getCellIterator();
                    $cellIterator->setIterateOnlyExistingCells(false);
                    $rowData = [];
                    
                    foreach ($cellIterator as $cell) {
                        $rowData[] = $cell->getValue();
                    }
                    
                    if (!empty(array_filter($rowData))) {
                        $rows[] = $rowData;
                    }
                }
            } else {
                // Fallback: treat as CSV
                return $this->readCsvFile($filePath);
            }
        } catch (\Exception $e) {
            // Fallback to CSV reading
            return $this->readCsvFile($filePath);
        }
        
        return $rows;
    }

    public function downloadTemplate()
    {
        $csv = "nama,kategori,deskripsi,lokasi,tanggal_mulai,tanggal_selesai,status,peserta\n";
        $csv .= "Acara Sosial 1,Sosial,Deskripsi kegiatan sosial yang menarik,Lokasi Acara,2026-06-05 09:00,2026-06-05 17:00,akan_datang,50\n";
        $csv .= "Kegiatan Olahraga,Olahraga,Kegiatan olahraga untuk semua kalangan,Lapangan Umum,2026-06-10 15:00,2026-06-10 18:00,berlangsung,30\n";
        $csv .= "Acara Selesai,Pendidikan,Acara pendidikan yang sudah dilaksanakan,Aula Utama,2026-05-20 10:00,2026-05-20 14:00,selesai,100\n";

        return response()->streamDownload(
            function () use ($csv) {
                echo $csv;
            },
            'template-kegiatan.csv',
            [
                'Content-Type' => 'text/csv; charset=utf-8',
                'Content-Disposition' => 'attachment; filename="template-kegiatan.csv"'
            ]
        );
    }
}

public function import(Request $request) {
    $request->validate([
        'file' => 'required|mimes:xlsx,xls,csv|max:2048',
    ]);

    try {
        \Maatwebsite\Excel\Facades\Excel::import(
            new \App\Imports\KegiatanImport,
            $request->file('file')
        );
        return redirect()->route('admin.kegiatan.index')
            ->with('success', 'Data kegiatan berhasil diimport!');
    } catch (\Exception $e) {
        return back()->with('error', 'Gagal import: ' . $e->getMessage());
    }
}
