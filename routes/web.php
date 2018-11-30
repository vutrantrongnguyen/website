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


Route::get('/', function (){
    return redirect('/newspapers');
});
Route::auth();
Route::get('/newspapers/test',function (){
    return view('layouts.app');
});

Route::get('/newspapers/create', 'NewspaperController@create');
Route::post('/newspapers', 'NewspaperController@store');
Route::get('/newspapers','NewspaperController@all');
Route::delete('/newspapers/{newspaper}','NewspaperController@destroy');
Route::get('/newspapers/{newspaper}', 'NewspaperController@show');
Route::post('/newspapers/search','NewspaperController@search');
Route::get('/newspapers/{id}/edit','NewspaperController@edit');
Route::put('/newspapers/{newspaper}/update','NewspaperController@update');

Route::get('/admin/members','MemberController@admin');
//    ->middleware(\App\Http\Middleware\CheckUser::class);
Route::put('/admin/members/{member}','MemberController@update');
Route::delete('/admin/members/{member}','MemberController@destroy');

Route::post('/comments', 'CommentsController@store');
//Route::get('/tasks', 'TaskController@index');
//
//Route::post('/tasks', 'TaskController@save');
//
//Route::get('/tasks/create', 'TaskController@create');
//
//Route::get('/tasks/{id}', 'TaskController@show');
//
//Route::delete('/tasks/{id}', 'TaskController@delete');
//
//Route::get('/tasks/{id}/edit', 'TaskController@edit');
//
//Route::put('/tasks/id','TaskController@update');Ø
//Route::resource('tasks', 'TaskController');
//Route::resource('posts','PostController');
//Route::get('/demo', 'HomeController@demo');
//Route::get('/demo',function (){return view( 'jvscript');});
// Route::get('/data', 'HomeController@ajax');
