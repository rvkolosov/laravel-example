<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')
    ->get('user', fn(Request $request) => $request->user());

Route::apiResource('images', 'ImageController');
Route::apiResource('messages', 'MessageController');
Route::apiResource('posts', 'PostController');
Route::apiResource('rooms', 'RoomController');
Route::apiResource('todos', 'TodoController');

Route::get('images/{image}/load', 'ImageController@load');

Route::prefix('search')->group(function() {
    Route::get('posts', 'SearchController@posts')
        ->name('posts');
});

Route::post('rooms/{room}/users/{user}', 'RoomUserController@store')
    ->name('rooms.users.store');
Route::delete('rooms/{room}/users/{user}', 'RoomUserController@delete')
    ->name('rooms.users.delete');
