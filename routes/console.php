<?php

use App\Models\User;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('create:user', function () {
    /** @var User $admin */
    $admin = User::updateOrCreate([
        'name' => 'Admin',
        'role' => 'admin',
    ], [
        'name' => 'Admin',
        'role' => 'admin',
    ]);

    $token = $admin->createToken('admin', ['view-all', 'crud']);

    echo "Admin token: {$token->plainTextToken}" . PHP_EOL;

    /** @var User $user */
    $company = User::updateOrCreate([
        'name' => 'Company',
        'role' => 'company',
    ], [
        'name' => 'Company',
        'role' => 'company',
    ]);

    $token = $company->createToken('company', ['view-related', 'edit']);

    echo "Company token: {$token->plainTextToken}" . PHP_EOL;
})->describe('Create users');
