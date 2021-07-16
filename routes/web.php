<?php

use Illuminate\Support\Facades\Route;

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

Route::match(['get', 'post'], '/',                  'Pages\CommonController@signin');
Route::match(['get', 'post'], '/signin',            'Pages\CommonController@signin');
Route::match(['get', 'post'], '/signup',            'Pages\CommonController@signup');
Route::match(['get', 'post'], '/password-reset',    'Pages\CommonController@password_reset');

Route::prefix('/admin')->group(function() {
    Route::match(['get', 'post'], '/dashboard',     'Pages\AdminController@dashboard');
    Route::match(['get', 'post'], '/plans',         'Pages\AdminController@plans');
    Route::match(['get', 'post'], '/accounts',      'Pages\AdminController@accounts');
    Route::match(['get', 'post'], '/transactions',  'Pages\AdminController@transactions');
    Route::match(['get', 'post'], '/settings',      'Pages\AdminController@settings');
});

Route::prefix('/client')->group(function () {
    Route::match(['get', 'post'], '/search',        'Pages\ClientController@search');
    Route::match(['get', 'post'], '/plans',         'Pages\ClientController@plans');
    Route::match(['get', 'post'], '/transactions',  'Pages\ClientController@transactions');
    Route::match(['get', 'post'], '/settings',      'Pages\ClientController@settings');
});
