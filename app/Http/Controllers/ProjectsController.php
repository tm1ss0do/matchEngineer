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
use App\Http\Requests\StoreProjectPost;
use App\Http\Requests\StoreMessageRequest;
use App\Http\Requests\StoreProfileRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class ProjectsController extends Controller
{
    //
    public function show_project_all(){

      // $projects = Project::all();
      $projects = Project::with('user')->get();

      return view('projects.all', compact('projects'));

    }

    public function pass_edit_form($id){

      return view('users.password_edit');
    }

    public function pass_edit_post(Request $request, $id){

        //現在のパスワードが正しいかを調べる
        if(!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            return redirect()->back()->with('flash_message', '現在のパスワードが間違っています。');
        }

        //現在のパスワードと新しいパスワードが違っているかを調べる
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
            return redirect()->back()->with('flash_message', '新しいパスワードが現在のパスワードと同じです。違うパスワードを設定してください。');
        }

        //パスワードのバリデーション。新しいパスワードは8文字以上、new-password_confirmationフィールドの値と一致しているかどうか。
        $validated_data = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:8|confirmed',
        ]);

        //パスワードを変更
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with('flash_message', 'パスワードを変更しました。');

      // return view('users.password_edit');
    }

    public function email_edit_form($id){

      return view('users.email_edit');
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
      $user = Auth::user();
      $projects = $user->projects;
      // 未読フラグ回収（パブリックメッセージ）
      $public_msgs_yet = $user->public_notify
                         ->where('read_flg','0')
                         ->first();

      // 未読フラグ回収（ダイレクトメッセージ）
      $direct_msgs_yet = $user->direct_notify
                         ->where('read_flg','0')
                         ->first();

      return view('mypages.registered', compact('projects','user', 'public_msgs_yet', 'direct_msgs_yet', 'join_users'));
    }
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

    public function show_dm_list(){

      $auther_id = Auth::id();
      $auther = Auth::user();

      // 現在ログイン中のuserが属しているダイレクトメッセージボードを全て取得
      $direct_msgs_boards = DirectMsgsBoard::where('sender_id', $auther_id)
                     ->orWhere('reciever_id',$auther_id)
                     ->orderBy('updated_at', 'desc')
                     ->get();
      // 未読フラグ回収（ダイレクトメッセージ）
      $direct_msgs_yet = $auther->direct_notify
                         ->where('read_flg','0');

      // return view('mypages.dmlist', compact('direct_msgs'));
      return view('mypages.dm_list', compact('direct_msgs_boards','direct_msgs_yet'));
    }

    public function show_dm_board($id){
      // ダイレクトメッセージを表示
      $directmsgs = DirectMsgs::where('board_id', $id)
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

      return view('mypages.dm_board', compact('directmsgs'));
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

       // 投稿者をpublicコメントの参加者として登録。
       // 未読メッセージはないので、既読フラグを立てて新規保存

       $id = $project->id; //直前に登録したprojectのID
       $auther = Auth::user();

       $public_notify = new PublicNotify;
       $public_notify->public_board_id = $id;
       $public_notify->user_id = $auther;
       $public_notify->read_flg = '1';
       $public_notify->save();

       return redirect('projects/all')->with('flash_message', __('Registered.'));
    }
    public function project_edit_form($id){
      if(!ctype_digit($id)){
        return redirect('/projects/all')->with('flash_message', __('Invalid operation was performed.'));
        }
      $user = Auth::user();
      $project = Project::where('id',$id)->first();

      return view('projects.edit', compact('user','project'));
    }
    public function project_edit_post(StoreProjectPost $request, $id){
      if(!ctype_digit($id)){
        return redirect('/projects/all')->with('flash_message', __('Invalid operation was performed.'));
        }
      $project = Project::find($id);
      $request->validated();
      // 変更があれば更新処理ーーーー
      $fillData = $request->all();
      $fillData += array(
        'updated_at' => Carbon::now(),
      );
      $project->fill($fillData)->save();
      // ーーーーーーーー
      $user = $project->user;
      $publicmsgs = PublicMsg::where('project_id', $id)
                    ->with('user')
                    ->orderBy('send_date', 'asc')
                    ->get();


      return view('projects.detail', compact('project', 'user', 'publicmsgs'))->with('flash_message', __('Registered.'));;
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
        // 該当のnotifyテーブルに既読フラグを立てる
        $auther = Auth::user();
        $public_notify = $auther->public_notify->where('public_board_id', $id)->first();
        if( !$public_notify->read_flg ){
          $public_notify->read_flg = '1';
          $public_notify->save();
        }

        return view('projects.detail', compact('project', 'user' , 'auther', 'publicmsgs','public_notify'));

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
    public function profile_edit_post(StoreProfileRequest $request, $id){
      if(!ctype_digit($id)){
        return redirect('/projects/all')->with('flash_message', __('Invalid operation was performed.'));
        }
        // ユーザーのプロフィール更新処理
        $user = User::find($id);
        // バリデーション
        $request->validated();

        // 更新処理ーーーー
        $user->name = $request->name;
        $user->self_introduction = $request->self_introduction;
        $user->updated_at = Carbon::now();
        // 元の画像を削除
        $path_prev = $user->profile_icon;
        $pathdel = storage_path() . '/app/public/avatar/'.$path_prev;
        \File::delete($pathdel);
        // 新しい画像はstorage配下へ保存
        $path = $request->profile_icon->store('public/avatar');
        $user->profile_icon = basename($path);
        $user->save();
        // ーーーーーーーー

        // profile画面へ遷移させる
        return view('users.profile', compact('user','file'))->with('flash_message', __('Registered.'));
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

}
