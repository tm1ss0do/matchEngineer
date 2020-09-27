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
// use App\EmailReset;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreProjectPost;
// use App\Http\Requests\StoreMessageRequest;
// use App\Http\Requests\StoreProfileRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Str;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;


class CreateProjectController extends Controller
{
    //

    public function registered(){

      // ---------------------------
      // サイドバー用変数まとめ（ビューコンポーザー）
      // 登録済み案件一覧画面表示
      $user = Auth::user();
      // 未読フラグ回収（パブリックメッセージ）
      $pm_yet_notify_flg = $user->public_notify
                         ->where('read_flg','0')
                         ->first();

      // 未読フラグ回収（ダイレクトメッセージ）
      $dm_yet_notify_flg = $user->direct_notify
                         ->where('read_flg','0')
                         ->first();
      // ---------------------------

      // $projects = $user->projects;
      $projects = Project::where('user_id', $user->id)->paginate(2);


      return view('mypages.registered', compact('projects', 'join_users','user', 'pm_yet_notify_flg', 'dm_yet_notify_flg'));
    }


    public function new(){
      // 案件登録画面表示
      $user = Auth::user();   #ログインユーザー情報を取得します。
      return view('projects.new', compact('user'));
    }


    public function create_project( StoreProjectPost $request ){

      // プロジェクトを新規保存

       $request->validated();

       $project = new Project;
       $fillData = $request->all();
       $fillData += array('user_id' => Auth::id());

       $project->fill($fillData)->save();

       // 投稿者をpublicコメントの参加者として登録。
       // 未読メッセージはないので、既読フラグを立てて新規保存

       $id = $project->id; //直前に登録したprojectのID
       $auther = Auth::user();

       $public_notify = new PublicNotify;
       $public_notify->public_board_id = $id;
       $public_notify->user_id = $auther->id;
       $public_notify->read_flg = '1';
       $public_notify->save();

       return redirect('projects/all')->with('flash_message', __('Registered.'));
    }



}
