<?php

namespace Tests\Feature;

use App\User;
use App\PublicMsg;
use App\Project;
use App\DirectMsgsBoard;
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

// ＝＝＝＝＝＝＝＝＝＝＝＝＝＝
// ログイン画面表示確認

    public function testLoginVisit()
    {
      // ログイン画面表示
        $response = $this->get('/login');
        $response->assertStatus(200);
        // 認証されていないゲスト
        $this->assertGuest();
    }

// ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝
// 認証できないはずのページを確認（ログイン画面へリダイレクトする）

    /**
    * マイページ
    **/
    public function testNonloginAccessToMypageRegistered()
    {
        $response = $this->get('/mypages/registered');
        $response->assertStatus(302)
                 ->assertRedirect('/login'); // リダイレクト先を確認
        // 認証されていないことを確認
        $this->assertGuest();
    }

    /**
    * 案件登録画面
    **/
    public function testNonloginAccessToProjectNew()
    {
        $response = $this->get('/projects/new');
        $response->assertStatus(302)
                 ->assertRedirect('/login'); // リダイレクト先を確認
        // 認証されていないことを確認
        $this->assertGuest();
    }

    /**
    * ダイレクトメッセージ送信画面1/2
    * projectを介さないver。プロフィール画面のリンクから送られてくるモノが対象。
    **/
    public function testNonloginAccessToProjectDm()
    {
      // ダミーのユーザー
      $user = factory(User::class)->create(['id' => 2]);
      // ダミーユーザーのdm送信フォーム画面へ遷移
      $response = $this->get('/projects/dm/2');
      // レスポンスを確認
      $response->assertStatus(302)
               ->assertRedirect('/login'); // リダイレクト先を確認
      // 認証されていないことを確認
      $this->assertGuest();

    }

    /**
    * ダイレクトメッセージ送信画面2/2
    * ダイレクトメッセージボードからの送信(projectはnullable)
    **/
    public function testNonloginAccessToSendDm()
    {
      // ダミーのユーザー
      $user = factory(User::class)->create(['id' => 2]);
      // ダミーユーザーのdm送信フォーム画面へ遷移
      $response = $this->get('/mypages/direct_msg/2');
      // レスポンスを確認
      $response->assertStatus(302)
               ->assertRedirect('/login'); // リダイレクト先を確認
      // 認証されていないことを確認
      $this->assertGuest();
    }

    /**
    * ダイレクトメッセージ一覧画面
    *
    **/
    public function testNonloginAccessToDmList()
    {
      $response = $this->get('/mypages/direct_msg');
      // レスポンスを確認
      $response->assertStatus(302)
               ->assertRedirect('/login'); // リダイレクト先を確認
      // 認証されていないことを確認
      $this->assertGuest();
    }

    /**
    * 応募画面表示
    *
    **/
    public function testNonloginAccessToApplyForm()
    {
      // ダミーのユーザー
      $user = factory(User::class)->create(['id' => 2]);
      // ダミーのプロジェクト
      $project = factory(Project::class)->create([
        'id' => 2,
        'user_id' => 2,
      ]);
      // ダミーユーザーのdm送信フォーム画面へ遷移
      $response = $this->get('/projects/2/application');
      // レスポンスを確認
      $response->assertStatus(302)
               ->assertRedirect('/login'); // リダイレクト先を確認
      // 認証されていないことを確認
      $this->assertGuest();
    }

    /**
    * パブリックメッセージ送信機能（送信画面の表示自体はゲストでも可能）
    **/
    public function testNonloginAccessToSendPm()
    {

      // ダミーのユーザー
      $user = factory(User::class)->create();
      // 認証されていないことを確認
      $this->assertGuest();

      // ダミーのプロジェクト
      $project = factory(Project::class)->create([
        'user_id' => $user->id,
      ]);
      // ダミーのパブリックコメント
      $data = [
        'id' => 1,
        'send_date' => "2020-10-21 00:00:00",
        'content' => "aaaaaaa",
        'created_at' => "2020-08-16 00:00:00",
        'updated_at' => "2020-06-21 00:00:00",
        'deleted_at' => null,
        'sender_id' => $user->id,
        'project_id' => $project->id
      ];

      // パブリックメッセージをpost
      $response = $this->post('/projects/1',$data);

      // DBへ登録されていないことを確認
      $this->assertDatabaseMissing('public_msgs', $data);

      // リダイレクト先を確認
      $response->assertStatus(302)
               ->assertRedirect('/login');
      // 認証されていないことを確認
      $this->assertGuest();
    }


// ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝
// ログイン・ログアウト

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
