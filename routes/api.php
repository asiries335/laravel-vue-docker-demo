<?php

use Illuminate\Http\Request;

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

Route::get('/post/list/{user_id}', 'Api\PostController@getAll')->name('get-all-posts');

Route::post('/post', 'Api\PostController@create')->name('create-post');

Route::put('/post', 'Api\PostController@edit')->name('edit-post');

