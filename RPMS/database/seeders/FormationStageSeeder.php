<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FormationStageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('formation_stages')->insert([
            'stage_name' => 'Novitiate',
            'stage_description' => 'Spiritual Foundation. Power House',
            'stage_duration' => '2 Years', 
        ]);

        DB::table('formation_stages')->insert([
            'stage_name' => 'Juniorate',
            'stage_description' => 'Preparation for college and holistic intigration.',
            'stage_duration' => '1 Year', 
        ]);

        DB::table('formation_stages')->insert([
            'stage_name' => 'Graduation',
            'stage_description' => 'Time for colllege studies',
            'stage_duration' => '3 Years', 
        ]);
        DB::table('formation_stages')->insert([
            'stage_name' => 'Philosophy',
            'stage_description' => 'Time to Deepen the understnading of God and life',
            'stage_duration' => '2 years', 
        ]);
        DB::table('formation_stages')->insert([
            'stage_name' => 'Regency',
            'stage_description' => 'Stage to have a taste of real ministry',
            'stage_duration' => '2 Year', 
        ]);
        DB::table('formation_stages')->insert([
            'stage_name' => 'Post Graduation',
            'stage_description' => 'Time for Higher Studies',
            'stage_duration' => '2 Years', 
        ]);
        DB::table('formation_stages')->insert([
            'stage_name' => 'Theology',
            'stage_description' => 'Stage for the preparation of Priesthood',
            'stage_duration' => '4 Years', 
        ]);
        
    }
}
