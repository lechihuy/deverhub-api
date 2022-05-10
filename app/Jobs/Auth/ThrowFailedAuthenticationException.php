<?php

namespace App\Jobs\Auth;

use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Validation\ValidationException;

class ThrowFailedAuthenticationException
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
     * @return void
     * 
     * @throws \Illuminate\Validation\ValidationException
     */
    public function handle()
    {
        throw ValidationException::withMessages([
            'email' => [__('auth.failed')],
        ]);
    }
}
