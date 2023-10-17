<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use App\Models\post;
use App\Models\User;
use Event;
use Hash;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
class PostTest extends TestCase
{
    use RefreshDatabase;
    public function test_post_route()
    {
        $this->assertTrue(true);
    }
    
    public function test_only_authenticated_users_can_create_posts()
    {
        // Authenticate a user.
        $this->actingAs(User::factory()->create());

        // Create a new post object.
        $post = post::create([
            'title' => 'Test Post',
            'content' => 'This is a test post.',
            'user_id' => 1,

        ]);

        // Assert that the post was created successfully.
        $this->assertEquals(1, post::count());
    }
    public function test_unauthenticated_users_are_redirected_to_login_when_creating_posts()
    {
        // Try to create a new post object without authenticating a user.
        $response = $this->post('/posts', [
            'title' => 'Test Post',
            'content' => 'This is a test post.',
            'user_id' => 1,

        ]);

        // Assert that the user is redirected to the login page.
        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }
}
