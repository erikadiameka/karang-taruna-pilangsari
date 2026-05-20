<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use App\Models\Kegiatan;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index()
    {
        $galeri = Galeri::with('kegiatan')->latest()->paginate(12);
        return view('admin.galeri.index', compact('galeri'));
    }
    public function create()
    {
        $kegiatan = Kegiatan::orderBy('nama')->get();
        return view('admin.galeri.create', compact('kegiatan'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'file_path' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
            'tipe' => 'required|in:foto,video',
            'kegiatan_id' => 'nullable|exists:kegiatans,id',
            'deskripsi' => 'nullable|string',
        ]);
        $path = $request->file('file_path')->store('galeri', 'public');
        Galeri::create([
            'judul' => $request->judul,
            'file_path' => $path,
            'tipe' => $request->tipe,
            'kegiatan_id' => $request->kegiatan_id,
            'deskripsi' => $request->deskripsi,
            'user_id' => auth()->id(),
            'is_featured' => $request->has('is_featured'),
        ]);
        return redirect()->route('admin.galeri.index')->with('success', 'Foto berhasil diupload!');
    }
    public function destroy(Galeri $galeri)
    {
        $galeri->delete();
        return back()->with('success', 'Foto berhasil dihapus!');
    }
}
