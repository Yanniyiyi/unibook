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

Route::middleware('api')->post('/universities/search', 'UniversityController@search');

Route::middleware('api')->post('/books/search', 'BookController@search');

Route::middleware('auth:api')->post('/books/store', 'BookController@store');
Route::middleware('api')->get('/books/{qty?}', 'BookController@index');

Route::middleware('auth:api')->get('/user/{type}/books', 'UserController@getBooks');
Route::middleware('auth:api')->delete('/delete/{id}','UserController@deleteBook');


