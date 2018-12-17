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

Route::get('/categories', 'PagesController@categories');
 
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//ADMIN ROUTES

Route::get('/admin', 'User\AdminController@index')->middleware('auth','admin');
Route::group(['middleware' => ['auth', 'admin']], function() {
    Route::resource('admin/accounts', 'UsersController'); //Make a CRUD controller
});

//Owner
Route::get('/owner', 'User\OwnerController@index')->middleware('auth','owner');
Route::group(['middleware' => ['auth', 'owner']], function() {
    Route::resource('owner/accounts', 'UsersController'); //Make a CRUD controller
});

//BARISTA ROUTES
Route::get('/barista', 'User\BaristaController@index')->middleware('auth','barista');

//CAPTAIN CREW ROUTES
Route::get('/captaincrew', 'User\CaptainCrewController@index')->middleware('auth','captaincrew');


