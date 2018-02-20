<?php
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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('user','UserController');
Route::resource('resume','ResumeController');
Route::resource('company','CompanyController');
Route::resource('vacancy','VacancyController');


Route::get('/login','SessionsController@create');
Route::post('/login','SessionsController@store');
Route::get('/logout','SessionsController@destroy');

Route::post('/resume/{resume}/publish','ResumeController@publish');
Route::post('/resume/{resume}/deny','ResumeController@deny');
