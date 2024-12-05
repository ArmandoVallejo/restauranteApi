<?php

namespace Database\Seeders\User;

use App\Models\User\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            'email' => 'test@gmail.com', 'password' => Hash::make('12345678'), 'name' => 'Test User'
        ];

        User::create($user);
    }
}
