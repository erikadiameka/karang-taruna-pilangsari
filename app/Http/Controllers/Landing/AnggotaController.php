<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Anggota;

class AnggotaController extends Controller
{
    public function index()
    {
        $anggota = Anggota::where('status', 'aktif')->paginate(12);
        return view('anggota.index', compact('anggota'));
    }
}
