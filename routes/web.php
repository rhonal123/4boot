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

Route::get('/','WelcomeController@index')->name('root');
Route::get('admin','AdminController@index');


Route::get('/company/register', 'RegisterCompanyController@index')->name('register.company');
Route::post('/company/register', 'RegisterCompanyController@store');
Route::post('/company/companytypes', 'RegisterCompanyController@companyTypes')->name('register.companytype');
