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

Route::get('/students','PrintController@index');
Route::get('/ssm','SalesSummaryController@prnpriview');
Route::get('/ssmmonth','SMmonthController@prnpriview');
Route::get('/ssmyear','SMyearController@prnpriview');
Route::get('/ssmday','SMdayController@prnpriview');

Route::get('generate-pdf','HomeController@generatePDF');

Route::get('/', 'PagesController@index');

Route::get('/Msample', 'PagesController@Msample')->middleware('auth','admin');

Route::get('/about', 'PagesController@about');
 
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/receipts', 'PagesController@receipts');

Route::get('/salesummary', 'PagesController@salesummary');

Route::get('/stockadjustment', 'PagesController@stock_adj');

Route::Post('/showP', 'SalesSummaryController@showProduct');


//ADMIN ROUTES

    Route::get('/admin', 'User\AdminController@index')->middleware('auth','admin');
    //accounts
    Route::group(['middleware' => ['auth', 'admin']], function() {
        Route::resource('admin/accounts', 'UsersController', ['as' => 'admin']); 
    });
   
    //products
    Route::group(['middleware' => ['auth', 'admin']], function() {
        Route::resource('admin/products', 'ProductController', ['as' => 'admin']);
        
    });
    Route::post('/admin/product/post', 'ProductController@store'); 
    //products_show
    Route::group(['middleware' => ['auth', 'admin']], function() {
        Route::resource('admin/products_show', 'ProductController', ['as' => 'admin']); 
    });

      //product_details
      Route::group(['middleware' => ['auth', 'admin']], function() {
        Route::resource('admin/product_details', 'ProductDetailsController', ['as' => 'admin']); 
    });
    
    //products_categories
    Route::group(['middleware' => ['auth', 'admin']], function() {
        Route::resource('admin/productcategories', 'ProductCategoriesController', ['as' => 'admin']); 
    }); 
    

    //supplier
    Route::group(['middleware' => ['auth', 'admin']], function() {
        Route::resource('admin/supplier', 'SuppliersController', ['as' => 'admin']); 
    });

    //SalesSummary
    Route::group(['middleware' => ['auth', 'admin']], function() {
        Route::resource('admin/salesummary', 'SalesSummaryController', ['as' => 'admin']); 
    });
    //SalesSummary_transaction
    Route::group(['middleware' => ['auth', 'admin']], function() {
        Route::resource('admin/salesumtransaction', 'SalesSummaryController', ['as' => 'admin']); 
    });
    //SalesSsummaryShow
    Route::group(['middleware' => ['auth', 'admin']], function() {
        Route::resource('admin/salessummaryshow', 'SaleSummaryShowController', ['as' => 'admin']); 
    });
    //SalesDetails
    /*Route::group(['middleware' => ['auth', 'admin']], function() {
        Route::resource('admin/salesdetails', 'SalesDetailsController', ['as' => 'admin']); 
    });*/
    //SalesSDay
    Route::group(['middleware' => ['auth', 'admin']], function() {
        Route::resource('admin/salesummaryd', 'SMdayController', ['as' => 'admin']); 
    });
   
    //SalesSMonth
    Route::group(['middleware' => ['auth', 'admin']], function() {
        Route::resource('admin/salesummarym', 'SMmonthController', ['as' => 'admin']); 
    });
    //SalesSYear
    Route::group(['middleware' => ['auth', 'admin']], function() {
        Route::resource('admin/salesummaryy', 'SMyearController', ['as' => 'admin']); 
    });

    //Sales By Product
    Route::group(['middleware' => ['auth', 'admin']], function() {
        Route::resource('admin/salesbyproduct', 'SalesByProductController', ['as' => 'admin']); 
    });
 //Sales By Product - Month
 Route::group(['middleware' => ['auth', 'admin']], function() {
    Route::resource('admin/salesbyproductm', 'SalesMonthController', ['as' => 'admin']); 
});

 //Sales By Product - Year
 Route::group(['middleware' => ['auth', 'admin']], function() {
    Route::resource('admin/salesbyproducty', 'SalesYearController', ['as' => 'admin']); 
});

     //item_categories
     Route::group(['middleware' => ['auth', 'admin']], function() {
        Route::resource('admin/categories', 'CategoriesController', ['as' => 'admin']); 
    }); 

    //item_list
    Route::group(['middleware' => ['auth', 'admin']], function() {
        Route::resource('admin/item_list', 'ItemListController', ['as' => 'admin']); 
    });
     //critical_stock
     Route::group(['middleware' => ['auth', 'admin']], function() {
        Route::resource('admin/critical_stock', 'CriticalStockController', ['as' => 'admin']); 
    });
    

    //StockIn
    Route::group(['middleware' => ['auth', 'admin']], function() {
        Route::resource('admin/stockin', 'StockInController', ['as' => 'admin']); 
    });
    
    //StockAdjust.
    Route::group(['middleware' => ['auth', 'admin']], function() {
        Route::resource('admin/stockadjustment', 'StockAdjustmentController', ['as' => 'admin']); 
    });

    //loginMobile
    Route::get('/mobile/login', 'LoginController@index');

//Owner
Route::get('/owner', 'User\OwnerController@index')->middleware('auth','owner');
Route::group(['middleware' => ['auth', 'owner']], function() {
    Route::resource('owner/accounts', 'UsersController', ['as' => 'owner']); 
});
    //SalesSummary
    Route::group(['middleware' => ['auth', 'owner']], function() {
        Route::resource('owner/salesummary', 'SalesSummaryController', ['as' => 'owner']); 
    });
    //SalesSummary_transaction
    Route::group(['middleware' => ['auth', 'owner']], function() {
        Route::resource('owner/salesumtransaction', 'SalesSummaryController', ['as' => 'owner']); 
    });
    //SalesSsummaryShow
    Route::group(['middleware' => ['auth', 'owner']], function() {
        Route::resource('owner/salessummaryshow', 'SaleSummaryShowController', ['as' => 'owner']); 
    });
    //SalesDetails
    /*Route::group(['middleware' => ['auth', 'admin']], function() {
        Route::resource('admin/salesdetails', 'SalesDetailsController', ['as' => 'admin']); 
    });*/
    //SalesSDay
    Route::group(['middleware' => ['auth', 'owner']], function() {
        Route::resource('owner/salesummaryd', 'SMdayController', ['as' => 'owner']); 
    });

    //SalesSMonth
    Route::group(['middleware' => ['auth', 'owner']], function() {
        Route::resource('owner/salesummarym', 'SMmonthController', ['as' => 'owner']); 
    });
    //SalesSYear
    Route::group(['middleware' => ['auth', 'owner']], function() {
        Route::resource('owner/salesummaryy', 'SMyearController', ['as' => 'owner']); 
    });

    //Sales By Product
    Route::group(['middleware' => ['auth', 'owner']], function() {
        Route::resource('owner/salesbyproduct', 'SalesByProductController', ['as' => 'owner']); 
    });
    //Sales By Product - Month
    Route::group(['middleware' => ['auth', 'owner']], function() {
    Route::resource('owner/salesbyproductm', 'SalesMonthController', ['as' => 'owner']); 
    });

    //Sales By Product - Year
    Route::group(['middleware' => ['auth', 'owner']], function() {
    Route::resource('owner/salesbyproducty', 'SalesYearController', ['as' => 'owner']); 
    });

    //products
    Route::group(['middleware' => ['auth', 'owner']], function() {
        Route::resource('owner/products', 'ProductController', ['as' => 'owner']);
        
    });
    Route::post('/owner/product/post', 'ProductController@store'); 
    //products_show
    Route::group(['middleware' => ['auth', 'owner']], function() {
        Route::resource('owner/products_show', 'ProductController', ['as' => 'owner']); 
    });

      //product_details
      Route::group(['middleware' => ['auth', 'owner']], function() {
        Route::resource('owner/product_details', 'ProductDetailsController', ['as' => 'owner']); 
    });
    
    //products_categories
    Route::group(['middleware' => ['auth', 'owner']], function() {
        Route::resource('owner/productcategories', 'ProductCategoriesController', ['as' => 'owner']); 
    }); 

    //item_categories
     Route::group(['middleware' => ['auth', 'owner']], function() {
        Route::resource('owner/categories', 'CategoriesController', ['as' => 'owner']); 
    }); 

    //item_list
    Route::group(['middleware' => ['auth', 'owner']], function() {
        Route::resource('owner/item_list', 'ItemListController', ['as' => 'owner']); 
    });
     //critical_stock
     Route::group(['middleware' => ['auth', 'owner']], function() {
        Route::resource('owner/critical_stock', 'CriticalStockController', ['as' => 'owner']); 
    });
    

    //StockIn
    Route::group(['middleware' => ['auth', 'owner']], function() {
        Route::resource('owner/stockin', 'StockInController', ['as' => 'owner']); 
    });
    
    //StockAdjust.
    Route::group(['middleware' => ['auth', 'owner']], function() {
        Route::resource('owner/stockadjustment', 'StockAdjustmentController', ['as' => 'owner']); 
    });

//BARISTA ROUTES
Route::get('/barista', 'User\BaristaController@index')->middleware('auth','barista');

//CAPTAIN CREW ROUTES
Route::get('/captaincrew', 'User\CaptainCrewController@index')->middleware('auth','captaincrew');