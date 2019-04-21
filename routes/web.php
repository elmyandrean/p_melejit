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
Route::put('/fundings/{id}/approve', 'FundingController@approve')->name('funding.approve');
Route::resource('/kkbs', 'KkbController');
Route::put('/kkbs/{id}/approve', 'KkbController@approve')->name('kkb.approve');
Route::resource('/retail_credits', 'RetailCreditController');
Route::put('/retail_credits/{id}/approve', 'RetailCreditController@approve')->name('retail_credit.approve');
Route::resource('/transactionals', 'TransactionalController');
Route::put('/transactionals/{id}/approve', 'TransactionalController@approve')->name('transactional.approve');
Route::get('/data/users', 'DataController@users')->name('data.users');
Route::get('/data/product_holdings', 'DataController@product_holdings')->name('data.product_holdings');
Route::get('/data/fundings', 'DataController@fundings')->name('data.fundings');
Route::get('/data/kkbs', 'DataController@kkbs')->name('data.kkbs');
Route::get('/data/retail_credits', 'DataController@retail_credits')->name('data.retail_credits');
Route::get('/data/transactionals', 'DataController@transactionals')->name('data.transactionals');
Route::get('/data/{id}/product_content', 'DataController@product_content')->name('data.product_content');
Route::get('/data/report', 'DataController@reports')->name('data.reports');
Route::get('/report', 'ReportController@index')->name('report.index');
Route::put('/users/{id}/reset_password', 'UserController@reset_password')->name('users.reset_password');
Route::get('/users/{id}/edit_profile', 'UserController@edit_profile')->name('users.edit_profile');
Route::put('/users/{id}/update_profile', 'UserController@update_profile')->name('users.update_profile');
Route::get('/report/download_excel', 'ReportController@download_excel')->name('report.download_excel');

