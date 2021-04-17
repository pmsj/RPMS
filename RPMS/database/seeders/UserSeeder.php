<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB; 

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->times(70)->create();

        // DB::table('users')->insert([
        //     'first_name' => 'Prawin',
        //     'middle_name' => 'Ajay',
        //     'sur_name' => 'Minj',
        //     'email' => 'admin@gmail.com',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', //password
        //     'birth_date' => '1995-04-03',
        //     'entry_date_sj' => '2017-06-21',
        //     'mobile_number1' => '8292075662',
        //     'mobile_number2' => '7739613995'
        //     ]);


        // DB::table('users')->insert([
        //     'first_name' => 'Erencius',
        //     'middle_name' => 'Ajay',
        //     'sur_name' => 'Minj',
        //     'email' => 'user1@gmail.com',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', //password
        //     'birth_date' => '1994-10-11',
        //     'entry_date_sj' => '2017-06-21',
        //     'mobile_number1' => '2380281629',
        //     'mobile_number2' => '7680281620'
        // ]);

        // DB::table('users')->insert([
        //     'first_name' => 'Ravi',
        //     'middle_name' => 'Sushil',
        //     'sur_name' => 'Kindo',
        //     'email' => 'user2@gmail.com',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', //password
        //     'birth_date' => '1993-11-25',
        //     'entry_date_sj' => '2017-06-21',
        //     'mobile_number1' => '9980281629',
        //     'mobile_number2' => '7780281620'
        // ]);

        // DB::table('users')->insert([
        //     'first_name' => 'Sachin',
        //     'middle_name' => 'Prabhat',
        //     'sur_name' => 'Surin',
        //     'email' => 'user3@gmail.com',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', //password
        //     'birth_date' => '1993-11-25',
        //     'entry_date_sj' => '2017-06-21',
        //     'mobile_number1' => '9980281629',
        //     'mobile_number2' => '7780281620'
        // ]);

    }
}
