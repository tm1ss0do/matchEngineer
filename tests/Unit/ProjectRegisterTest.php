<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\PublicNotify;

class ProjectRegisterTest extends TestCase
{
  use RefreshDatabase;
  // バリデーションの処理：StoreProjectPostTestファイルにて実行
  // ログインユーザー：LoginTestファイルにて実行

  // POST内容がDBへ登録できるかテスト

  /**
   * @test
   * @return void
   */

  public function 正常系(): void
  {

    // ログイン用ユーザーの作成
    $user = factory(User::class)->create();
    // 作ったユーザーを認証済みにする
    $response = $this->actingAs($user)->get('/projects/new');
    // 302レスポンスが帰ってくるのを確認
    $response->assertStatus(200);
    // 認証を確認
    $this->assertAuthenticated();

    // POSTする案件詳細のデータを作成
      $data = [
          'project_title' => '【単発案件】サンプルタイトル１',
          'project_status' => 0,
          'project_type' => 'single',
          'project_reception_end' => '2020-10-05 10:14:32',
          'project_max_amount' => 1234567,
          'project_mini_amount' => 12345,
          'project_detail_desc' => '数ある求人の中から興味を持っていただき、ありがとうございます。',
      ];

      // 案件詳細情報をPOST
      $response = $this->post('/projects/new',$data);

      // DBへの登録を確認(projects)
      $this->assertDatabaseHas('projects', $data);

      // DBへの登録を確認(public_notifies)
      $this->assertDatabaseHas('public_notifies', [
        'public_board_id' => 4, //$project->id
        'user_id' => $user->id,
        'read_flg' => 1, // projectを投稿時点で既読フラグが1になる
      ]);

      // // DBへの登録を確認(direct_msgs_boards)
      // $this->assertDatabaseHas('direct_msgs_boards', [
      //   'sender_id' => $user2->id,
      //   'reciever_id' => $user1->id,
      // ]);


  }

}
