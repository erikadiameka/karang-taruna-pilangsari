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

        // ===== STRUKTUR INTI =====
        // Cari Ketua
        $ketua = $allAnggota->first(fn($a) => $a->posisi_inti === 'Ketua');

        // Cari Wakil Ketua
        $wakilKetua = $allAnggota->first(fn($a) => $a->posisi_inti === 'Wakil Ketua');

        // Cari Sekretaris (1 & 2)
        $sekretaris = $allAnggota->filter(fn($a) => in_array($a->posisi_inti, ['Sekretaris 1', 'Sekretaris 2']));

        // Cari Bendahara (1 & 2)
        $bendahara = $allAnggota->filter(fn($a) => in_array($a->posisi_inti, ['Bendahara 1', 'Bendahara 2']));

        // ===== BIDANG BARU =====
        $bidangList = ['Humas dan Keamanan', 'Seni Kreatif dan Medafor', 'Keagamaan', 'Kepemudaan dan Olahraga'];
        $bidangMembers = [];

        foreach ($bidangList as $bidang) {
            $members = $allAnggota->filter(fn($a) => $a->divisi === $bidang);

            $koordinator = $members->first(fn($a) => 
                str_contains(strtolower($a->jabatan ?? ''), 'koordinator')
            );

            // Anggota bidang selain koordinator
            $regularMembers = $members->filter(fn($a) => $a->id !== ($koordinator->id ?? null));

            $bidangMembers[$bidang] = [
                'koordinator' => $koordinator,
                'anggota' => $regularMembers
            ];
        }

        // Hitung ID anggota yang sudah masuk struktur inti dan bidang
        $coreIds = collect([$ketua, $wakilKetua])->filter()->pluck('id')
            ->concat($sekretaris->pluck('id'))
            ->concat($bendahara->pluck('id'));

        $bidangMemberIds = collect();
        foreach ($bidangMembers as $bidang) {
            if ($bidang['koordinator']) $bidangMemberIds->push($bidang['koordinator']->id);
            $bidangMemberIds = $bidangMemberIds->concat($bidang['anggota']->pluck('id'));
        }

        $excludedIds = $coreIds->concat($bidangMemberIds)->unique();
        // Sisa anggota yang tidak masuk bagan hierarki
        $anggotaLain = $allAnggota->filter(fn($a) => !$excludedIds->contains($a->id));

        return view('anggota.index', compact(
            'anggotaList',
            'ketua',
            'wakilKetua',
            'sekretaris',
            'bendahara',
            'bidangMembers',
            'anggotaLain',
            'search'
        ));
    }
}
