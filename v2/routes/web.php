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
Route::get('/order', 'SurveyController@getsurvey')->name('getsurvey');
Route::get('/checksurvey={order}', 'SurveyController@checksurvey')->name('checksurvey');
Route::resource('employees', 'EmployeeController');
Route::get('/students', 'StudentController@index')->name('students.index');
Route::post('/students/store', 'StudentController@store')->name('students.store');
Route::post('/import', 'StudentController@import');
Route::get('/employees/{user}/changestatus', 'EmployeeController@changestatus')->name('employees.changestatus');
Route::post('/import_excel/import', 'EmployeeController@import');
Route::get('export', 'EmployeeController@export')->name('export');
Route::get('/verify={user}', 'EmployeeController@verify')->name('verify');
Route::get('/profile', 'EmployeeController@profile')->name('profile');
Route::get('/search', 'EmployeeController@index')->name('search');
Route::get('/otp', 'Auth\LoginController@loginotp')->name('loginotp');
Route::post('/sendotp', 'Auth\LoginController@sendotp')->name('sendotp');
Route::post('/checkotp', 'Auth\LoginController@checkotp')->name('checkotp');
