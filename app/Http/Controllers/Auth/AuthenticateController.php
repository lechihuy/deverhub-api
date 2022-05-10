<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthenticateRequest;
use App\Jobs\Auth\AttemptToAuthenticate;
use App\Jobs\Auth\PrepareAuthenticatedToken;
use App\Jobs\Auth\RespondWithAuthenticatedUser;
use App\Jobs\Auth\ThrowFailedAuthenticationException;

class AuthenticateController extends Controller
{
    /**
     * Create a new controller instance.
     * 
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Attempt to authenticate with given credentials.
     * 
     * @param  \App\Http\Requests\Auth\AuthenticateRequest $request
     * @return 
     */
    public function authenticate(AuthenticateRequest $request)
    {
        return AttemptToAuthenticate::dispatchSync()
            ? RespondWithAuthenticatedUser::dispatchSync(token: PrepareAuthenticatedToken::dispatchSync()) 
            : ThrowFailedAuthenticationException::dispatchSync();
    }
}
