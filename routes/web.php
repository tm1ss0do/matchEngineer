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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/projects/all', 'ProjectsController@show_project_all')->name('project.all');
Route::get('/projects/new', 'ProjectsController@new')->name('project.new');
Route::get('/projects/json', 'ProjectsController@json_data');
Route::get('/projects/{id}/msg_json', 'ProjectsController@json_data_msg');
Route::get('/projects/{id}', 'ProjectsController@show_project_detail')->name('project.detail');
Route::get('/projects/{id}/edit', 'ProjectsController@project_edit_form')->name('project.project_edit_form');
Route::get('/projects/{id}/application', 'ProjectsController@apply_form')->name('project.apply_form');
Route::get('/projects/{id}/profile', 'ProjectsController@profile')->name('project.profile');
Route::get('/mypages/{id}/profile/edit', 'ProjectsController@profile_edit_form')->name('project.profile_edit_form');



Route::get('/projects/dm/{id}', 'ProjectsController@dm_form')->name('project.dm_form');
Route::get('/mypages/applied', 'ProjectsController@applied')->name('project.applied');
Route::get('/mypages/direct_msg', 'ProjectsController@show_dm_list')->name('project.show_dm_list');
Route::get('/mypages/direct_msg/{id}', 'ProjectsController@show_dm_board')->name('project.show_dm_board');
Route::get('/mypages/public_msg', 'ProjectsController@show_pm_list')->name('project.show_pm_list');

Route::get('/mypages/registered', 'ProjectsController@registered')->name('project.registered');

Route::get('/mypages/withdraw', 'WithdrawController@index')->name('withdraw.index');
Route::post('/mypages/withdraw', 'WithdrawController@delete_user_logical')->name('withdraw.index');


Route::post('/projects/dm/{id}', 'ProjectsController@dm_new')->name('project.dm_new');
Route::post('/projects/new', 'ProjectsController@create_project')->name('project.create');
Route::post('/projects/{id}', 'ProjectsController@public')->name('project.public');
Route::post('/projects/{id}/application', 'ProjectsController@apply')->name('project.apply');
Route::post('/mypages/direct_msg/{id}', 'ProjectsController@send_dm_at_board')->name('project.send_dm_at_board');
Route::post('/mypages/{id}/profile/edit', 'ProjectsController@profile_edit_post')->name('project.profile_edit_post');
Route::post('/projects/{id}/edit', 'ProjectsController@project_edit_post')->name('project.project_edit_post');
