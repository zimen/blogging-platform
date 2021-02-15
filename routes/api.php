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
Route::get('/posts', 'App\Http\Controllers\PostController@index')->name('posts.index');
Route::group(['prefix' => 'auth'], function () {
    Route::post('/register', 'App\Http\Controllers\AuthController@register')->name('register');
    Route::post('/login', 'App\Http\Controllers\AuthController@login')->name('login');
    Route::get('/refresh', 'App\Http\Controllers\AuthController@refresh');
    Route::group(['middleware' => ['auth:api', 'auth.api']], function(){
        Route::get('/user', 'App\Http\Controllers\AuthController@user');
        Route::post('logout', 'App\Http\Controllers\AuthController@logout');
    });
});
Route::middleware('auth.api')->group(function () {
    Route::get('/myposts', 'App\Http\Controllers\PostController@index')->name('myposts');
    Route::post('/posts', 'App\Http\Controllers\PostController@store');
});
