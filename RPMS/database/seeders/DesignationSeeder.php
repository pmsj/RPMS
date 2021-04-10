<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('designations')->insert([
            'designation_name' => 'Provincial',
            'designation_abbreviation' => 'Prov',
        ]);

        DB::table('designations')->insert([
            'designation_name' => 'Province Treasurer',
            'designation_abbreviation' => 'PT',
        ]);
        DB::table('designations')->insert([
            'designation_name' => 'Province Consulter',
            'designation_abbreviation' => 'PC',
        ]);

        DB::table('designations')->insert([
            'designation_name' => 'Principal',
            'designation_abbreviation' => 'P',
        ]);
        DB::table('designations')->insert([
            'designation_name' => 'Vice Principal',
            'designation_abbreviation' => 'VP',
        ]);
        DB::table('designations')->insert([
            'designation_name' => 'Head Master',
            'designation_abbreviation' => 'H',
        ]);
        DB::table('designations')->insert([
            'designation_name' => 'Parish Priest',
            'designation_abbreviation' => 'PP',
        ]);

        DB::table('designations')->insert([
            'designation_name' => 'Assistant Parish Priest',
            'designation_abbreviation' => 'APP',
        ]);

        DB::table('designations')->insert([
            'designation_name' => 'Advocate ',
            'designation_abbreviation' => 'A',
        ]);

        DB::table('designations')->insert([
            'designation_name' => 'Social Worker ',
            'designation_abbreviation' => 'SW',
        ]);

        DB::table('designations')->insert([
            'designation_name' => 'Director',
            'designation_abbreviation' => 'D',
        ]);

        DB::table('designations')->insert([
            'designation_name' => 'Assistant Director',
            'designation_abbreviation' => 'AD',
        ]);
        DB::table('designations')->insert([
            'designation_name' => 'Regent',
            'designation_abbreviation' => 'Reg',
        ]);


        DB::table('designations')->insert([
            'designation_name' => 'Treasurer ',
            'designation_abbreviation' => 'T',
        ]);

      
        DB::table('designations')->insert([
            'designation_name' => 'Minister',
            'designation_abbreviation' => 'M',
        ]);
        
        DB::table('designations')->insert([
            'designation_name' => 'Superior',
            'designation_abbreviation' => 'S',
        ]);

        DB::table('designations')->insert([
            'designation_name' => 'Rector',
            'designation_abbreviation' => 'R',
        ]);

       

    }
}
