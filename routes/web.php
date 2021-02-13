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

Route::get('/create', 'PostController@add');
Route::post('/create', 'PostController@create');
Route::get('index', 'PostController@index');
Route::get('edit', 'PostController@edit');
Route::post('edit', 'PostController@update');
Route::get('delete', 'PostController@delete');
//コメント投稿
Route::post('/posts/{comment_id}/comments', 'CommentController@commentsstore');
//コメント取り消し
Route::get('/comments/{comment_id}', 'CommentController@commentsdestroy');