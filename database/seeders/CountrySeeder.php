<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = [
            ['name' => 'USA', 'code' => 'US'],
            ['name' => 'UK', 'code' => 'GB'],
            ['name' => 'Turkey', 'code' => 'TR'],
            ['name' => 'Russia', 'code' => 'RU'],
        ];

        foreach ($countries as $country) {
            Country::create($country);
        }
    }
}
