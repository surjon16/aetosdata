<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::match(['get', 'post'], '/me',                'DataController@current_account');

// Account
Route::match(['get', 'post'], '/read/accounts',     'DataController@read_accounts');
Route::match(['get', 'post'], '/read/clients',      'DataController@read_clients');
Route::match(['get', 'post'], '/read/account',      'DataController@read_account');
Route::match(['get', 'post'], '/upsert/account',    'DataController@upsert_account');
Route::match(['get', 'post'], '/delete/account',    'DataController@delete_account');

// Plans
Route::match(['get', 'post'], '/read/plans',    'DataController@read_plans');
Route::match(['get', 'post'], '/read/plan',     'DataController@read_plan');
Route::match(['get', 'post'], '/upsert/plan',   'DataController@upsert_plan');
Route::match(['get', 'post'], '/delete/plan',   'DataController@delete_plan');

// Roles
Route::match(['get', 'post'], '/read/roles',    'DataController@read_roles');
Route::match(['get', 'post'], '/read/role',     'DataController@read_role');
Route::match(['get', 'post'], '/upsert/role',   'DataController@upsert_role');
Route::match(['get', 'post'], '/delete/role',   'DataController@delete_role');

// Sidebar
Route::match(['get', 'post'], '/read/sidebar_items',    'DataController@read_sidebar_items');
Route::match(['get', 'post'], '/read/sidebar_item',     'DataController@read_sidebar_item');
Route::match(['get', 'post'], '/upsert/sidebar_item',   'DataController@upsert_sidebar_item');
Route::match(['get', 'post'], '/delete/sidebar_item',   'DataController@delete_sidebar_item');

// Sidebar Role Access
Route::match(['get', 'post'], '/read/sidebar_role_access',     'DataController@read_sidebar_role_access');
Route::match(['get', 'post'], '/upsert/sidebar_role_access',   'DataController@upsert_sidebar_role_access');
Route::match(['get', 'post'], '/delete/sidebar_role_access',   'DataController@delete_sidebar_role_access');
