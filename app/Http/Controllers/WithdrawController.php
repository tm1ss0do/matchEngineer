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

      return view('mypages.withdraw');

    }
    public function delete_user_logical(){
      // ユーザーの論理削除を実行( delete_flg = 1 )
      $user = Auth::user();

      $user->delete_flg = true;
      $user->save();

      return view('mypages.withdrawn',compact('user'));
    }

}
