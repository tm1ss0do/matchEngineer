<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Project;
use App\PublicMsg;
use App\DirectMsgsBoard;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProjectsController extends Controller
{
    //
    public function show_project_all(){

      $projects = Project::with('user')->get();

      return view('projects.all', compact('projects'));

    }


    public function json_data(){

      $projects = Project::with('user')->orderBy('updated_at','desc')->get();
      return $projects->toJson();

    }

    public function json_data_msg($id){
      // 該当のプロジェクトに紐付いたパブリックメッセージの情報をjson形式で取得
      // ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝
      // バリデーション

      // 数値でなかった場合
      if(!ctype_digit($id)){
        return redirect('/home')->with('flash_message', __('Invalid operation was performed.'));
      }

      // 存在するか判定
      $project = Project::find($id);
      if( empty( $project ) ){
        return redirect('/home')->with('flash_message', __('Invalid operation was performed.'));
      }

      // ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝
      $publicmsgs = PublicMsg::where('project_id', $id)
                    ->with('user')
                    ->orderBy('send_date', 'asc')
                    ->get();
      return $publicmsgs->toJson();

    }


    public function show_project_detail($id){
        // 渡されたidにしたがって、projectの詳細ページを表示
        // ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝
        // バリデーション
        // 数値でなかった場合
        if(!ctype_digit($id)){
          return redirect('/home')->with('flash_message', __('Invalid operation was performed.'));
        }

        // 存在するか判定
        $project = Project::find($id);
        if( empty( $project ) ){
          return redirect('/home')->with('flash_message', __('Invalid operation was performed.'));
        }
        // ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝

        $user = $project->user;

        // パブリックメッセージを表示
        $publicmsgs = PublicMsg::where('project_id', $id)
                      ->orderBy('send_date', 'desc')
                      ->with('user')
                      ->get();
        // 該当のnotifyレコードを取得
        $auther = Auth::user();
        //ログインユーザーの場合
        if( $auther ){
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
        }else{
          // ゲストユーザーの場合
          $already_apply = false;
        }


        return view('projects.detail', compact('project', 'user' , 'auther', 'publicmsgs', 'already_apply'));

    }


    public function profile($id){
      // 渡されたidにしたがって、userのprofileページを表示
      // ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝
      // バリデーション
      // 数値でなかった場合
      if(!ctype_digit($id)){
        return redirect('/home')->with('flash_message', __('Invalid operation was performed.'));
      }

      // 存在するか判定
      $user_exist = User::find($id);
      if( empty( $user_exist ) ){
        return redirect('/home')->with('flash_message', __('Invalid operation was performed.'));
      }
      // ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝

        $user = User::find($id);
        return view('users.profile', compact('user'));
    }


}
