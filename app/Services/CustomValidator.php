<?php

namespace App\Services;

class CustomValidator extends \Illuminate\Validation\Validator
{

  public function __construct($translator, $data, $rules, $messages = [])
  {
    parent::__construct($translator, $data, $rules, $messages);

    // $message    = カスタムエラーメッセージの内容
    // $attribute  = エラーが発生したキー名
    // $rule       = バリデーションのルール 例:required
    // $parameters = 場合によって変わるが、digitsであれば文字数などが配列で入る
    //
    // クロージャなので、$dataを値渡ししてあげる。
    // $data = リクエストデータが入る
    $replacer = function ($message, $attribute, $rule, $parameters) use ($data) {

      // $message 内の :values を $data[$attribute] に置換する
      return str_replace(':'.$rule, $data[$attribute], $message);
    };
      // 表示させる文字列を入れることもできる
    //   return str_replace(':'.$rule, '最低価格', $message);
    // };

    // 上記のクロージャを適応するルール
    $this->addReplacers([
      "min_price" => $replacer,
    ]);
  }

  /**
   * 最小値 min
   * @param string $attribute
   * @param string $value
   * @param array $parameters 0 => 比較するカラム名
   * @return true
   */
  public function validateMinPrice($attribute, $value, $parameters)
  {
    if (
      !is_numeric($parameters[0]) &&
      !is_null($val = $this->getValue($parameters[0]))
    ) {
      $parameters[0] = $val;
    }

    return parent::validateMin($attribute, $value, $parameters);
  }
}
