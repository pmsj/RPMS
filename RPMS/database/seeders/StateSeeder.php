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
            'state_name' => 'Andhara Pradesh',
        ]);

        DB::table('state')->insert([
            'state_name' => 'Tamil Nadu',
        ]);

        DB::table('state')->insert([
            'state_name' => 'Kernataka',
        ]);
        DB::table('state')->insert([
            'state_name' => 'Mumbai',
        ]);
    }
}
