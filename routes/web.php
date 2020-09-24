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
Route::get('/projects/{id}/profile', 'ProjectsController@profile')->name('project.profile');
Route::get('/projects/{id}', 'ProjectsController@show_project_detail')->name('project.detail');

Route::post('/projects/new', 'ProjectsController@create_project')->name('project.create');
//
// Auth::routes();
//
// Route::get('/home', 'HomeController@index')->name('home');
//
// Auth::routes();
//
// Route::get('/home', 'HomeController@index')->name('home');
