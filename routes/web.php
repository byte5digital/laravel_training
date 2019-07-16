<?php

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
Route::get('/projects', 'ProjectController@index')->name('project.index');
Route::get('/projects/{id}', 'ProjectController@indexById')->name('project.index.id');
Route::delete('/projects/delete/{id}', 'ProjectController@destroy')->name('project.destroy.id');

Route::group(['prefix' => '/task'], static function() {
    Route::get('/{id}', 'TaskController@show')->name('task.index.id');
    Route::get('/', 'TaskController@index')->name('task.index');
    Route::put('/', 'TaskController@update')->name('task.update');
    Route::post('/', 'TaskController@store')->name('task.store');
});


// Route::middleware(['test'])->get('/projects', 'ProjectController@index')->name('project.index');
