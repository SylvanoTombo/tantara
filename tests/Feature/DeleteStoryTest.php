<?php

namespace Tests\Feature;

use App\Story;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DeleteStoryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function a_connected_user_can_delete_his_story()
    {
        $this->signIn();

        factory(Story::class, 10)->create();
        $story = factory(Story::class)->create();

        $this->assertCount(11, Story::all());

        $response = $this->delete(route('dashboard.stories.delete', ['story' => $story->id]));
        $response->assertRedirect();

        $this->assertCount(10, Story::all());
    }
}
