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

Route::get('/admin', function(){
    return redirect()->route("login");
});

Auth::routes(['verify'=>true]);

Route::group(['middleware' => ['verified', 'auth']], function () {

    Route::get('/admin/home', 'HomeController@index')->name('/admin/home');

});

//Routes To All CRUD Methods For Supplier 
Route::resource('admin/supplier', 'SupplierController')->middleware('auth');
//Routes To All CRUD Methods For Stock
Route::resource('admin/stock', 'StockController')->middleware('auth');
//Routes To All CRUD Methods For Order
Route::resource('admin/orders', 'OrdersController')->middleware('auth');

Route::resource('/ ', 'FrontController');



