<?php

namespace Tests\Feature\Jobs\Auth;

use App\Jobs\Auth\AttemptToAuthenticate;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AttemptToAuthenticateJobTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Test it can attempt to authenticate with matched credentials.
     * 
     * @return void
     */
    public function test_it_can_attempt_to_authenticate_with_matched_credentials()
    {
        $user = User::factory()->create();

        request()->merge([
            'email' => $user->email,
            'password' => 'password'
        ]);

        $this->assertTrue(AttemptToAuthenticate::dispatchSync());
    }

    /**
     * Test it cannot attempt to authenticate with matched credentials.
     * 
     * @return void
     */
    public function test_it_cannot_attempt_to_authenticate_with_unmatched_credentials()
    {
        User::factory()->create();

        request()->merge([
            'email' => 'test@test.com',
            'password' => 'password'
        ]);

        $this->assertFalse(AttemptToAuthenticate::dispatchSync());
    }
}
