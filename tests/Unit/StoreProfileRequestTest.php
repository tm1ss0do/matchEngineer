<?php

namespace Tests\Unit;

use Tests\TestCase;

use Illuminate\Support\Facades\Validator;

use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Http\Requests\StoreProfileRequest;


class StoreProfileRequestTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
     /**
       * カスタムリクエストのバリデーションテスト
       *
       * @param string 項目名
       * @param string 値
       * @param boolean 期待値(true:バリデーションOK、false:バリデーションNG)
       * @dataProvider dataproviderStoreProfileRequest
       */
       public function testValidation($item, $data, $expect)
       {
         //入力項目（$item）とその値($data)
         $dataList = [$item => $data];

         $request = new StoreProfileRequest();
         //フォームリクエストで定義したルールを取得
         $rules = $request->rules();

         //Validatorファサードでバリデーターのインスタンスを取得、その際に入力情報とバリデーションルールを引数で渡す
         $validator = Validator::make($dataList, $rules);
         //入力情報がバリデーショルールを満たしている場合はtrue、満たしていな場合はfalseが返る
         $result = $validator->passes();
         //期待値($expect)と結果($result)を比較
         $this->assertEquals($expect, $result);
       }

       public function dataproviderStoreProfileRequest()
       {

         return [
           '正常' => ['name', 'ユーザー名', true],
           '正常' => ['profile_icon', 'プロフィール画像', ''], //nullable
           '正常' => ['profile_icon', 'プロフィール画像', 'Z9Tb.jpeg'], //img(jpeg)
           '正常' => ['profile_icon', 'プロフィール画像', 'Z9Tb.png'], //img(png)
           '正常' => ['profile_icon', 'プロフィール画像', 'Z9Tb.jpg'], //img(jpg)
           '正常' => ['profile_icon', 'プロフィール画像', 'Z9Tb.gif'], //img(gif)
           '正常' => ['profile_icon', 'プロフィール画像', 'Z9Tb.gif'], //img(gif)
           '正常' => ['profile_icon', 'プロフィール画像', ''], //img(gif)
           '正常' => ['self_introduction', '自己紹介', ''], //nullable

           '必須エラー' => ['name', '', false],
           '形式エラー' => ['profile_icon', 'Z9Tb.txt', false],
           //str_repeat('a', 256)で、256文字の文字列を作成(aが256個できる)
           '最大文字数エラー' => ['content', str_repeat('a', 256), false],
           '最大文字数エラー' => ['self_introduction', str_repeat('a', 1001), false],
         ];
       }

    
}
