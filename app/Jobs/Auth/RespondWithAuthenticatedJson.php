<?php

namespace App\Jobs\Auth;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\Dispatchable;

class RespondWithAuthenticatedJson
{
    use Dispatchable;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        /**
         * The authenticated token was created when attempted.
         * 
         * @var \Laravel\Sanctum\NewAccessToken
         */
        public \Laravel\Sanctum\NewAccessToken $token
    ) {
        
    }

    /**
     * Execute the job.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handle(Request $request): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'token' => $this->token->plainTextToken,
            'user' => $request->user()
        ]);
    }
}
