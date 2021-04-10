<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Backend\Formation_stage;
class FormationStageTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $formationStages = Formation_stage::all();

        User::all()->each(function ($user) use ($formationStages){
            $user->formationStages()->attach(
                $formationStages->random(7)->pluck('id')  
            );  
        });
    }
}
