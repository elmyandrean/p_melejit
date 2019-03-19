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
Route::get('/data/users', 'DataController@users')->name('data.users');
