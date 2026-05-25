#!/usr/bin/env php
<?php
/**
 * Anggota Seeder Verification & Execution
 * Run this script to verify database connection and execute seeder
 */

require __DIR__ . '/bootstrap/app.php';

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

echo "\n╔════════════════════════════════════════════════════════╗\n";
echo "║ KARANG TARUNA ANGGOTA SEEDER VERIFICATION & EXECUTION ║\n";
echo "╚════════════════════════════════════════════════════════╝\n\n";

$app = app();

// Step 1: Check database connection
echo "[1/4] Checking database connection... ";
try {
    $app->make('db')->connection()->getPdo();
    echo "✓ Connected\n";
} catch (\Exception $e) {
    echo "✗ Failed\n";
    echo "  Error: " . $e->getMessage() . "\n";
    exit(1);
}

// Step 2: Check if anggota table exists
echo "[2/4] Checking anggota table... ";
try {
    if (Schema::hasTable('anggota')) {
        $count = DB::table('anggota')->count();
        echo "✓ Exists ($count records)\n";
    } else {
        echo "✗ Table does not exist\n";
        echo "  Please run migrations first: php artisan migrate\n";
        exit(1);
    }
} catch (\Exception $e) {
    echo "✗ Error checking table: " . $e->getMessage() . "\n";
    exit(1);
}

// Step 3: Clear existing data
echo "[3/4] Clearing existing anggota data... ";
try {
    DB::table('anggota')->truncate();
    echo "✓ Cleared\n";
} catch (\Exception $e) {
    echo "✗ Error: " . $e->getMessage() . "\n";
    exit(1);
}

// Step 4: Run seeder
echo "[4/4] Running AnggotaSeeder... ";
try {
    $seeder = new \Database\Seeders\AnggotaSeeder();
    $seeder->run();
    
    $totalCount = \App\Models\Anggota::count();
    $leaderCount = \App\Models\Anggota::whereIn('jabatan', ['Ketua', 'Wakil Ketua', 'Sekretaris I', 'Sekretaris II', 'Bendahara I', 'Bendahara II'])->count();
    $divisionCount = \App\Models\Anggota::whereNotNull('divisi')->groupBy('divisi')->count('divisi');
    $divisionMembers = \App\Models\Anggota::whereNotNull('divisi')->count();
    
    echo "✓ Seeded\n\n";
    
    echo "════════════════════════════════════════════════════════\n";
    echo "✓ SUCCESS! Seeding completed\n";
    echo "════════════════════════════════════════════════════════\n\n";
    
    echo "Summary:\n";
    echo "  Total Members:         $totalCount\n";
    echo "  Leadership Members:    $leaderCount\n";
    echo "  Active Divisions:      $divisionCount\n";
    echo "  Division Members:      $divisionMembers\n\n";
    
    echo "Leadership Roles:\n";
    $leaders = \App\Models\Anggota::whereIn('jabatan', ['Ketua', 'Wakil Ketua', 'Sekretaris I', 'Sekretaris II', 'Bendahara I', 'Bendahara II'])->get();
    foreach ($leaders as $leader) {
        echo "  • " . str_pad($leader->jabatan, 20) . " : " . $leader->nama_lengkap . "\n";
    }
    
    echo "\nNext Step:\n";
    echo "  Visit: http://localhost:3000/anggota\n";
    echo "  You will see the organizational structure!\n\n";
    
} catch (\Exception $e) {
    echo "✗ Error\n";
    echo "  " . $e->getMessage() . "\n";
    if (config('app.debug')) {
        echo "\nStack trace:\n";
        echo $e->getTraceAsString() . "\n";
    }
    exit(1);
}
?>
