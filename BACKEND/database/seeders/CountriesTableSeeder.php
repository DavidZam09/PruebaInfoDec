<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Country;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::create([
            'name' => 'Inglaterra',
            'currency' => 'GBP',
            'currency_symbol' => '£',
            'cities' => json_encode(['Londres', 'Manchester']),
        ]);
    }
}
