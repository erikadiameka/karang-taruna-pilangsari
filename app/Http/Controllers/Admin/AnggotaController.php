<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function index()
    {
        $anggota = Anggota::latest()->paginate(10);
        return view('admin.anggota.index', compact('anggota'));
    }
    public function create()
    {
        return view('admin.anggota.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nik' => 'required|string|size:16|unique:anggota',
            'no_hp' => 'nullable|string|max:15',
            'alamat' => 'nullable|string',
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'required|in:L,P',
            'jabatan' => 'nullable|string',
            'divisi' => 'nullable|string',
            'tahun_masuk' => 'nullable|digits:4',
            'status' => 'required|in:aktif,tidak_aktif,alumni',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        $data = $request->except('foto');
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('anggota', 'public');
        }
        Anggota::create($data);
        return redirect()->route('admin.anggota.index')->with('success', 'Anggota berhasil ditambahkan!');
    }
    public function edit(Anggota $anggota)
    {
        return view('admin.anggota.edit', compact('anggota'));
    }
    public function update(Request $request, Anggota $anggota)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nik' => 'required|string|size:16|unique:anggota,nik,' . $anggota->id,
            'no_hp' => 'nullable|string|max:15',
            'jenis_kelamin' => 'required|in:L,P',
            'status' => 'required|in:aktif,tidak_aktif,alumni',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        $data = $request->except('foto');
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('anggota', 'public');
        }
        $anggota->update($data);
        return redirect()->route('admin.anggota.index')->with('success', 'Anggota berhasil diperbarui!');
    }
    public function destroy(Anggota $anggota)
    {
        $anggota->delete();
        return back()->with('success', 'Anggota berhasil dihapus!');
    }
}
