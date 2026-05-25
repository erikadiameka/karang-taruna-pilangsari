#!/usr/bin/env php
<?php

require __DIR__.'/bootstrap/app.php';

$app = make(\Illuminate\Contracts\Foundation\Application::class);

$kernel = $app->make(\Illuminate\Contracts\Console\Kernel::class);

$status = $kernel->call('db:seed', [
    '--class' => 'AnggotaSeeder',
]);

exit($status);
