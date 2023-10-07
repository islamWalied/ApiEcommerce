<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'islam.walied',
            'email' => 'islam.walied96@gmail.com',
            'address' => 'dekernis',
            'phone' => '01019667076',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'is_admin' => 1,
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'name' => 'ehab mohamed',
            'email' => 'ehabmah6969@gmail.com',
            'address' => 'elMahala',
            'phone' => '01123242977',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'is_admin' => 1,
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'address' => 'unknown',
            'phone' => '0000000000',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'is_admin' => 0,
            'remember_token' => Str::random(10),
        ]);
    }
}
