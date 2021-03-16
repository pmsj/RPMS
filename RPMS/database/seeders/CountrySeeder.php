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
    }
}
