<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProjectsController extends Controller
{
    //
    public function show_project_all(){
      $users = User::all();
      return view('projects.all', ['users' => $users ]);
    }

    public function json_data(){
      $users = User::all();
      return $users;
    }

}
