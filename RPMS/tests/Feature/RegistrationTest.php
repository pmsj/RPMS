<?php

namespace Tests\Feature;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Jetstream\Jetstream;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    // public function test_registration_screen_can_be_rendered()
    // {
    //             DB::table('roles')->insert([
    //         'role_name' => 'Admin'
    //     ]);

    //     $user = User::factory()->create();
    //     $user->roles()->attach(1);

    //     $this->post('/login', [
    //         'emai' => $user->email,
    //         'password' => 'password'
    //     ]);
    //     $response = $this->get('/admin/users/create');

    //     $response->assertStatus(200);
    // }

    // public function test_new_users_can_be_registered()
    // {
    //     DB::table('roles')->insert([
    //         'role_name' => 'Admin'
    //     ]);

    //     $user = User::factory()->create();
    //     $user->roles()->attach(1);

    //     $this->post('/login', [
    //         'emai' => $user->email,
    //         'password' => 'password'
    //     ]);
    //     $response = $this->post('/admin/users/create', [
    //         'first_name' => 'firstName',
    //         'middle_name' => 'middleName',
    //         'sur_name' => 'surName',
    //         'email' => 'test@example.com',
    //         'password' => 'password',
    //         'password_confirmation' => 'password',
    //         'birth_date' => '1995-04-03',
    //         'entry_date_sj' => '2015-06-20',
    //         'mobile_number1' => '8292075662',
    //         'mobile_number2' => '8292075662',
    //         'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature(),
    //     ]);

    //     $this->assertAuthenticated();
    //     $response->assertRedirect(RouteServiceProvider::HOME);
    // }
}
