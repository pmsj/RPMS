<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Event;
class EventTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $events = Event::all();

        User::all()->each(function ($user) use ($events){
            $user->events()->attach(
                $events->random(3)->pluck('id')
            );
        }); 

    }
}
