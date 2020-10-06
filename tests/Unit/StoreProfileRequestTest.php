<?php

namespace Tests\Unit;

use Tests\TestCase;

use Illuminate\Support\Facades\Validator;

use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Http\Requests\StoreProfileRequest;

use Illuminate\Http\UploadedFile;


class StoreProfileRequestTest extends TestCase
{
  use RefreshDatabase;
  /**
   * @test
   * @return void
   */

   public function profileの必須エラー(): void
   {
     // $data は、 $request->all() の返り値を想定
       $data = [
           'name' => null, //required
           'profile_icon' => null,
           'self_introduction' => null,
       ];
       // フォームリクエストの生成
       $request = new StoreProfileRequest();

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
       // 失敗の中身も期待通りか確認
       $expectedFailed = [
           'name' => ['Required' => [],],
       ];
       // どのルールが失敗したか＞ $validator->failed()
       $this->assertEquals($expectedFailed, $validator->failed());
   }

   /**
    * @test
    * @return void
    */

   public function profileのmaxエラー(): void
   {
     // ダミー画像を用意
     // $dummy_image = 'file' => new \Illuminate\Http\UploadedFile(resource_path('large-avatar.jpg'), 'large-avatar.jpg', null, null, null, true);
     $dummy_image = UploadedFile::fake()->create('avatar.jpg', 1025);
     // $data は、 $request->all() の返り値を想定
       $data = [
           'name' => str_repeat('a', 256), //required
           'profile_icon' => $dummy_image,
           'self_introduction' => str_repeat('a', 1001),
           // 'name' => 'required|string|max:255',
           // // 'profile_icon' => 'string|max:255',
           // 'profile_icon' => 'image|mimes:jpeg,png,jpg,gif|max:1024|nullable',
           // 'self_introduction' => 'string|max:1000|nullable',
       ];
       // フォームリクエストの生成
       $request = new StoreProfileRequest();

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
       // 失敗の中身も期待通りか確認
       $expectedFailed = [
           'name' => ['Max' => [255],],
           'profile_icon' => ['Max' => [1024],],
           'self_introduction' => ['Max' => [1000],]
       ];
       // どのルールが失敗したか＞ $validator->failed()
       $this->assertEquals($expectedFailed, $validator->failed());
   }


   /**
    * @test
    * @return void
    */

   public function profileのフォーマットエラー(): void
   {
     // ダミー画像を用意
     $dummy_image = UploadedFile::fake()->create('avatar.pdf', 1024);
     // $data は、 $request->all() の返り値を想定
       $data = [
           'name' => str_repeat('a', 100),
           'profile_icon' => $dummy_image,
           'self_introduction' => str_repeat('a', 500),
       ];
       // フォームリクエストの生成
       $request = new StoreProfileRequest();

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
       // 失敗の中身も期待通りか確認
       $expectedFailed = [
           'profile_icon' => ['Mimes' => ['jpeg','png','jpg','gif'], 'Image' => [],],
       ];
       // どのルールが失敗したか＞ $validator->failed()
       $this->assertEquals($expectedFailed, $validator->failed());
   }



   /**
    * @test
    * @return void
    */


   public function profileの正常系エラー(): void
   {
     // ダミー画像を用意
     $dummy_image = UploadedFile::fake()->create('avatar.jpeg', 500); // jpeg (他'png','jpg','gif')
     // $data は、 $request->all() の返り値を想定
       $data = [
           'name' => str_repeat('a', 254), //required
           'profile_icon' => $dummy_image,
           'self_introduction' => str_repeat('a', 999),
       ];
       // フォームリクエストの生成
       $request = new StoreProfileRequest();

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
