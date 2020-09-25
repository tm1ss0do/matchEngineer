<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Project;
use App\PublicMsg;
use App\DirectMsgsBoard;
// use App\DirectMsgs;
// use App\PublicNotify;
// use App\DirectNotify;
// use App\EmailReset;
use Illuminate\Support\Facades\Auth;
// use App\Http\Requests\StoreProjectPost;
// use App\Http\Requests\StoreMessageRequest;
// use App\Http\Requests\StoreProfileRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Str;

class ProjectsController extends Controller
{
    //
    public function show_project_all(){

      // $projects = Project::all();
      $projects = Project::with('user')->get();

      return view('projects.all', compact('projects'));

    }


    public function json_data(){

      $projects = Project::with('user')->get();
      return $projects->toJson();

    }

    public function json_data_msg($id){
      // 該当のプロジェクトに紐付いたパブリックメッセージの情報をjson形式で取得
      $publicmsgs = PublicMsg::where('project_id', $id)
                    ->with('user')
                    ->orderBy('send_date', 'asc')
                    ->get();
      return $publicmsgs->toJson();

    }


    public function show_project_detail($id){
      // 渡されたidにしたがって、projectの詳細ページを表示
      if(!ctype_digit($id)){
        return redirect('/projects/all')->with('flash_message', __('Invalid operation was performed.'));
        }

        $project = Project::find($id);
        $user = $project->user;

        // パブリックメッセージを表示
        $publicmsgs = PublicMsg::where('project_id', $id)
                      ->with('user')
                      ->orderBy('send_date', 'asc')
                      ->get();
        // 該当のnotifyレコードを取得
        $auther = Auth::user();
        $public_notify = $auther->public_notify->where('public_board_id', $id)->first();
        // ユーザーがこのpublicテーブルに参加していた場合
          if($public_notify){
            // 該当のnotifyテーブルに既読フラグを立てる
            if( !$public_notify->read_flg ){
              $public_notify->read_flg = '1';
              $public_notify->save();
            }
        }

        // ログインユーザーがこのプロジェクトにすでに応募しているか判定
        // （応募した場合はDirectMsgsBoardが作成されるので、その中から該当するものを探す）
        $already_apply = DirectMsgsBoard::where('project_id', $id)
                              ->where('sender_id', $auther->id)
                              ->first();

        return view('projects.detail', compact('project', 'user' , 'auther', 'publicmsgs','public_notify', 'already_apply'));

    }


    public function profile($id){
      // 渡されたidにしたがって、userのprofileページを表示
      if(!ctype_digit($id)){
        return redirect('/projects/all')->with('flash_message', __('Invalid operation was performed.'));
        }

        $user = User::find($id);
        return view('users.profile', compact('user'));
    }


}
