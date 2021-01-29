<?php


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::post('/register', 'Auth\AuthController@register');
Route::post('/login', 'Auth\AuthController@login');
Route::get('/user', 'Auth\AuthController@user');

Route::group(['middleware' => ['user']], function () {
    Route::post('/posts', 'News\PostController@store')->name('store');    
    Route::get('/posts', 'News\PostController@getPost')->name('getPost');
    Route::get('/posts/{id}', 'News\PostController@details');

    Route::post('/comment', 'Comment\CommentController@comment');
    Route::get('/comment/{id}', 'Comment\CommentController@getComment');

    Route::post('/reply/comment', 'Comment\ReplyController@PostReply');
    Route::get('/reply/comment/{id}' , 'Comment\ReplyController@getReply');
});