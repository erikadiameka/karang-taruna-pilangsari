<?php

namespace App\Http\Controllers;

class SeederController extends Controller
{
    public function seed()
    {
        if (! app()->environment('local')) {
            return response()->json(['error' => 'Seeding only available in local environment'], 403);
        }

        try {
            $seeder = new \Database\Seeders\AnggotaSeeder();
            $seeder->run();
            
            return response()->json([
                'success' => true,
                'message' => 'Anggota seeder executed successfully',
                'total' => \App\Models\Anggota::count()
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
