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

//Auth routes
// Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
// Route::post('/login', 'Auth\LoginController@login');
Route::get('/login', 'Auth\LoginController@login')->name('login');
Route::post('/login', 'Auth\LoginController@loginProcess');

Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'Auth\RegisterController@register');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
// Home Routes
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
// Route::resource('order', 'OrderController');
Route::resource('employees', 'EmployeeController');
Route::get('/students', 'StudentController@index')->name('students.index');
Route::post('/students/store', 'StudentController@store')->name('students.store');
Route::post('/import', 'StudentController@import');
Route::get('/sexport', 'StudentController@export')->name('students.export');
Route::get('/employees/{user}/changestatus', 'EmployeeController@changestatus')->name('employees.changestatus');
Route::post('/import_excel/import', 'EmployeeController@import');
Route::get('export', 'EmployeeController@export')->name('export');
