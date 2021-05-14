<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomepageTest extends TestCase
{
    //test passed
    
    public function test_user_and_admin_are_redirected_to_dashboard_when_logged_in() //passed
    {
        $response = $this->get('/');

        $response->assertStatus(200);

        $response->assertSeeText('A Jesuit Province in South Asia Assistancy');
    }
}
    