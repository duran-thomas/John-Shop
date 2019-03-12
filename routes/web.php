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

Route::get('/', function(){
    return redirect()->route("login");
});

Auth::routes(['verify'=>true]);

Route::group(['middleware' => ['verified', 'auth']], function () {

    Route::get('/home', 'HomeController@index')->name('home');
});

// Route::get('/', function()
// {
// 	$supplier = DB::table('supplier')->get();
// 	return View::make('/home')->with('supplier', $supplier);
// });

// Route::post('/supplier', 'SupplierController@store');

//Routes To All CRUD Methods For Supplier 
Route::resource('supplier', 'SupplierController');

//Routes To All CRUD Methods For Stocks 
Route::resource('supplier', 'SupplierController');

//Routes To All CRUD Methods For Orders 
Route::resource('supplier', 'SupplierController');

