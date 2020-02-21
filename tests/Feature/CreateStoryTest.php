<?php

namespace Tests\Feature;

use App\Story;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateStoryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function guests_cannot_create_a_story()
    {
        $story = factory(Story::class)->make();

        $response = $this->post(route('dashboard.stories.store'), $story->toArray());

        $response->assertRedirect(route('login'));
    }

    /** @test */
    function a_connected_user_can_create_a_story()
    {
        $this->signIn();

        $story = factory(Story::class)->make();

        $response = $this->withoutExceptionHandling()->post(route('dashboard.stories.store'), $story->toArray());

        $response->assertRedirect();
    }

    /** @test */
    function a_story_requires_a_title()
    {
        $this->signIn();

        $story = factory(Story::class)->make(['title' => null]);

        $response = $this->post(route('dashboard.stories.store'), $story->toArray());

        $response->assertSessionHasErrors('title');
    }

    /** @test */
    function a_story_requires_a_body()
    {
        $this->signIn();

        $story = factory(Story::class)->make(['body' => null]);

        $response = $this->post(route('dashboard.stories.store'), $story->toArray());

        $response->assertSessionHasErrors('body');
    }
}
