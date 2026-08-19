<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Usuario Admin
        User::create([
            'name' => 'Administrador',
            'email' => 'jose@farmacoft.com',
            'password' => Hash::make('12345678'),
            'role' => 'admin',
        ]);

        // Usuario Cliente
        User::create([
            'name' => 'Cliente',
            'email' => 'fernando@farmacoft.com',
            'password' => Hash::make('12345678'),
            'role' => 'cliente',
        ]);
    }
}