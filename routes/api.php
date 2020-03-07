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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('test/{post}', function (\App\Models\Post $post) {
    if (!Auth::user()->hasPermissionTo('show posts')) abort(403);

    return $post->getTranslation('title', app()->getLocale());
})->middleware('auth:api');

Route::bind('post', function ($value) {
    return \App\Models\Post::where('id', $value)
        ->orWhere('slug->en', $value)
        ->orWhere('slug->ru', $value)
        ->firstOrFail();
});
