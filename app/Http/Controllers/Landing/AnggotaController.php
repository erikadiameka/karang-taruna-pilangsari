<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

        // Untuk Tab Daftar Anggota (Flat Grid)
        $query = Anggota::where('status', 'aktif');
        if ($search) {
            $query->where('nama_lengkap', 'like', '%' . $search . '%');
        }
        $anggotaList = $query->paginate(12)->withQueryString();

        // Untuk Tab Bagan Struktur Organisasi (Memerlukan semua anggota aktif)
        $allAnggota = Anggota::where('status', 'aktif')->get();

        // Cari Ketua (Case-insensitive matching)
        $ketua = $allAnggota->first(fn($a) => strtolower($a->jabatan ?? '') === 'ketua');

        // Cari Wakil Ketua
        $wakilKetua = $allAnggota->first(fn($a) => str_contains(strtolower($a->jabatan ?? ''), 'wakil ketua'));

        // Cari Sekretaris
        $sekretaris = $allAnggota->filter(fn($a) => str_contains(strtolower($a->jabatan ?? ''), 'sekretaris'));

        // Cari Bendahara
        $bendahara = $allAnggota->filter(fn($a) => str_contains(strtolower($a->jabatan ?? ''), 'bendahara'));

        // Cari Divisi
        $divisiList = ['Humas', 'Sosial', 'Ekonomi', 'Seni Budaya', 'Olahraga', 'Pendidikan'];
        $divisiMembers = [];

        foreach ($divisiList as $divisi) {
            $members = $allAnggota->filter(fn($a) => $a->divisi === $divisi);

            $koordinator = $members->first(fn($a) => 
                str_contains(strtolower($a->jabatan ?? ''), 'koordinator') || 
                str_contains(strtolower($a->jabatan ?? ''), 'ketua divisi') || 
                str_contains(strtolower($a->jabatan ?? ''), 'kepala divisi')
            );

            // Anggota divisi selain koordinator
            $regularMembers = $members->filter(fn($a) => $a->id !== ($koordinator->id ?? null));

            $divisiMembers[$divisi] = [
                'koordinator' => $koordinator,
                'anggota' => $regularMembers
            ];
        }

        // Hitung ID anggota yang sudah masuk struktur inti dan divisi
        $coreIds = collect([$ketua, $wakilKetua])->filter()->pluck('id')
            ->concat($sekretaris->pluck('id'))
            ->concat($bendahara->pluck('id'));

        $divisionMemberIds = collect();
        foreach ($divisiMembers as $div) {
            if ($div['koordinator']) $divisionMemberIds->push($div['koordinator']->id);
            $divisionMemberIds = $divisionMemberIds->concat($div['anggota']->pluck('id'));
        }

        $excludedIds = $coreIds->concat($divisionMemberIds)->unique();
        // Sisa anggota yang tidak masuk bagan hierarki
        $anggotaLain = $allAnggota->filter(fn($a) => !$excludedIds->contains($a->id));

        return view('anggota.index', compact(
            'anggotaList',
            'ketua',
            'wakilKetua',
            'sekretaris',
            'bendahara',
            'divisiMembers',
            'anggotaLain',
            'search'
        ));
    }
}
