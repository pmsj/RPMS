<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('province')->insert([
            'province_name' => 'Ranchi',
            'province_abbreviation' => 'RAN'
        ]);

        DB::table('province')->insert([
            'province_name' => 'Chennai',
            'province_abbreviation' => 'CHE'
        ]);

        DB::table('province')->insert([
            'province_name' => 'Madurai',
            'province_abbreviation' => 'MUD'
        ]);

        DB::table('province')->insert([
            'province_name' => 'Patna',
            'province_abbreviation' => 'PAT'
        ]);
        DB::table('province')->insert([
            'province_name' => 'Mumbai',
            'province_abbreviation' => 'MUM'
        ]);


        DB::table('province')->insert([
            'province_name' => 'Chhattisgarh',
            'province_abbreviation' => 'CHAT'
        ]);

        DB::table('province')->insert([
            'province_name' => 'Goa',
            'province_abbreviation' => 'GOA'
        ]);

        DB::table('province')->insert([
            'province_name' => 'Karnataka',
            'province_abbreviation' => 'KAR'
        ]);
        DB::table('province')->insert([
            'province_name' => 'Kerala',
            'province_abbreviation' => 'KER'
        ]);

        DB::table('province')->insert([
            'province_name' => 'Darjeeling',
            'province_abbreviation' => 'DAR'
        ]);

        DB::table('province')->insert([
            'province_name' => 'Kohima',
            'province_abbreviation' => 'KOH'
        ]);
        DB::table('province')->insert([
            'province_name' => 'Andhara',
            'province_abbreviation' => 'AND'
        ]);
    }
}
