<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

class PostControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_store_method_creates_post()
    {
        // Create a user (if needed)
        $user = User::factory()->create();

        // Simulate an authenticated user
        $this->actingAs($user);

        // Data for creating a post
        $postData = [
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraph,
            'user_id' => 1,

        ];

        // Send a POST request to the store method
        $response = $this->post(route('posts.store'), $postData);

        // Check that the post was created in the database
        $this->assertDatabaseHas('posts', $postData);

        // Check for a successful response and redirection
        $response->assertRedirect(); // Add the correct redirection route
    }
}
