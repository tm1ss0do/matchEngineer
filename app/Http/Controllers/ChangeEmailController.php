<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\EmailReset;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ChangeEmailController extends Controller
{
    public function email_edit_form($id){


      // ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝
      // 画面表示時のバリデーション

      // 数値でなかった場合
      if(!ctype_digit($id)){
        return redirect('/home')->with('flash_message', __('Invalid operation was performed.'));
      }
      // 存在するか判定
      $user_exist = User::find($id);
      if( empty( $user_exist ) ){
        return redirect('/home')->with('flash_message', __('Invalid operation was performed.'));
      }

      $auther_id = Auth::id();
      // ログイン中のユーザーidとは異なる場合
      if( $auther_id !== (int)$id ){
        return redirect('/home')->with('flash_message', __('Invalid operation was performed.'));
      }
      // ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝

      $user = Auth::user();
      return view('users.email_edit', compact('user'));
    }

    public function email_edit_post(Request $request, $id){
      // 新しいメールアドレスの使用を確認してから、メールアドレスを更新する処理

      // ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝
      // バリデーション
      // 数値でなかった場合
      if(!ctype_digit($id)){
        return redirect('/home')->with('flash_message', __('Invalid operation was performed.'));
      }
      // 存在するか判定
      $user_exist = User::find($id);
      if( empty( $user_exist ) ){
        return redirect('/home')->with('flash_message', __('Invalid operation was performed.'));
      }
      $auther_id = Auth::id();
      // ログイン中のユーザーidとは異なる場合
      if( $auther_id !== (int)$id ){
        return redirect('/home')->with('flash_message', __('Invalid operation was performed.'));
      }
      // ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝

      $new_email = $request->new_email;

        // トークン生成
        $token = hash_hmac(
            'sha256',
            Str::random(40) . $new_email,
            config('app.key')
        );

        // トークンをDBに保存
        DB::beginTransaction();
        try {
            $param = [];
            $param['user_id'] = $id;
            $param['new_email'] = $new_email;
            $param['token'] = $token;
            $email_reset = EmailReset::create($param);

            DB::commit();

            $email_reset->sendEmailResetNotification($token);

            return redirect('/home')->with('flash_message', '確認メールを送信しました。');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect('/home')->with('flash_message', 'メール更新に失敗しました。');
        }

    }

    public function email_reset(Request $request, $token){

      $email_resets = DB::table('email_resets')
                      ->where('token', $token)
                      ->first();

      // トークンが存在している、かつ、有効期限が切れていないかチェック
      if ($email_resets && !$this->tokenExpired($email_resets->created_at)) {

        // ユーザーのメールアドレスを更新
        $user = User::find($email_resets->user_id);
        $user->email = $email_resets->new_email;
        $user->save();

        // レコードを削除
        DB::table('email_resets')
        ->where('token', $token)
        ->delete();

        return redirect('/home')->with('flash_message', 'メールアドレスを更新しました！');
      }
      else {
        // レコードが存在していた場合削除
        if ($email_resets) {
          DB::table('email_resets')
          ->where('token', $token)
          ->delete();
        }
        return redirect('/home')->with('flash_message', 'メールアドレスの更新に失敗しました。');
      }

    }

    protected function tokenExpired($createdAt)
    {
      // トークンの有効期限は60分に設定
      $expires = 60 * 60;
      return Carbon::parse($createdAt)->addSeconds($expires)->isPast();
    }
}
