<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Project;
use App\PublicMsg;
use App\PublicNotify;
use App\EmailReset;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreProjectPost;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class EditProjectController extends Controller
{
    //
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

      $fillData = array(
        'project_title' => $request->project_title,
        'project_status' => $request->project_status,
        'project_type' => $request->project_type,
        'project_max_amount' => $request->project_max_amount,
        'project_mini_amount' => $request->project_mini_amount,
        'project_detail_desc' => $request->project_detail_desc,
        'project_detail_desc' => $request->project_detail_desc,
        'updated_at' => Carbon::now(),
      );
      if( !$request->project_reception_end && $request->project_reception_end_old){
        // カレンダーが空欄で、かつ古い値がある場合
        $fillData += array(
          'project_reception_end' => $request->project_reception_end_old
        );
      }else{
        $fillData += array(
          'project_reception_end' => $request->project_reception_end
        );
      }


      $project->fill($fillData)->save();
      // ーーーーーーーー
      $auther = $project->user;
      $publicmsgs = PublicMsg::where('project_id', $id)
                    ->with('user')
                    ->orderBy('send_date', 'asc')
                    ->get();

      Session::flash('flash_message', __('Registered.')); //session表示用
      return view('projects.detail', compact('project', 'auther', 'publicmsgs'));
    }

}
