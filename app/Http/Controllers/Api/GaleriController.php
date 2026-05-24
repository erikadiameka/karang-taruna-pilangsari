<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Galeri;

class GaleriController extends Controller
{
    public function index()
    {
        $galeri = Galeri::where('tipe', 'foto')->latest()->paginate(12);
        return response()->json([
            'status' => 'success',
            'data' => $galeri
        ]);
    }
}
