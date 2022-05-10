<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthenticateRequest;
use App\Jobs\Auth\AttemptToAuthenticate;
use App\Jobs\Auth\PrepareAuthenticatedToken;
use App\Jobs\Auth\RespondWithAuthenticatedJson;
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
     * @return \Illuminate\Http\JsonResponse
     * 
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate(AuthenticateRequest $request): \Illuminate\Http\JsonResponse
    {
        if (AttemptToAuthenticate::dispatchSync()) {
            return RespondWithAuthenticatedJson::dispatchSync(
                token: PrepareAuthenticatedToken::dispatchSync()
            );
        }

        return ThrowFailedAuthenticationException::dispatchSync();
    }
}
