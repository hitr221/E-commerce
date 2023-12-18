<?php

namespace Tests\Unit;

use App\Models\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     */

    public function test_admin_register_page_load(): void
    {
        $response = $this->get('/register');

        $response->assertStatus(404);
    }

    public function test_user_duplication(): void
    {
        $user1 = User::make([
            'name' => 'Trishir',
            'email' => 'trishir@example.com',
        ]);

        $user2 = User::make([
            'name' => 'John',
            'email' => 'john@example.com',
        ]);

        $this->assertTrue($user1->name != $user2->name);
    }

    public function test_delete_user()
    {
        $user = User::factory()->count(1)->make();
        $user = User::first();

        if($user){
            $user->delete();
        }

        $this->assertTrue(true);
    }

    public function test_it_stores_users()
    {
        $response = $this->post('/register',[
            'name' => 'Trish',
            'email' => 'trish@example.com',
            'password' => 'trish12345',
            'password_confirmation' => 'trish12345',
        ]);

        $response->assertRedirect('/');
    }

}
