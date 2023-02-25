<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
use App\Page;
use App\User;
use App\Repositories\PageRepository;
use App\Http\Requests\PageRequest;

class Page01NewTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    public function setUp(): void
    {
        parent::setUp();
        $user = factory(User::class)->create();
        $this->actingAs($user);
    }

    /**
     *
     * @return void
     */
    public function test_getが通ること()
    {

        $response = $this->get('/admin/page/new');

        $response->assertStatus(200);
    }
    /**
     *
     * @return void
     */
    public function test_postが通ること()
    {
        $response = $this->post('/admin/page/new', [
            'title' => 'テスト',
            'content01' => 'こんな内容です',
            'url' => 'aaall',

        ]);
       //admin.indexにリダイレクトされる
        $response->assertStatus(302);
    }
        /**
     *
     * @return void
     */
    public function test_ページタイトルが必須であること()
    {
        $response = $this->post('/admin/page/new', [
            'title' => '',

        ]);
         $response->assertSessionHasErrors([
            'title' => 'タイトルは必須入力です',
        ]);
    }
        /**
     *
     * @return void
     */
    public function test_ページが登録できること()
    {

        $pageRepository = new PageRepository();
        $this->pageRepository = $pageRepository;
        $request = new PageRequest([
            'title' => 'サイトサイト',
            'content01' => '内容です',
            'url' => 'wiiewuiuo',
        ]);

        $this->pageRepository->create($request);
        $page = Page::findOrFail(2);
        $this->assertEquals('サイトサイト', $page->title);
        $this->assertEquals('内容です', $page->content01);
        $this->assertEquals('wiiewuiuo', $page->url);
    }

}
