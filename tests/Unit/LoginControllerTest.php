<?php

namespace Tests\Unit;

use Tests\TestCase;

class LoginControllerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_login_happy_path()
    {
        $user = \App\Users\User::factory()->create();


        $user->refresh();

        $this->assertTrue($user->tokens->count() == 1);
    }
}
