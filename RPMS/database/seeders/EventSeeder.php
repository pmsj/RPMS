<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
            'event_name' => 'Diconate',
            'event_description' => 'One is ordained Dicon',
        ]);
        DB::table('events')->insert([
            'event_name' => 'Priestly Ordination',
            'event_description' => 'One is ordained Priest. A Minister of the Church.',
        ]);
        DB::table('events')->insert([
            'event_name' => 'Final Vows',
            'event_description' => 'A priest is fully accepted by Society of Jesus.',
        ]);
        DB::table('events')->insert([
            'event_name' => 'Fourth Vow',
            'event_description' => 'A Special Vow to the Pope.',
        ]);
    }
}
