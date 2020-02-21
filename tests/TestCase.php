<?php

namespace Tests;

use App\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\TestResponse;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function setUp(): void
    {
        parent::setUp();

        TestResponse::macro('data', function ($key) {
            return $this->getOriginalContent()[$key];
        });
    }

    public function signIn($user = null)
    {
        $user = $user ?: factory(User::class)->create();

        $this->actingAs($user);

        return $user;
    }
}
