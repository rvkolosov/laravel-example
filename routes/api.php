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

Route::get('user', 'Auth\UserController@user');

Route::apiResource('roles', 'RoleController');
Route::apiResource('permissions', 'PermissionController');
Route::apiResource('todos', 'TodoController');
Route::apiResource('messages', 'MessageController');
Route::apiResource('rooms', 'RoomControoler');

Route::post('roles/{role}/users/{user}', 'RoleUserController@store')->name('roles.users.store');
Route::delete('roles/{role}/users/{user}', 'RoleUserController@delete')->name('roles.users.delete');

Route::post('permissions/{permission}/roles/{role}', 'PermissionRoleController@store')->name('permissions.roles.store');
Route::delete('permissions/{permission}/roles/{role}', 'PermissionRoleController@delete')->name('permissions.roles.delete');

Route::post('rooms/{room}/users/{user}', 'RoomUserController@store')->name('rooms.users.store');
Route::delete('rooms/{room}/users/{user}', 'RoomUserController@delete')->name('rooms.users.delete');

Route::get('search/todos', 'SearchController@todos')->name('search.todos');