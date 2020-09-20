<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Project;
use App\PublicMsg;
use App\DirectMsgsBoard;
use App\DirectMsgs;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreProjectPost;
use App\Http\Requests\StoreMessageRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;

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

      $publicmsgs = PublicMsg::where('project_id', $id)
                    ->with('user')
                    ->orderBy('send_date', 'asc')
                    ->get();
      return $publicmsgs->toJson();

    }

    public function apply_form($id){

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

       // $direct_msgs_board = DirectMsgsBoard::with('project')->get();
       // $direct_msgs_board = DirectMsgsBoard::where('project_id', $id)->get();
       // $board_id = DirectMsgsBoard::where('project_id', $id)->select('id')->get();
       // $direct_msgs = $board_id;
       //
       // $directs = DirectMsgsBoard::with('project')->get();

       // directメッセージボードの、
       // $directs = DirectMsgsBoard::with('project')->get();

       // プロジェクトのuser_idが、自分でないモノを全て取得

       // directメッセージボードの中から、reciever_idまたはsender_idに、自分のidが入っているものを探し出す
       // 募集者または応募者になっている

       // プロジェクトテーブルの中から、user_id = 自分のモノの、idを全て取得


       // $user = Auth::user();
       // $id = Auth::id();

       // $publicmsgs_board = new PublicMsgBoard;

       //  $fillData = $request->all();
       //  $fillData += array(
       //    'send_date' => Carbon::now(),
       //    'read_flg' => 0,
       //    'sender_id' => Auth::id(),
       //    'project_id' => $id,
       //  );
       // $publicmsgs->fill($fillData)->save();
       //
       // return back()->with('flash_message', __('投稿しました.'));

       // $direct_msgs_board = DirectMsgsBoard::with('project')->get();
       // $direct_msgs_board = DirectMsgsBoard::where('project_id', $id)->get();
       // $board_id = DirectMsgsBoard::where('project_id', $id)->select('id')->get();
       // $direct_msgs = $board_id;
       //
       // DirectMsgsBoard::where('project_id', $id)->user();

       $auther_id = Auth::id();

       $direct_msgs = DirectMsgsBoard::where('sender_id', $auther_id)->with('project')->get();

       // 応募済み案件一覧へリダイレクトさせる
       return view('mypages.applied', compact('direct_msgs'))->with('flash_message', __('応募しました'));

    }



    public function applied(){
      // 応募済み案件一覧画面
      $auther_id = Auth::id();

      $direct_msgs = DirectMsgsBoard::where('sender_id', $auther_id)->with('project')->get();

      return view('mypages.applied', compact('direct_msgs'));

    }

    public function show_dm_list(){

      $auther_id = Auth::id();

      // 現在ログイン中のuserが属しているダイレクトメッセージボードを全て取得
      $direct_msgs = DirectMsgsBoard::where('sender_id', $auther_id)
                     ->orWhere('reciever_id',$auther_id)
                     ->get();

      // return view('mypages.dmlist', compact('direct_msgs'));
      return view('mypages.dm_list', compact('direct_msgs'));
    }

    public function show_dm_board($id){

      $directmsgs = DirectMsgs::where('board_id', $id)
                    ->with('user')
                    ->orderBy('send_date', 'asc')
                    ->get();

      return view('mypages.dm_board', compact('directmsgs'));
    }


    public function new(){
      $user = Auth::user();   #ログインユーザー情報を取得します。
      return view('projects.new', compact('user'));
    }

    public function create_project( StoreProjectPost $request ){

       $request->validated();

       $project = new Project;
       $fillData = $request->all();
       $fillData += array('user_id' => Auth::id());

       $project->fill($fillData)->save();

       return redirect('projects/all')->with('flash_message', __('Registered.'));
    }

    public function show_project_detail($id){
      // 渡されたidにしたがって、projectの詳細ページを表示
      if(!ctype_digit($id)){
        return redirect('/projects/all')->with('flash_message', __('Invalid operation was performed.'));
        }

        $project = Project::find($id);
        $user = $project->user;

        $publicmsgs = PublicMsg::where('project_id', $id)
                      ->with('user')
                      ->orderBy('send_date', 'asc')
                      ->get();


        return view('projects.detail', compact('project', 'user' , 'publicmsgs'));

    }

    public function public( StoreMessageRequest $request, $id){

       $request->validated();

       $publicmsgs = new PublicMsg;

       $fillData = $request->all();
       $fillData += array(
         'send_date' => Carbon::now(),
         'read_flg' => 0,
         'sender_id' => Auth::id(),
         'project_id' => $id,
       );

      $publicmsgs->fill($fillData)->save();

      return back()->with('flash_message', __('投稿しました.'));
    }

    public function profile($id){
      // 渡されたidにしたがって、userのprofileページを表示
      if(!ctype_digit($id)){
        return redirect('/projects/all')->with('flash_message', __('Invalid operation was performed.'));
        }

        $user = User::find($id);
        return view('users.profile', compact('user'));
    }

    public function dm_form($id){
      if(!ctype_digit($id)){
        return redirect('/projects/all')->with('flash_message', __('Invalid operation was performed.'));
        }

      return view('users.dm_form');
    }

    public function dm_new($id){
      if(!ctype_digit($id)){
        return redirect('/projects/all')->with('flash_message', __('Invalid operation was performed.'));
        }

      return redirect('/mypages/direct_msg')->with('flash_message', __('送信しました'));
    }

}
