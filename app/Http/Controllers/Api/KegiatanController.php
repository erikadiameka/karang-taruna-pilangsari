<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;

class KegiatanController extends Controller
{
    public function index()
    {
        $kegiatan = Kegiatan::latest()->paginate(10);
        return response()->json([
            'status' => 'success',
            'data' => $kegiatan
        ]);
    }
    public function show($slug)
    {
        $kegiatan = Kegiatan::where('slug', $slug)->firstOrFail();
        return response()->json([
            'status' => 'success',
            'data' => $kegiatan
        ]);
    }
}
