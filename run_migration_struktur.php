#!/usr/bin/env php
<?php

// Run migration and seeder for struktur organisasi
require_once __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);

$status = $kernel->call('migrate', [
    '--force' => true,
]);

if ($status === 0) {
    echo "\n✓ Migrations completed successfully.\n";
    
    // Run seeder
    $status = $kernel->call('db:seed', [
        '--class' => 'StrukturOrganisasiSeeder',
        '--force' => true,
    ]);
    
    if ($status === 0) {
        echo "✓ Seeder completed successfully.\n";
    } else {
        echo "✗ Seeder failed.\n";
    }
} else {
    echo "✗ Migration failed.\n";
}

exit($status);
