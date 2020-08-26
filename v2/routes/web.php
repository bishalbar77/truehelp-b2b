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
// 
// Auth::routes();

Route::get('login', 'Auth\LoginController@login')->name('login');
Route::post('super/admin', 'Auth\AuthController@postLogin')->name('auth.login.post');
Route::get('super/admin/logout', 'Auth\AuthController@getLogout')->name('auth.logout.get');

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('order', 'OrderController');
Route::resource('employees', 'EmployeeController');
Route::get('/employees/{user}/changestatus', 'EmployeeController@changestatus')->name('employees.changestatus');
Route::post('/import_excel/import', 'EmployeeController@import');
Route::get('export', 'EmployeeController@export')->name('export');
