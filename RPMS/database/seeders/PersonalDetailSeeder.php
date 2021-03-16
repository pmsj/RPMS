<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonalDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('personal_details')->insert([
        'user_id'=> '1',    
        'father' => 'Placidius Minj',
        'mother' => 'Nirmala Toppo',
        'siblings' => 'Pankaj, Priyanka, Sujata',
        'village_town_colony' => 'Kulmunda',
        'parish' => 'Majhatoli',
        'dioses' => 'Gumla',
        'district_id' => '1',
        'pincode' => '835207',
        'post_office' => 'Silam',
        'post_box_number' => '02',
        'state_id' => '1',
        'country_id' => '1',
        ]);

        DB::table('personal_details')->insert([
            'user_id' => '2',   
            'father' => 'Walter Minj',
            'mother' => 'Miliyani Toppo',
            'siblings' => 'Pankaj, Kanchan, Prabha',
            'village_town_colony' => 'Hargada',
            'parish' => 'Kapodih',
            'dioses' => 'Gumla',
            'district_id' => '1',
            'pincode' => '835205',
            'post_office' => 'kapodih',
            'post_box_number' => '05',
            'state_id' => '1',
            'country_id' => '1',
        ]);

        DB::table('personal_details')->insert([
            'user_id' => '3',   
            'father' => 'Ismail kindo',
            'mother' => 'Kiran Kindo',
            'siblings' => 'Sumit, Nilima, Saban, Sobha',
            'village_town_colony' => 'Kendapani',
            'parish' => 'Rengarih',
            'dioses' => 'Simdega',
            'district_id' => '2',
            'pincode' => '835228',
            'post_office' => 'Katukona',
            'post_box_number' => '08',
            'state_id' => '1',
            'country_id' => '1',
        ]);

        DB::table('personal_details')->insert([
            'user_id' => '4',
            'father' => 'Saroj Surin',
            'mother' => 'Agatha Kindo',
            'siblings' => 'Sumit, Nilima, Saban, Sobha',
            'village_town_colony' => 'Kendapani',
            'parish' => 'Katkahi',
            'dioses' => 'Gumla',
            'district_id' => '2',
            'pincode' => '835228',
            'post_office' => 'katkahi',
            'post_box_number' => '08',
            'state_id' => '1',
            'country_id' => '1',
        ]);
    }
}
