<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\KategoriBerita;

class BeritaController extends Controller
{
    public function index()
    {
        $query = Berita::with('kategori')->where('status', 'published');

        if (request('search')) {
            $query->where('judul', 'like', '%' . request('search') . '%');
        }

        if (request('kategori')) {
            $query->where('kategori_berita_id', request('kategori'));
        }

        $berita = $query->latest()->paginate(9)->withQueryString();
        $kategori = KategoriBerita::all();

        return view('berita.index', compact('berita', 'kategori'));
    }

    public function show($slug)
    {
        $berita = Berita::with('kategori', 'penulis')
            ->where('slug', $slug)->firstOrFail();
        $berita->incrementViews();
        return view('berita.show', compact('berita'));
    }
}
