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

        DB::table('community')->insert([
            'community_name' => 'Andhara Loyola',
            'mobile_number_community' => '1234567890',
            'mobile_number_authority' => '1234567890',
            'pincode' => '600034',
            'village_town_colony' => 'Vijaybada',
            'block_subDivision' => 'Vijaybada',
            'district_id' => '8',
            'state_id' => '7',
            'country_id' => '5',
            'addressline' => 'Vijaybada, Andhara Loyola'

        ]);

        DB::table('community')->insert([
            'community_name' => 'Tongo',
            'mobile_number_community' => '1234567890',
            'mobile_number_authority' => '1234567890',
            'pincode' => '600034',
            'village_town_colony' => 'Tongo',
            'block_subDivision' => 'Tongo',
            'district_id' => '2',
            'state_id' => '1',
            'country_id' => '1',
            'addressline' => 'Tongo Gumla Jharkhand'

        ]);

        DB::table('community')->insert([
            'community_name' => 'Doranda',
            'mobile_number_community' => '1234567890',
            'mobile_number_authority' => '1234567890',
            'pincode' => '600034',
            'village_town_colony' => 'Dornada',
            'block_subDivision' => 'Dornada',
            'district_id' => '3',
            'state_id' => '5',
            'country_id' => '4',
            'addressline' => 'Doranda Ranchi'

        ]);

        // -------------------------------------------
        DB::table('community')->insert([
            'community_name' => 'Manresa',
            'mobile_number_community' => '1234567890',
            'mobile_number_authority' => '1234567890',
            'pincode' => '600034',
            'village_town_colony' => 'Purulia',
            'block_subDivision' => 'Ranchi',
            'district_id' => '6',
            'state_id' => '6',
            'country_id' => '5',
            'addressline' => 'Dr. Camil Bulke path, Ranchi'

        ]);

        DB::table('community')->insert([
            'community_name' => 'Ignatius',
            'mobile_number_community' => '1234567890',
            'mobile_number_authority' => '1234567890',
            'pincode' => '600034',
            'village_town_colony' => 'Gumla',
            'block_subDivision' => 'Gumla',
            'district_id' => '6',
            'state_id' => '7',
            'country_id' => '7',
            'addressline' => 'Thana Road, Sesai, Gumla'

        ]);

        DB::table('community')->insert([
            'community_name' => 'Khunti',
            'mobile_number_community' => '1234567890',
            'mobile_number_authority' => '1234567890',
            'pincode' => '600034',
            'village_town_colony' => 'Khunti',
            'block_subDivision' => 'Khunti',
            'district_id' => '8',
            'state_id' => '9',
            'country_id' => '8',
            'addressline' => 'Loyola college, Khunti'

        ]);
    }
}
