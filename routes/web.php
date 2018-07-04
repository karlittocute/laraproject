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
    return view('/pages/static_pages/welcome');
});
Route::get('/contacts', function () {
    return view('/pages/static_pages/contacts');
});
Route::get('/help/how_make_choice', function () {
    return view('/pages/static_pages/help_how_make_choice');
});
Route::get('/help/how_make_resume', function () {
    return view('/pages/static_pages/help_how_make_resume');
});
Route::get('/info/about_burse', function () {
    return view('/pages/static_pages/info_about_burse');
});
Route::get('/info/about_system', function () {
    return view('/pages/static_pages/info_about_system');
});
Route::get('/info/partners', function () {
    return view('/pages/static_pages/info_partners');
});

Route::get('/personal_data', function () {
    return view('/pages/static_pages/personal_data');
});

Route::resource('user','UserController');
Route::resource('resume','ResumeController');
Route::resource('company','CompanyController');
Route::resource('vacancy','VacancyController');
Route::resource('filial','FilialController');
Route::resource('operator','OperatorController');
Route::resource('news','NewsController');

Route::get('/login','SessionsController@create');
Route::post('/login','SessionsController@store');
Route::get('/logout','SessionsController@destroy');

Route::post('/resume/{resume}/publish','ResumeController@publish');
Route::post('/resume/{resume}/deny','ResumeController@deny');
