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
    return $request->user();
});

Route::prefix('siguns')->group(function () {
    Route::get('/', 'SigunController@index');
});

Route::prefix('nonghyups')->group(function () {
    Route::get('/', 'NonghyupController@index');
});

Route::prefix('posts')->group(function () {
    Route::get('/', 'PostController@index');
});