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

Route::get('/post/list', function (Request $request) {
    return response()->json(
        [
            [
                'id' => 234,
                'title' => 'title the post1',
                'message' => 'message for post1',
            ],
            [
                'id' => 2341,
                'title' => 'title the post2',
                'message' => 'message for post2',
            ]
        ]
    );
});

Route::post('/post', function (Request $request) {
    return response()->json(
        [
            [
                'id' => 2342,
                'title' => $request->title,
                'message' => $request->message,
            ]
        ]
    );
});
