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

Route::get('/api/v1/employees', 'EmployeeController@employees')->name('api.employees.index');
Route::get('/api/v1/survey', 'SurveyController@api')->name('api.survey.index');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
 });
 Route::group(['middleware' => 'auth:api'], function(){
 Route::post('get-details', 'API\PassportController@getDetails');
 });