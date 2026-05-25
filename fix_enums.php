<?php
$file = __DIR__ . '/database/seeders/AnggotaSeeder.php';
$content = file_get_contents($file);

// Replace all remaining occurrences
$content = str_replace("'jenis_kelamin' => 'Laki-laki'", "'jenis_kelamin' => 'L'", $content);
$content = str_replace("'jenis_kelamin' => 'Perempuan'", "'jenis_kelamin' => 'P'", $content);

file_put_contents($file, $content);
echo "✓ AnggotaSeeder.php fixed!\n";
?>
