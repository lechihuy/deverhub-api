<?php

namespace App\Jobs\Auth;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\Dispatchable;

class PrepareAuthenticatedToken
{
    use Dispatchable;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Laravel\Sanctum\NewAccessToken
     */
    public function handle(Request $request): \Laravel\Sanctum\NewAccessToken
    {
        return $request->user()->createToken($request->email);
    }
}
