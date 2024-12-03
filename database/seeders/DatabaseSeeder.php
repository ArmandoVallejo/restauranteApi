<?php

namespace Database\Seeders;

use App\Models\Category\Category;
use App\Models\User;
use Database\Seeders\Addresses\AddressesSeeder;
use Database\Seeders\Category\CategorySeeder;
use Database\Seeders\User\UserSeeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([UserSeeder::class]);
        $this->call([AddressesSeeder::class]);
        $this->call([CategorySeeder::class]);
    }
}
