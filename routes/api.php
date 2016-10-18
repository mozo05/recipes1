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

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

// These are all my routes

Route::get('/recipes', 'recipesController@index');


Route::get('/recipes/{recipesId}', 'recipesController@show');


Route::get('/recipes/cuisine/{cuisineId}', 'recipesController@cuisineType');


Route::patch('/recipes/{recipesId}/rate/{value}', 'recipesController@rate');


Route::patch('/recipes/update/{recipesId}', 'recipesController@update');


Route::post('/recipes/', 'recipesController@store');

Route::delete('/recipes/{recipesId}/', 'recipesController@delete');

