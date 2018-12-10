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

Route::get('/', 'PagesController@index');

Route::get('/Msample', 'PagesController@Msample')->middleware('auth','admin');

Route::get('/about', 'PagesController@about');


 
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('accounts', 'UsersController')->middleware('auth');

Route::get('/admin', function(){
    echo "Hello Admin";
})->middleware('auth','admin');
 
Route::get('/barista', function(){
    echo "Hello Barista";
})->middleware('auth','barista');

 
