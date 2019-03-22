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
    if (Auth::check()) {
    	return redirect()->route('dashboard');
    } else{
    	return redirect()->route('login');
    }
});

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::resource('/users', 'UserController');
Route::resource('/product_holdings', 'ProductHoldingController');
Route::resource('/fundings', 'FundingController');
Route::put('/fundings/{id}/reject', 'FundingController@reject')->name('funding.reject');
Route::put('/fundings/{id}/approve', 'FundingController@approve')->name('funding.approve');
Route::get('/data/users', 'DataController@users')->name('data.users');
Route::get('/data/product_holdings', 'DataController@product_holdings')->name('data.product_holdings');
Route::get('/data/fundings', 'DataController@fundings')->name('data.fundings');
Route::get('/data/{id}/product_content', 'DataController@product_content')->name('data.product_content');

