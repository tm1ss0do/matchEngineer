<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Project;
use App\PublicMsg;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreProjectPost;

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

    public function new(){
      // $user = \Auth::user();
      // if($user){
      //   $user = \Auth::user();
      // }else{
        // $user = User::fund('2');
      // }
      $user = Auth::user();   #ログインユーザー情報を取得します。
      return view('projects.new', compact('user'));
    }

    public function create_project( StoreProjectPost $request ){

      // $request->validate([
      //      'project_title' => 'required|string|max:100',
      //      'project_status' => 'boolean',
      //      'project_type' => 'required|string|max:255',
      //      'project_reception_end' => 'required|date_format:Y-m-d',
      //      'project_max_amount' => 'integer|nullable',
      //      'project_mini_amount' => 'integer|nullable',
      //      'project_detail_desc' => 'string|max:2000',
      //  ]);

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
                      ->orderBy('send_date', 'asc')
                      ->get();

        return view('projects.detail', compact('project', 'user' , 'publicmsgs'));

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
