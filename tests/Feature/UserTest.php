<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_home_page_load(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_admin_login_page_load(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_customer_login_page_load(): void
    {
        $response = $this->get('/customer-login');

        $response->assertStatus(200);
    }
}
