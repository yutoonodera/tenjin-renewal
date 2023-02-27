<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
use App\Page;
use App\User;
use App\Repositories\PageRepository;
use App\Http\Requests\PageRequest;

class NavigationTest extends TestCase
{
    //use RefreshDatabase;
    use WithoutMiddleware;

    public function setUp(): void
    {
        // parent::setUp();
        // $user = factory(User::class)->create();
        // $this->actingAs($user);
        // $page = factory(Page::class)->create();
    }

        /**
     *
     * @return void
     */
    public function test_getが通ること()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }
}