<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WithdrawController extends Controller
{
    //
    public function index(){
      // ユーザーの退会画面表示(論理削除用)

      return view('mypages.withdraw');

    }
    public function delete_user_logical(){
      // ユーザーの論理削除を実行( delete_flg = 1 )

      // $user = Auth::user();

      return view('mypages.withdrawn');
    }

}
