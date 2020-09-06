<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::post('admin-login','Auth\LoginController@adminLogin')->name('admin-login');
Route::group(['as'=>'admin.','namespace'=>'Admin','middleware'=>'auth'], function (){
Route::get('admin', 'AdminController@dashboard')->name('dashboard');
Route::resource('division','DivisionController');
Route::resource('district','DistrictController');
Route::resource('upazila','UpazilaController');
Route::resource('exam','ExamController');
Route::resource('university','UniversityController');
Route::resource('board','BoardController');
Route::get('trainy','TrainyController@allTrainy')->name('trainy');
Route::post('search-trainy','TrainyController@searchTrainy')->name('search-trainy');
Route::get('view-trainy/{id}','TrainyController@viewTrainy')->name('view-trainy');

});
