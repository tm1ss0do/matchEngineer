<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Project;
use App\DirectMsgsBoard;
use App\DirectMsgs;
use App\DirectNotify;

class ApplyMessagePostTest extends TestCase
{
  // バリデーションの処理：StoreMessageRequestTestファイルにて実行
  // ログイン認証：LoginTestファイルにて実行

  // POST内容がDBへ登録できるかテスト
  use RefreshDatabase;
  /**
   * @test
   * @return void
   */

  public function 正常系：応募画面から送信(): void
  {

    // ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝
    // project detail画面の表示
    // ダミーのユーザー1（送られる側/プロジェクトを掲載している側）
    $user1 = factory(User::class)->create(['id' => 2]);
    // ダミーのユーザー2（送る側）
    $user2 = factory(User::class)->create(['id' => 3]);

    // ダミーのプロジェクト
    $project = factory(Project::class)->create([
      'id' => 3,
      'user_id' => $user1->id,
    ]);

    // ダミーユーザー1の投稿しているプロジェクトページを表示確認
    $response = $this->get('/projects/3/application');
    // 送る側のユーザーを認証済みにする
    $response = $this->actingAs($user2)->get('/projects/3/application');
    // 200レスポンスが帰ってくるのを確認
    $response->assertStatus(200);

    // 認証を確認
    $this->assertAuthenticated();

    // ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝
    // DMがDB保存されるのを確認

    // ダミーの応募メッセージ
    $data = [
      'content' => "応募します",
      'deleted_at' => null,
      'sender_id' => $user2->id,
    ];

    // ダイレクトメッセージをpost
    $response = $this->post('/projects/3/application',$data);

    // DBへの登録を確認(direct_msgs)
    $this->assertDatabaseHas('direct_msgs', $data);

    // DBへの登録を確認(direct_msgs_boards)
    $this->assertDatabaseHas('direct_msgs_boards', [
      'sender_id' => $user2->id,
      'reciever_id' => $user1->id,
    ]);

    // DBへの登録を確認(direct_notifies)
    $this->assertDatabaseHas('direct_notifies', [
      'direct_board_id' => 1,
      'user_id' => $user2->id, // sender
      'read_flg' => 1, // 既読
    ]);

    // DBへの登録を確認(direct_notifies)
    $this->assertDatabaseHas('direct_notifies', [
      'direct_board_id' => 1,
      'user_id' => $user1->id, // receiver
      'read_flg' => 0, // 未読
    ]);

    // 遷移先を確認
    $response = $this->get('/mypages/applied');
    $response->assertStatus(200);

  }
}
