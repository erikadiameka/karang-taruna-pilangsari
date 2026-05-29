<?php
Class AdminDokumentasiController

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dokumentasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DokumentasiController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        $kategori = $request->query('kategori');

        $query = Dokumentasi::with('user')->latest();

        if ($search) {
            $query->where('judul', 'like', '%' . $search . '%');
        }

        if ($kategori) {
            $query->where('kategori', $kategori);
        }

        $dokumentasi = $query->paginate(10)->withQueryString();

        return view('admin.dokumentasi.index', compact('dokumentasi', 'search', 'kategori'));
    }

    public function create()
    {
        return view('admin.dokumentasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|in:ad_art,proker,struktur,panduan,lainnya',
            'tipe' => 'required|in:foto,video,dokumen',
            'file_path' => 'required|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,zip,png,jpg,jpeg,webp,mp4|max:10240',
            'deskripsi' => 'nullable|string',
        ]);

        $path = $request->file('file_path')->store('dokumentasi', 'public');

        Dokumentasi::create([
            'user_id' => auth()->id(),
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            'tipe' => $request->tipe,
            'file_path' => $path,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('admin.dokumentasi.index')->with('success', 'Dokumen berhasil ditambahkan!');
    }

    public function edit(Dokumentasi $dokumentasi)
    {
        return view('admin.dokumentasi.edit', compact('dokumentasi'));
    }

    public function update(Request $request, Dokumentasi $dokumentasi)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|in:ad_art,proker,struktur,panduan,lainnya',
            'tipe' => 'required|in:foto,video,dokumen',
            'file_path' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,zip,png,jpg,jpeg,webp,mp4|max:10240',
            'deskripsi' => 'nullable|string',
        ]);

        $data = [
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            'tipe' => $request->tipe,
            'deskripsi' => $request->deskripsi,
        ];

        if ($request->hasFile('file_path')) {
            // Delete old file
            if ($dokumentasi->file_path && Storage::disk('public')->exists($dokumentasi->file_path)) {
                Storage::disk('public')->delete($dokumentasi->file_path);
            }
            // Store new file
            $data['file_path'] = $request->file('file_path')->store('dokumentasi', 'public');
        }

        $dokumentasi->update($data);

        return redirect()->route('admin.dokumentasi.index')->with('success', 'Dokumen berhasil diperbarui!');
    }

    public function destroy(Dokumentasi $dokumentasi)
    {
        if ($dokumentasi->file_path && Storage::disk('public')->exists($dokumentasi->file_path)) {
            Storage::disk('public')->delete($dokumentasi->file_path);
        }

        $dokumentasi->delete();

        return redirect()->route('admin.dokumentasi.index')->with('success', 'Dokumen berhasil dihapus!');
    }
}
