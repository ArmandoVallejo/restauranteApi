<?php

namespace Database\Seeders;


use Database\Seeders\Addresses\AddressesSeeder;
use Database\Seeders\Category\CategorySeeder;
use Database\Seeders\User\UserSeeder;
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
