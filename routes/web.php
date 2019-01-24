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


//ADMIN ROUTES

    Route::get('/admin', 'User\AdminController@index')->middleware('auth','admin');
    //accounts
    Route::group(['middleware' => ['auth', 'admin']], function() {
        Route::resource('admin/accounts', 'UsersController', ['as' => 'admin']); 
    });
    //item_categories
    Route::group(['middleware' => ['auth', 'admin']], function() {
        Route::resource('admin/categories', 'CategoriesController', ['as' => 'admin']); 
    }); 

    //item_list
    Route::group(['middleware' => ['auth', 'admin']], function() {
        Route::resource('admin/item_list', 'ItemListController', ['as' => 'admin']); 
    });

    //products
    Route::group(['middleware' => ['auth', 'admin']], function() {
        Route::resource('admin/products', 'ProductController', ['as' => 'admin']); 
    });

    //products_show
    Route::group(['middleware' => ['auth', 'admin']], function() {
        Route::resource('admin/products_show', 'ProductController', ['as' => 'admin']); 
    });
    
    //products_categories
    Route::group(['middleware' => ['auth', 'admin']], function() {
        Route::resource('admin/productcategories', 'ProductCategoriesController', ['as' => 'admin']); 
    }); 
    

    //supplier
    Route::group(['middleware' => ['auth', 'admin']], function() {
        Route::resource('admin/supplier', 'SuppliersController', ['as' => 'admin']); 
    }); 

//Owner
Route::get('/owner', 'User\OwnerController@index')->middleware('auth','owner');
Route::group(['middleware' => ['auth', 'owner']], function() {
    Route::resource('owner/accounts', 'UsersController', ['as' => 'owner']); 
});


//BARISTA ROUTES
Route::get('/barista', 'User\BaristaController@index')->middleware('auth','barista');

//CAPTAIN CREW ROUTES
Route::get('/captaincrew', 'User\CaptainCrewController@index')->middleware('auth','captaincrew');


