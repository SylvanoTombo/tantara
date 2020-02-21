<?php

namespace Tests\Feature;

use App\Story;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UpdateStoryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function a_non_authenticated_user_can_update_story()
    {

        $story = factory(Story::class)->create();

        $response = $this->patch(
            route('dashboard.stories.update', ['story' => $story->id]),
            ['title' => 'New title','body' => 'New body content']
        );

        $response->assertRedirect(route('login'));

        $this->assertNotEquals('New title', $story->refresh()->title);
        $this->assertNotEquals('New body content', $story->refresh()->body);
    }

    /** @test */
    function an_authenticated_user_can_update_his_story()
    {
        $this->signIn();

        $story = factory(Story::class)->create();

        $this->patch(
            route('dashboard.stories.update', ['story' => $story->id]),
            ['title' => 'New title','body' => 'New body content']
        );

        $this->assertEquals('New title', $story->refresh()->title);
        $this->assertEquals('New body content', $story->refresh()->body);
    }
}
