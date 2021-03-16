<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use App\Models\District;
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
            'district_name' => 'Chennai'
        ]);
        DB::table('district')->insert([
            'district_name' => 'Trichy'
        ]);
       
        DB::table('district')->insert([
            'district_name' => 'Kazakuttam'
        ]);
       
    }
}
