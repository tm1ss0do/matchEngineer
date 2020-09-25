<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class WithdrawController extends Controller
{
    //
    public function index(){
      // ユーザーの退会画面表示(論理削除用)

      return view('withdraws.withdraw');

    }
    public function delete_user_logical(Request $request){
      // ユーザーの論理削除を実行( deleted_at にタイムスタンプが入る )
      $user_id = Auth::id();
      // Auth::logout(); // ログアウト、update処理が行われる。
      $user = User::find($user_id);
      $user->delete();
      // $user->delete_flg = true;
      // $user->save();

      return view('withdraws.withdrawn',compact('user'));
    }

}
