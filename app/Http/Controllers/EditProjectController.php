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
use App\EmailReset;
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

}
