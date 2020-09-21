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
use Illuminate\Support\Facades\DB;

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
           'read_flg'  => 0,
           'created_at' => Carbon::now(),
           'updated_at' => Carbon::now(),
           'sender_id' => Auth::id(),
           'board_id' => $direct_msgs_boards->id //直前にinsertしたDirectMsgsBoardのID
         );


         $direct_msgs = new DirectMsgs;
         $direct_msgs->fill($fillDataMsg)->save();


       // 応募済み：project_idが入っている物だけを取得
       $auther_id = Auth::id();
       $direct_msgs = DirectMsgsBoard::where('sender_id', $auther_id)
                      ->whereNotNull('project_id')
                      ->with('project')
                      ->get();

       // 応募済み案件一覧へリダイレクトさせる
       return view('mypages.applied', compact('direct_msgs'))->with('flash_message', __('応募しました'));

    }



    public function applied(){
      // 応募済み案件一覧画面
      $auther_id = Auth::id();

      $direct_msgs = DirectMsgsBoard::where('sender_id', $auther_id)
                     ->whereNotNull('project_id')
                     ->with('project')
                     ->get();

      return view('mypages.applied', compact('direct_msgs'));

    }

    public function registered(){
      // 登録済み案件一覧画面表示
      $user = Auth::id();
      $projects = Project::where('user_id',$user)
                  ->get();

      return view('mypages.registered', compact('projects','user'));
    }
    public function show_pm_list(){

      $auther_id = Auth::id();

      // 現在ログイン中のuserが、パブリックメッセージを送ったことがある、projectのidを全て取得
      $projects = PublicMsg::where('sender_id', $auther_id)
                  ->groupBy('project_id')
                  ->get(['project_id']);

      // ORDER BY と GROUP BYを使うと、先にグループ分けされソートされてしまうのでクエリを使う。
      // idの大きい方を最新のパブリックコメントとして取得
      $publics = PublicMsg::whereIn('id', function($query) {
                 $query->select(DB::raw('MAX(id) As id'))->from('public_msgs')
                 ->groupBy('project_id');
                 });
      // さらに自分がコメントしたことがあるモノに絞って取得
      $publics = $publics->whereIn('project_id', $projects)
                 ->with('user')
                 ->with('project')
                 ->get();

      return view('mypages.pm_list', compact('projects', 'publics'));
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

    public function send_dm(StoreMessageRequest $request, $id){

      // 送信内容のバリデーション
      $request->validated();

      // DirectMsgの処理ーーーーーーー
      // メッセージを登録

      $fillDataMsg = $request->all();
      $fillDataMsg += array(
        'send_date'  => Carbon::now(),
        'read_flg'  => 0,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
        'sender_id' => Auth::id(),
        'board_id' => $id
      );

      $direct_msgs = new DirectMsgs;
      $direct_msgs->fill($fillDataMsg)->save();

      return back()->with('flash_message', '送信しました');
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

    public function profile_edit_form($id){
      if(!ctype_digit($id)){
        return redirect('/projects/all')->with('flash_message', __('Invalid operation was performed.'));
        }
        // プロフィール編集画面を表示
        $user = User::find($id);


        return view('users.profile_edit_form', compact('user'));
    }
    public function profile_edit_post(Request $request, $id){
      if(!ctype_digit($id)){
        return redirect('/projects/all')->with('flash_message', __('Invalid operation was performed.'));
        }
        // ユーザーのプロフィール更新処理
        $user = User::find($id);
        // 更新データとの差分をみるため、save()を使用。(updateは差分を見ない)
        $user->fill($request->all())->save();

        // profile画面へ遷移させる
        return view('users.profile', compact('user'))->with('flash_message', __('Registered.'));
    }

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
        // 案件なしのダイレクトメッセージをDB保存

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
          'read_flg'  => 0,
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now(),
          'sender_id' => Auth::id(),
          'board_id' => $direct_msgs_boards->id //直前にinsertしたDirectMsgsBoardのID
        );


        $direct_msgs = new DirectMsgs;
        $direct_msgs->fill($fillDataMsg)->save();

      return redirect('/mypages/direct_msg')->with('flash_message', __('送信しました'));
    }

}
