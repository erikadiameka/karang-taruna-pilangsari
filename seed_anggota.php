<?php
// Fix jenis_kelamin enum values and run seeder
$file = __DIR__ . '/database/seeders/AnggotaSeeder.php';
$content = file_get_contents($file);

// Replace Laki-laki with L and Perempuan with P
$content = str_replace("'jenis_kelamin' => 'Laki-laki'", "'jenis_kelamin' => 'L'", $content);
$content = str_replace("'jenis_kelamin' => 'Perempuan'", "'jenis_kelamin' => 'P'", $content);

file_put_contents($file, $content);
echo "✓ Seeder updated with correct enum values\n\n";

// Load Laravel
require __DIR__ . '/bootstrap/app.php';
$app = app();

// Clear existing anggota data if needed
\Illuminate\Support\Facades\DB::table('anggota')->truncate();
echo "✓ Cleared existing anggota data\n";

// Run seeder
$seeder = new \Database\Seeders\AnggotaSeeder();
$seeder->run();

echo "✓ Anggota seeder executed successfully!\n";
echo "✓ Total anggota created: " . \App\Models\Anggota::count() . "\n";
