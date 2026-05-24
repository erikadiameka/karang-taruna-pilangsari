<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Berita;

class BeritaController extends Controller {
    public function index() {
        $berita = Berita::with('kategori')
            ->where('status', 'published')
            ->latest()->paginate(10);
        return response()->json([
            'status' => 'success',
            'data' => $berita
        ]);
    }
    public function show($slug) {
        $berita = Berita::with('kategori', 'penulis')
            ->where('slug', $slug)->firstOrFail();
        return response()->json([
            'status' => 'success',
            'data' => $berita
        ]);
    }
}