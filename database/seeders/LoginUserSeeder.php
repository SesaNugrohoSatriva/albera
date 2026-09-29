<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class LoginUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => env('ALBERA_LOGIN_EMAIL', 'admin@albera.test')],
            [
                'name' => env('ALBERA_LOGIN_NAME', 'Admin ALBERA'),
                'password' => env('ALBERA_LOGIN_PASSWORD', 'password'),
            ],
        );
    }
}