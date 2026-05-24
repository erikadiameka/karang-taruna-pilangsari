<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Anggota;

class AnggotaController extends Controller
{
    public function index()
    {
        $anggota = Anggota::where('status', 'aktif')->paginate(10);
        return response()->json([
            'status' => 'success',
            'data' => $anggota
        ]);
    }
}
