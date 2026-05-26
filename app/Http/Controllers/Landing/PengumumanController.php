<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    public function index()
    {
        $pengumumans = Pengumuman::where('is_active', true)
            ->whereNull('expired_at')
            ->orWhere('expired_at', '>', now())
            ->orderBy('prioritas', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('landing.pengumuman', compact('pengumumans'));
    }

    public function show($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);
        
        return view('landing.pengumuman-detail', compact('pengumuman'));
    }
}
