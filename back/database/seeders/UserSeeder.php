<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory(1)->create([
            'name' => 'Test User',
            'email' => 'testuser@test.com',
            'password' => Hash::make('password'),
        ]);
    }
}
