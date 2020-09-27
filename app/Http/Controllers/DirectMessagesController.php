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
// use App\EmailReset;
use Illuminate\Support\Facades\Auth;
// use App\Http\Requests\StoreProjectPost;
use App\Http\Requests\StoreMessageRequest;
// use App\Http\Requests\StoreProfileRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Storage;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Str;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;


class DirectMessagesController extends Controller
{
    //
    public function dm_form($id){
      if(!ctype_digit($id)){
        return redirect('/projects/all')->with('flash_message', __('Invalid operation was performed.'));
        }

      return view('users.dm_form');
    }

    public function dm_new( StoreMessageRequest $request, $id){
      if(!ctype_digit($id)){
        return redirect('/projects/all')->with('flash_message', __('Invalid operation was performed.'));
        }
        // 案件なしで直接ダイレクトメッセージを送る

        // 投稿内容をバリデーション
        $request->validated();

        // DirectMsgsBoardの処理ーーーーーーー
        // メッセージを保管するボードを新規作成
        $fillDataBoard = array(
          'created_at'  => Carbon::now(),
          'updated_at'  => Carbon::now(),
          'reciever_id' => $id,
          'sender_id' => Auth::id(),
          'project_id' => null,
        );

        $direct_msgs_boards = new DirectMsgsBoard;
        $direct_msgs_boards->fill($fillDataBoard)->save();

        // DirectMsgの処理ーーーーーーー
        // 先ほど作ったボードにメッセージを登録

        $fillDataMsg = $request->all();
        $fillDataMsg += array(
          'send_date'  => Carbon::now(),
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now(),
          'sender_id' => Auth::id(),
          'board_id' => $direct_msgs_boards->id //直前にinsertしたDirectMsgsBoardのID
        );

        $direct_msgs = new DirectMsgs;
        $direct_msgs->fill($fillDataMsg)->save();

        // 既読・未読の処理ーーーーーーー
        // sender_idを既読・reciever_idを未読として登録
        // sender
        $direct_notify = new DirectNotify;
        $direct_notify->direct_board_id = $direct_msgs_boards->id; //直線に登録したボードのID
        $direct_notify->user_id = Auth::id();
        $direct_notify->read_flg = 1; //既読
        $direct_notify->save();

        // reciever
        $direct_notify = new DirectNotify;
        $direct_notify->direct_board_id = $direct_msgs_boards->id; //直線に登録したボードのID
        $direct_notify->user_id = $id;
        $direct_notify->read_flg = 0; //未読
        $direct_notify->save();

      return redirect('/mypages/direct_msg')->with('flash_message', __('送信しました'));
    }

    public function show_dm_list(){

      $auther_id = Auth::id();
      $auther = Auth::user();

      // 現在ログイン中のuserが属しているダイレクトメッセージボードを全て取得
      $direct_msgs_boards = DirectMsgsBoard::where('sender_id', $auther_id)
                     ->orWhere('reciever_id',$auther_id)
                     ->orderBy('updated_at', 'desc')
                     ->paginate(10);
      // 未読フラグ回収（ダイレクトメッセージ）
      $direct_msgs_yet = $auther->direct_notify
                         ->where('read_flg','0');

      // return view('mypages.dmlist', compact('direct_msgs'));
      return view('mypages.dm_list', compact('direct_msgs_boards','direct_msgs_yet'));
    }

    public function show_dm_board($id){
      // ダイレクトメッセージを表示
      $directmsgs = DirectMsgs::withTrashed()
                    ->where('board_id', $id)
                    ->with('user')
                    ->orderBy('send_date', 'asc')
                    ->get();
      // 該当のnotifyテーブルに既読フラグを立てる
      $auther = Auth::user();
      $direct_notify = $auther->direct_notify->where('direct_board_id', $id)->first();
      if( !$direct_notify->read_flg ){
        $direct_notify->read_flg = '1';
        $direct_notify->save();
      }

      // 該当のダイレクトメッセージボードを取得
      $board = DirectMsgsBoard::where('id',$id)->first();
      // このボードに参加するどちらか一方が退会済みの場合
      if( !$board->reciever ){
          $no_form = true;
      }elseif( !$board->sender ){
          $no_form = true;
      }else{
          $no_form = false;
      }


      return view('mypages.dm_board', compact('directmsgs', 'no_form'));
    }

    public function send_dm_at_board(StoreMessageRequest $request, $id){
      // ボードにあるフォームで、ダイレクトメッセージを送る機能

      // 送信内容のバリデーション
      $request->validated();

      // DirectMsgの処理ーーーーーーー
      // メッセージを登録
      $auher_id = Auth::id();
      $fillDataMsg = $request->all();
      $fillDataMsg += array(
        'send_date'  => Carbon::now(),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
        'sender_id' => $auher_id,
        'board_id' => $id
      );

      $direct_msgs = new DirectMsgs;
      $direct_msgs->fill($fillDataMsg)->save();

      // DirectMsgBoardの処理ーーーーーーー
      // ボードのupdate時間を現在に登録
      $board = DirectMsgsBoard::where('id',$id)->first();
      $board->updated_at = Carbon::now();
      $board->save();

      // 未読・既読の処理ーーーーーーー
      // メッセージ送信者を既読として登録
      $notify_sender = DirectNotify::where('direct_board_id', $id)
                       ->where('user_id', $auher_id)
                       ->first();
      if( !$notify_sender->read_flg ){
        $notify_sender->read_flg = '1';
        $notify_sender->save();
      }

      // このダイレクトメッセージの受け取り手を取得
      // 受取手はボードのreciever_idまたはsender_idの内、ログインユーザーIDではない方( $read_yet_id に格納)
      if( $board->reciever->id != $auher_id ){
        $read_yet_id = $board->reciever->id;
      }elseif( $board->sender->id != $auher_id ){
        $read_yet_id = $board->sender->id;
      }
      // 受取手を未読者として登録
      $notify_reciever = DirectNotify::where('user_id', $read_yet_id)
                         ->where('direct_board_id', $id)
                         ->first();
      if( $notify_reciever->read_flg ){
        $notify_reciever->read_flg = '0';
        $notify_reciever->save();
      }

      return back()->with('flash_message', '送信しました');
    }
}
