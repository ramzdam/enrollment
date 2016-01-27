<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'StudentController@index');

Route::resource('students', 'StudentController');
Route::resource('reports', 'ReportController');
Route::resource('sections', 'SectionController');
Route::get('students/delete/{id}', 'StudentController@destroy');
Route::get('sections/delete/{id}', 'SectionController@destroy');
Route::post('reports/search', 'ReportController@search');
Route::post('reports/export', 'ReportController@export');
