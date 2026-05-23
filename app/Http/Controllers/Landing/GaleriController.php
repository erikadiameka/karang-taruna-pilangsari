<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Galeri;

class GaleriController extends Controller
{
    public function index()
    {
        $galeri = Galeri::where('tipe', 'foto')->latest()->paginate(12);
        return view('galeri.index', compact('galeri'));
    }
}
