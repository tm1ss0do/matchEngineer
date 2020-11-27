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
Route::group(['middleware' => 'verified'], function() {
  // CreateProject Controller
  Route::get('/projects/new', 'CreateProjectController@new')->name('project.new');
  Route::post('/projects/new', 'CreateProjectController@create_project')->name('mypage.create');
  Route::get('/mypage', 'CreateProjectController@registered')->name('mypage.registered');

  // EditProject Controller
  Route::get('/projects/{id}/edit', 'EditProjectController@project_edit_form')->name('project.project_edit_form');
  Route::post('/projects/{id}/edit', 'EditProjectController@project_edit_post')->name('project.project_edit_post');

  // ApplyForProject Controller
  Route::get('/projects/{id}/application', 'ApplyForProjectController@apply_form')->name('project.apply_form');
  Route::post('/projects/{id}/application', 'ApplyForProjectController@apply')->name('project.apply');
  Route::get('/mypage/applied', 'ApplyForProjectController@applied')->name('project.applied');


  // DirectMessages Controller
  Route::get('/projects/dm/{id}', 'DirectMessagesController@dm_form')->name('dm.form');
  Route::post('/projects/dm/{id}', 'DirectMessagesController@dm_new')->name('dm.new');
  Route::get('/mypage/direct_msg', 'DirectMessagesController@show_dm_list')->name('dm.show_dm_list');
  Route::get('/mypage/direct_msg/{id}', 'DirectMessagesController@show_dm_board')->name('dm.show_dm_board');
  Route::post('/mypage/direct_msg/{id}', 'DirectMessagesController@send_dm_at_board')->name('dm.send_dm_at_board');
  Route::get('/mypage/direct_msg/{id}/msg_json', 'DirectMessagesController@json_data_dm');


  // PublicMessages Controller
  Route::get('/mypage/public_msg', 'PublicMessagesController@show_pm_list')->name('pm.show_pm_list');
  Route::post('/projects/{id}', 'PublicMessagesController@send_pm')->name('pm.send_pm');


  // ChangeProfile Controller
  Route::get('/mypage/{id}/profile/edit', 'ChangeProfileController@profile_edit_form')->name('mypage.profile_edit_form');
  Route::post('/mypage/{id}/profile/edit', 'ChangeProfileController@profile_edit_post')->name('mypage.profile_edit_post');

  // ChangePassword Controller
  Route::get('/mypage/{id}/password/edit', 'ChangePasswordController@pass_edit_form')->name('pass.pass_edit_form');
  Route::post('/mypage/{id}/password/edit', 'ChangePasswordController@pass_edit_post')->name('pass.pass_edit_post');


  // ChangeEmail Controller
  Route::get('/mypage/{id}/email/edit', 'ChangeEmailController@email_edit_form')->name('email.email_edit_form');
  Route::get('reset/{token}', 'ChangeEmailController@email_reset');
  Route::post('/mypage/{id}/email/edit', 'ChangeEmailController@email_edit_post')->name('email.email_edit_post');


  // Withdraw Controller
  Route::get('/mypage/withdraw', 'WithdrawController@index')->name('withdraw.index');
  Route::post('/mypage/withdraw', 'WithdrawController@delete_user_logical')->name('withdraw.delete_post');
});


// *******************************************************
// 誰でも許可

// ウェルカムページ画面
Route::get('/', function () {
    return view('welcome');
});

// ChangeEmail Controller
Route::get('/mypage/{id}/email/edit', 'ChangeEmailController@email_edit_form')->name('email.email_edit_form');
Route::get('reset/{token}', 'ChangeEmailController@email_reset');
Route::post('/mypage/{id}/email/edit', 'ChangeEmailController@email_edit_post')->name('email.email_edit_post');


Route::get('/home', 'ProjectsController@show_project_all')->name('project.all');
Route::get('/projects/json', 'ProjectsController@json_data');
Route::get('/projects/{id}', 'ProjectsController@show_project_detail')->name('project.detail');
Route::get('/projects/{id}/msg_json', 'ProjectsController@json_data_msg');
Route::get('/projects/{id}/profile', 'ProjectsController@profile')->name('project.profile');
