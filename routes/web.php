<?php

use Illuminate\Support\Facades\Route;
use App\Mail\WeeklyReport;
use App\Mail\DailyReport;
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
Route::get('/login', 'Auth\LoginController@login')->name('login');
Route::post('/login', 'Auth\LoginController@loginProcess')->name('auth.login');
Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'Auth\RegisterController@register');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

//API Authenticated Routes
Route::group(['middleware' => 'usersession'], function () {

    //Home Houtes
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::any('/change-password', 'HomeController@change_password');

    //Auth Routes
    Route::get('/otp', 'Auth\LoginController@loginotp')->name('loginotp');
    Route::post('/sendotp', 'Auth\LoginController@sendotp')->name('sendotp');
    Route::post('/checkotp', 'Auth\LoginController@checkotp')->name('checkotp');

    //Survey Routes
    Route::get('/health', 'SurveyController@dashboard2')->name('health.dashboard');
    Route::any('/health/survey/{id}', 'SurveyController@dashboardv4')->name('report.dashboard');
    Route::any('/health/{id}', 'SurveyController@dashboardv3')->name('survey.dashboard');
    Route::get('/dashboard', 'SurveyController@dashboard')->name('survey-dashboard');
    Route::any('/visitors', 'SurveyController@visitors')->name('visitors.store');
    Route::get('/surveys', 'SurveyController@getsurvey')->name('getsurvey');
    Route::get('/surveys/ajax', 'SurveyController@ajax')->name('ajax');
    Route::get('/health/visitor/{id}', 'SurveyController@visitor_health_details')->name('health-details');
    Route::get('/health/details/{id}', 'SurveyController@health_details')->name('health-details');
    Route::get('/surveys/details/{id}', 'SurveyController@health_details')->name('surveys-details');
    Route::post('survey/add', 'SurveyController@store')->name('survey.add');
    Route::post('survey/post', 'SurveyController@generate')->name('survey.post');

    //Employee Routes
    Route::resource('employees', 'EmployeeController');
    Route::get('/uploaddata', 'EmployeeController@import1');
    Route::get('/employees/{user}/changestatus', 'EmployeeController@changestatus')->name('employees.changestatus');
    Route::post('/import_excel', 'EmployeeController@import');
    Route::post('/upload', 'EmployeeController@uploaddata');
    Route::post('/photo', 'EmployeeController@photo')->name('employees.picture');
    Route::get('/verify={user}', 'EmployeeController@verify')->name('verify');
    Route::get('/profile', 'EmployeeController@profile')->name('profile');
    Route::get('/search', 'EmployeeController@search')->name('search');
    Route::any('/change-preferences', 'EmployeeController@changepreferences')->name('change.preferences');
    Route::get('/accounts', 'EmployeeController@accounts')->name('accounts');
    Route::get('/employees/details/{id}', 'EmployeeController@employees_details')->name('employees-details');
    Route::get('/notifications','EmployeeController@notifications')->name('notifications');

    //Student Routes
    Route::get('/students', 'StudentController@index')->name('students.index');
    Route::post('/students/store', 'StudentController@store')->name('students.store');
    Route::post('/import', 'StudentController@import');

    //Search Routes
    Route::any('searchAnalytics', 'SearchController@store')->name('searchAnalytics.store');
    Route::get('searchEmployee/{id}', 'SearchController@searchEmployee')->name('searchEmployee');
    Route::get('searchReport/{id}', 'SearchController@searchReport')->name('searchReport');

    //Order Routes
    Route::resource('orders', 'OrderController');

    //Payment Routes
    Route::get('invoice', 'PaymentController@invoice');
    Route::get('plan', 'PaymentController@create');
    Route::post('plan', 'PaymentController@store')->name('payment.store');
    Route::get('payment', 'PaymentController@payment')->name('payment');
    Route::get('subscribe', 'PaymentController@subscribe')->name('subscribe');
    Route::get('card-pay', 'PaymentController@card_pay')->name('card-pay');
    Route::get('subscribe/{id}', 'PaymentController@edit')->name('subscribe.edit');
    Route::get('cancel/{id}', 'PaymentController@cancel')->name('subscribe.cancel');
    Route::post ('/card/check', 'PaymentController@check');
    Route::post ('/updateCard', 'PaymentController@updateCard');
});

//Notification Routes
Route::get('/seenNotification/{id}','EmployeeController@seenNotification')->name('seenNotification');

//Employee Routes
Route::get('export', 'EmployeeController@export')->name('export');
Route::get('student/export', 'EmployeeController@studentexport')->name('student.export');
Route::get('test', 'EmployeeController@test')->name('test');
Route::get('email', 'SurveyController@email')->name('email');
Route::get('mail', function () {
    Mail::to('bishalsanam01@gmail.com')->send(new DailyReport('It works!'));
    return 'Email sent successfully !';
});
Route::get('sendemail', function () {
    $data = array(
        'name' => "Truehelp",
    );
    Mail::to('bishal.rana@gettruehelp.com')->send(new WeeklyReport($data));
    return redirect('/profile');
});