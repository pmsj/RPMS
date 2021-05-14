<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
use SebastianBergmann\FileIterator\Factory;
use Illuminate\Support\Facades\DB;

use Illuminate\Foundation\Testing\WithoutMiddleware;
class LoginPageTest extends TestCase //passed
{
    use RefreshDatabase;

    public function test_user_can_view_a_login_form()
    {
        $response = $this->get('/login');

        $response->assertSuccessful();
        $response->assertViewIs('auth.login');
    }
    public function test_user_cannot_view_a_login_form_when_authenticated() //passed
    {
        $user = User::factory()->make();

        $response = $this->actingAs($user)->get('/login');

        $response->assertRedirect('/dashboard');
    }


    // public function test_user_cannot_login_with_incorrect_password()
    // {
    //     $user = User::factory()->create([
    //         'password' => bcrypt('i-love-laravel'),
    //     ]);

    //     $response = $this->from('/login')->post('/login', [
    //         'email' => $user->email,
    //         'password' => 'invalid-password',
    //     ]);

    //     $response->assertRedirect('/login');
    //     $response->assertSessionHasErrors('email');
    //     $this->assertTrue(session()->hasOldInput('email'));
    //     $this->assertFalse(session()->hasOldInput('password'));
    //     $this->assertGuest();
    // }

   

    // public function test_user_can_login_with_correct_credentials()
    // {
        
    //     $user = User::factory()->create([
    //         'password' => bcrypt($password = 'i-love-laravel'),
    //     ]);

    //     $response = $this->post('/login', [
    //         'email' => $user->email,
    //         'password' => $password,
    //     ]);
       
    //     $response->assertRedirect('/dashboard');    
    //     $this->assertAuthenticatedAs($user);
    // }

    // public function test_user_can_login_using_the_login_form()
    // {
    //     $user = User::factory()->create(); 

    //     $response = $this->post('/login',[
    //         'email' => $user->email,
    //         'password' => 'password',
    //     ]);

    //     $this->assertAuthenticated();
    //     $response->assertRedirect('dashboard');
    // }

    // public function test_user_can_not_access_admin_page()
    // {
    //     $user = User::factory()->create();

    //     $response = $this->post('/login',[
    //         'emai' => $user->email,
    //         'password' => 'password'
    //     ]);

    //    $this->get('/admin/users');
    //    $response->assertRedirect('/dashboard');
    // }

    
    // public function test_user_can_access_admin_page()
    // {
    //     DB::table('roles')->insert([
    //         'role_name' => 'Admin'
    //     ]);
        
    //     $user = User::factory()->create();
    //     $user->roles()->attach(1);

    //     $this->post('/login',[
    //         'emai' => $user->email,
    //         'password' => 'password'
    //     ]);

    //    $response = $this->get('/admin/users');

    //    $response->assertSeeText('Users List');
    // }
}
