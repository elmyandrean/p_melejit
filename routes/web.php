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
    return redirect()->route('login');
});

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::resource('/user', 'UserController');
Route::resource('/funding', 'FundingController');
Route::resource('/kredit_retail', 'RetailCreditController');
Route::resource('/transaction', 'TransactionController');
Route::resource('/kkb', 'VehicleLoanController');
Route::get('/data/get_user', 'DataController@get_user')->name('data.get_user');