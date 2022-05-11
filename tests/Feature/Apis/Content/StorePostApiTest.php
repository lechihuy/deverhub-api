<?php

namespace Tests\Feature\Apis\Content;

use Tests\TestCase;
use App\Models\Post;
use App\Models\User;
use App\Http\Resources\PostResource;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StorePostApiTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_store_a_post_successfuly_with_valid_data()
    {
        $user = User::factory()->create();
        $model = Post::factory()->make();
        
        $response = $this->actingAs($user)->postJson('/api/posts', $model->toArray());
        $response->assertStatus(201)
            ->assertJsonFragment(PostResource::make($model)->toArray(request()));
    }
}
