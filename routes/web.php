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

Route::get('/posts', 'PostController@index');
Route::get('/post-show', 'PostController@postShow');
Route::post('post/store', 'PostController@store');
Route::get('/post/edit/{id}', 'PostController@edit');
Route::put('/post/update/{id}', 'PostController@update');
Route::delete('/post/delete/{id}', 'PostController@delete');


Route::get('/{vue_route?}', 'PostController@index')->where('vue_route', '(.*)');
