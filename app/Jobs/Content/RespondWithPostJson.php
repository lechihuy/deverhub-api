<?php

namespace App\Jobs\Content;

use App\Http\Resources\PostResource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Bus\Dispatchable;

class RespondWithPostJson
{
    use Dispatchable;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        /**
         * The given post model.
         * 
         * @var \Illuminate\Database\Eloquent\Model
         */
        public Model $model
    )
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        return new PostResource($this->model);
    }
}
