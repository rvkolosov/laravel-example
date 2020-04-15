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

Route::post('rooms/{room}/users/{user}', 'RoomUserController@store')
    ->name('rooms.users.store');
Route::delete('rooms/{room}/users/{user}', 'RoomUserController@delete')
    ->name('rooms.users.delete');

Route::bind('image', function ($value) {
    return \App\Models\Image::where('id', $value)
        ->orWhere('slug', $value)
        ->firstOrFail();
});

Route::bind('post', function ($value) {
    return \App\Models\Post::where('id', $value)
        ->orWhere('slug->en', $value)
        ->orWhere('slug->ru', $value)
        ->firstOrFail();
});
