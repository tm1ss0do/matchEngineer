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

class DirectMessageRegisterTest extends TestCase
{
  // バリデーションの処理：StoreMessageRequestTestファイルにて実行
  // ログイン認証：LoginTestファイルにて実行

  // POST内容がDBへ登録できるかテスト
  use RefreshDatabase;
  /**
   * @test
   * @return void
   */

  public function 正常系：プロフィール画面から送信(): void
  {

    // ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝
    // project detail画面の表示
    // ダミーのユーザー1（送られる側）
    $user1 = factory(User::class)->create(['id' => 2]);
    // ダミーのユーザー2（送る側）
    $user2 = factory(User::class)->create(['id' => 3]);

    // ダミーユーザー1のプロフィールページを表示確認
    $response = $this->get('/projects/dm/2');
    // 送る側のユーザーを認証済みにする
    $response = $this->actingAs($user2)->get('/projects/dm/2');
    // 200レスポンスが帰ってくるのを確認
    $response->assertStatus(200);

    // 認証を確認
    $this->assertAuthenticated();

    // ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝
    // DMがDB保存されるのを確認

    // ダミーのDMメッセージ
    $data = [
      'content' => "directmsg---",
      'deleted_at' => null,
      'sender_id' => $user2->id,
    ];

    // ダイレクトメッセージをpost
    $response = $this->post('/projects/dm/2',$data);

    // DBへの登録を確認(direct_msgs)
    $this->assertDatabaseHas('direct_msgs', $data);

    // DBへの登録を確認(direct_msgs_boards)
    $this->assertDatabaseHas('direct_msgs_boards', [
      'sender_id' => $user2->id,
      'reciever_id' => $user1->id,
    ]);

    // DBへの登録を確認(direct_notifies)
    $this->assertDatabaseHas('direct_notifies', [
      'direct_board_id' => 2,
      'user_id' => $user2->id, // sender
      'read_flg' => 1, // 既読
    ]);

    // DBへの登録を確認(direct_notifies)
    $this->assertDatabaseHas('direct_notifies', [
      'direct_board_id' => 2,
      'user_id' => $user1->id, // receiver
      'read_flg' => 0, // 未読
    ]);

    // リダイレクト先を確認
    $response->assertStatus(302)
             ->assertRedirect('/mypages/direct_msg');

  }

  /**
   * @test
   * @return void
   */

  public function 正常系：DMのメッセージボードから送信(): void
  {

    // ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝
    // DMのメッセージボードを表示
    // ダミーのユーザー1（送られる側）
    $user1 = factory(User::class)->create(['id' => 2]);
    // ダミーのユーザー2（送る側）
    $user2 = factory(User::class)->create(['id' => 3]);

    // ダミーのダイレクトメッセージボード
    $data_board =[
      'id' => 3,
      'reciever_id' => $user1->id,
      'sender_id' => $user2->id,
      'project_id' => NULL,
    ];
    $dm_board = factory(DirectMsgsBoard::class)->create($data_board);

    // ダミーのダイレクトメッセージ
    $data_msgs =[
      'content' => 'sssss',
      'sender_id' => $user2->id,
      'board_id' => 3,
    ];
    $dm_msg = factory(DirectMsgs::class)->create($data_msgs);


    // ダミー(direct_notifies)
    $dm_board = factory(DirectNotify::class)->create([
      'direct_board_id' => 3,
      'user_id' => $user2->id, // sender
      'read_flg' => 1, // 既読
    ]);

    // ダミー(direct_notifies)
    $dm_board = factory(DirectNotify::class)->create([
      'direct_board_id' => 3,
      'user_id' => $user1->id, // sender
      'read_flg' => 1, // 既読
    ]);

    // ダミーユーザー2のDMをやりとりしているページを表示確認
    $response = $this->get('/mypages/direct_msg/3');
    // 送る側のユーザーを認証済みにする
    $response = $this->actingAs($user2)->get('/mypages/direct_msg/3');
    // 200レスポンスが帰ってくるのを確認
    $response->assertStatus(200);

    // 認証を確認
    $this->assertAuthenticated();

    // ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝
    // DMがDB保存されるのを確認

    // ダミーのDMメッセージ
    $data_dummy = [
      'content' => "directmsg---",
      'deleted_at' => null,
      'sender_id' => $user2->id,
    ];

    // ダイレクトメッセージをpost
    $response = $this->post('/mypages/direct_msg/3',$data_dummy);

    // DBへの登録を確認(direct_msgs)
    $this->assertDatabaseHas('direct_msgs', $data_dummy);

    // DBへの登録を確認(direct_msgs_boards)
    $this->assertDatabaseHas('direct_msgs_boards', [
      'sender_id' => $user2->id,
      'reciever_id' => $user1->id,
    ]);

    // DBへの登録を確認(direct_notifies)
    $this->assertDatabaseHas('direct_notifies', [
      'direct_board_id' => 3,
      'user_id' => $user2->id, // sender
      'read_flg' => 1, // 既読
    ]);

    // DBへの登録を確認(direct_notifies)
    $this->assertDatabaseHas('direct_notifies', [
      'direct_board_id' => 3,
      'user_id' => $user1->id, // receiver
      'read_flg' => 0, // 未読
    ]);

    // リダイレクト先を確認
    $response->assertStatus(302)
             ->assertRedirect('/mypages/direct_msg/3');

  }

}
