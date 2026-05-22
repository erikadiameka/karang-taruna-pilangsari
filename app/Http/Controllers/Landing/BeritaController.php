<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Berita;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::where('status', 'published')->latest()->paginate(9);
        return view('berita.index', compact('berita'));
    }
    public function show($slug)
    {
        $berita = Berita::where('slug', $slug)->firstOrFail();
        $berita->incrementViews();
        return view('berita.show', compact('berita'));
    }
}
