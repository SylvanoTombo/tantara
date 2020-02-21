<?php

namespace Tests\Feature;

use App\Story;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewingHomePageTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function test_viewing_shared_stories_in_welcomepage()
    {
        factory(Story::class, 10)->create();

        $response = $this->withoutExceptionHandling()->get(route('welcome'));

        $this->assertCount(6, $response->data('stories'));
    }
}
