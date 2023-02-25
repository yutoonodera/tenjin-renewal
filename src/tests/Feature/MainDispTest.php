<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
use App\Page;
use App\User;
use App\Repositories\PageRepository;
use App\Http\Requests\PageRequest;

class MainDispTest extends TestCase
{
    //use RefreshDatabase;
    use WithoutMiddleware;

    public function setUp(): void
    {
        parent::setUp();
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $page = factory(Page::class)->create();
    }

        /**
     *
     * @return void
     */
    public function test_getが通ること()
    {

        $response = $this->get('/main1');
        $response->assertStatus(200);
    }

            /**
     *
     * @return void
     */
    public function test_編集ができること()
    {

        $pageRepository = new PageRepository();
        $this->pageRepository = $pageRepository;
        $request = new PageRequest([
            'title' => 'サイトサイト',
            'content01' => '内容です',
            'url' => 'qqeewewew',
        ]);

        $this->pageRepository->update($request, 4);
        $page = Page::findOrFail(4);
        $this->assertEquals('サイトサイト', $page->title);
        $this->assertEquals('内容です', $page->content01);
        $this->assertEquals('qqeewewew', $page->url);

    }

}