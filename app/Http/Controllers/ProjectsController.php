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

      $projects = Project::all();
      // $users = User::find(1);
      // return view('projects.all', ['projects' => $projects ]);
      return view('projects.all', compact('projects'));

    }

    public function json_data(){
      // $users = User::all();
      // return $users;

      $projects = Project::all();
      return $projects;
    }

}
