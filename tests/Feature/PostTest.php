<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Post;
use App\Models\User;

class PostTest extends TestCase
{
    /** @test */
    //test to check if the post can be created
    public function it_can_create_a_post()
    {
        $data = [
            'title' => 'testing title',
            'content' => 'testing content',
            'author' => 'Abdi Rahman Suufi',
        ];

        $response = $this->postJson('/api/posts', $data);

        $response->assertStatus(201)
            ->assertJsonFragment(['title' => 'testing title'])
            ->assertJsonFragment(['content' => 'testing content'])
            ->assertJsonFragment(['author' => 'Abdi Rahman Suufi']);

        $this->assertDatabaseHas('posts', $data);
    }

    /** @test */
    //test to display post
    public function it_can_display_a_post()
    {
        $post = Post::factory()->create();

        $response = $this->getJson('/api/posts/' . $post->id);

        $response->assertStatus(200)
            ->assertJsonFragment(['title' => $post->title]);
    }

    /** @test */
    //test to check if the post can be updated
    public function it_can_update_a_post()
    {
        $post = Post::factory()->create();

        $updateData = [
            'title' => 'Updated Title',
            'content' => 'Updated Content',
            'author' => 'Updated Author',
        ];

        $response = $this->putJson('/api/posts/' . $post->id, $updateData);

        $response->assertStatus(200)
            ->assertJsonFragment(['title' => 'Updated Title'])
            ->assertJsonFragment(['content' => 'Updated Content'])
            ->assertJsonFragment(['author' => 'Updated Author']);

        $this->assertDatabaseHas('posts', $updateData);
    }
}
