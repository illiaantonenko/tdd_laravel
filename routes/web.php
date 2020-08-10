<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Books routs
Route::get('/book','BookController@index')->name('book.index');
Route::post('/book','BookController@store')->name('book.store');
Route::get('/book/{book}','BookController@show')->name('book.show');
Route::patch('/book/{book}','BookController@update')->name('book.update');
Route::delete('/book/{book}','BookController@destroy')->name('book.destroy');

// Author routs
Route::post('/author', 'AuthorController@store')->name('author.store');


Route::post('/checkout/{book}', 'CheckoutBookController@store');
Route::post('/checkin/{book}', 'CheckinBookController@store');

