<?php

namespace App\Jobs\Content;

use App\Models\Post;
use Illuminate\Foundation\Bus\Dispatchable;

class StorePost
{
    use Dispatchable;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        /**
         * The given data for creating post.
         * 
         * @var array
         */
        public array $data
    )
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return mixed
     */
    public function handle(): mixed
    {
        return Post::create($this->data);
    }
}
