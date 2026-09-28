<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use InvalidArgumentException;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $email = config('albera.admin.email');
        $password = config('albera.admin.password');

        if (! is_string($email) || ! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException('Set ALBERA_ADMIN_EMAIL ke alamat email yang valid sebelum menjalankan AdminUserSeeder.');
        }

        if (! is_string($password) || mb_strlen($password) < 12) {
            throw new InvalidArgumentException('Set ALBERA_ADMIN_PASSWORD dengan minimal 12 karakter sebelum menjalankan AdminUserSeeder.');
        }

        $admin = User::firstOrNew(['email' => $email]);

        if (! $admin->exists) {
            $admin->name = config('albera.admin.name', 'Admin ALBERA');
            $admin->password = $password;
        }

        $admin->is_admin = true;
        $admin->save();
    }
}
