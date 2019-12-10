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

Route::get('/alive', function () {
   echo "yes";
});

Route::get('/posts', 'PostController@index');

Route::post('/posts', 'PostController@store');

Route::put('/posts/{id}', 'PostController@update');

Route::get('/posts/{id}', 'PostController@show');

Route::delete('/posts/{id}', 'PostController@destroy');
