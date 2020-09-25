<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Auth::routes();
Auth::routes(['verify' => true]);

// *******************************************************
// ログインユーザーのみ許可-----------
Route::group(['middleware' => 'auth'], function() {
  // CreateProject Controller
  Route::get('/projects/new', 'CreateProjectController@new')->name('project.new');
  Route::post('/projects/new', 'CreateProjectController@create_project')->name('project.create');
  Route::get('/mypages/registered', 'CreateProjectController@registered')->name('project.registered');

  // EditProject Controller
  Route::get('/projects/{id}/edit', 'EditProjectController@project_edit_form')->name('project.project_edit_form');
  Route::post('/projects/{id}/edit', 'EditProjectController@project_edit_post')->name('project.project_edit_post');

  // ApplyForProject Controller
  Route::get('/projects/{id}/application', 'ApplyForProjectController@apply_form')->name('project.apply_form');
  Route::post('/projects/{id}/application', 'ApplyForProjectController@apply')->name('project.apply');
  Route::get('/mypages/applied', 'ApplyForProjectController@applied')->name('project.applied');


  // DirectMessages Controller
  Route::get('/projects/dm/{id}', 'DirectMessagesController@dm_form')->name('project.dm_form');
  Route::post('/projects/dm/{id}', 'DirectMessagesController@dm_new')->name('project.dm_new');
  Route::get('/mypages/direct_msg', 'DirectMessagesController@show_dm_list')->name('project.show_dm_list');
  Route::get('/mypages/direct_msg/{id}', 'DirectMessagesController@show_dm_board')->name('project.show_dm_board');
  Route::post('/mypages/direct_msg/{id}', 'DirectMessagesController@send_dm_at_board')->name('project.send_dm_at_board');

  // PublicMessages Controller
  Route::get('/mypages/public_msg', 'PublicMessagesController@show_pm_list')->name('project.show_pm_list');
  Route::post('/projects/{id}', 'PublicMessagesController@public')->name('project.public');


  // ChangeProfile Controller
  Route::get('/mypages/{id}/profile/edit', 'ChangeProfileController@profile_edit_form')->name('profile_edit_form');
  Route::post('/mypages/{id}/profile/edit', 'ChangeProfileController@profile_edit_post')->name('profile_edit_post');

  // ChangePassword Controller
  Route::get('/mypages/{id}/password/edit', 'ChangePasswordController@pass_edit_form')->name('pass_edit_form');
  Route::post('/mypages/{id}/password/edit', 'ChangePasswordController@pass_edit_post')->name('pass_edit_post');


  // ChangeEmail Controller
  Route::get('/mypages/{id}/email/edit', 'ChangeEmailController@email_edit_form')->name('email_edit_form');
  Route::get('reset/{token}', 'ChangeEmailController@email_reset');
  Route::post('/mypages/{id}/email/edit', 'ChangeEmailController@email_edit_post')->name('email_edit_post');


  // Withdraw Controller
  Route::get('/mypages/withdraw', 'WithdrawController@index')->name('withdraw.index');
  Route::post('/mypages/withdraw', 'WithdrawController@delete_user_logical')->name('withdraw.index');
});


// *******************************************************
// 誰でも許可


Route::get('/', function () {
    return view('welcome');
});

// Home Controller
Route::get('/home', 'HomeController@index')->name('home');

// Projects Controller

Route::get('/projects/all', 'ProjectsController@show_project_all')->name('project.all');
Route::get('/projects/json', 'ProjectsController@json_data');
Route::get('/projects/{id}', 'ProjectsController@show_project_detail')->name('project.detail');
Route::get('/projects/{id}/msg_json', 'ProjectsController@json_data_msg');
Route::get('/projects/{id}/profile', 'ProjectsController@profile')->name('project.profile');
