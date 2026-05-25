<?php
// File untuk run seeder dari terminal
require 'bootstrap/app.php';

$app = app();
$kernel = $app->make(\Illuminate\Contracts\Console\Kernel::class);

$status = $kernel->handle(
    $input = new \Symfony\Component\Console\Input\ArrayInput([
        'command' => 'db:seed',
        '--class' => 'AnggotaSeeder',
    ]),
    $output = new \Symfony\Component\Console\Output\BufferedOutput
);

echo $output->fetch();
echo "Seeder executed with status: " . $status . "\n";
