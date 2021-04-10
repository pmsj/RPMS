<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('state')->insert([
            'state_name' => 'Jharkhand',
        ]);

        DB::table('state')->insert([
            'state_name' => 'Assam',
        ]);

        DB::table('state')->insert([
            'state_name' => 'Bihar',
        ]);

        DB::table('state')->insert([
            'state_name' => 'Gujarat',
        ]);
        DB::table('state')->insert([
            'state_name' => 'Mumbai',
        ]);


        DB::table('state')->insert([
            'state_name' => 'Chhattisgarh',
        ]);

        DB::table('state')->insert([
            'state_name' => 'Goa',
        ]);

        DB::table('state')->insert([
            'state_name' => 'Haryana',
        ]);


        DB::table('state')->insert([
            'state_name' => 'Karnataka',
        ]);
        DB::table('state')->insert([
            'state_name' => 'Kerala',
        ]);

        DB::table('state')->insert([
            'state_name' => 'Tamil Nadu',
        ]);

        DB::table('state')->insert([
            'state_name' => 'Telangana',
        ]);
        DB::table('state')->insert([
            'state_name' => 'West Bengal',
        ]);
    }
}
