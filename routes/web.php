<?php

use App\Book;

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

Route::get('/become-a-seller','UserController@startSelling')
    ->name('start.selling');

Route::resource('book','BookController');
Route::get('/book','BookController@index');
Route::get('/book/created/{id}','BookController@showSuccessInfo')->name('book.created');

Route::get('user/books','UserController@showBooks')->name('user.books');

Auth::routes();


