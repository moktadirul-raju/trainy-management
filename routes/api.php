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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('all_division','ApiController@getAllDivision');
Route::get('get_district/{id}','ApiController@getDistrict');
Route::get('get_upazila/{id}','ApiController@getUpazila');
Route::get('all_exam','ApiController@getAllExam');
Route::get('all_university','ApiController@getAllUniversity');
Route::get('all_board','ApiController@getAllBoard');
Route::post('register','ApiController@register');
