<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});


Route::get('email/verify/{confirmation_token}','EmailController@verifyEmail')
    ->name('email.verify');

Route::get('/verify','EmailController@showVerify')
    ->name('show.verify.required');

Route::get('/verify/invalid','EmailController@showInvalidVerify')
    ->name('invalid.verify.link');

Route::get('/user/profile','UserController@showProfile')
    ->name('user.profile');

Auth::routes();


