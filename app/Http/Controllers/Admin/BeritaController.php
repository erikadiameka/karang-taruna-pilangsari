<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\KategoriBerita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::with('kategori', 'penulis')->latest()->paginate(10);
        return view('admin.berita.index', compact('berita'));
    }

    public function create()
    {
        $kategori = KategoriBerita::all();
        return view('admin.berita.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'kategori_berita_id' => 'required|exists:kategori_beritas,id',
            'ringkasan' => 'nullable|string|max:500',
            'konten' => 'required|string',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'required|in:draft,published,archived',
        ]);

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('berita', 'public');
        }

        $validated['user_id'] = auth()->id();
        $validated['slug'] = Str::slug($validated['judul']) . '-' . time();

        if ($validated['status'] === 'published') {
            $validated['published_at'] = now();
        }

        Berita::create($validated);
        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan!');
    }

    public function edit(Berita $berita)
    {
        $kategori = KategoriBerita::all();
        return view('admin.berita.edit', compact('berita', 'kategori'));
    }

    public function update(Request $request, Berita $berita)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'kategori_berita_id' => 'required|exists:kategori_beritas,id',
            'ringkasan' => 'nullable|string|max:500',
            'konten' => 'required|string',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'required|in:draft,published,archived',
        ]);

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('berita', 'public');
        }

        if ($validated['status'] === 'published' && !$berita->published_at) {
            $validated['published_at'] = now();
        }

        $berita->update($validated);
        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui!');
    }

    public function destroy(Berita $berita)
    {
        $berita->delete();
        return back()->with('success', 'Berita berhasil dihapus!');
    }

    public function importForm()
    {
        $kategori = KategoriBerita::all();
        return view('admin.berita.import', compact('kategori'));
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
        
        // If Excel file, convert to CSV first
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
                // Skip empty rows
                if (empty($row) || count($row) < 5 || empty($row[0])) {
                    continue;
                }

                $data = [
                    'judul' => trim($row[0]),
                    'kategori_berita_id' => trim($row[1]),
                    'ringkasan' => trim($row[2]),
                    'konten' => trim($row[3]),
                    'status' => trim($row[4]),
                ];

                $validator = \Validator::make($data, [
                    'judul' => 'required|string|max:255',
                    'kategori_berita_id' => 'required|exists:kategori_beritas,id',
                    'ringkasan' => 'nullable|string|max:500',
                    'konten' => 'required|string',
                    'status' => 'required|in:draft,published,archived',
                ]);

                if ($validator->fails()) {
                    $errors[] = "Baris $rowNum: " . implode(', ', $validator->errors()->all());
                    continue;
                }

                $data['user_id'] = auth()->id();
                $data['slug'] = Str::slug($data['judul']) . '-' . time();
                
                if ($data['status'] === 'published') {
                    $data['published_at'] = now();
                }

                Berita::create($data);
                $successCount++;
            } catch (\Exception $e) {
                $errors[] = "Baris $rowNum: " . $e->getMessage();
            }
        }

        if ($errors) {
            return back()->with('warning', "Berhasil import $successCount berita. Ada " . count($errors) . " error: " . implode(' | ', array_slice($errors, 0, 5)));
        }

        return redirect()->route('admin.berita.index')->with('success', "Berhasil import $successCount berita!");
    }

    private function readCsvFile($filePath)
    {
        $rows = [];
        $handle = fopen($filePath, 'r');
        
        while (($row = fgetcsv($handle)) !== false) {
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
        $csv = "judul,kategori_berita_id,ringkasan,konten,status\n";
        $csv .= "Judul Berita 1,1,Ringkasan singkat berita,Isi konten berita yang lengkap dan detail,published\n";
        $csv .= "Judul Berita 2,2,Ringkasan singkat berita,Isi konten berita yang lengkap dan detail,draft\n";
        $csv .= "Judul Berita 3,1,Ringkasan singkat berita,Isi konten berita yang lengkap dan detail,archived\n";

        return response()->streamDownload(
            function () use ($csv) {
                echo $csv;
            },
            'template-berita.csv',
            [
                'Content-Type' => 'text/csv; charset=utf-8',
                'Content-Disposition' => 'attachment; filename="template-berita.csv"'
            ]
        );
    }
}
