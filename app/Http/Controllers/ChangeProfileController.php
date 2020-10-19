<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Project;
use App\PublicMsg;
use App\DirectMsgsBoard;
use App\DirectMsgs;
use App\PublicNotify;
use App\DirectNotify;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreProfileRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ChangeProfileController extends Controller
{
    public function profile_edit_form($id){
      // プロフィール編集画面を表示
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

      $user = User::find($id);

      return view('users.profile_edit_form', compact('user'));
    }

    public function profile_edit_post(StoreProfileRequest $request, $id){
        // ユーザーのプロフィール更新処理

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
        

        $user = User::find($id);
        // バリデーション
        $request->validated();

        // 更新処理ーーーー
        $user->name = $request->name;
        $user->self_introduction = $request->self_introduction;
        $user->updated_at = Carbon::now();
        // 新しい画像はstorage配下へ保存
        if( $request->profile_icon ){


          // ==aws s3環境（herokuの本番環境用です）==
          // アップロードされた画像を$uploadImg変数へ保存
          $user->profile_icon = $request->profile_icon;
          $uploadImg = $request->profile_icon;
          // 第一引数：バケット内階層
          // 第二引数：受け取った画像が入っている変数
          // 第三引数：publicに対する他からのアクセス全般を許可（ファイルのURLによるアクセスが可能）
          $paths3 = Storage::disk('s3')->putFile('/', $uploadImg, 'public');
          // S3に保存した画像を取り出すためのパスをDB保存(表示時に取り出し)
          $user->profile_icon = Storage::disk('s3')->url($paths3);


        }elseif( $user->profile_icon ){
          // 新しい画像がPOSTされていない、かつ、古い画像があった場合
          $user->profile_icon = $user->profile_icon;
        }else{
          // 画像が一度も保存されていない場合は空で登録しdefault_imageを表示
          $user->profile_icon = NULL;
        }

        $user->save();
        // ーーーーーーーー

        // profile画面へ遷移させる
        Session::flash('flash_message', __('Registered.')); //session表示用
        return view('users.profile', compact('user'));
    }
}
