<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    public function index()
    {
        $pengumuman = Pengumuman::latest()->paginate(10);
        return view('admin.pengumuman.index', compact('pengumuman'));
    }
    public function create()
    {
        return view('admin.pengumuman.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'prioritas' => 'required|in:rendah,sedang,tinggi',
            'expired_at' => 'nullable|date',
        ]);
        Pengumuman::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'prioritas' => $request->prioritas,
            'expired_at' => $request->expired_at,
            'is_active' => $request->has('is_active'),
            'user_id' => auth()->id(),
        ]);
        return redirect()->route('admin.pengumuman.index')->with('success', 'Pengumuman berhasil ditambahkan!');
    }
    public function edit(Pengumuman $pengumuman)
    {
        return view('admin.pengumuman.edit', compact('pengumuman'));
    }
    public function update(Request $request, Pengumuman $pengumuman)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'prioritas' => 'required|in:rendah,sedang,tinggi',
            'expired_at' => 'nullable|date',
        ]);
        $pengumuman->update([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'prioritas' => $request->prioritas,
            'expired_at' => $request->expired_at,
            'is_active' => $request->has('is_active'),
        ]);
        return redirect()->route('admin.pengumuman.index')->with('success', 'Pengumuman berhasil diperbarui!');
    }
    public function destroy(Pengumuman $pengumuman)
    {
        $pengumuman->delete();
        return back()->with('success', 'Pengumuman berhasil dihapus!');
    }
}
