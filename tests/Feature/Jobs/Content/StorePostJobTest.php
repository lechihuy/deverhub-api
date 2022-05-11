<?php

namespace Tests\Feature\Jobs\Content;

use App\Jobs\Content\StorePost;
use Tests\TestCase;
use App\Models\Post;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StorePostJobTest extends TestCase
{
    use DatabaseTransactions;
    
    /**
     * Test it can store a post with valid datas.
     *
     * @return void
     */
    public function test_it_can_store_a_post_with_valid_data()
    {
        $data = Post::factory()->make()->toArray();
        StorePost::dispatchSync($data);
        $this->assertDatabaseHas('posts', $data);
    }
}
