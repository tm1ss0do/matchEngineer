<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Project;
use App\PublicMsg;
// use App\DirectMsgsBoard;
// use App\DirectMsgs;
use App\PublicNotify;
// use App\DirectNotify;
use App\EmailReset;
use Illuminate\Support\Facades\Auth;
// use App\Http\Requests\StoreProjectPost;
use App\Http\Requests\StoreMessageRequest;
// use App\Http\Requests\StoreProfileRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Str;

class PublicMessagesController extends Controller
{
    //
    public function show_pm_list(){

      $auther_id = Auth::id();
      $auther = Auth::user();

      // 現在ログイン中のuserが、パブリックメッセージを送ったことがある、projectのidを全て取得
      $projects = PublicMsg::where('sender_id', $auther_id)
                  ->groupBy('project_id')
                  ->get(['project_id']);
      // 対象のプロジェクトにあるメッセージの中で、最新のものを取得
      // （idの大きい方を最新のパブリックコメントとして取得）
      // （ORDER BY と GROUP BYを使うと、先にグループ分けされソートされてしまうのでクエリを使う。）
      $publics = PublicMsg::whereIn('id', function($query) {
                 $query->select(DB::raw('MAX(id) As id'))->from('public_msgs')
                 ->groupBy('project_id');
                 })
                 ->orderBy('updated_at', 'desc')
                 ->get();

      // 未読フラグ回収（パブリックメッセージ）
      $public_msgs_yet = $auther->public_notify
                         ->where('read_flg','0');

      return view('mypages.pm_list', compact('projects', 'publics', 'public_msgs_yet'));
    }

    public function public( StoreMessageRequest $request, $id){
      // パブリックメッセージの登録機能
       $request->validated();
       $publicmsgs = new PublicMsg;
       $fillData = $request->all();
       $fillData += array(
         'send_date' => Carbon::now(),
         'sender_id' => Auth::id(),
         'project_id' => $id,
       );
      $publicmsgs->fill($fillData)->save();

      // 自分以外にこのパブリックメッセージへ参加している人がいる場合は、未読フラグを立ててpublic_notifiesへ保存
      // このメッセージへの参加者を取得
      $join_users = PublicNotify::where('public_board_id', $id)
                    ->select('user_id')->get();
      // 全員を未読として登録
      foreach( $join_users as $join_user){
        $notify = PublicNotify::where('user_id',$join_user->user_id)
                      ->where('public_board_id', $id)
                      ->first();
        if( $notify->read_flg ){
          $notify->read_flg = '0';
          $notify->save();
        }
      }

      // 初めてこのプロジェクトのパブリックメッセージに投稿するか、notifyレコードの有無を判定
      $auther = Auth::user();
      $notify = $auther->public_notify->where('public_board_id', $id)->first();
      if( !$notify ){ // 初めてこのフォームに投稿する場合
        // notifyテーブルに既読フラグを立てて新規保存
        $public_notify = new PublicNotify;
        $public_notify->public_board_id = $id;
        $public_notify->user_id = $auther;
        $public_notify->read_flg = '1';
        $public_notify->save();
      }else{
        // すでにこのメッセージのやりとりに参加している場合
        if( !$notify->read_flg ){
          $notify->read_flg = '1';
          $notify->save();
        }
      }

      return back()->with('flash_message', __('投稿しました.'));
    }
}
