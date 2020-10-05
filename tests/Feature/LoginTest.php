<?php

namespace Tests\Feature;

use App\User;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use Illuminate\Support\Facades\Auth;



class LoginTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testLoginVisit()
    {
      // ログイン画面表示
        $response = $this->get('/login');
        $response->assertStatus(200);
        // 認証されていないゲスト
        $this->assertGuest();
    }

    /**
    * マイページへアクセス
    * ログイン画面へリダイレクト
    **/
    public function testNonloginAccess()
    {
        $response = $this->get('/mypages/registered');
        $response->assertStatus(302)
                 ->assertRedirect('/login'); // リダイレクト先を確認
        // 認証されていないことを確認
        $this->assertGuest();
    }

    /**
     * ログイン処理を実行
     */
    public function testLogin()
    {

      // ログイン用ユーザーの作成
        $user = factory(User::class)->create([
          'name' => 'AAA',
          'email' => 'AAA@AAA.com',
          'password' => bcrypt('aaaaaaaa'),
        ]);

        // ログイン情報をPOST
       $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'aaaaaaaa',
        ]);

         // 302レスポンスが帰ってくるのを確認
         $response->assertStatus(302);
         // 認証を確認
         $this->assertAuthenticated();

      //   // // 作ったユーザーを認証済みにする
      //   // $response = $this->actingAs($user)->get('/mypages/registered');

    }
    /**
     * ログアウト処理を実行
     */
    public function testLogout()
    {
        // ログイン
        // $response = $this->dummyLogin();
        $user = factory(User::class)->create([
          'name' => 'AAA',
          'email' => 'AAA@AAA.com',
          'password' => bcrypt('aaaaaaaa'),
        ]);
        // 作ったユーザーを認証済みにする
        // $response = $this->actingAs($user)->get('/mypages/registered');
        $response = $this->actingAs($user);

        // 認証を確認
        $this->assertAuthenticated();
        $response = $this->post('/logout');
        // ホーム画面にリダイレクト
        $response->assertStatus(302)
                 ->assertRedirect('/'); // リダイレクト先を確認
        // 認証されていないことを確認
        $this->assertGuest();
    }



}
