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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return response()->json(['data' => $request->user()]);
});

Route::post('auth/login', 'AuthController@login')->name('auth.login');
Route::post('auth/register', 'AuthController@register')->name('auth.register');
Route::post('auth/change', 'AuthController@change')->name('auth.change');

Route::apiResource('roles', 'RoleController');
Route::apiResource('permissions', 'PermissionController');
Route::apiResource('todos', 'TodoController');

Route::post('roles/{role}/users/{user}', 'RoleUserController@store')->name('roles.users.store');
Route::delete('roles/{role}/users/{user}', 'RoleUserController@delete')->name('roles.users.delete');

Route::post('permissions/{permission}/roles/{role}', 'PermissionRoleController@store')->name('permissions.roles.store');
Route::delete('permissions/{permission}/roles/{role}', 'PermissionRoleController@delete')->name('permissions.roles.delete');