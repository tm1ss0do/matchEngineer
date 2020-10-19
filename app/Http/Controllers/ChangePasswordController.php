<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\EmailReset;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ChangePasswordController extends Controller
{
    //
    public function pass_edit_form($id){

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

      return view('users.password_edit');
    }

    public function pass_edit_post(Request $request, $id){

        // ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝
        // POST時のバリデーション
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

        //現在のパスワードが正しいかを調べる
        if(!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            return redirect()->back()->with('flash_message', '現在のパスワードが間違っています。');
        }

        //現在のパスワードと新しいパスワードが違っているかを調べる
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
            return redirect()->back()->with('flash_message', '新しいパスワードが現在のパスワードと同じです。違うパスワードを設定してください。');
        }

        //パスワードのバリデーション。新しいパスワードは8文字以上、new-password_confirmationフィールドの値と一致しているかどうか。
        $validated_data = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:8|confirmed',
        ]);

        //パスワードを変更
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with('flash_message', 'パスワードを変更しました。');

    }
}
