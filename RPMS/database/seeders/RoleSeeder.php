<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
Use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Role::factory()->times(10)->create();

        DB::table('roles')->insert([
            'role_name' => 'Admin'
        ]);

        DB::table('roles')->insert([
            'role_name' => 'Socius'
        ]);

        DB::table('roles')->insert([
            'role_name' => 'NoviceMaster'
        ]);

        DB::table('roles')->insert([
            'role_name' => 'User'
        ]); 
    }
}
