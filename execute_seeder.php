<?php
// Initialize Laravel application
require __DIR__ . '/bootstrap/app.php';

$app = app();

// Get database connection
$db = $app->make('db');

// Check if we can connect
try {
    $db->connection()->getPdo();
    echo "✓ Database connection successful\n";
} catch (\Exception $e) {
    echo "✗ Database connection failed: " . $e->getMessage() . "\n";
    exit(1);
}

// Clear existing data
try {
    $db->table('anggota')->truncate();
    echo "✓ Cleared existing anggota table\n";
} catch (\Exception $e) {
    echo "✓ Anggota table is empty or fresh\n";
}

// Run the seeder
try {
    $seeder = new \Database\Seeders\AnggotaSeeder();
    $seeder->run();
    
    $count = \App\Models\Anggota::count();
    echo "✓ Seeder executed successfully!\n";
    echo "✓ Total anggota created: $count\n";
    
    // Show summary
    $ketua_count = \App\Models\Anggota::where('jabatan', 'Ketua')->count();
    $divisi_count = \App\Models\Anggota::whereNotNull('divisi')->distinct('divisi')->count('divisi');
    
    echo "\nSummary:\n";
    echo "  - Leadership: " . \App\Models\Anggota::whereIn('jabatan', ['Ketua', 'Wakil Ketua', 'Sekretaris I', 'Sekretaris II', 'Bendahara I', 'Bendahara II'])->count() . "\n";
    echo "  - Divisions: $divisi_count\n";
    echo "  - Division members: " . \App\Models\Anggota::whereNotNull('divisi')->count() . "\n";
    
} catch (\Exception $e) {
    echo "✗ Error running seeder: " . $e->getMessage() . "\n";
    echo "  Stack trace:\n";
    echo $e->getTraceAsString() . "\n";
    exit(1);
}
?>
