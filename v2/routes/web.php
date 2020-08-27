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
// Route::middleware('auth:api')->get('/user', function (Request $request) {
// 	return $request->user();
// });

Route::get('login', 'Auth\LoginController@login')->name('login');
Route::post('login', 'Auth\LoginController@loginProcess')->name('login.post');
Route::post('verify-process', 'Auth\LoginController@verifyProcess')->name('verify-process');
Route::get('register', 'Auth\RegisterController@register')->name('register');
Route::post('register', 'Auth\RegisterController@registerProcess')->name('login.register');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('order', 'OrderController');
Route::resource('employees', 'EmployeeController');
Route::get('/employees/{user}/changestatus', 'EmployeeController@changestatus')->name('employees.changestatus');
Route::post('/import_excel/import', 'EmployeeController@import');
Route::get('export', 'EmployeeController@export')->name('export');
