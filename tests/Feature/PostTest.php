<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $user = User::factory()->create();

        $this->withHeaders([
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . auth('api')->login($user)
            ]);
    }

    public function test_api_post_methods_return_401_without_authorization(): void
    {
        $response = $this
            ->withoutToken()
            ->get('/api/posts');
        $response->assertStatus(401);
        $response->assertExactJson([
            'message' => "Token not provided"
        ]);
    }

    public function test_api_posts_list_can_be_returned(): void
    {
        $posts = Post::factory(10)->create();
        $json = $posts->map(function ($post) {
            return [
                'id' => $post->id,
                'title' => $post->title,
                'likes' => $post->likes,
            ];
        })->toArray();

        $response = $this->get('/api/posts');

        $response->assertOk();
        $response->assertExactJson([
            'data' => $json
        ]);
    }

    public function test_api_post_can_be_stored(): void
    {
        $data = [
            'title' => 'Заголовок',
            'likes' => 20
        ];
        $response = $this->post('/api/posts',$data);

        $response->assertStatus(201);
        $response->assertExactJson([
            'data' => [
                'id' => 1,
                'title' => 'Заголовок',
                'likes' => 20
            ]
        ]);

        $this->assertDatabaseCount('posts',1);
        $post = Post::first();
        $this->assertEquals($data['title'],$post->title);
        $this->assertEquals($data['likes'],$post->likes);
    }

    public function test_attribute_title_is_required_for_storing_post(): void
    {
        $data = [
            'title' => '',
            'likes' => 20
        ];
        $response = $this->post('/api/posts',$data);

        $response->assertStatus(422);
        $response->assertInvalid('title');
    }

    public function test_api_post_can_be_returned(): void
    {
        $post = Post::factory()->create();

        $response = $this->get('/api/posts/'.$post->id);

        $response->assertOk();
        $response->assertExactJson([
            'data' => [
                'id' => $post->id,
                'title' => $post->title,
                'likes' => $post->likes
            ]
        ]);
    }

    public function test_api_post_can_be_deleted(): void
    {
        $post = Post::factory()->create();

        $response = $this->delete('/api/posts/'.$post->id);

        $this->assertDatabaseCount('posts',0);
        $this->assertDatabaseMissing('posts',['id' => $post->id]);

        $response->assertOk();
        $response->assertExactJson([
            'message' => 'done'
        ]);
    }

    public function test_api_post_can_be_updated(): void
    {
        $post = Post::factory()->create();
        $data = [
            'title' => 'Заголовок обновлён',
            'likes' => 25
        ];
        $response = $this->patch('/api/posts/' . $post->id, $data);
        $updatedPost = Post::first();

        $response->assertOk();
        $response->assertExactJson([
            'data' => [
                'id' => $post->id,
                'title' => $data['title'],
                'likes' => $data['likes']
            ]
        ]);

        $this->assertEquals($post->id,$updatedPost->id);
        $this->assertEquals($data['title'],$updatedPost->title);
        $this->assertEquals($data['likes'],$updatedPost->likes);
    }

}
