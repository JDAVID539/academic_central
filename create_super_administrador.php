<?php

use Illuminate\Support\Facades\Hash;
use App\Models\super_administrador;

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$superAdmin = super_administrador::create([
    'name' => 'Super Admin',
    'email' => 'superadmin@example.com',
    'password' => Hash::make('password123'),
    'phone' => '1234567890',
    'address' => 'Admin Address',
    'city' => 'Admin City',
    
]);

echo "Super administrador creado con éxito.\n";
