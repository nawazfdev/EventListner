<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use App\Models\User;
use Tests\TestCase;


class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
//     public function test_that_true_is_true(): void
//     {
//         // creating user 
//         $user=User::factory()->create();
//         // login user
//         $response=$this->post('/login',[

// 'email'=>$user->email,
// 'password'=>$user->password,
// ]);
 

//     }
public function test_registration_screen_can_be_rendered(): void
{
    $response = $this->get('/register');

    $response->assertStatus(200);
}

public function test_new_users_can_register(): void
{
    $response = $this->post('/register', [
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
    ]);

    $this->assertAuthenticated();
    $response->assertRedirect(RouteServiceProvider::HOME);
}
public function login_test(): void
{
    $response = $this->get('/login');

    $response->assertStatus(200);
}
}