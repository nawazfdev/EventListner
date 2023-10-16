<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use App\Models\post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class LoginTest extends TestCase
{
    use RefreshDatabase;   
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $response=$this->get('/login');
        $response->assertStatus(200);
    }
    public function test_login_with()
{
    //create User
    $user = User::factory()->create();
    
    // Authenticate the user using the actingAs method
    $this->actingAs($user);
$this->post('/login',[
'email'=>$user->email,
'password'=>$user->password,
]);
    $this->assertAuthenticated();

}
 
//
// createting post
}
