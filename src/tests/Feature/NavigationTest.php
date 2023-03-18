<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
use App\Page;
use App\User;
use App\Repositories\PageRepository;
use App\Http\Requests\PageRequest;
use Auth;

class NavigationTest extends TestCase
{
    //use RefreshDatabase;
    use WithoutMiddleware;

    public function setUp(): void
    {
        parent::setUp();
 
    }

    /**
     *
     * @return void
     */
    public function testログインできること()
    {
        //テストログインユーザーでログインする
        $user = factory(User::class)->create([
            'email'    => 'yutoonodera620218@gmail.com',
            'password'  => bcrypt('laraveltest123')
            //パスワードは好きな言葉で大丈夫です
        ]);

        // 認証されないことを確認
        $this->assertFalse(Auth::check());

        // // ログインを実行
        // $response = $this->post('login', [
        //     'email'    => 'yutoonodera620218@gmail.com',
        //     'password' => 'laraveltest123'
        //     //先ほど設定したパスワードを入力
        // ]);

        // // 認証されていることを確認
        // $this->assertTrue(Auth::check());

        // // ログイン後にホームページにリダイレクトされるのを確認
        // $response->assertRedirect('admin');

    }

    /**
     *
     * @return void
     */
    public function 記事作成ページが表示すること()
    {
    //記事登録ページのURLにアクセスする
    //レスポンスを取得する
    //登録ボタンが表示すること
    }
}