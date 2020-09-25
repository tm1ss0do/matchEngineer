<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Project;
// use App\PublicMsg;
use App\DirectMsgsBoard;
use App\DirectMsgs;
// use App\PublicNotify;
use App\DirectNotify;
// use App\EmailReset;
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

class ApplyForProjectController extends Controller
{
    //
    public function applied(){
      // 応募済み案件一覧画面
      $auther_id = Auth::id();

      $direct_msgs = DirectMsgsBoard::where('sender_id', $auther_id)
                     ->whereNotNull('project_id')
                     ->with('project')
                     ->get();

      return view('mypages.applied', compact('direct_msgs'));

    }

    public function apply_form($id){
      // 応募フォーム
      if(!ctype_digit($id)){
        return back()->with('flash_message', __('Invalid operation was performed.'));
        }

        $project = Project::find($id);
        $user = $project->user;

      $projects = Project::with('user')->get();

      return view('projects.apply', compact('project', 'user'));

    }

    public function apply(StoreMessageRequest $request, $id){
      // 応募フォームの内容をバリデーション

      if(!ctype_digit($id)){
        return back()->with('flash_message', __('Invalid operation was performed.'));
        }

       $request->validated();

       $project = Project::find($id);
       $recruiter_id = $project->user_id;

         // DirectMsgsBoardの処理ーーーーーーー
         // メッセージを保管するボードを新規作成
         $fillDataBoard = array(
           'created_at'  => Carbon::now(),
           'updated_at'  => Carbon::now(),
           'reciever_id' => $recruiter_id,
           'sender_id' => Auth::id(),
           'project_id' => $id,
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
       $direct_notify->user_id = $recruiter_id;
       $direct_notify->read_flg = 0; //未読
       $direct_notify->save();


       // 応募済み：project_idが入っている物だけを取得
       $auther_id = Auth::id();
       $direct_msgs = DirectMsgsBoard::where('sender_id', $auther_id)
                      ->whereNotNull('project_id')
                      ->with('project')
                      ->get();

       // 応募済み案件一覧へリダイレクトさせる
       return view('mypages.applied', compact('direct_msgs'))->with('flash_message', __('応募しました'));

    }
}
