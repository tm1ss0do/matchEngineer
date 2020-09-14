<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Project;

class ProjectsController extends Controller
{
    //
    public function show_project_all(){
      // $users = User::all();
      // return view('projects.all', ['users' => $users ]);


      // $user1Projects = User::find(1)->projects;
      //
      // foreach ($user1Project as $user1Project) {
      //     //
      //     $projects = $user1Project;
      // }

      $projects = Project::all();
      // $users = User::find(1);
      // return view('projects.all', ['projects' => $projects ]);
      return view('projects.all', compact('projects'));

    }

    public function json_data(){
      // $users = User::all();
      // return $users;

      $projects = Project::all();
      // $projects = User::find(1)->projects;
      return $projects;
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
