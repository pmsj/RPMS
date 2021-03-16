<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommunitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('community')->insert([
            'community_name' => 'Ashirvad',
            'mobile_number_community' => '1234567890',
            'mobile_number_authority' => '1234567890',
            'pincode' => '835207',
            'village_town_colony' => 'Patratoli',
            'block_subDivision' => 'Patratoli',
            'district_id' => '1',
            'state_id' => '1',
            'country_id' => '1',
            'addressline' => 'Ashirvad, patratoli, namkum'
            
        ]);
        DB::table('community')->insert([
            'community_name' => 'Sitagar',
            'mobile_number_community' => '1234567890',
            'mobile_number_authority' => '1234567890',
            'pincode' => '835270',
            'village_town_colony' => 'Sitagar',
            'block_subDivision' => 'Hazaribag',
            'district_id' => '2',
            'state_id' => '2',
            'country_id' => '1',
            'addressline' => 'Sitagar, hazaribag, murfi-street3'
            
        ]);

        DB::table('community')->insert([
            'community_name' => 'Berchmans ILlam',
            'mobile_number_community' => '1234567890',
            'mobile_number_authority' => '1234567890',
            'pincode' => '600034',
            'village_town_colony' => 'Nungambakkam',
            'block_subDivision' => 'Nungambakkam',
            'district_id' => '3',
            'state_id' => '3',
            'country_id' => '1',
            'addressline' => 'Berchmans Illam, NUngambakkam, Loyola college'
            
        ]);
        DB::table('community')->insert([
            'community_name' => 'JDV',
            'mobile_number_community' => '1234567890',
            'mobile_number_authority' => '1234567890',
            'pincode' => '600034',
            'village_town_colony' => 'Pune',
            'block_subDivision' => 'Pune',
            'district_id' => '7',
            'state_id' => '5',
            'country_id' => '1',
            'addressline' => 'JDV, NUngambakkam, Pune'
            
        ]);
    }
}
