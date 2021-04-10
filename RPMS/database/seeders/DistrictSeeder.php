<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use App\Models\Backend\District;
use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        
        DB::table('district')->insert([
            'district_name' => 'Gumla'
        ]);

        DB::table('district')->insert([
            'district_name' => 'Simdega'
        ]);

        DB::table('district')->insert([
            'district_name' => 'Khunti'
        ]);

        DB::table('district')->insert([
            'district_name' => 'Lohardaga'
        ]);
        DB::table('district')->insert([
            'district_name' => 'Palamu'
        ]);
        DB::table('district')->insert([
            'district_name' => 'Dumka'
        ]);
       
        DB::table('district')->insert([
            'district_name' => 'Godda'
        ]);

        DB::table('district')->insert([
            'district_name' => 'Tiruchirappalli'
        ]);
        DB::table('district')->insert([
            'district_name' => 'Chennai'
        ]);
        DB::table('district')->insert([
            'district_name' => 'Guntur'
        ]);

        DB::table('district')->insert([
            'district_name' => 'Visakhapatnam'
        ]);
        DB::table('district')->insert([
            'district_name' => 'Bijapur'
        ]);
        DB::table('district')->insert([
            'district_name' => 'Chitradurga'
        ]);
       
       
    }
}
