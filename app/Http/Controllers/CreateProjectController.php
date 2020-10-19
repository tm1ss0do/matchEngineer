<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Project;
use App\PublicMsg;
use App\PublicNotify;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreProjectPost;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;


class CreateProjectController extends Controller
{
    public function registered(){

      $auther_id = Auth::id();
      $projects = Project::with('user')->where('user_id', $auther_id)->orderBy('updated_at','desc')->paginate(10);

      return view('mypages.registered', compact('projects'));
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
       $fillData += array('project_status' => 0); //募集中

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

       return redirect('mypage/registered')->with('flash_message', __('Registered.'));
    }



}
