<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use App\Models\post;
use App\Models\User;
use Hash;
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
public function test_login_redirect_to_dashboard()
{


$user=User::factory()->create([
    'name' => 'admin1',
    'email' => 'admin1@gmail.com',
    'password' => Hash::make('admin1'),

]);
$response=$this->post('login',[
    'email'=>'admin1@gmail.com',
    'password'=>'admin1',
]);
$response->assertStatus(302);
$response->assertRedirect('/dashboard');



}
public function test_auth_user_can_access_dashboard(){

$user=User::factory()->create();
$response=$this->actingAs($user)->get('/dashboard');

$response->assertStatus(200);

}
public function test_unauth_user_can_access_dashboard(){


$response=$this->get('/dashboard');
$response->assertStatus(302);
$response->assertRedirect('/login');


}

public function test_user_has_name_attribute(){

$user=User::factory()->create([
'name'=>'Nawaz',
'email'=>'admin2@gmail.com',
'password'=> bcrypt('admin2@gmail.com'),
]);


$this->assertEquals('Nawaz',$user->name);
}
}
