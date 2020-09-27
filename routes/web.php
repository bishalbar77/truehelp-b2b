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
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['middleware' => 'usersession'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/dashboard', 'SurveyController@dashboard')->name('survey-dashboard');
    Route::get('/surveys/reports', 'SurveyController@getsurvey')->name('getsurvey');
    Route::get('/surveys/details/{id}', 'SurveyController@survey_details')->name('surveys-details');
    Route::resource('employees', 'EmployeeController');
    Route::get('/students', 'StudentController@index')->name('students.index');
    Route::post('/students/store', 'StudentController@store')->name('students.store');
    Route::post('/import', 'StudentController@import');
    Route::get('/employees/{user}/changestatus', 'EmployeeController@changestatus')->name('employees.changestatus');
    Route::post('/import_excel/import', 'EmployeeController@import');
    Route::get('export', 'EmployeeController@export')->name('export');
    Route::get('/verify={user}', 'EmployeeController@verify')->name('verify');
    Route::get('/profile', 'EmployeeController@profile')->name('profile');
    Route::get('/search', 'EmployeeController@search')->name('search');
    Route::get('/otp', 'Auth\LoginController@loginotp')->name('loginotp');
    Route::post('/sendotp', 'Auth\LoginController@sendotp')->name('sendotp');
    Route::post('/checkotp', 'Auth\LoginController@checkotp')->name('checkotp');
    Route::get('/accounts', 'EmployeeController@accounts')->name('accounts');
    Route::post('survey/add', 'SurveyController@store')->name('survey.add');
    Route::get('/employees/details/{id}', 'EmployeeController@employees_details')->name('employees-details');
    Route::post('/change-password', 'HomeController@change_password');
    Route::get('/notifications','EmployeeController@notifications')->name('notifications');
    Route::post('/searchAnalytics', 'HomeController@searchAnalytics')->name('searchAnalytics');
    Route::post('/searchcheck', 'HomeController@searchcheck')->name('search.check');
});
Route::get('/seenNotification/{id}/{url}','EmployeeController@seenNotification')->name('seenNotification');
