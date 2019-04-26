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
    return view('front_end/welcome');
})->name('front');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/', 'FilmController@store_front')->name('store_film_front');
