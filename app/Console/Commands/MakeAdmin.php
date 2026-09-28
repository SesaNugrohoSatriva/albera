<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class MakeAdmin extends Command
{
    protected $signature = 'albera:make-admin {email : Email akun yang akan diberi akses admin}';

    protected $description = 'Memberikan akses admin kepada akun yang sudah terdaftar';

    public function handle(): int
    {
        $user = User::where('email', $this->argument('email'))->first();

        if (! $user) {
            $this->error('Akun tidak ditemukan. Daftarkan akun terlebih dahulu.');

            return self::FAILURE;
        }

        $user->update(['is_admin' => true]);
        $this->info("{$user->email} sekarang memiliki akses admin.");

        return self::SUCCESS;
    }
}
