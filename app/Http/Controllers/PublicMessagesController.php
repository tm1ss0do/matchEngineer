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
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

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

      // // 現在ログイン中のユーザーがパブリックメッセージを送ったことがあるなら、
      // if( $auther->public_msg ){
      //   // project_idでまとめて取得
      //   $projects = $auther->public_msg
      //               ->groupBy('project_id')
      //               ->get(['project_id']);
      //   // project_idとuser_idに合致するメッセージを取得
      //   $publics = $auther->public_msg
      //               ->whereIn('project_id', $projects)
      //               ->orderBy('updated_at', 'desc')
      //               ->paginate(2);
      //
      // 未読フラグ回収（パブリックメッセージ）
         $public_msgs_yet = $auther->public_notify
                            ->where('read_flg','0');
      // }else{
      //   $publics = "";
      //   $public_msgs_yet = "";
      // }


      // 対象のプロジェクトにあるメッセージの中で、最新のものを取得
      // （idの大きい方を最新のパブリックコメントとして取得）
      // （ORDER BY と GROUP BYを使うと、先にグループ分けされソートされてしまうのでクエリを使う。）
      // $publics = PublicMsg::whereIn('id', function($query) {
      //              $query->select(DB::raw('MAX(id) As id'))
      //              ->from('public_msgs')
      //              ->groupBy('project_id');
      //            })
      //            ->orderBy('updated_at', 'desc')
      //            ->paginate(2);

      // $publics = $auther->public_msgs->paginate(2);

      // $publics = PublicMsg::whereIn('id', function($query) {
      //             $query->select(DB::raw('MAX(id) As id'))
      //                   ->from('public_msgs')
      //                   ->groupBy('project_id');
      //             })
      //             ->where('sender_id', $auther_id)
      //             ->orderBy('updated_at', 'desc')
      //             ->paginate(2);
      // 自分が参加しているPublicMsgを取得
      $publics = PublicMsg::where('sender_id', $auther_id)
                  // さらにproject_idでグループ分けしたモノの中から、idが大きいもの（新しいモノ）を取得
                  ->whereIn('id', function($query) {
                                  $query->select(DB::raw('MAX(id) As id'))
                                        ->from('public_msgs')
                                        ->groupBy('project_id');
                                  })
                  ->orderBy('updated_at', 'desc')
                  ->paginate(2);


      return view('mypages.pm_list', compact('publics', 'public_msgs_yet'));
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
