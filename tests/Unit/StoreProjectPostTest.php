<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Support\Facades\Validator;

use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Http\Requests\StoreProjectPost;


class StoreProjectPostTest extends TestCase
{
  use RefreshDatabase;
  /**
   * @test
   * @return void
   */

   public function 必須エラーとなること(): void
   {
     // $data は、 $request->all() の返り値を想定
       $data = [
           'project_title' => null,
           'project_status' => 0,
           'project_type' => 'single',
           'project_reception_end' => null,
           'project_max_amount' => null,
           'project_mini_amount' => null,
           'project_detail_desc' => null,
       ];
       // フォームリクエストの生成
       $request = new StoreProjectPost();

       //フォームリクエストで定義したルールを取得
       $rules = $request->rules();

       // バリデータインスタンスを生成
       // 第一引数：バリデーションを行うデータ($data)
       // 第二引数：データに適用するバリデーションルール
       $validator = Validator::make($data, $rules);

       // バリデーションが成功ならtrue、失敗ならfalseを返す
       $result = $validator->passes();
       //falseが返るか確認
       $this->assertFalse($result);
       // $this->assertTrue($result);
       // 失敗の中身も期待通りか確認
       // どのルールが失敗したか＞ $validator->failed()
       // falseで返された値を確認
       $expectedFailed = [
           'project_title' => ['Required' => [],],
           'project_detail_desc' => ['Required' => [],],
       ];
       $this->assertEquals($expectedFailed, $validator->failed());
   }

   /**
    * @test
    * @return void
    */

   public function 桁数エラーとなること(): void
   {
     // $data は、 $request->all() の返り値を想定
       $data = [
           'project_title' => str_repeat('a', 101),
           'project_status' => 0,
           'project_type' => str_repeat('a', 256),
           'project_reception_end' => null,
           'project_max_amount' => str_repeat(1, 12),
           'project_mini_amount' => str_repeat(1, 12),
           'project_detail_desc' => str_repeat('a', 2001),
       ];
       // フォームリクエストの生成
       $request = new StoreProjectPost();

       //フォームリクエストで定義したルールを取得
       $rules = $request->rules();

       // バリデータインスタンスを生成
       // 第一引数：バリデーションを行うデータ($data)
       // 第二引数：データに適用するバリデーションルール
       $validator = Validator::make($data, $rules);

       // バリデーションが成功ならtrue、失敗ならfalseを返す
       $result = $validator->passes();
       //falseが返るか確認
       $this->assertFalse($result);
       // $this->assertTrue($result);
       // 失敗の中身も期待通りか確認
       // どのルールが失敗したか＞ $validator->failed()
       // falseで返された値を確認
       $expectedFailed = [
           'project_title' => ['Max' => [100],],
           'project_type' => ['Max' => [255],],
           'project_max_amount' => ['DigitsBetween' => [0 => '1', 1 => '11']],
           'project_mini_amount' => ['DigitsBetween' => [0 => '1', 1 => '11']],
           'project_detail_desc' => ['Max' => [2000],],
       ];
       $this->assertEquals($expectedFailed, $validator->failed());
   }

   /**
    * @test
    * @return void
    */

   public function フォーマットエラーとなること(): void
   {

     // $data は、 $request->all() の返り値を想定
       $data = [
           'project_title' => 'ユーザー名',
           'project_status' => 'aaa',
           'project_type' => 'single',
           'project_reception_end' => 'aaa',
           'project_max_amount' => 'aaa',
           'project_mini_amount' => 'aaa',
           'project_detail_desc' => 'aaa',
       ];
       // フォームリクエストの生成
       $request = new StoreProjectPost();

       //フォームリクエストで定義したルールを取得
       $rules = $request->rules();

       // バリデータインスタンスを生成
       // 第一引数：バリデーションを行うデータ($data)
       // 第二引数：データに適用するバリデーションルール
       $validator = Validator::make($data, $rules);

       // バリデーションが成功ならtrue、失敗ならfalseを返す
       $result = $validator->passes();
       //falseが返るか確認
       $this->assertFalse($result);
       // 失敗の中身(falseで返された値)も期待通りか確認

       $expectedFailed = [
           'project_status' => ['Boolean' => [],], //boolean
           'project_reception_end' => ['Date' => [],], //datetime
           'project_max_amount' => ['Integer' => [], 'DigitsBetween' => [0 => '1', 1 => '11']], //integer
           'project_mini_amount' => ['Integer' => [], 'DigitsBetween' => [0 => '1', 1 => '11']], //integer

       ];

       // どのルールが失敗したか＞ $validator->failed()
       $this->assertEquals($expectedFailed, $validator->failed());
   }

   /**
    * @test
    * @return void
    */

   public function 最高金額が最小金額よりも大きいこと(): void
   {

     // $data は、 $request->all() の返り値を想定
       $data = [
           'project_title' => '【単発案件】サンプルタイトル１',
           'project_status' => 0,
           'project_type' => 'single',
           'project_reception_end' => '2020-10-05 10:14:32',
           'project_max_amount' => 101,
           'project_mini_amount' => 102,
           'project_detail_desc' => '数ある求人の中から興味を持っていただき、ありがとうございます。',
       ];
       // フォームリクエストの生成
       $request = new StoreProjectPost();

       //フォームリクエストで定義したルールを取得
       $rules = $request->rules();

       // バリデータインスタンスを生成
       // 第一引数：バリデーションを行うデータ($data)
       // 第二引数：データに適用するバリデーションルール
       $validator = Validator::make($data, $rules);

       // バリデーションが成功ならtrue、失敗ならfalseを返す
       $result = $validator->passes();
       //falseが返るか確認
       $this->assertFalse($result);
       // 失敗の中身(falseで返された値)も期待通りか確認

       $expectedFailed = [
           'project_max_amount' => ['MinPrice' => ['project_mini_amount'],], //integer

       ];

       // どのルールが失敗したか＞ $validator->failed()
       $this->assertEquals($expectedFailed, $validator->failed());
   }

   /**
    * @test
    * @return void
    */

   public function 正常系(): void
   {

     // $data は、 $request->all() の返り値を想定
       $data = [
           'project_title' => '【単発案件】サンプルタイトル１',
           'project_status' => 0,
           'project_type' => 'single',
           'project_reception_end' => '2020-10-05 10:14:32',
           'project_max_amount' => 12345678901,
           'project_mini_amount' => 123,
           'project_detail_desc' => '数ある求人の中から興味を持っていただき、ありがとうございます。',
       ];
       // フォームリクエストの生成
       $request = new StoreProjectPost();

       //フォームリクエストで定義したルールを取得
       $rules = $request->rules();

       // バリデータインスタンスを生成
       // 第一引数：バリデーションを行うデータ($data)
       // 第二引数：データに適用するバリデーションルール
       $validator = Validator::make($data, $rules);

       // バリデーションが成功ならtrue、失敗ならfalseを返す
       $result = $validator->passes();
       //Trueが返るか確認
       $this->assertTrue($result);
   }


}
