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
}
