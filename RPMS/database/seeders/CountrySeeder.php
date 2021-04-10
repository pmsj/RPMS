<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('country')->insert([
            'country_name' => 'India',
            'country_abbreviation' => 'IND',
        ]);

        DB::table('country')->insert([
            'country_name' => 'France',
            'country_abbreviation' => 'FRA',
        ]);

        DB::table('country')->insert([
            'country_name' => 'China',
            'country_abbreviation' => 'CHN',
        ]);

        DB::table('country')->insert([
            'country_name' => 'Germany',
            'country_abbreviation' => 'GER',
        ]);


        DB::table('country')->insert([
            'country_name' => 'Belgium',
            'country_abbreviation' => 'BE',
        ]);
        DB::table('country')->insert([
            'country_name' => 'Brazil',
            'country_abbreviation' => 'BR',
        ]);
        DB::table('country')->insert([
            'country_name' => 'Italy',
            'country_abbreviation' => 'IT',
        ]);
        DB::table('country')->insert([
            'country_name' => 'East Timor',
            'country_abbreviation' => 'TP',
        ]);
        DB::table('country')->insert([
            'country_name' => 'United Kingdom',
            'country_abbreviation' => 'UK',
        ]);
        DB::table('country')->insert([
            'country_name' => 'United States',
            'country_abbreviation' => 'US',
        ]);
    }
}
