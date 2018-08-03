<?php

use Illuminate\Http\Request;

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

Route::post('login', 'API\AuthController@login');

Route::group(['middleware' => 'auth:api'], function () {
	Route::delete('logout', 'API\AuthController@logout');
	Route::apiResource('incidence-type', 'API\IncidenceTypeController');
	Route::apiResource('requeriment-type', 'API\RequerimentTypeController');
	Route::apiResource('requeriment', 'API\RequerimentController');
	Route::apiResource('company-type', 'API\CompanyTypeController');
	Route::apiResource('company', 'API\CompanyController')->only(['index','show','update','destroy']);
	Route::get('company/{company}/documents', 'API\CompanyController@documents')->name('company.documents');
	Route::put('company/{company}/procesar', 'API\CompanyController@procesar')->name('company.procesar');
	Route::delete('company/{company}/reprobar', 'API\CompanyController@reprobar')->name('company.reprobar');
	
	Route::post('company/{company}/{document}/incidencia', 'API\CompanyController@registrarIncidencia')->name('company.incidecia');

	Route::apiResource('document-type', 'API\DocumentTypeController');
	Route::apiResource('reply', 'API\ReplyController');
	Route::apiResource('question', 'API\QuestionController');
});