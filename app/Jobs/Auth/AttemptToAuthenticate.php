<?php

namespace App\Jobs\Auth;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Auth\StatefulGuard;;

class AttemptToAuthenticate
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
     * @param  \Illuminate\Contracts\Auth\StatefulGuard  $guard
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    public function handle(StatefulGuard $guard, Request $request): bool
    {
        return $guard->attempt(
            $this->credentials($request), 
            $request->boolean('remember')
        );
    }

    /**
     * Resolve the credentials with incoming request.
     * 
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    protected function credentials(Request $request): array
    {
        return $request->only('email', 'password');
    }
}
