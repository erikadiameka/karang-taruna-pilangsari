<?php

namespace Tests\Feature\Admin;

use App\Models\Anggota;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    public function test_dashboard_shows_compact_division_counts_for_active_members(): void
    {
        $admin = User::factory()->create([
            'role' => 'admin',
            'is_active' => true,
        ]);

        Anggota::create([
            'nama_lengkap' => 'Anggota Satu',
            'nik' => '3200000000000001',
            'divisi' => 'Humas dan Keamanan',
            'status' => 'aktif',
        ]);
        Anggota::create([
            'nama_lengkap' => 'Anggota Dua',
            'nik' => '3200000000000002',
            'divisi' => 'Humas dan Keamanan',
            'status' => 'aktif',
        ]);
        Anggota::create([
            'nama_lengkap' => 'Alumni',
            'nik' => '3200000000000003',
            'divisi' => 'Humas dan Keamanan',
            'status' => 'alumni',
        ]);
        Anggota::create([
            'nama_lengkap' => 'Tanpa Divisi',
            'nik' => '3200000000000004',
            'divisi' => null,
            'status' => 'aktif',
        ]);

        $this->actingAs($admin)
            ->get(route('admin.dashboard'))
            ->assertOk()
            ->assertSee('Humas dan Keamanan')
            ->assertSee('Belum ditentukan')
            ->assertSee('aria-label="2 anggota"', false)
            ->assertSee('aria-label="1 anggota"', false)
            ->assertSee('id="kegiatanChart"', false)
            ->assertSee('id="anggotaChart"', false);
    }
}
