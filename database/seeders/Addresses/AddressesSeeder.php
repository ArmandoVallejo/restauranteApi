<?php

namespace Database\Seeders\Addresses;

use App\Models\Addresses\Addresses;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddressesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $addresses = [
            ['address' => 'Calle 1', 'latitude' => '19.432608', 'longitude' => '-99.133209'],
        ];

        foreach ($addresses as $address) {
            Addresses::create($address);
        }
    }
}
