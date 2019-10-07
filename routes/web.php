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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/rapport', 'RapportController@index')->name('rapport');
Route::get('/create-rapport', 'RapportController@create')->name('create-rapport');
Route::post('/rapport-save', 'RapportController@store');
Route::get('/success', 'RapportController@success');
