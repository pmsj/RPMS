<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomepageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_and_admin_are_redirected_to_dashboard_when_logged_in()
    {
        $response = $this->get('/');

        $response->assertStatus(200);

        $response->assertSeeText('A Jesuit Province in South Asia Assistancy');
    }
}
    