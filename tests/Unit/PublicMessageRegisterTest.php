<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Project;
use App\PublicNotify;

class PublicMessageRegisterTest extends TestCase
{
  use RefreshDatabase;
  // バリデーションの処理：StoreMessageRequestTestファイルにて実行
  // ログインユーザー：LoginTestファイルにて実行

  // POST内容がDBへ登録できるかテスト

  /**
   * @test
   * @return void
   */

  public function 正常系：自分のプロジェクトへ自分から送信(): void
  {

    // ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝
    // project detail画面の表示

    // ダミーのユーザー
    $user = factory(User::class)->create();
    // 認証されていないことを確認
    $this->assertGuest();

    // ダミーのプロジェクト
    $project = factory(Project::class)->create([
      'id' => 2,
      'user_id' => $user->id,
    ]);
    // projectがDB登録されているか確認
    $this->assertDatabaseHas('projects', [
      'id' => 2,
      'user_id' => $user->id,
    ]);
    // projectの詳細ページを確認
    $response = $this->get('/projects/2');
    // 作ったユーザーを認証済みにする
    $response = $this->actingAs($user)->get('/projects/2');
    // 200レスポンスが帰ってくるのを確認
    $response->assertStatus(200);

    // 認証を確認
    $this->assertAuthenticated();

    // ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝
    // パブリックコメントがDB保存されるのを確認

    // ダミーのパブリックコメント
    $data = [
      'content' => "eeeee",
      'deleted_at' => null,
      'sender_id' => $user->id,
      'project_id' => $project->id
    ];

    // パブリックメッセージをpost
    $response = $this->post('/projects/2',$data);

    // DBへの登録を確認(public_msgs)
    $this->assertDatabaseHas('public_msgs', $data);

    // DBへの登録を確認(public_notifies)
    $this->assertDatabaseHas('public_notifies', [
      'public_board_id' => $project->id,
      'user_id' => $user->id,
      'read_flg' => 1, // メッセージを送ったユーザーは既読フラグが1になる
    ]);


    // リダイレクト先を確認
    $response->assertStatus(302)
             ->assertRedirect('/projects/2');



  }

  /**
   * @test
   * @return void
   */

  public function 正常系：パブリックメッセージの通知フラグ確認(): void
  {

    // ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝
    // project detail画面の表示
    // ダミーのユーザー(project作成者)
    $user = factory(User::class)->create(['id' => 2]);
    // 認証されていないことを確認
    $this->assertGuest();

    // ダミーのユーザー(パブリックコメントに参加しているだけの人)
    $user2 = factory(User::class)->create(['id' => 3]);

    // ダミーのユーザー(これからコメントをする人)
    $user2 = factory(User::class)->create(['id' => 4]);

    // 認証されていないことを確認
    $this->assertGuest();

    // ダミーのプロジェクト
    $project = factory(Project::class)->create([
      'id' => 2,
      'user_id' => 2,
    ]);
    // projectがDB登録されているか確認
    $this->assertDatabaseHas('projects', [
      'id' => 2,
      'user_id' => 2,
    ]);

    // パブリックコメントに参加済みのユーザーを作成
    // プロジェクトを投稿した際に登録されているユーザー2
    factory(PublicNotify::class)->create([
      'public_board_id' => 2, //project_id
      'user_id' => 2,
      'read_flg' => 1 //既読。これまでのコメント。
    ]);
    // DBへの登録を確認(public_notifies)
    $this->assertDatabaseHas('public_notifies', [
      'public_board_id' => 2, //$project->id
      'user_id' => 2,
      'read_flg' => 1, // projectを掲載しているユーザーは既読フラグが0になる
    ]);

    // 以前投稿したことのあるユーザー3
    factory(PublicNotify::class)->create([
      'public_board_id' => 2, //project_id
      'user_id' => 3,
      'read_flg' => 1 //既読。これまでのコメント。
    ]);

    // DBへの登録を確認(public_notifies)
    $this->assertDatabaseHas('public_notifies', [
      'public_board_id' => 2, //$project->id
      'user_id' => 3,
      'read_flg' => 1, // projectを掲載しているユーザーは既読フラグが0になる
    ]);

    // projectの詳細ページを確認
    $response = $this->get('/projects/2');

    // コメント用ユーザーを認証済みにする
    $response = $this->actingAs($user2)->get('/projects/2');
    // 200レスポンスが帰ってくるのを確認
    $response->assertStatus(200);

    // 認証を確認
    $this->assertAuthenticated();

    // ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝
    // パブリックコメントがDB保存されるのを確認

    // ダミーのパブリックコメント
    $data = [
      'content' => "eeeee",
      'deleted_at' => null,
      'sender_id' => 4,
      'project_id' => 2
    ];

    // パブリックメッセージをpost
    $response = $this->post('/projects/2',$data);

    // DBへの登録を確認(public_msgs)
    $this->assertDatabaseHas('public_msgs', $data);

    // DBへの登録を確認(public_notifies)
    $this->assertDatabaseHas('public_notifies', [
      'public_board_id' => 2, //$project->id
      'user_id' => 4,
      'read_flg' => 1, // メッセージを送ったユーザーは既読フラグが1になる
    ]);

    // DBへの登録を確認(public_notifies)
    $this->assertDatabaseHas('public_notifies', [
      'public_board_id' => 2, //$project->id
      'user_id' => 2,
      'read_flg' => 0, // projectを掲載しているユーザーは既読フラグが0になる
    ]);

    // DBへの登録を確認(public_notifies)
    $this->assertDatabaseHas('public_notifies', [
      'public_board_id' => 2, //$project->id
      'user_id' => 3,
      'read_flg' => 0, // projectを掲載しているユーザーは既読フラグが0になる
    ]);

    // リダイレクト先を確認
    $response->assertStatus(302)
             ->assertRedirect('/projects/2');

  }


}
